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
                            <h2 class="pageheader-title">Orders</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item">
                                            <a href="{{url('/admin/orders')}}" class="breadcrumb-link">Orders </a></li>
                                        
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
                   
                     <div class="col-md-12">
                       
                    <div class="row detail ">
                     <br/>
                        <div class="col-md-3">
                           <img  class="imgclsdetail" src="{{url('../uploads/dish/'.
                           $orders->dish_id.'/'.$orders['dish']['file_picture'])}}">
                            
                            <!--  @if($orders->is_approved=='0')
                             <form method="post" action="{{url('/admin/order-approve')}}" 
                                  name="orderapprove" id="orderapprove">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$orders['user']['email']}}">
                                  <input type="hidden" name="order_id" id="order_id" value="{{$orders->id}}">
                                
                                <button class="btn btn-block btn-success" type="submit" value="approve" id ="dishes"  >Approve
                                </button> 

                              @else
                              <form method="post" action="{{url('/admin/order-reject')}}" 
                                  name="orderreject" id="orderreject">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$orders['user']['email']}}">
                                  <input type="hidden" name="order_id" id="order_id" value="{{$orders->id}}">
                                 <button class="btn btn-block btn-danger" type="submit"  id ="dishes_reject" value="reject">Reject
                                 </button>
                              @endif -->
                                 
                           
                        </div>
                        <div class="col-md-9">
                            <h1>{{$orders->name}}</h1>
                               <div class="row">
                                
                                                
                                  <div class="col-md-3 list">
                                            <p>Client Name</p>
                                            <p>Dish Name</p>
                                            <p>Cuisine Type</p>
                                            <p>Order Date</p>
                                            <p>No of People</p>
                                            <p>Price</p>
                                            
                                         </div>
                                        <div class="col-md-6 list1" style="">
                                            <p id="fname">:&nbsp;&nbsp;{{$orders['user']['full_name']}} </p>
                                            <p id="fname">:&nbsp;&nbsp;{{$orders['dish']['name']}} </p>
                                            <p id="mname">:&nbsp;&nbsp;{{$orders['dish']['cuisine_type']}}
                                            </p>
                                           <!--  <p id="lname">:&nbsp;&nbsp;{{$orders['service_type']['name']}}</p> -->
                                            <p id="email">:&nbsp;&nbsp;{{ date('d-m-Y', strtotime($orders->created_at))}}</p>
                                            <p id="phone">:&nbsp;&nbsp;{{$orders->no_of_people}}
                                            </p>
                                            <p id="zip">:&nbsp;&nbsp;{{$orders->price}}</p>
                                            
                                            
                                        </div>
                                    <div class="row">
                                   @if($orders->is_approved=='0')
                                  <img src="{{url('/admin/images/pending.png')}}" class="approve">
                                   @else  
                                  <img src="{{url('/admin/images/approved.png')}}" class="approve">
                                  @endif
                                   </div>
                              </div>         
                        </div>
                         <div class="col-md-12">
                          <br>
                          <table class="table table-bordered ">
                            <tr>
                              <td>Chef Review </td><td>{{ isset($orders['rating'][0]) ? $orders['rating'][0]['dish_review'] : ''   }}</td>
                              <td rowspan="3">@if(isset($orders['rating'][0]) && $orders['rating'][0]['is_approved']=='0')
                             <form method="post" action="{{url('/admin/review_status')}}" 
                                  name="orderapprove" id="orderapprove">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$orders['user']['email']}}">
                                  <input type="hidden" name="order_id" id="order_id" value="{{$orders->id}}">
                                  <input type="hidden" name="review_status"  value="approve">
                                
                                <button class="btn btn-block btn-success" type="submit" value="approve" id ="dishes"  >Approve
                                </button> 
                              </form>
                              @elseif(isset($orders['rating'][0]) && $orders['rating'][0]['is_approved']=='1')
                             <button class="btn btn-block btn-danger" >Approved</button> 
                              @endif
                              </td>
                            </tr>
                             <tr>
                              <td>Client Review </td><td>{{  isset($orders['rating'][0]) ? $orders['rating'][0]['chef_review'] : '' }}</td>
                            </tr>
                          </table>
                         </div>

                    </div>
                                            
                    </div>
                </div>
            </div>
        </div>






@stop

