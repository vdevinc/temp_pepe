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
                            <h2 class="pageheader-title">Dishes</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item">
                                            <a href="{{url('/admin/dishes')}}" class="breadcrumb-link">Dishes </a></li>
                                        
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
                            $dishes->id.'/'.$dishes->file_picture)}}">
                             <br>
                            <br>
                           <br>
                            <br>
                            
                             @if($dishes->is_approved=='0')
                             <form method="post" action="{{url('/admin/dish-approve')}}" 
                                  name="dishapprove" id="dishapprove">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$dishes['user']['email']}}">
                                  <input type="hidden" name="dish_id" id="dish_id" value="{{$dishes->id}}">
                                
                                <button class="btn btn-block btn-success" type="submit" value="approve" id ="dishes"  >Approve
                                </button> 
                              </form>
                              <form method="post" action="{{url('/admin/dish-reject')}}" 
                                  name="chefreject" id="chefreject">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$dishes['user']['email']}}">
                                  <input type="hidden" name="dish_id" id="dish_id" value="{{$dishes->id}}">
                                 <button class="btn btn-block btn-danger" type="submit"  id ="dishes_reject" value="reject">Reject
                                 </button>
                               </form>
                               @else
                                 <form method="post" action="{{url('/admin/dish-reject')}}" 
                                  name="chefreject" id="chefreject">
                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="email" id="email" value="{{$dishes['user']['email']}}">
                                  <input type="hidden" name="dish_id" id="dish_id" value="{{$dishes->id}}">
                                 <button class="btn btn-block btn-danger" type="submit"  id ="dishes_reject" value="reject">Reject
                                 </button>
                               </form>
                              @endif
                                 
                           
                        </div>
                        <div class="col-md-9">
                            <h1>{{$dishes->name}}</h1>
                               <div class="row">
                                
                                        
                                  <div class="col-md-3 list">
                                            <p>Chef Name</p>
                                            <p>Type of Cuisine</p>
                                            <p>Booking Type</p>
                                            <p>Hours needed for 
                                            preparing this</p>
                                            <p>Ingredients</p>
                                            <p>Ingredients Cost</p>
                                            
                                            <p>Story of Dish</p>
                                            <!-- <!-- <p>State</p>
                                            <p>Registered As</p>
                                            <p>About</p> --> 
                                            
                                        </div>
                                        <div class="col-md-6 list1" style="">
                                            <p id="fname">:&nbsp;&nbsp;{{$dishes['user']['full_name']}} </p>
                                            <p id="mname">:&nbsp;&nbsp;{{$dishes->cuisine_type}}
                                            </p>
                                            <p id="lname">:&nbsp;&nbsp;{{$dishes['service_type']['name']}}</p>
                                            <!-- <p id="email">:&nbsp;&nbsp;{{$dishes->hours}}</p> -->
                                            <p id="email">:&nbsp;&nbsp;
                                            {{ number_format($dishes->hours / 60, 2) }}&nbsp;hrs
                                          </p>
                                            <p id="phone" style="padding-top: 20px;">:&nbsp;&nbsp;{{$dishes->ingredients}}
                                            </p>
                                            <p id="zip">:&nbsp;&nbsp;$ {{$dishes->cost}}.00</p>
                                            <p>:&nbsp;&nbsp;{{$dishes->story}}</p>
                                            
                                        </div>
                                    <div class="row">
                                   @if($dishes->is_approved=='0')
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

