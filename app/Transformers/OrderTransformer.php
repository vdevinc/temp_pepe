<?php namespace App\Transformers;


class OrderTransformer extends Transformer {

    public function transform($data)
    {
        $return = [
                    'id' => $data['id'],
                    'no_of_people' => $data['no_of_people'],
                    'price' => $data['price'],
                    'txn_fee' => $data['txn_fee'],
                    'sales_tax' => $data['sales_tax'],
                    'net_price' => $data['net_price'],
                    'time_slot' => $data['time_slot'],
                    'status' => $data['status'],
                    'is_approved' =>  $data['is_approved'] ? true : false,
                    'is_rejected' =>  $data['is_rejected'] ? true : false,
                    ];

        if(array_key_exists('service_type', $data)) {

            $return['service_type'] = [
                'id' => $data['service_type']['id'],
                'name' => $data['service_type']['name'],
                'slug' => $data['service_type']['slug'],
                'description' => $data['service_type']['description'],
                                
            ];
        } 

        if(array_key_exists('dish', $data)) { 
            
            $return['dish'] = [
                'id' => $data['dish']['id'],
                'name' => $data['dish']['name'],
                'picture_url' => $data['dish']['picture'],
                'url' => $data['dish']['url']
            ];
            $return['dish']['contact_info'] = [
                'id' => $data['dish']['user']['id'],
                'full_name' => $data['dish']['user']['full_name'],
                'avatar' => $data['dish']['user']['avatar_url'],
                'addreess_line_1' => $data['user']['address']['0']['address_line_1'],
                'addreess_line_2' => $data['user']['address']['0']['address_line_2'],
                'zip_code' => $data['user']['address']['0']['zip'],
                'city' => $data['user']['address']['0']['city'],
                'state' => $data['user']['address']['0']['state'],
                'lat' => $data['user']['address']['0']['latitude'],
                'long' => $data['user']['address']['0']['longitude'],
                'cur_lat' => $data['user']['address']['0']['cur_latitude'],
                'cur_ong' => $data['user']['address']['0']['cur_longitude'],


            ];

        }
 
        return $return;

    }

} 