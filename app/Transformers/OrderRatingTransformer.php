<?php namespace App\Transformers;


class OrderRatingTransformer extends Transformer {

    public function transform($data)
    { 
        $return = [
                    'id' => $data['id'],
                    'dish_rating' => $data['dish_rating'],
                    'chef_rating' => $data['chef_rating'],
                    'dish_review' => $data['dish_review'],
                    'chef_review' => $data['chef_review'],
                    'created_at' => $data['created_at'],
                    ];

        if(array_key_exists('order', $data)) { 

            $return['user'] = [
                'full_name' => $data['order']['user']['full_name'],
                'avatar_small_url' => $data['order']['user']['avatar_small_url'],
                'avatar_medium_url' => $data['order']['user']['avatar_medium_url'],
                'avatar_large_url' => $data['order']['user']['avatar_large_url']      
            ];
        
        }


        return $return;

    }

} 