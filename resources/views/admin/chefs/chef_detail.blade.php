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
                                        <li class="breadcrumb-item"><a href="{{url('/admin/chefs')}}" class="breadcrumb-link">Chefs</a></li>
                                        
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
                            <img  style="width: 242px;" src="{{url('../uploads/user/'.
                            $chefs->id.'/'.$chefs->file_avatar)}}">
                            <br>
                            @if($chefs['chef']['chef_type_id']=='1')

                            <p style="font-size: 15px;color: black;"> Culinary Certificate :</p>
                            <img  style="width: 242px;" src="{{url('../uploads/user/'.
                            $chefs->id.'/'.$chefs['chef']['file_culinary_cert'])}}"><br><br>
                            <a href="{{url('../uploads/user/'.$chefs->id.'/'.$chefs['chef']['file_culinary_cert'])}}" download>
                            <button class="btn btn-block btn-primary dwld" type="submit"><i class="fas fa-download"></i></button></a><br>
                             @endif
                            <p style="font-size: 15px;color: black;"> Govt:Issued ID :</p>
                            <img  style="width: 242px;" src="{{url('../uploads/user/'.
                            $chefs->id.'/'.$chefs['chef']['file_govt_id'])}}"><br><br>
                            
                            <a href="{{url('../uploads/user/'.$chefs->id.'/'.$chefs['chef']['file_govt_id'])}}" download>
                            <button class="btn btn-block btn-primary dwld" type="submit"><i class="fas fa-download"></i></button>
                            </a>
                           
                             <br>
                            <p style="font-size: 15px;color: black;"> Contract  <a href="{{url('../uploads/user/'.
                             $chefs->id.'/'.'agreement.pdf')}}">agreement.pdf</a>

                            </p>
                             <a href="{{url('../uploads/user/'.
                             $chefs->id.'/'.'agreement.pdf')}}" download>
                            <button class="btn btn-block btn-primary dwld" type="submit"><i class="fas fa-download"></i></button> 
                             </a>
                            <p style="font-size: 15px;color: black;"> </p>

                                
                        </div>
                        <div class="col-md-9">
                            <h1>{{$chefs->name}}</h1>
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
                                            <p>Registered As</p>
                                            <p>About</p>
                                            <!-- <p>Govt: Issued ID</p>
                                            <p>Culinary Certificate</p>
                                            <p>Contract</p> -->
                                             @if($chefs['chef']['is_approved']=='0')
                                                  <form method="post" action="{{url('/admin/chefs-approve')}}" 
                                                  name="chefapprove" id="chefapprove">
                                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                                  <input type="hidden" name="email" id="email" value="{{$chefs->email}}">
                                                  <input type="hidden" name="user_id" id="user_id" value="{{$chefs->id}}">
                                                  <input type="hidden" name="agreement" id="agreement" value="{{url('../uploads/user/'.$chefs->id.'/'.'agreement.pdf')}}">
                                                  <button class="btn btn-block btn-success" type="submit" value="approve" id="chefs" name="chefs" >Approve
                                                  </button> 
                                              @endif
                                                  <form method="post" action="{{url('/admin/chefs-reject')}}" 
                                                  name="chefreject" id="chefreject">
                                                  <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                                  <input type="hidden" name="email" id="email" value="{{$chefs->email}}">
                                                  <input type="hidden" name="user_id" id="user_id" value="{{$chefs->id}}">


                                                  <button  id="chefs" class="btn btn-block btn-danger" 
                                                  type="submit"  name="chefs" value="reject">Reject
                                                  </button>
                                             

                                              </form>
                                        </div>
                                        <div class="col-md-6 list1" style="">
                                            <p id="fname">:&nbsp;&nbsp;{{$chefs->first_name}} </p>
                                            <p id="mname">:&nbsp;&nbsp;{{$chefs->middle_name}}</p>
                                            <p id="lname">:&nbsp;&nbsp;{{$chefs->last_name}}</p>
                                            <p id="email">:&nbsp;&nbsp;{{$chefs->email}}</p>
                                            <p id="phone">:&nbsp;&nbsp;{{$chefs->phone}}</p>
                                            <p id="zip">:&nbsp;&nbsp;{{$chefs['address']
                                            [0]['zip']}}</p>
                                            <p id="addr1">:&nbsp;&nbsp;
                                            	{{$chefs['address'][0]['address_line_1']}}</p>
                                            
                                            <p id="addr2">:&nbsp;&nbsp;{{$chefs['address'][0]['address_line_2']}}</p>
                                            <p id="city">:&nbsp;&nbsp;{{$chefs['address'][0]['city']}}</p>
                                            <p id="state">:&nbsp;&nbsp;{{$chefs['address'][0]['state']}}</p>
                                            @if($chefs['chef']['chef_type_id']=='1')
                                            <p id="select1">:&nbsp;&nbsp;Professional Chef</p>
                                            @else
                                            <p id="select1">:&nbsp;&nbsp;Student Chef</p>
                                            @endif
                                            
                                            <p>:&nbsp;&nbsp;{{$chefs->about}}</p>


                                            
                                        </div>

                                    <div class="row">
                                   @if($chefs['chef']['is_approved']=='0')
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

