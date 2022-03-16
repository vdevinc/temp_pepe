<?php namespace App\Transformers;


class ChefTransformer extends Transformer {

    public function transform($data)
    {
        $return = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                   
                    'picture_url' => url('uploads/dish/'. $data['id']. '/' . $data['file_picture']),
                    ];

    

        return $return;

    }

} 