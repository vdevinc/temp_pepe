<template>

  <div class="row" >
    <div class="col-md-12">
        <div class="hotmeal-team hotmeal-team-list">
            <ul class="row">
            <!--// No chef found  \\-->
                <li class="col-md-12" v-if="chefs.length == 0">
                    <div class="hotmeal-error-text" >
                        <h3 >Sorry !!!! No Chef Found</h3>
                        <p>No chef found based on your Zip Code search.</p>
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
                <!--// chef found  \\-->

                <li class="col-md-12" v-for="chef in chefs" :key="chef.id">
                    <div class="hotmeal-team-list-wrap">
                        <figure><a :href="'/chef/'+chef.id"><img :src="chef.avatar_medium_url" alt=""></a>
                            <!-- <figcaption>
                                <ul class="hotmeal-team-social">
                                    <li><a href="https://en-gb.facebook.com/login/"><i class="fa fa-facebook"></i><span class="btn-shape"></span></a></li>
                                    <li><a href="https://twitter.com/login"><i class="fa fa-twitter"></i><span class="btn-shape"></span></a></li>
                                    <li><a href="https://www.linkedin.com/uas/login"><i class="fa fa-linkedin"></i><span class="btn-shape"></span></a></li>
                                </ul>
                            </figcaption> -->
                        </figure>
                        <div class="hotmeal-team-list-text">
                            <h2><a :href="'/chef/'+chef.id">{{chef.full_name}}</a></h2>
                            <div class="ratings">
                                <div class="empty-stars"></div>
                                <div class="full-stars" :style="{width: (chef.chef.rating * 100)/5 +'%'}"></div>
                            </div>
                
                            <br>										
                            <p>{{chef.about?chef.about:''}}</p>
                            <a :href="'/chef/'+chef.id" class="hotmeal-learn-btn">Read More <span class="btn-shape"></span></a>
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

    <!--// Sidebar \\-->
    <!-- <aside class="col-md-3"> -->

        <!--// Widget Search \\-->
        <!-- <div class="widget widget_search">
            <form method="get" action="/chefs">
                <input placeholder="Search Now" name="name"  tabindex="0" type="text">
                <label><input type="submit" value=""></label>
            </form>
        </div> -->
        <!--// Widget Search \\-->

        <!--// Widget Popular Post \\-->
        
        <!--// Widget Popular Post \\-->

        <!--// Widget Cetagories \\-->
        
        <!--// Widget Cetagories \\-->

        <!--// Widget Best Deals \\-->
        <!-- <div class="widget widget_deals">
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
        </div> -->
        <!--// Widget Best Deals \\-->

        <!--// Widget Calendar Archives \\-->
        
        <!--// Widget Calendar Archives \\-->

    <!-- </aside> -->
    <!--// Sidebar \\-->

</div>
  
</template>

<script>


    export default {
        data () {
            return {
                chefs: null
            }
        },
        created: function(){ 
            this.loadChefs()

        },
       
        methods: {

            loadChefs() {

                let url = '/api/v1/chefs'
                if(this.$route.query.zip) {
                  url = url+'?zip='+this.$route.query.zip
                }
                if(this.$route.query.name) {
                  url = url+'?name='+this.$route.query.name
				}
                axios.get(url)
                .then(res => { 
                    console.log(res)
                    if(res.data.success){  
                        this.chefs = res.data.success.data.chefs
   
                       // window.location.href = '/chef/dashboard'
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })

            }

               
        }
    }
</script>
