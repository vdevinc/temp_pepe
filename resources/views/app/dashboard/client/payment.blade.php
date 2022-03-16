@extends('layouts.app')


@section('content')

	<!--// SubHeader \\-->
	<div class="hotmeal-subheader" style="height: 100px;">
		<span class="hotmeal-subheader-transparent"></span>
		<div class="hotmeal-subheader-text">
	        
        </div>
        
    </div>
    <!--// SubHeader \\-->

	<!--// Main Content \\-->
	<div class="hotmeal-main-content">

		<!--// Main Section \\-->
		<div class="hotmeal-main-section" style="width: 97%;">
			<div class="container" >
				<div class="row">
                     <router-view></router-view>
				</div>
			</div>
		</div>
		<!--// Main Section \\-->

	</div>
	<!--// Main Content \\-->


@stop