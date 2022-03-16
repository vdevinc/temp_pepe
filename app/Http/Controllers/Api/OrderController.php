<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\DishServiceType;
use App\Order;
use App\User;
use App\Chef;
use App\Address;
use App\OrderRating;

use App\Transformers\OrderTransformer;
use App\Mail\OrderCreated;
use App\Mail\OrdernotificationAdmin;
use App\Mail\OrderrejectedbyChef;
use App\Mail\OrderrejectiontoAdmin;
use App\Mail\OrderapprovalnotificationClient;
use App\Mail\OrderapprovaltoAdmin;
use App\Mail\OrdernotificationChef;

use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


use App\Http\Controllers\Controller;

class OrderController extends ApiController
{
    public function __construct(OrderTransformer $orderTransformer) 
    {
        $this->orderTransformer = $orderTransformer;
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'dish_id' => 'required',
            'service_type' => 'required',
            'no_of_people' => 'required',
            'time_slot' => 'required',
         
        ]);

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }
        
        $dish = Dish::find($request->get('dish_id'));
        if(!$dish) {
            return $this->respondWithError('Dish does not exist.');
        }

        if(!Auth::user()->paymentCard()->exists()) {
            return $this->respondWithError('You do not have a payment method.');
        }


        $dishServiceType = DishServiceType::where('slug', strtolower($request->get('service_type')))->first();       
        if(!$dishServiceType) {
            return $this->respondWithError('Dish service type does not exist.');
        }

        $price = $dish->calculatePriceBreakdown($request->get('no_of_people'));
        $timeSlot = Carbon::parse($request->get('time_slot'));

        $order = new Order([
            'dish_id' => $dish->id, 
            'dish_service_type_id' => $dishServiceType->id,
            'no_of_people' => $request->get('no_of_people'),
            'price' => $price['price'],
            'txn_fee' => $price['txn_fee'],
            'sales_tax' => $price['sales_tax'],
            'net_price' => $price['net_price'],
            'time_slot' => $timeSlot->format("Y-m-d h:m:s")
        ]);

        Auth::user()->order()->save($order);

        //mail to client re- order confirmation 
        $chef = User::where('id',$dish->user_id)->first();
        $order = Order::with('user','dish.user')->find($order->id);

        Mail::to(Auth::user()->email)->send(new OrderCreated($order));
        Mail::to( $chef->email)->send(new OrdernotificationChef($order));

        Mail::to('ask@pepelechef.com')->send(new OrdernotificationAdmin($order));

        return $this->respondWithSuccess('Order created successfully.', []);
    }

    public function price(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'dish_id' => 'required',
            //'service_type' => 'required',
            'no_of_people' => 'required',         
        ]);

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }
        
        $dish = Dish::find($request->get('dish_id'));
        if(!$dish) {
            return $this->respondWithError('Dish does not exist.');
        }

        $price = $dish->calculatePriceBreakdown($request->get('no_of_people'));

        $order = [
            ['display_name' => 'sales_tax', 'amount' => $price['sales_tax']], 
            ['display_name' =>'txn_fee', 'amount' => $price['txn_fee']], 
            ['display_name' =>'price', 'amount' => $price['price']], 
            ['display_name' => 'net_price', 'amount' => $price['net_price']]
        ];
        return $this->respondWithSuccess('', compact('order'));


    }

    public function status(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'is_approved' => 'required',
         
        ]);

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }

        $order = Order::find($request->get('order_id'));

        if(!$order) {
            return $this->respondWithError('Order does not exist.');
        }

        if($order->is_approved) {
            return $this->respondWithError('Order is already accepted.');
        }

        $user = User::find($order->user_id);


        $userPaymentCard = $user->paymentCard()->first();

        if($request->get('is_approved') == false) {
            $order->status = 'rejected';
            $order->save();

            Mail::to($user->email)->send(new OrderrejectedbyChef($user));
             Mail::to('ask@pepelechef.com')->send(new OrderrejectiontoAdmin($user));


            return $this->respondWithSuccess('Order declined successfully.', []);
        }

       

        if(!$userPaymentCard) {
            return $this->respondWithError('User does not have a payment card.');
        }


        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $order->price * 100,
                'currency' => 'usd',
                'customer' => $userPaymentCard->customer_id,
            ]);
    
            $order->status = 'accepted';
            $order->save();
    
            Mail::to($user->email)->send(new OrderapprovalnotificationClient($user));
                 Mail::to('ask@pepelechef.com')->send(new OrderapprovaltoAdmin($user));
    
            
    
            return $this->respondWithSuccess('Order accepted successfully.', []);

        }catch (\Exception $error) {
            $message = $error->getMessage();
            return $this->respondWithError($message);

        }

       


    }

    public function complete(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'dish_rating' => 'required',         
            'dish_review' => 'required',
            'chef_rating' => 'required',
            'chef_review' => 'required',

        ]);

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }

        $order = Order::find($request->get('order_id'));

        if(!$order) {
            return $this->respondWithError('Order does not exist.');
        }

        $chefCost = $order->dish->cost;
        $chefFee = $order->getChefFee();
        $customerPrice = $order->getPrice();
        $chefPayment = $order->dish->cost + 
                       ($chefFee * 65) / 100 +
                       (($customerPrice - $order->dish->cost) * 65) / 100;


        $order->status = 'completed';
        $order->save();  
        //create wallet if not exist for the user
        if(!$order->dish->user->wallet) { 
            $wallet = $order->dish->user->wallet()->create();
        } else {
            $wallet = $order->dish->user->wallet;
        }

        $wallet->deposite($chefPayment, $order->id, 'Payment from dish order');

        //rating   
        $order->rating()->create($request->all());   
        $order->dish->user->chef->updateRating($request->get('chef_rating'));
        $order->dish->updateRating($request->get('dish_rating'));

        return $this->respondWithSuccess('Order completed successfully.', []);

    }

    public function listForClient(Request $request) 
    {
        $orders = Order::with('dish','service_type','user.address','dish.user')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $orders = $this->orderTransformer->transformCollection($orders->toArray());
        return $this->respondWithSuccess('', compact('orders'));

    }

    public function listForChef(Request $request) 
    {
        $orders = Order::with('dish','service_type','user.address','dish.user')
                        ->whereHas('dish.user', function($query) {
                            $query->where('user_id', Auth::user()->id);
                        })
                        
                        ->orderBy('id', 'desc')
                        ->get();
       
        $orders = $this->orderTransformer->transformCollection($orders->toArray());
        return $this->respondWithSuccess('', compact('orders'));

    }
}
