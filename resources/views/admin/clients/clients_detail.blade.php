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
                            <h2 class="pageheader-title">Clients</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{url('/admin/clients')}}" class="breadcrumb-link">Clients</a></li>
                                        
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
                        <div class="col-md-3">
                            <img  class="imgclsdetail" src="{{$clients->avatar_url}}">
                           
                            <p style="font-size: 15px;color: black;"> </p>

                                
                        </div>
                        <div class="col-md-9">
                            <h1>{{$clients->full_name}}</h1>
                               <div class="row">
                                  <div class="col-md-3 list">
                                            <p>First Name</p>
                                            <p>Middle Name</p>
                                            <p>Last Name</p>
                                            <p>Email</p>
                                            <p>Phone</p>
                                            <p>Zip Code</p>
                                            <p>Street Address1</p>
                                            <p>Street Address2</p>
                                            <p>City</p>
                                            <p>State</p>
                                           <p>About</p>
                                            
                                            
                                        </div>
                                        <div class="col-md-6 list1" style="">
                                            <p id="fname">:&nbsp;&nbsp;{{$clients->first_name}} 
                                            </p>
                                            <p id="mname">:&nbsp;&nbsp;{{$clients->middle_name}}
                                            </p>
                                            <p id="lname">:&nbsp;&nbsp;{{$clients->last_name}}</p>
                                            <p id="email">:&nbsp;&nbsp;{{$clients->email}}</p>
                                            <p id="phone">:&nbsp;&nbsp;{{$clients->phone}}</p>
                                            <p id="zip">:&nbsp;&nbsp;{{$clients['address']
                                            [0]['zip']}}</p>
                                            <p id="addr1">:&nbsp;&nbsp;
                                              {{$clients['address'][0]['address_line_1']}}</p>
                                            
                                            <p id="addr2">:&nbsp;&nbsp;{{$clients['address'][0]['address_line_2']}}</p>
                                            <p id="city">:&nbsp;&nbsp;{{$clients['address'][0]['city']}}</p>
                                            <p id="state">:&nbsp;&nbsp;{{$clients['address'][0]['state']}}</p>
                                           
                                            <p>:&nbsp;&nbsp;{{$clients->about}}</p>


                                            
                                        </div>

                                    <div class="row">
                                  
                                   </div>
                              </div>         
                        </div>

                    </div>
                                            
                    </div>
                </div>
            </div>
        </div>






@stop

