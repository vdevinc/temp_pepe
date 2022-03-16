@extends('layouts.app')

@section('content')

<div class="hotmeal-subheader">
        <span class="hotmeal-subheader-transparent"></span>
        <div class="hotmeal-subheader-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span><br></span>
                        <h1>Faq Chef</h1>
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
                            <li class="active">Faq Chef</li>
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
        <h2>FAQ's for Chef</h2>
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
                                            <span class="badge">1</span>Why ?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>
                                          - Supplement your income<br><br>
                                          - Showcase your talent<br><br>
                                          - If you are a student Chef, it's a great way to build a client base</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-2">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                            <span class="badge">2</span>What are they doing exactly ? 
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>- You get a request in an app to come cook somewhere<br><br>
                       - If you accept, your mission will be:<br><br> - maybe bring some tools<br><br>
                        - maybe bring some ingredients<br><br>
                         - show up at a house or apartment or yacht<br><br>
                          - cook!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-3">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                            <span class="badge">3</span>How to do it ?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Your hungry, you download the PLC App, you create free chef profile, you get vetted then approved (wishful), upload dish(s), get dish requests from clients, confirm order(s), you show up, prepare the meal desired, client takes FIRST BITE, you leave, you review client, you get paid, repeat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-4">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-4" data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                            <span class="badge">4</span>  What kind of clients to expect ?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                                    <div class="card-body">
                                        <p> Depends on where you are -Price point varies, however the basic single meal starts at $75 and above</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-5">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-5" data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                            <span class="badge">5</span>  Alcohol ? 
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                                    <div class="card-body">
                                        <p> No. You the chef can pair (make suggestions) but not provide</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-6">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-6" data-aria-expanded="false" data-aria-controls="faqCollapse-6">
                                            <span class="badge">6</span>Important Instructions :
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-6" class="collapse" aria-labelledby="faqHeading-6" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>After you are fully registered, and your dish(s) are populated a team member will review the profile and dish(s) and approve the images, content, food cost and customer price. Once you are approved, it's SHOWTIME for your client(s).<br><br>

 Rendering of Chef Services:  Every Chef must take the necessary ingredients if selected, spices, sauces and any other ingredient to make your gourmet meal. The customer only provides the kitchen and cookware, if only a chef w/ingredients is selected. The Chef can but is not required to bring cookware. When rendering Just a Chef Services, the Customer provides the ingredients, cook ware and utensils. The Chef should always come armed with their special sauce and secret spices, even for Just a Chef Services. Gratuities are welcome. They cannot be added to the credit card charge for the dish(s). Gratuities should be in cash directly to the Chef at the time services are completed. We will endeavor to make the Customer aware of gratuities. <br><br>
Since Chefs  can get selected to provide the ingredients, Chefs can create daily specials that require advance ordering of ingredients to feature a particular dish to capitalize on bulk purchasing or a particular holiday. (i.e. Independence Day, ribs,  mashed potatoes, wings, and baked beans will be in demand) Think ahead and be prepared.</p>
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