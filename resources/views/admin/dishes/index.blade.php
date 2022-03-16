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
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @if (Session::has("success"))
                          <div class="card">
                              <h5 class="card-header"> {{ Session::get("success") }}</h5>
                              </div>
                            @endif
                            <br/>
                        <div class="card">
                            <h5 class="card-header">Dishes added by Chef's</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th> Dish Name</th>
                                                <th>Chef Name</th>
                                                <th>Booking Type</th>
                                                <th>Food Cost</th>
                                                <th>Rating</th>
                                                <th>About Dish</th>
                                                <th>Status</th>    
                                            </tr>
                                        </thead>
                                        <tbody>

                                             @foreach($dishes as $key =>$dish)
                                            <tr>
                                                <td><a href="{{url('/admin/dishes/'.
                                                    $dish->id)}}">
                                                    <img class="imgcls" src="{{url('../uploads/dish/'.$dish->id.'/'.$dish->file_picture)}}">
                                                </a></td>
                                                <td><a href="#!">{{$dish->name}}</a> </td>
                                                <td>{{$dish['user']['full_name']}}</td>
                                                <td>{{$dish['service_type']['name']}}</td>
                                                
                                                <td>$ {{$dish->cost}}.00</td>
                                                                
                                                <td>
                                                    <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:0%"></div>
                                                    </div>
                                                </td>
                                               
                                                <td> <a href="{{url('/admin/dishes/'.$dish->id)}}"><button class="btn btn-block btn-primary" type="submit">view</button></a></td>
                                                @if($dish->is_approved==0)

                                                <td class="dish-td"> <button  class="btn btn-block btn-danger" type="submit" style="width: 50%;">Pending</button>
                                                <a href="{{url('/admin/dishdelete/'.$dish->id)}}"><button class="btn  btn-danger" type="submit" style="margin-left: 3px;">Delete</button></a>
                                           
                                                </td>
                                                @else
                                                 <td class="dish-td"> <button class="btn btn-block btn-success" type="submit" style="width: 50%;"><p>Approved</p></button>
                                                    <a href="{{url('/admin/dishdelete/'.$dish->id)}}"><button class="btn  btn-danger" type="submit" style="margin-left: 3px;">Delete</button></a>  
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                           
                                            

                                            

                                           
                                        </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
               </div>

@stop