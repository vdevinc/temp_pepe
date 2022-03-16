@extends('layouts.admin')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Dashboard</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        
                                        
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
           

<div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <a href="{{url('/admin/chefs')}}">
                                <div class="card" style="    background: linear-gradient(to right,#0ac282,#0df3a3);">
                                    <div class="card-body">
                                        <h5 class="text-muted wt">Pending Chef Approval</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{$chefspendCount}}</h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </a>
                            </div>
                           <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <a href="{{url('/admin/clients')}}">
                                <div class="card" style="background: linear-gradient(to right,#fe5d70,#fe909d);">
                                    <div class="card-body">
                                        <h5 class="text-muted wt">Pending Dishes Approval</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{$dishespendCount}}</h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                                </a>
                            </div>
                        
                             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <a href="{{url('/admin/orders')}}">
                                <div class="card" style="background: linear-gradient(to right,#fe9365,#feb798);">
                                    <div class="card-body">
                                        <h5 class="text-muted wt">Total Orders</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{$ordersCount}}</h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </a>
                            </div>
                        </div>




    </div>
</div>
@stop