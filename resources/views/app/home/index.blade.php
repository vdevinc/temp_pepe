@extends('layouts.app')


@section('content')

	<!--// Main Banner \\-->
	<div class="hotmeal-banner" >

		<!--// Slider \\-->
		<div class="hotmeal-banner-layer" id="signup">
			<img src="{{asset('images/banner-1.jpg')}}" alt="">
			<span class="hotmeal-banner-transparent"></span>
			<div class="hotmeal-banner-caption">
				<div class="container">
					<div class="row">
						
							<div class="hotmeal-banner-text">
								<div class="col-md-5"><h1 class="fm"> Apps Download </h1></div>
								<!-- <div class="col-md-6">
								<div id="clockdiv" style="margin-left:100px;">
								  <div>
								    <span class="days"></span>
								    <div class="smalltext">Days</div>
								  </div>
								  <div>
								    <span class="hours"></span>
								    <div class="smalltext">Hours</div>
								  </div>
								  <div>
								    <span class="minutes"></span>
								    <div class="smalltext">Minutes</div>
								  </div>
								  <div>
								    <span class="seconds"></span>
								    <div class="smalltext">Seconds</div>
								  </div>
								</div>
							</div> -->
							<div class="col-md-8">
								<h2 >STAY HUNGRY</h2>
<!-- 								<h3>Adding Finishing Touches</h3>

 -->								
 								<p><br>From Chef to Table at the Swipe of Your Fingertip, Have a local Chef come to your home or Yacht and cook for you - with an app</p>
								<a href="/client/register" class="home-btn">Client SignUp<span></span></a>
								<a href="/chef/register" class="home-btn">Chef SignUp<span></span></a>
							</div>
							</div>
						
						
					</div>
				</div>
			</div>
		</div>
		<div class="hotmeal-banner-layer">
			<img src="{{asset('images/banner-2.jpg')}}" alt="">
			<span class="hotmeal-banner-transparent"></span>
			<div class="hotmeal-banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-6">
							<div class="hotmeal-banner-text">
								<h1 class="fm">Welcome</h1>
																
								<h2>STAY HUNGRY</h2>
