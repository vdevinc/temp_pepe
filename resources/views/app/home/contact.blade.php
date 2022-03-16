
@extends('layouts.app')


@section('content')

	<!--// SubHeader \\-->
	<!-- <div class="hotmeal-subheader-map"><div id="ap"></div></div> -->
	<div><img src="extra-images/banner-1.jpg"></div>
    <!--// SubHeader \\-->

	<!--// Main Content \\-->
	<div class="hotmeal-main-content hotmeal-contact-padding">

		<!--// Main Section \\-->
		<div class="hotmeal-main-section hotmeal-contact-full">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="hotmeal-contact-us">
							<div class="hotmeal-contact-info">
								<ul>
									<li>
										<!-- <div class="hotmeal-contact-info-wrap">
											<i class="icon hotmeal-telephone"></i>
											<small></small>
											<h5>Call Us At</h5>
											<p>Coming Soon</p>
											
										</div> -->
									</li>
									<li>
										<div class="hotmeal-contact-info-wrap">
											<i class="icon hotmeal-close-envelope"></i>
											<small></small>
											<h5>Mail Us At</h5>
											<a href="support@pepelechef.com">support@pepelechef.com</a>
											
										</div>
									</li>
								</ul>
							</div>
							<div class="hotmeal-contact-form">
								
								<form method="post" class="myform1" action="{{url('contactus')}}">
									 {{ csrf_field() }}
									<ul>
										<li class="full">
											@if (Session::has("success"))
				                          <div class="card">
				                              <h5 class="alert alert-success"> {{ Session::get("success") }}</h5>
				                              </div>
				                        @endif
										</li>
										<li>
											<input value="" name="name" required placeholder="Name" required tabindex="0" type="text">
										</li>
										<li>
											<input placeholder="Phone" required value="" name="phone"  tabindex="0" type="text">
										</li>
										<li>
											<input value="" name="email"  tabindex="0" 
											type="email" placeholder="Email" required>
										</li>
										<li class="full">
											<textarea placeholder="Messege*" name="message" required="true"></textarea>
										</li>
										
										<li class="full">
											<label>
												<button class="btn btn-primary"> Send now </button>
												<small></small>
											</label>
											<!-- <span class="output_message"></span> -->
										
										
										</li>
									</ul>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--// Main Section \\-->

		<!--// Main Section \\-->
		
		<!--// Main Section \\-->

	</div>
	<!--// Main Content \\-->

	@stop