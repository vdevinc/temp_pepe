@extends('layouts.admin')

@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Order Request</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                     @if (Session::has("success"))
                          <div class="card">
                              <h5 class="card-header"> {{ Session::get("success") }}</h5>
                              </div>
                            @endif
                        <div class="card">
                            <h5 class="card-header">Order Requests</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Client Name</th>
                                                <th>Dish Name</th>
                                                <th>Order Date</th>
                                                <th>Price</th>
                                                 <!-- <th>Reviews</th> -->
                                                <th>Actions</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $key =>$order)
                                            <tr>
                                                 <td>PE-0-0{{$order->id}}</td>
                                                <td>{{$order['user']['full_name']}}</td>
                                                <td>{{$order['dish']['name']}}</td>
                                               <td>{{ date('d-m-Y', strtotime($order->created_at))}}
                                               </td>
                                             
                                                <td><i class="fas fa-dollar-sign"></i>&nbsp;{{sprintf('%0.2f', $order->price)}}
                                                </td>
                                                
                                                <td style="width: 163px!important;">
                                                 <a href="{{url('/admin/orders/'.$order->id)}}">
                                                    <button class="btn  btn-primary" type="submit">view</button><br>
                                                    <!-- @if(!empty($order['rating'][0]['dish_review']) || !empty($order['rating'][0]['chef_review']))
                                                    <button class="btn  btn-info" type="submit">Approve Review</button>
                                                    @endif -->
                                                </a>
                                                    <!-- @if($order->is_approved==1)
                                                 <a href="{{url('/admin/reviews/'.$order->id)}}"><button class="btn  btn-warning" type="submit">Reviews</button></a> 
                                                 @endif   -->
                                                </td>

                                                <td>

                                                 <button class="btn btn-block btn-danger" type="submit">{{$order->status}}</button>

                                                </td>
                                              
                                            </tr>
                                           
                                             @endforeach
                                            
                                           
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                             
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

@stop