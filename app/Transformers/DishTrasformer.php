<?php namespace App\Transformers;

use App\Transformers\OrderRatingTransformer;



class DishTransformer extends Transformer {

    public function __construct(OrderRatingTransformer $orderRatingTransformer) 
    {
        $this->orderRatingTransformer = $orderRatingTransformer;
    }

    public function transform($data)
    {
        $return = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'cuisine_type' => $data['cuisine_type'],
                    'dish_service_type_id' => $data['dish_service_type_id'],
                    'hours' => $data['hours'],
                    'cost' => $data['cost'],
                    'price' => $data['price'],
                    'story' => $data['story'],
                    'ingredients' => $data['ingredients'],
                    'courses' => $data['courses'],
                    'rating' => $data['rating'],
                    'picture_url' => $data['picture'],
                    'picture_large_url' => $data['picture_large'],
                    'picture_medium_url' => $data['picture_medium'],
                    'picture_small_url' => $data['picture_small'],
                    ];

        if(array_key_exists('service_type', $data)) {

            $return['service_type'] = [
                'id' => $data['service_type']['id'],
                'name' => $data['service_type']['name'],
                'slug' => $data['service_type']['slug'],
                'description' => $data['service_type']['description'],
                                
            ];
        } 

        if(array_key_exists('user', $data)) { 
            
            $return['chef'] = [
                'id' => $data['user']['id'],
                'full_name' => $data['user']['full_name'],
                'avatar' => $data['user']['avatar_url'],

            ];

            if(array_key_exists('chef', $data['user'])) { 
            
                $return['chef']['rating'] =  $data['user']['chef']['rating'];
                    
            }

        }

        if(array_key_exists('ratings', $data)) { 
            $return['ratings'] = $this->orderRatingTransformer->transformCollection($data['ratings']);
        }    


        return $return;

    }

} 