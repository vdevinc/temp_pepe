<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Address;
use App\UserPaymentCard;
use App\Mail\SaveCard;
use App\Mail\NewclientNotificationAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class PaymentController extends ApiController
{

    function __construct() 
    {
       // $this->stripe = $stripe;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


    }


    public function save(Request $request) 
    { 
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = Auth::user();


        $customer = \Stripe\Customer::create([
            'source' => $request->get('token'),
            'email' => $user->email
        ]);

        $card = new UserPaymentCard(['customer_id' => $customer->id]);
        $user->paymentCard()->save($card);

        $clientaddress =Address::where('user_id', $user->id)->first();

        Mail::to($user->email)->send(new SaveCard($user));
       // Mail::to('ask@pepelechef.com')->send(new NewclientNotificationAdmin($user,$clientaddress));

        return $this->respondWithSuccess('', compact('customer'));

        // $charge = \Stripe\Charge::create([
        //     'amount' => 50,
        //     'currency' => 'usd',
        //     'customer' => $customer->id,
        // ]);

    }

    public function bank(Request $request) 
    {
        $bank = Auth::user()->paymentCard()->first();

        if($bank) {
            $account = \Stripe\Account::retrieve(Auth::user()->paymentCard()->first()->customer_id);

            $bank = $account->external_accounts->data[0];

        }
        return $this->respondWithSuccess('', compact('bank'));

    }

    public function saveBankAccount(Request $request) 
    { 


        $accountAttributes = [
            'country' => "US",
            'type' => 'custom',
            'email' => Auth::user()->email,
            'individual[email]'=> Auth::user()->email,
            "business_type" => "individual",
            'requested_capabilities' => ['platform_payments'],
            'individual[first_name]' => Auth::user()->first_name,
            'individual[last_name]' => Auth::user()->last_name,
            // 'individual[dob[day]]' => 12,
            // 'individual[dob[month]]' => 5,
            // 'individual[dob[year]]' => 1988,
            // 'individual[ssn_last_4]' => '0000',
            'business_profile[product_description]' => 'Pepelechef payout',
            'tos_acceptance[date]' => time(),
            'tos_acceptance[ip]' => $_SERVER['REMOTE_ADDR']  
        ];

        $externalAccountAttributes = [
            'object' => 'bank_account',
            'account_number' =>  $request->get('account_number'),     //'000123456789'
            'country' => 'US',
            'currency' => 'USD',
            'routing_number' =>  $request->get('routing_number'),  //'110000000'
            'account_holder_name' => $request->get('account_holder_name')

        ];

        try {


            if(!Auth::user()->paymentCard()->exists()) {

                $account = \Stripe\Account::create($accountAttributes);


                $account->external_accounts->create(array(
                    'external_account' => $externalAccountAttributes
                ));

                $file = \Stripe\FileUpload::create(
                    [
                    'purpose' => 'identity_document',
                    'file' => fopen(public_path(Auth::user()->chef->file_govt_id_path), 'r')
                    ],
                    ['stripe_account' => $account->id]
                );
        
        
                \Stripe\Account::update(
                    $account->id,
                    [
                        'individual[verification[document[front]]]' => $file->id
                    ]
                );

                $payment = Auth::user()->paymentCard()->create(['customer_id' => $account->id]);
                

            }else { 

                $account = \Stripe\Account::retrieve(Auth::user()->paymentCard()->first()->customer_id);

                $bank = $account->external_accounts->data[0];
                \Stripe\Account::updateExternalAccount(
                    $account->id,
                    $bank->id,
                    [
                        [
                            'account_holder_name' => $request->get('account_holder_name')
                        ]
                    ]
                );
                
            }

            $account = \Stripe\Account::retrieve(Auth::user()->paymentCard()->first()->customer_id);   

            return $this->respondWithSuccess('Bank account saved successfully in stripe.', compact('account'));

        }catch (\Exception $error) {
            $message = $error->getMessage();
            return $this->respondWithError($message);

        }
    }

    
    public function settings(Request $request) 
    {
        $stripe = [
                   'stripe_key' => env('STRIPE_KEY'), 
                    'stripe_secret' => env('STRIPE_SECRET')
        ];
         

        return $this->respondWithSuccess('', compact('stripe'));

    } 
}
