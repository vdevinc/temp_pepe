<template>

      <div class="row">

                <div class="col-md-12">
                    <div class="hotmeal-shop-detail">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hotmeal-shop-heading">
                                    <h2>{{dish.name}}</h2>
                                    <div class="ratings">
                                        <div class="empty-stars"></div>
                                        <div class="full-stars" :style="{width: (dish.rating * 100)/5 +'%'}"></div>
                                    </div>     
                                </div>
                                <div class="hotmeal-shop-thumb">
                                      <div class="hotmeal-images-thumb-layer">
                                      <div class="hotmeal-modern-gallery-wrap">
                                      <img :src="dish.picture_url?dish.picture_large_url:'extra-images/shop-detail-img1.jpg'" alt="">
                                      </div>
                                    </div>

                                  </div>
                                
                            </div>
                            <div class="col-md-6">
                                 <p>{{dish.story}}</p>

                                <div class="hotmeal-shop-text">
                                    <span>${{form.price.toFixed(2)}}</span>
                                    <span></span>
                                 <div>
                                     
                                 </div>
                                 <div class="row">
                                  <div class="col-md-6 hotmeal-product-option">
                                  <ul>
                                            <li>
                                                <label>No of People:</label>
                                                <input value="01" min="01" max="24" type="number" v-model="form.no_of_people" @change="priceCalculate()">
                                            </li>
                                             <li>
                                                <label style="margin-top:20px;">Select Date & Time:</label>
                                                <datetime type="datetime" v-model="form.time_slot" formatee="yyyy-MM-dd HH:mm:ss"   
                                                    :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit' }"
                                                    :min-datetime="minDatetime"
                                                 use12-hour></datetime>
                                                 *<small>Same day orders require 1 hour notice in advance.</small>
  
                                            </li>
                                             <li>
                                            <div>
                                            <h6 style="font-weight: 600;margin-top:20px;">Preparation Time:</h6>
                                            <p>
                                                {{(dish.hours/60) >= 1?parseInt(dish.hours/60) + ' Hours' :'' }}
                                                &nbsp;{{(dish.hours % 60) > 0?(dish.hours%60) + ' Minutes' :'' }}


                                            </p>
                                            </div>
                                            </li>
                                    </ul>
                                    
                                  </div>
                                  <div class="col-md-6 hotmeal-product-tags">
                                  <ul>
                                   <li>
                                                <a href="#!"><img class="rounded-circle mx-auto d-block dp" :src="dish.chef.avatar?dish.chef.avatar:'extra-images/team-list-img1.jpg'" alt="Card image cap">
                                                </a>
                                            </li>
                                            <li>
                                            <center>
                                            <h6 style="color:#C3A479;text-transform:capitalize;">{{dish.chef.full_name}}</h6>
                        
                                             <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" :style="{width: (dish.chef.rating * 100)/5 +'%'}"></div>
                                            </div>
                                            </center>
                                        </li>
                                    </ul>
                                  <div style="margin-top:100px;margin-left:20px;"><a style="color:#C3A479;background-color:#000;font-size:15px;" href="javascript:void(0)" class="home-btn" @click="placeOrder()">Complete Order</a></div>
                                  </div>
                                  </div>
                                    
                                    
                                    
                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--// Tabs \\-->
                      <div class="hotmeal-shop-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav-tabs" role="tablist">
                          <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                          <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews ({{dish.ratings.length}})</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane" id="home">
                              <h2 class="hotmeal-section-heading">Dish ingredients</h2>
                              <div class="hotmeal-shop-description">
                                  <p>{{dish.ingredients}}</p>
                              </div>
                          </div>
                          <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="comments-area">
                              <!--// coments \\-->
		                          <ul class="comment-list" v-if="dish.ratings">
		                          	<li v-for="rating in dish.ratings" :key="rating.id">
		                                <div class="thumb-list">
		                                   <figure><img alt="" :src="dish.chef.avatar?dish.chef.avatar:'extra-images/team-list-img1.jpg'" style="height: 97px;"></figure>
		                                   <div class="text-holder">
		                                   	<h6>{{rating.user.full_name}}</h6>
		                                   	<time class="post-date" datetime="2008-02-14 20:00">
                                                   {{ rating.created_at | moment("MMMM D, YYYY") }}
                                                   <!-- August 21, 2017 . 11:39 pm  -->
                                                   </time>
		                                      <p><br/>{{rating.dish_review}}</p>
		                                  	 
		                                   </div>
		                                </div> 
		                             </li>
		                          
		                          </ul>
		                          <!--// coments \\-->

                            </div>
                          </div>
                        </div>		                    
                      </div>
                      <!--// Tabs \\-->
                      
                </div>

            </div>
  
</template>
<style type="text/css">
  .hotmeal-subheader {padding: 0px!important;}
</style>
<script>

import { DateTime as LuxonDateTime } from 'luxon'


    export default {
        data () {
            return {
                dish: '',
                form: {
                    dish_id: null,
                    service_type: 'just-a-chef',
                    no_of_people: 1,
                    price: 0,
                    time_slot: null
                },
                 minDatetime: LuxonDateTime.local().plus({ hours: 1 }).toISO(),

            }
        },
        created: function(){ 
            this.loadDish()
        },
       
        methods: {

            loadDish() {
                axios.get('/api/v1/dish/'+ this.$route.params.id)
                .then(res => { 
                    console.log(res)
                    if(res.data.success){  
                        console.log(res.data.success)
                        this.dish = res.data.success.data.dish
                        this.form.dish_id = this.dish.id
                        this.priceCalculate()
                        
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })

            },

            priceCalculate() { 

                let chef_fee = 75;
                let surcharge = 0

                if(this.form.no_of_people > 3 && this.form.no_of_people <= 6)   
                    chef_fee += 50
                else if(this.form.no_of_people > 6) {
                    chef_fee = 90
                    let groups_of_four = Math.ceil( (this.form.no_of_people - 6) / 4)
                    chef_fee +=  (50 * groups_of_four)                    
                }

                if(this.dish.hours > 180) {
                    surcharge = Math.ceil((this.dish.hours - 180) / 60) * 50
                }

                this.form.price = (this.dish.cost * 3 ) * this.form.no_of_people + chef_fee + surcharge  
                // let sales_tax =  (this.form.price * 7 ) / 100 
                // let txn_charge = (this.form.price * 3 ) / 100  + 1.3
                // this.form.price += sales_tax + txn_charge
                this.price = Math.round(this.price * 100) /100

            },

            placeOrder() 
            {
                let date = new Date(this.form.time_slot);

                console.log('******))))))',date);

                console.log('Appuser', this.$appUser)

                if(this.form.time_slot == '') {
                    this.$toasted.show('Please select date & time',{duration: 2000})  
                    return; 
                }

                if(!this.$appUser) {
                    this.$toasted.show('Please do login to place a request',{duration: 2000})   
                    return;
                }    

                this.$router.push({ name: 'client-order-checkout', 
                    params: {
                        dish_id: this.form.dish_id,
                        no_of_people: this.form.no_of_people, 
                        service_type: this.form.service_type,
                        time_slot: this.form.time_slot
                    }
                }) 

            }

               
        }
    }
</script>
