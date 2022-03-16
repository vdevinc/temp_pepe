@extends('layouts.app')


@section('content')

<!--// SubHeader \\-->
   
<!--// SubHeader \\-->

<!--// Main Content \\-->
<div class="hotmeal-main-section hotmeal-service-providefull" >
        <img src="/extra-images/service-provide-img1.png" alt="" class="img-one">
        <img src="/extra-images/service-provide-img2.png" alt="" class="img-two">
        <div class="container">
            <div class="row">
                    <div class="col-md-12" style="position: inherit;">
                    <div class="hotmeal-reserve-table hotmeal-reservation-wrap bg" style="margin-top: 60px;">
                        <div class="hotmeal-fancy-title">
                            <span class="fm">Pepe le chef</span>
                            <h2>Chefs Registration</h2>
                            <img src="/images/fancy-title-img.png" alt="">
                        </div>
                        <router-view></router-view>
                    
                    </div>						
                
                </div>

            </div>
        </div>
    </div>
    <!--// Main Section \\-->


    <!--// Main Section \\-->

</div>


@stop