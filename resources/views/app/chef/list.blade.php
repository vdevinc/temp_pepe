@extends('layouts.app')


@section('content')

<div class="hotmeal-subheader">
        <span class="hotmeal-subheader-transparent"></span>
        <div class="hotmeal-subheader-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span><br></span>
                        <h1>Chef's List</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="hotmeal-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                             <li><a href="/">Homepage</a></li>
                            <li class="active">Chef's</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--// SubHeader \\-->

<!--// Main Content \\-->
<div class="hotmeal-main-content">

    <!--// Main Section \\-->
    <div class="hotmeal-main-section">
        <div class="container" v-cloak>
            <router-view></router-view>
        </div>
    </div>
    <!--// Main Section \\-->

</div>
<!--// Main Content \\-->




@stop