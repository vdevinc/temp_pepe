<template>

    	<div class="row">

					<div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                 <!--// Widget Search \\-->
                                <div class="widget widget_search">
                                    <form method="get" action="/dishes">
                                        <input placeholder="Search Now" name="name" tabindex="0" type="text">
                                        <label><input type="submit" value=""></label>
                                    </form>
                                </div>
                                <!--// Widget Search \\-->
                            </div>
                            <div class="col-md-4">
        						<div class="hotmeal-shop-filter">
                                    <!-- <span>Showing 1-6 of 30 Results</span> -->
                                    <!-- Nav tabs -->
                                    <ul class="nav-tabs" role="tablist">
                                      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="icon hotmeal-signs22"></i> <span>List</span></a></li>
                                      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="icon hotmeal-squares2"></i> <span>Grid</span></a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                   
                                </div>
                             </div>    
                        </div>
						<div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="hotmeal-shop hotmeal-shop-list">
									<ul class="row">
                                         <!--// No dishes found  \\-->
                                        <li class="col-md-12" v-if="dishes.length == 0" v-cloak>
                                            <div class="hotmeal-error-text">
                                                <h3>Sorry ! No Dishes Found</h3>
                                                <p>No dishes found based on your Zip Code search.</p>
                                                <a href="/" class="hotmeal-error-btn">
                                                Back To Homepage <small></small>
                                                <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                            <div class="hotmeal-error-thumb">
                                            <img src="extra-images/error-thumb.png" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                                 
                                        </li>
                                         <!--// No dishes found  \\-->
										<li class="col-md-12" v-for="dish in dishes" :key="dish.id">
										<div class="row">
                                           <div class="col-md-3" style="padding-right:0px!important;" >
                                               <figure><a :href="'/dish/'+dish.id">
                                               <img :src="dish.picture_url?dish.picture_medium_url:'extra-images/shop-list-img1.jpg'" alt="" style="height:250px;"><span class="hover-btn"><i class="icon hotmeal-link"></i><small></small></span></a></figure>
                                           </div>
                                            <div class="col-md-9" style="    background-color: #f9f9f9;min-height: 250px;margin-left: -10px;">
                                                <!-- <div class="hotmeal-shop-list-text" style="padding: 0px 15px;">
                                                <h2><a :href="'/dish/'+dish.id">{{dish.name}}</a></h2>
                                                <div class="star-rating"><span class="star-rating-box" :style="{width: (dish.rating * 100)/5 +'%'}"></span></div>
                                                <br>
                                                <div style="position: absolute;">Booking Type:<p>{{dish.dish_service_type_id}}</p></div>
                                                <br>
                                                <span>$ {{dish.price.toFixed(2)}} </span>     
                                                <span class="">
                                                <div class="card" style="float: right;margin-top: -112px;">
                                                <div class="card-body">
                                                <div class="mx-auto d-block">
                                                <a :href="'/chef/'+dish.chef.id">
                                                <img style="width: 80px;border-radius: 50%;height: 75px;" class="rounded-circle mx-auto d-block" :src="dish.chef.avatar" alt="Card image cap">
                                                </a>
                                                </div>
                                                 <div class="star-rating"><span class="star-rating-box" :style="{width: (dish.chef.rating * 300)/5 +'%'}"></span></div>
                                                <div style="font-size:18px;text-transform:capitalize;clear:both;">{{dish.chef.full_name}}</div>
                                                </div>
                                                </div>
                                                </span>
                                                <p style="margin-top: -19px;min-height:71px;">{{dish.story}} </p><br>
                                                <a :href="'/dish/'+dish.id" class="hotmeal-learn-btn">Order Now <span class="btn-shape"></span></a>
                                               </div> -->
                                                 <div class="row">
                                                   <div class="col-md-6 ">
                                                       <h3><a :href="'/dish/'+dish.id">{{dish.name}}</a></h3>
                                                       <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" :style="{width: (dish.rating ) +'%'}"></div>
                                            </div>
                                                     <p style="">Booking Type:&nbsp;<span><b>{{dish.dish_service_type_id}}</b></span></p>
                                                     <span class="price-co">$ {{dish.price.toFixed(2)}} </span>  

                                                   </div> 
                                                    <div class="col-md-6 col" style="padding-top: 9px;">
                                                   <center>
                                                    <a :href="'/chef/'+dish.chef.id">
                                                    <img style="width: 80px;border-radius: 50%;height: 75px;" class="rounded-circle mx-auto d-block" :src="dish.chef.avatar" alt="Card image cap">
                                                    </a>   
                                                <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" :style="{width: (dish.chef.rating * 100)/5 +'%'}"></div>
                                            </div>

                                                    <span class="che-name">{{dish.chef.full_name}}</span>
                                                   </center>
                                                   </div>  
                                                 </div>   
                                                 <div class="col-md-12 p0">
                                                   <p style="">{{dish.story}} </p>
                                                 </div>
                                                 <div class="col-md-12" style="padding-bottom: 7px;padding-left: 0px;">
                                                    <a :href="'/dish/'+dish.id" class="ordernw">Order Now </a>
                                                 </div>
                                            </div>     
                                        </div>
										
										</li>
									</ul>
								</div>
								<!--// Pagination \\-->
		                        <!-- <div class="hotmeal-pagination">
		                          <ul class="page-numbers">
		                             <li><a class="previous page-numbers" href="#!"><span aria-label="Next"><i class="fa fa-angle-left"></i></span> <small class="btn-shape"></small></a></li>
		                             <li><span class="page-numbers current">01 <small class="btn-shape"></small></span></li>
		                             <li><a class="page-numbers" href="#!">02 <small class="btn-shape"></small></a></li>
		                             <li><a class="page-numbers" href="#!">03 <small class="btn-shape"></small></a></li>
		                             <li><a class="page-numbers" href="#!">04 <small class="btn-shape"></small></a></li>
		                             <li><a class="next page-numbers" href="#!"><span aria-label="Next"><i class="fa fa-angle-right"></i></span> <small class="btn-shape"></small></a></li>
		                          </ul>
		                        </div> -->
		                        <!--// Pagination \\-->
                            </div>

                            <div role="tabpanel" class="tab-pane" id="profile">
                            	<div class="hotmeal-shop hotmeal-shop-grid">
									<ul class="row">
										<li class="col-md-4" v-for="dish in dishes" :key="dish.id">
											<figure><span></span><a href="dish-list1.php">
                                                <img :src="dish.picture_url?dish.picture_medium_url:'extra-images/shop-grid-img1.jpg'" style="height:290px;" alt=""></a>
												<figcaption>
													<a href="dish-list1.php"><i class="icon hotmeal-link"></i> <span class="btn-shape"></span></a>
													<a href="dish-list1.php"><i class="fa fa-shopping-bag"></i> <span class="btn-shape"></span></a>
												</figcaption>
											</figure>
											<div class="hotmeal-shop-grid-text">
												<h2><a href="dish-list1.php">{{dish.name}}</a></h2>
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" :style="{width: (dish.rating * 100)/5 +'%'}"></div>
                                            </div>
												
												<span>$ {{dish.price.toFixed(2)}} </span>
											</div>
										</li>
									</ul>
								</div>
                                <!--// Pagination \\-->
		                        <!-- <div class="hotmeal-pagination">
		                          <ul class="page-numbers">
		                             <li><a class="previous page-numbers" href="#!"><span aria-label="Next"><i class="fa fa-angle-left"></i></span> <small class="btn-shape"></small></a></li>
		                             <li><span class="page-numbers current">01 <small class="btn-shape"></small></span></li>
		                             <li><a class="page-numbers" href="#!">02 <small class="btn-shape"></small></a></li>
		                             <li><a class="page-numbers" href="#!">03 <small class="btn-shape"></small></a></li>
		                             <li><a class="page-numbers" href="#!">04 <small class="btn-shape"></small></a></li>
		                             <li><a class="next page-numbers" href="#!"><span aria-label="Next"><i class="fa fa-angle-right"></i></span> <small class="btn-shape"></small></a></li>
		                          </ul>
		                        </div> -->
		                        <!--// Pagination \\-->
                            </div>
                        </div>
					</div>

					<!--// Sidebar \\-->
                                        <aside class="col-md-3">

                       

                        <!--// Widget Best Deals \\-->
                       <!--//  <div class="widget widget_deals">
                        	<h2 class="widget-heading">Featured Deals</h2>
                        	<ul>
                        		<li>
                        			<figure><a href="menu.html"><img src="extra-images/widget-deal-img1.jpg" alt=""></a></figure>
                        			<div class="widget-deals-text">
                        				<h6><a href="menu.html">Large Fajita Pizza</a></h6>
                        				<span>$ 150.00</span>
                        			</div>
                        		</li>
                        		<li>
                        			<figure><a href="menu.html"><img src="extra-images/widget-deal-img2.jpg" alt=""></a></figure>
                        			<div class="widget-deals-text">
                        				<h6><a href="menu.html">Fresh Tomato Juice</a></h6>
                        				<span>$ 75.00</span>
                        			</div>
                        		</li>
                        		<li>
                        			<figure><a href="menu.html"><img src="extra-images/widget-deal-img3.jpg" alt=""></a></figure>
                        			<div class="widget-deals-text">
                        				<h6><a href="menu.html">Chicken Burger</a></h6>
                        				<span>$ 150.00</span>
                        			</div>
                        		</li>
                        		<li>
                        			<figure><a href="menu.html"><img src="extra-images/widget-deal-img4.jpg" alt=""></a></figure>
                        			<div class="widget-deals-text">
                        				<h6><a href="menu.html">Chocolate dessert</a></h6>
                        				<span>$ 200.00</span>
                        			</div>
                        		</li>
                        	</ul>
                        </div>\\-->
                        <!--// Widget Best Deals \\-->

                     

                    </aside>
                    <!--// Sidebar \\-->
                    <!--// Sidebar \\-->

				</div>


  
</template>

<script>


    export default {
        data () {
            return {
                dishes: null,
            }
        },
        created: function(){ 
            this.loadDishes()
        },
       
        methods: {

            loadDishes() { 

				let url = '/api/v1/dishes'
                if(this.$route.query.zip) {
                  url = url+'?zip='+this.$route.query.zip
				}

				if(this.$route.query.name) {
                  url = url+'?name='+this.$route.query.name
				}
		
                axios.get(url)
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        this.dishes = res.data.success.data.dishes
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })

            }

               
        }
    }
</script>

