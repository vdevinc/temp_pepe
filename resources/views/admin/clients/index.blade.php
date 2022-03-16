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
                        <div class="card">
                            <h5 class="card-header">Cliets Details</h5>
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
                                                <!-- <th>Address</th> -->
                                                <th>Action</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($clients))
                                             @foreach($clients as $client)
                                            <tr>
                                                <td>
                                                <a href="{{url('/admin/clients/'.
                                                    $client->id)}}">
                                                <img class="imgcls" src="{{$client->avatar_url}}"></a></td>
                                                <td>{{$client->full_name}}</td>
                                                <td>{{$client->phone}}</td>
                                                <td>{{$client->email}}</td>
                                                
                                                </td>
                                                 <td><a
                                                  href="{{url('/admin/clients/'.$client->id)}}"><button class="btn  btn-primary" type="submit">view</button></a>
                                                <a
                                                  href="{{url('/admin/deleteClients/'.$client->id)}}"><button class="btn btn-danger" type="submit">Delete</button></a>
                                              </td>
                                                
                                                
                                            </tr>
                                            @endforeach
                                            @endif
                                           
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