<!-- 								<h3>Adding Finishing Touches</h3>
 -->								<p><br>Pepe Le Chef was created on Ocean Boulevard with one vision in mind…world class food, with the ease of a swipe, in the comfort of your own kitchen with no hassle.</p>
								<a href="/client/register" class="home-btn">Client SignUp<span></span></a>
								<a href="/chef/register" class="home-btn">Chef SignUp<span></span></a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!--// Slider \\-->
		 
	</div>
	<!--// Main Banner \\-->

	<!--// Main Content \\-->
	<div class="hotmeal-main-content">

	
		<!--// Main Section \\-->

		<!--// Main Section \\-->
		<div class="hotmeal-main-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="hotmeal-fancy-title">
							<span class="fm">Pepe le Chef Feature</span>
							<h2>Our Services Feature</h2>
							<img src="images/fancy-title-img.png" alt="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="hotmeal-service-grid-thumb chefi"></div>
					</div>
					<div class="col-md-8">
						<div class="hotmeal-service hotmeal-service-grid">
							<ul class="row">
								<li class="col-md-6">
									<div class="hotmeal-service-grid-text">
										<i class=" fa fa-map-marker"></i>
										<h5><a href="404.php">find nearest chef</a></h5>
										
                                   
                                        <form action="/chefs" method="get" class="">
                                          
                                            <div class="form-group" >
                                                <div class="input-group">
                                                    <input style="margin-left: 60px;text-align: center;" type="text" name="zip" placeholder="Enter your ZIP code">
                                                </div>
                                            </div>
                                          
                                            <div class="form-actions form-group" >
                                               <button style="color: #000;" class="go-btn">Go</button>
                                            </div>
                                        </form>

										<span class="btn-shape"></span>
									</div>
								</li>
								<li class="col-md-6">
									<div class="hotmeal-service-grid-text">
										<i class="fa fa-search"></i>
										<h5><a href="404.php">Search a Cuisine</a></h5>
										 <form action="/dishes" method="get" class="">
                                
                                            <div class="form-group" >
                                                <div class="input-group">
                                                    <input style="margin-left: 60px;text-align: center;" type="text" name="zip" placeholder="Enter your ZIP code">
                                                </div>
                                            </div>
                                          
                                            <div class="form-actions form-group" >
                                               <button style="color: #000;" class="go-btn">Go</button>
                                            </div>
                                        </form>



										<span class="btn-shape"></span>
									</div>
								</li>
								<li class="col-md-6">
									<div class="hotmeal-service-grid-text">
										<i class="icon hotmeal-cutlery-1"></i>
										<h5><a href="404.php">TOP RATED CHEF'S</a></h5>
										<p style="min-height: 110px;"><!-- Coming Soon --></p>
										<span class="btn-shape"></span>
									</div>
								</li>
								<li class="col-md-6">
									<div class="hotmeal-service-grid-text">
										<i class="fa fa-ship"></i>
										<h5><a href="404.php">Yacht Service</a></h5>
										<p style="min-height: 110px;"><!-- Coming Soon --></p>
										

										<span class="btn-shape"></span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--// Main Section \\-->

		<!--// Main Section \\-->
		<div class="hotmeal-main-section hotmeal-menu-listfull">
			<span class="menu-list-transperant"></span>
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="hotmeal-fancy-title">
							<span class="fm">Awesome Chef</span>
							<h2 style="color: white;">Our Passionate Team</h2>
							<img src="images/fancy-title-img.png" alt="">
						</div>
						<div class="hotmeal-team hotmeal-team-grid">
							<ul class="row">
								<li class="col-md-3">
									<div class="hotmeal-team-grid-wrap">
										<figure><a href="#"><!-- <img src="extra-images/team-modern-img1.jpg" alt=""> --></a>
											
										</figure>
										<div class="hotmeal-team-grid-text">
											<h5><a href="#"></a></h5>
											<span class="fm">Pepe Le Chef</span>
										</div>
									</div>
								</li>
								<li class="col-md-3">
									<div class="hotmeal-team-grid-wrap">
										<figure><a href="#"></a>
											
										</figure>
										<div class="hotmeal-team-grid-text">
											<h5><a href="#"></a></h5>
											<span class="fm">Pepe Le Chef</span>
										</div>
									</div>
								</li>
								<li class="col-md-3">
									<div class="hotmeal-team-grid-wrap">
										<figure><a href="#"></a>
											
										</figure>
										<div class="hotmeal-team-grid-text">
											<h5><a href="#"></a></h5>
											<span class="fm">Pepe Le Chef</span>
										</div>
									</div>
								</li>
								<li class="col-md-3">
									<div class="hotmeal-team-grid-wrap">
										<figure><a href="#"></a>
											
										</figure>
										<div class="hotmeal-team-grid-text">
											<h5><a href="#"></a></h5>
											<span class="fm">Pepe Le Chef</span>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>

				</div>
            </div>
            


        </div>
        
