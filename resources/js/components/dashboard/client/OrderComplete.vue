<template>

     <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9">

             <div class="hotmeal-main-section hotmeal-best-offerfull pt-10">
            <div class="container box-width">
                <div class="row">
                  <!--   <div class="col-md-9"> -->
                    <div class="hotmeal-best-offer">
                        <div class="row">
                        
                            <div class="hotmeal-best-offer-text">
                              
                                <div class="col-md-12">
                                    <div class="hotmeal-reserve-table hotmeal-reservation-wrap add-box">
                                       <h2 class="edit">Complete Order</h2>
                                         <br>  <br>
                                        <form @submit.prevent="onSubmit">
                                            <ul>
                                                <li>
                                                    <label>Your Rating for Dish</label>
                                                    <star-rating v-model="form.dish_rating"></star-rating>
                                                </li>
            
                                                <li class="full-form text-area">
                                                    <textarea   v-model="form.dish_review" class="area-ht" placeholder="Dish review.." required></textarea>
                                                </li>    
                                                <li>
                                                    <label>Your Rating for Chef</label>
                                                    <star-rating v-model="form.chef_rating"></star-rating>
                                                </li>
                                              
                                                <li class="full-form text-area">
                                                    <textarea   v-model="form.chef_review" class="area-ht" placeholder="Chef review.." required></textarea>
                                                </li>    
                                            </ul>  

                                            <div>
                                                <button  class="my-btn prof-btn" style="margin:0px !important;">Submit</button>
                                             </div> 

                                        </form>
                                    
                                    </div>                      
                                
                                </div>

                            </div>
                        
                        </div>
                    </div>
                 </div>
            </div>
        </div>

            
        </div>

    </div>    


  
</template>

<script>

   

    export default {
        data () {
            return {
                user: '',
                form: {
                    dish_rating: 0,
                    dish_review: '',
                    chef_rating: '',
                    chef_rating: 0
                }
            }
        },
        mounted: function () {  



        },
        created: function(){ 
                axios.get('/api/v1/profile')
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        this.$data.user = res.data.success.data.user
                       // window.location.href = '/chef/dashboard'
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })

                this.form.order_id = this.$route.params.order_id
        },
       
        methods: {
            onSubmit() {

                this.complete()
                
            },

            complete() 
            { 
                this.$toasted.show('completing order..',{duration: 2000})   
               
                axios.post('/api/v1/order/complete', this.form, {
                })
                .then(res => { console.log(res)
                    if(res.data.success){   
                        this.$toasted.show('Order completed successfully.',{duration: 2000})  
                         this.$router.push({ name: 'client-order-list'}) 
                        //window.location.href = '/profile'

                    } else { console.log('error...')
                        this.$toasted.show('Something went wrong!',{duration: 1000})  

                    }  
                }).catch(err => {
                    this.$toasted.show('Something went wrong!',{duration: 1000})  
                })

            },
                     
            
        }
    }
</script>
