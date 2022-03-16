<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function chefAgreement() 
    {
        return view('app.dashboard.common');
    }

    public function chefAgreementApproval() 
    {
        return view('app.dashboard.common');
    }

    public function profile() 
    {
        return view('app.dashboard.common');
    }

    public function profileEdit() 
    {
        return view('app.dashboard.common');
    }

    public function payment() 
    {
        return view('app.dashboard.common');
    }
    public function bank() 
    {
        return view('app.dashboard.common');
    }
}
