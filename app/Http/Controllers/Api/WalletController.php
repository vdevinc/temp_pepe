<?php

namespace App\Http\Controllers\Api;

use App\Wallet;
use App\WalletTransaction;

use App\Transformers\WalletTransformer;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WalletController extends ApiController
{
    public function __construct(WalletTransformer $walletTransformer) 
    {
        $this->walletTransformer = $walletTransformer;
    }

    function index(Request $request) 
    {
        $wallet = Auth::user()->wallet()->first();

        if(!$wallet) {
        $wallet = Auth::user()->wallet()->create();
        }

        $wallet = Auth::user()->wallet()->with('transaction')->first();

        $wallet = $this->walletTransformer->transform($wallet->toArray());

        return $this->respondWithSuccess('', compact('wallet'));


    }
}
