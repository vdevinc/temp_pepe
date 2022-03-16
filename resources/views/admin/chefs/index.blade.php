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
                            <h2 class="pageheader-title">Chefs</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Chefs</a></li>
                                        
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
                        
                           
                          @if(Session::has('flash_message_error'))

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                    @endif

                    @if(Session::has('flash_message_success'))

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                    @endif
                            <br/>
                        
                        <div class="card">
                            <h5 class="card-header">Chefs Details</h5>
                          
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <!-- <th>Zip Code</th> -->
                                               <th>Rating</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @if(count($chefs))
                                             @foreach($chefs as $chef)
                                            <tr>
                                                <td><a href="{{url('/admin/chefs/'.
                                                    $chef->id)}}">
                                                    <img class="imgcls" src="{{url('../uploads/user/'.$chef->id.'/'.$chef->file_avatar)}}"></a></td>
                                                <td><a href="#!">{{$chef->full_name}}</a> </td>
                                                <td>{{$chef->phone}}</td>
                                                <td>{{$chef->email}}</td>
                                                
                                                                
                                                <td>
                                                   <div class="ratings">
                                                      <div class="empty-stars"></div>
                                                      <div class="full-stars" style="width:0%"></div>
                                                    </div>
                                                </td>
                                               
                                                
                                                @if($chef['chef']['is_approved']==0)

                                                <td> <button class="btn btn-block btn-danger" type="submit">Pending</button></td>
                                                @else
                                                 <td> <button class="btn btn-block btn-success" type="submit">Approved</button></td>
                                                @endif
                                                <td style="width: 163px!important;"> <a href="{{url('/admin/chefs/'.$chef->id)}}"><button class="btn  btn-primary" type="submit">view</button></a>
                                                 <a href="{{url('/admin/chefdelete/'.$chef->id)}}"><button class="btn  btn-danger" type="submit">Delete</button></a>  
                                                </td>
                                            </tr>
                                            @endforeach
                                          @endif
                                           

                                           
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop