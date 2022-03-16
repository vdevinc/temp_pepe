
<!DOCTYPE html>
<html lang="en">
	<head>
	 <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta name='dmca-site-verification' content='Y1JFTWxMdTN4MnpRcXhUeTMvOUxnZz090' />
	 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	 <title>Pepe Le Chef</title>

	 <!-- Css Files -->
	 <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
	 <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
	 <link href="{{asset('css/flaticon.css')}}" rel="stylesheet">
	 <link href="{{asset('css/slick-slider.css')}}" rel="stylesheet">
	 <link href="{{asset('css/fancybox.css')}}" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
	 <!-- <link href="{{asset('css/style.css')}}" rel="stylesheet"> -->
	 <link rel="icon" href="{{url('images/logo-fav.png')}}" type="image/png">
	 <link href="{{asset('css/color.css')}}" rel="stylesheet">
	 <link href="{{asset('css/responsive.css?v=1')}}" rel="stylesheet">
	
	 <link href="{{mix('/css/common.css')}}" rel="stylesheet">

	 

	 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	 <!--[if lt IE 9]>
		 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	 <![endif]-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140453774-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140453774-1');
</script>



	</head>
	<body>
	<div id="app"> 
	 <!--// Main Wrapper \\-->
	 <div class="hotmeal-main-wrapper">

	<!--// Header \\-->
	<div class="pepe">
     <a href="/" class="logo"><img  src="{{asset('images/logo.png')}}" class="logo1" alt=""></a>
    </div>
	<div class="menu-button" style="box-shadow: 0 10px 6px -6px rgba(0, 0, 0, 0.45);">
    <i class="fa fa-bars"></i>
    </div>

	<div class="nav-wrap vertical" >

	  <ul>
	    <li><a href="/"><span><i class="fa fa-home"></i>Home</span></a></li>
	    <li><a href="/about"><span><i class="fa fa-book" aria-hidden="true"></i>About</span></a></li>
	    <li><a href="/chefs"><span><i class="fa fa-users" aria-hidden="true"></i>Chefs</span></a></li>
	    <li><a href="/dishes"><span><i class="fa fa-cutlery" aria-hidden="true"></i>Dishes</span></a></li>
	    <li ><a href="/contact"><span><i class="fa fa-envelope"></i>Contact</span></a></li>
	    <li class="trans-select lang" style="padding: 0px 10px;"  id="google_translate_element"></li>
	    <li v-if="!this.$appUser" v-cloak><a href="/login"><span><i class="fa fa-sign-in" aria-hidden="true"></i>Login</span></a></li>
	    <li v-if="this.$appUser" v-cloak><a href="/profile"><span><i class="fa fa-user" aria-hidden="true"></i>Profile</span></a></li>
	    <li v-if="this.$appUser" v-cloak><a href="javascript:void(0)" @click="appLogout()"><span><i class="fa fa-sign-out" aria-hidden="true"></i>
		Logout</span></a></li>
		  <li v-if="!this.$appUser" v-cloak><a href="#"><span></span></a></li>
	  </ul>
	</div>

	<!--// Header \\-->
</div>
</body>

</html>
<!-- <div class="navigation">
        <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
        <label for= "navi-toggle" class="navigation__button"></label>
        <div class="navigation__background">&nbsp</div>
        <nav class="navigation__nav">
            <ul class="navigation__list">
                <li class="navigation__item"><a href="#" class="navigation__link"><span>1</span>More</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>2</span>Popular tours</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>3</span>Stories</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>4</span>Know More</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>5</span>Book now</a></li>

            </ul>
        </nav>
    </div> -->
    <!-- ====================== -->
   <!--  <header id="hotmeal-header" class="hotmeal-header-one">
		<div class="hotmeal-main-header">
			<div class="container">
				<div class="row">
					<aside class="col-md-1"> <a href="index.php" class="logo"><img src="{{asset('images/logo.png')}}" class="logo1" alt=""></a> </aside>
					<aside class="col-md-11">
					
						<a href="#menu" class="menu-link active"><span></span></a>
						<nav id="menu" class="menu navbar navbar-default">
							<ul class="level-1 navbar-nav">
								<li class="active"><a href="/">Home</a></li>
								<li><a href="/about">About</a></li>
								<li><a href="/chefs">Chefs</a><span class="has-subnav"><i class="fa fa-angle-down"></i></span>
									
								</li>
								<li><a href="/dishes">Dishes</a><span class="has-subnav"><i class="fa fa-angle-down"></i></span>
									
								</li>
								<li><a href="/contact">Contact</a><span class="has-subnav"><i class="fa fa-angle-down"></i></span></li>
								<li v-if="!this.$appUser" v-cloak><a href="/login" class="login-color">Login </a><span ></i></span></li>
								<li v-if="this.$appUser" v-cloak><a href="/profile" class="">Profile </a><span ></i></span></li>
								<li v-if="this.$appUser" v-cloak><a href="javascript:void(0)" @click="appLogout()" class="login-color" >Logout </a><span ></i></span></li>
								<li class="trans-select" style="line-height: 0px!important;margin-top: 11px!important;" id="google_translate_element"></li>


							

							</ul>
						</nav>
						
						<ul class="hotmeal-user-listt">
							<li><a href="#" class="fa fa-shopping-bag"><span>0</span></a>
								<div class="hotmeal-cart-box"> <p>No products in the cart.</p> </div>
							</li>
							<li>

								<a href="#" class="fa fa-search" data-toggle="modal" data-target="#searchmodal"></a>
							</li>
						</ul>
					</aside>
			 	</div>
			</div>
		</div>
	</header> -->