<!-- <div class="hotmeal-main-section hotmeal-testimonialfull">
			<span class="testimonial-transparent"></span>
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="hotmeal-testimonial-wrap">
							<div class="hotmeal-testimonial slick-initialized slick-slider slick-dotted" role="toolbar"><span class="slick-arrow-left slick-arrow" style=""><i class="icon hotmeal-arrows32"></i></span>
								<div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 4750px; transform: translate3d(-1900px, 0px, 0px); transition: transform 500ms ease 0s;" role="listbox"><div class="hotmeal-testimonial-layer slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 950px;">
									<figure><img src="extra-images/testimonial-img-2.jpg" alt=""></figure>
									<div class="hotmeal-testimonial-text">
										<i class="icon hotmeal-quote"></i>
										<h2>Said About Us</h2>
										<p>Lnisl malesuada suscipit. Sed aliquet diam sed mauris dictum rutrum. Etiam facilisis sit. Lorem ipsum dolor sit amet, consectetur adipiscing elit liq uam ac egestas velit. Curabitur pellentesque nisl eu.</p>
										<div class="hotmeal-info">
											<h5><a href="404.html" tabindex="-1">Doe Sarena</a></h5>
											<span>Graphic Design</span>
										</div>
									</div>
								</div><div class="hotmeal-testimonial-layer slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 950px;">
									<figure><img src="extra-images/testimonial-img-1.jpg" alt=""></figure>
									<div class="hotmeal-testimonial-text">
										<i class="icon hotmeal-quote"></i>
										<h2>Said About Us</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit liq uam ac egestas velit. Curabitur pellentesque nisl eu nisl malesuada suscipit. Sed aliquet diam sed mauris dictum rutrum. Etiam facilisis sit.</p>
										<div class="hotmeal-info">
											<h5><a href="404.html" tabindex="0">Sarena Doe</a></h5>
											<span>Graphic Design</span>
										</div>
									</div>
								</div><div class="hotmeal-testimonial-layer slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide11" style="width: 950px;">
									<figure><img src="extra-images/testimonial-img-2.jpg" alt=""></figure>
									<div class="hotmeal-testimonial-text">
										<i class="icon hotmeal-quote"></i>
										<h2>Said About Us</h2>
										<p>Lnisl malesuada suscipit. Sed aliquet diam sed mauris dictum rutrum. Etiam facilisis sit. Lorem ipsum dolor sit amet, consectetur adipiscing elit liq uam ac egestas velit. Curabitur pellentesque nisl eu.</p>
										<div class="hotmeal-info">
											<h5><a href="404.html" tabindex="-1">Doe Sarena</a></h5>
											<span>Graphic Design</span>
										</div>
									</div>
								</div><div class="hotmeal-testimonial-layer slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide12" style="width: 950px;">
									<figure><img src="extra-images/testimonial-img-2.jpg" alt=""></figure>
									<div class="hotmeal-testimonial-text">
										<i class="icon hotmeal-quote"></i>
										<h2>Said About Us</h2>
										<p>Lnisl malesuada suscipit. Sed aliquet diam sed mauris dictum rutrum. Etiam facilisis sit. Lorem ipsum dolor sit amet, consectetur adipiscing elit liq uam ac egestas velit. Curabitur pellentesque nisl eu.</p>
										<div class="hotmeal-info">
											<h5><a href="404.html" tabindex="-1">Doe Sarena</a></h5>
											<span>Graphic Design</span>
										</div>
									</div>
								</div><div class="hotmeal-testimonial-layer slick-slide slick-cloned" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 950px;">
									<figure><img src="extra-images/testimonial-img-1.jpg" alt=""></figure>
									<div class="hotmeal-testimonial-text">
										<i class="icon hotmeal-quote"></i>
										<h2>Said About Us</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit liq uam ac egestas velit. Curabitur pellentesque nisl eu nisl malesuada suscipit. Sed aliquet diam sed mauris dictum rutrum. Etiam facilisis sit.</p>
										<div class="hotmeal-info">
											<h5><a href="404.html" tabindex="-1">Sarena Doe</a></h5>
											<span>Graphic Design</span>
										</div>
									</div>
								</div></div></div>
								
								
							<span class="slick-arrow-right slick-arrow" style=""><i class="icon hotmeal-arrows32"></i></span><ul class="slick-dots" style="" role="tablist"><li class="" aria-hidden="true" role="presentation" aria-selected="true" aria-controls="navigation10" id="slick-slide10"><button type="button" data-role="none" role="button" tabindex="0">1</button></li><li aria-hidden="false" role="presentation" aria-selected="false" aria-controls="navigation11" id="slick-slide11" class="slick-active"><button type="button" data-role="none" role="button" tabindex="0">2</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation12" id="slick-slide12" class=""><button type="button" data-role="none" role="button" tabindex="0">3</button></li></ul></div>
						</div>
					</div>

				</div>
			</div>
		</div> -->
        
        <!--// Main Section \\-->
		<div class="hotmeal-main-section hotmeal-partnerfull"style="margin-top: 150px;">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="hotmeal-fancy-title">
							<span class="fm">Pepe le Chef</span>
							<h2>Meet Our Partners</h2>
							<img src="images/fancy-title-img.png" alt="">
						</div>
						<div class="hotmeal-partner">
							<ul>
								<li><a href="#"><img src="extra-images/partner-img1.jpg" alt=""></a></li>
								<li><a href="#"><img src="extra-images/partner-img2.jpg" alt=""></a></li>
								<li><a href="#"><img src="extra-images/partner-img3.jpg" alt=""></a></li>
								<li><a href="#"><img src="extra-images/partner-img4.jpg" alt=""></a></li>
								<li><a href="#"><img src="extra-images/partner-img3.jpg" alt=""></a></li>
								<li><a href="#"><img src="extra-images/partner-img4.jpg" alt=""></a></li>
								<li><a href="#"><img src="extra-images/partner-img1.jpg" alt=""></a></li>
								<li><a href="#"><img src="extra-images/partner-img2.jpg" alt=""></a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--// Main Section \\-->
</div>
@stop