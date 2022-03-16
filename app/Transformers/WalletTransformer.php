<?php namespace App\Transformers;


class WalletTransformer extends Transformer {

    public function transform($data)
    { 
        $return = [
                    'id' => $data['id'],
                    'balance' => $data['balance'],
                    'txns' => $data['transaction']
                    ];
 


        return $return;

    }

} 