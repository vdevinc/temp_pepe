@extends('layouts.app')

@section('content')

<div class="hotmeal-subheader">
        <span class="hotmeal-subheader-transparent"></span>
        <div class="hotmeal-subheader-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span><br></span>
                        <h1>FAQ</h1>
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
                            <li class="active">FAQ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--// SubHeader \\-->


    <!--// Main Content \\-->
<div class="hotmeal-main-content hotmeal-faq-full ">
    <div class="hotmeal-fancy-title" style="margin-top:145px;">
        <span style="font-size: 40px;" class="fm" >Pepe Le Chef</span>
        <h2>FAQ</h2>
        <img src="images/fancy-title-img.png" alt="">
    </div>
        <!--// Main Section \\-->
         <section class="faq-section" style="margin-top: 70px;">
           <div class="container bor">
               <div class="row">
                    <!-- ***** FAQ Start ***** -->
                   
                    <div class="col-md-12">
                        <div class="faq" id="accordion" style="margin-left: -11px;">
                            <div class="card">
                                <div class="card-header" id="faqHeading-1">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                            <span class="badge">1</span>What is Pepe Le Chef?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Pepe Le Chef is a digital platform where you have a local chef come to your home and cook for you. We promote your talent through the Pepe Le Chef website, app and various other channels.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-2">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                            <span class="badge">2</span>How does it work?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Your hungry, you download the PLC App, you create free client profile, search for dish, select a dish, confirm order, get confirmation from chef, chef shows up, prepares the meal desired, client takes FIRST BITE, chef leaves, you review, chef gets paid, repeat. 
.<br><br>

If you have more questions… you’re not eating. Email <a href="#!">support@pepelechef.com</a> for additional questions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-3">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                            <span class="badge">3</span>Why should I work with Pepe Le Chef?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Are you kidding me?!?!? When you become a Pepe Le Chef you control your schedule. Chef decides when Chef wants to earn. Client is the King or Queen of the kitchen. Enough said.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-4">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-4" data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                            <span class="badge">4</span> How much does it cost?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We collect a service fee, which is calculated as a percentage of your sales, on Pepe Le Chef. 
Have more questions? Email <a href="#!">support@pepelechef.com</a> and a team member will be happy to answer them for you…  Or visit our Terms and Conditions, Privacy Policy for further details.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-5">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-5" data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                            <span class="badge">5</span> How quickly can I start accepting orders?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                                    <div class="card-body">
                                        <p> All Pepe Le Chefs have been vetted through 
                                            <a href="www.intelius.com ">www.intelius.com </a> we do our best to have you up and running,    accepting requests as soon as possible.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-6">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-6" data-aria-expanded="false" data-aria-controls="faqCollapse-6">
                                            <span class="badge">6</span>What kind of marketing do we do?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-6" class="collapse" aria-labelledby="faqHeading-6" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We promote all our services, interactions, client, chef experiences using social posts and emails.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-7">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-7" data-aria-expanded="false" data-aria-controls="faqCollapse-7">
                                            <span class="badge">7</span>What’s the signup process like?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-7" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Once you sign up as a Chef, a member of the Pepe Le Chef team will process your background. Once approved, an email link will be sent for you to get your profile up and running and begin uploading your dishes and accepting orders quickly.</p>
                                    </div>
                                </div>
                            </div>
                             <div class="card">
                                <div class="card-header" id="faqHeading-8">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-8" data-aria-expanded="false" data-aria-controls="faqCollapse-8">
                                            <span class="badge">8</span> Have another question we didn’t answer here?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-8" class="collapse" aria-labelledby="faqHeading-8" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Feel free to shoot us an email at <a href="#!"><a href="#!">support@pepelechef.com</a></a> and  we’ll get back to you as soon as possible.</p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                  </div>
                </div>
                </section>
        <!--// Main Section \\-->

        

    </div>
	

@stop