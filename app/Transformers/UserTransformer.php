<?php namespace App\Transformers;


use App\Transformers\DishTransformer;


class UserTransformer extends Transformer {

    public function __construct(DishTransformer $dishTransformer) 
    {
        $this->dishTransformer = $dishTransformer;
    }

    public function transform($data)
    {
        $return = [
                    'id' => $data['id'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'middle_name' => $data['middle_name'],
                    'full_name' => $data['full_name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'about' => $data['about'],
                    'avatar' => url('uploads/user/'. $data['id']. '/' . $data['file_avatar']),
                    'avatar_large_url' => $data['avatar_large_url'],
                    'avatar_medium_url' => $data['avatar_medium_url'],
                    'avatar_small_url' => $data['avatar_small_url'],
                    ];
        if(array_key_exists('role', $data)) {

            $return['role'] = ['role' => $data['role']['name'],
                               'role_id' => $data['role']['id'],
                               'slug' => $data['role']['slug']
            ];
        }      
        
        if(array_key_exists('chef', $data)) {

            $return['chef'] = [
                'chef_type_id' => $data['chef']['chef_type_id'],
                'school' => $data['chef']['school'],
                'rating' => $data['chef']['rating'],
                'is_approved' =>  $data['chef']['is_approved'] ? true : false,
                'is_rejected' =>  $data['chef']['is_rejected'] ? true : false,
                'is_agreement_signed' =>  $data['chef']['is_agrmt_signed'] ? true : false,
                'agreement' => $data['chef']['is_agrmt_signed']? url('uploads/user/'. $data['id']. '/agreement.pdf'):'',
                'culinary_cert' => $data['chef']['file_culinary_cert']? url('uploads/user/'. $data['id']. '/'.$data['chef']['file_culinary_cert']):'',
                'govt_id' => $data['chef']['file_govt_id']? url('uploads/user/'. $data['id']. '/'.$data['chef']['file_govt_id']):''

            ];
        }  
        
        if(array_key_exists('address', $data)) {
            $return['address'] = $data['address'];
            // $return['address'] = [
            //     'address_line_1' => $data[0]['address']['address_line_1'],
            //     'address_line_2' => $data[0]['address']['address_line_2'],
            //     'zip' => $data['address'][0]['zip'],
            //     'city' => $data['address'][0]['city'],
            //     'state' => $data['address'][0]['state'],                  
            // ];
        }  

        if(array_key_exists('dishes', $data)) {
            $return['dishes'] = $this->dishTransformer->transformCollection($data['dishes']);
        }   
        
        if(array_key_exists('payment_card', $data)) {
            if(count($data['payment_card']) > 0)
               $return['has_payment'] =  true;
            else 
               $return['has_payment'] =  false;
        }    


        return $return;

    }

} 