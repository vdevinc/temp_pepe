<template>

    <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9">

            <section>
                <div class="hotmeal-main-section hotmeal-best-offerfull">
                    <div class="container" style="width: 920px;">
                        <div class="row">
                            <div class="hotmeal-best-offer">
                                <div class="row">
                                        <div class="hotmeal-best-offer-text" style="margin-top: -70px;">
                                            <h2 style="color: #B99563;font-size: 43px;font-weight: 200;" class="fm">&nbsp;&nbsp;My Orders</h2> 
                                            <img src="/images/veg.png" class="spice">
                                         <div class="col-md-12 col-sm-12">
                                              <h6>Please contact Pepe Le Chef, if you need any help - support@pepelechef.comd</h6> <br>
                                              
                                        </div>
                                        <div class="col-md-12 col-sm-12 client-table">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr> 
                                                   
                                                    <th>Order Details </th>
													<th>Time</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                           
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-if="orders" v-for="order in orders" :key="order.id">
                                                
                                                    <td>
                                                        <tr>
                                                             <td>
                                                              <a :href="order.dish.url"><img :src="order.dish.picture_url" width="58"></a><a :href="order.dish.url"> {{order.dish.name}}</a>
                                                              </td>
                                                             <td> </td>
                                                        </tr>
                                                         <tr>
                                                             <td>Order as : </td>
                                                             <td>{{order.service_type.name}}</td>
                                                        </tr>
                                                    <tr>
                                                             <td>Quantity : </td>
                                                             <td>{{order.no_of_people}} Person</td>
                                                        </tr>


                                                    </td>

                                                    
                                                    <td>{{order.time_slot}}</td>

                                                    <td>$&nbsp;{{order.net_price.toFixed(2)}}
                                                    <td>{{order.status}}</td>

                                                    <td>
                                                        <!--// {{(order.status != 'pending')?order.status:''}} \\-->

                                                        
                                                        <button v-if="order.status == 'pending'" @click="onUpdateStatus(order.id, true)" class="btn btn-block btn-primary"  type="submit">Accept</button>
                                                        <button v-if="order.status == 'pending'" @click="onUpdateStatus(order.id, false)" class="btn btn-block btn-danger"  type="submit">Decline</button>
                                                        <!-- <button v-if="order.status != 'pending'" @click="" class="btn btn-block btn-success"  type="submit">Complete</button> -->
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </section>


            
        </div>

    </div>    
  
</template>

<script>

    export default {
        data () {
            return {
                orders: [],
                user: '',
            }
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

            this.getOrders();

        },
       
        methods: { 

            getOrders() {  

                 axios.get('/api/v1/chef/order/list')
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        this.orders = res.data.success.data.orders
                       // window.location.href = '/chef/dashboard'
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })


            },

            onUpdateStatus(order_id, is_approved) {

                let $this = this;

                Vue.dialog
                .confirm('Please confirm to continue')
                .then(function(dialog) {
                    $this.updateStatus(order_id, is_approved)

                })
                .catch(function() {
                });
                
            },

            updateStatus(order_id, is_approved) { 

                let order = {order_id, is_approved }

                this.$toasted.show('Order accepting.. Please wait for a moment',{duration: 4000})  

                axios.post('/api/v1/order/status', order, {
                })
                .then(res => { console.log(res)
                    if(res.data.success){   
                        this.$toasted.show(res.data.success.message,{duration: 4000})  
                        this.getOrders();
                        
                        //window.location.href = '/profile'

                    } else { console.log('error...')
                        this.$toasted.show('Something went wrong!',{duration: 4000})  

                    }  
                }).catch(err => {
                    this.$toasted.show(err.data.error.message,{duration: 4000})  
                })

            }
           
            
        }
    }
</script>
