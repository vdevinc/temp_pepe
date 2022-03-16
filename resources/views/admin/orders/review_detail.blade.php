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
                            <h2 class="pageheader-title">Orders reviews</h2>
                           
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

                            @if($orders['rating']['0']['is_approved']=='0' && $orders['rating']['0']['is_rejected']=='0')
                            <form method="post" action="{{url('/admin/review_status')}}" 
                                  name="reviewstatus" id="reviewstatus">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$orders['user']['email']}}">
                                  <input type="hidden" name="order_id" id="order_id" value="{{$orders->id}}">
                                   <button class="btn btn-block btn-success" type="submit"  
                                   value="accept" id ="review_status" name="review_status">Approve
                                 </button>
                                 <button class="btn btn-block btn-danger" type="submit" 
                                  id ="review_status" name="review_status" value="reject">Reject
                                 </button>
                                
                               </form>
                            @endif
                             @if($orders['rating']['0']['is_rejected']=='1')     
                              <form method="post" action="{{url('/admin/review_status')}}" 
                                  name="reviewstatus" id="reviewstatus">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$orders['user']['email']}}">
                                  <input type="hidden" name="order_id" id="order_id" value="{{$orders->id}}">
                                   <button class="btn btn-block btn-success" type="submit"  
                                   id ="review_status" name="review_status" value="accept">Approve
                                 </button>
                                </form>
                            @endif
                            @if($orders['rating']['0']['is_approved']=='1' && $orders['rating']['0']['is_rejected']=='0')  
                              <form method="post" action="{{url('/admin/review_status')}}" 
                                  name="reviewstatus" id="reviewstatus">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$orders['user']['email']}}">
                                  <input type="hidden" name="order_id" id="order_id" value="{{$orders->id}}">
                                   <button class="btn btn-block btn-danger" type="submit"  
                                   id ="review_status" name="review_status" value="reject">Reject
                                 </button>
                                </form>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <h1>{{$orders->name}}</h1>
                               <div class="row">
                                <div class="col-md-3 list">
                                          <p>Client Name</p>
                                           <p>Order Date</p>
                                           <p>Chef Review</p>
                                           <p>Dish Review</p>
                                            
                                            
                                         </div>
                                        <div class="col-md-6 list1" style="">
                                            <p id="fname">:&nbsp;&nbsp;{{$orders['user']['full_name']}} </p>
                                           <p id="email">:&nbsp;&nbsp;{{ date('d-m-Y', strtotime($orders->created_at))}}</p>
                                            
                                            <p id="zip">:&nbsp;&nbsp;{{$orders['rating']['0']['chef_review']}}</p>
                                             <p id="zip">:&nbsp;&nbsp;{{$orders['rating']['0']['dish_review']}}</p>
                                        </div>
                                    <div class="row">
                                   @if($orders['rating']['0']['is_approved']=='0')
                                  <img src="{{url('/admin/images/pending.png')}}" class="approve">
                                   @else  
                                  <img src="{{url('/admin/images/approved.png')}}" class="approve">
                                  @endif
                                   </div>
                              </div>         
                        </div>

                    </div>
                                            
                    </div>
                </div>
            </div>
        </div>






@stop

