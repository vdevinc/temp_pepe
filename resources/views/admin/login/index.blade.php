@extends('layouts.admin-noheader')

@section('content')

<form class="text-center border-light p-5" style="width: 460px;
    margin-left: 35%;
    margin-top: 50px;
    border:2px solid #B99563" method="post" action="{{ url('/admin/authenticate') }}">
    {{ csrf_field() }}
 <img src="images/logo.png" style="    width: 60px;
    border-radius: 12px;">
    <p class="h4 mb-4">{{@$msg}}</p>
<input type="email" id="email" name="email" required="true"  class="form-control mb-4" placeholder="Email">
<input type="password" id="password" name="password" required="true" class="form-control mb-4" placeholder="Password">
<button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
</form>

@stop