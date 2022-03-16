@extends('layouts.app')

@section('content')


<div class="hotmeal-subheader">
        <span class="hotmeal-subheader-transparent"></span>
        <div class="hotmeal-subheader-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span><br></span>
                        <h1>Faq Client</h1>
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
                            <li class="active">Faq Client</li>
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
        <span style="font-size: 40px;" class="fm">Pepe Le Chef</span>
        <h2>FAQ's for Client</h2>
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
                                            <span class="badge">1</span>
                                           Why is it good?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Allows you to have the meal that you desire when you desire all in the comfort of your own kitchen, no hassle.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-2">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                            <span class="badge">2</span>
                                            Why do you want to do it?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Process:<br><br>
- Friday/Saturday night, last minute, Look for chefs<br><br>
- Select a Pepe Le Chef<br><br>
- Get a confirmation of the order<br><br>
- Chef confirms<br><br>
- Chef shows up<br><br>
After the meal is done and served...you do a rating, 1-5 star, 5 being the best!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-3">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                            <span class="badge">3</span>
                                            When does the chef leave?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>- Once you, the client, has taken the first bite, then the chef can leave<br><br>
- You don't have any ingredients? you can select a chef who comes ready with the ingredients at an additional cost set
by chef</p>
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