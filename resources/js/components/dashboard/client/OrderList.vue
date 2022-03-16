<template>

    <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9">

            <section>
                <div class="hotmeal-main-section hotmeal-best-offerfull">
                    <div class="container" style="width: 953px;margin-top: -51px;">
                        <div class="row">
                            <div class="hotmeal-best-offer">
                                <div class="row">
                                        <div class="hotmeal-best-offer-text">
                                            <h2 class="fm" style=" font-size: 42px!important; color: #B99563;font-weight: 200;">&nbsp;&nbsp;My Orders</h2> 
                                            <br>
                                            <img src="/images/veg.png" class="veg">
                                         <div class="col-md-12 col-sm-12">
                                              <h6>Contact <a href="mailto:support@pepelechef.com">support@pepelechef.com</a> with any questions or concerns! Feast away!</h6> <br>
                                        </div>
                                        <div class="col-md-12 col-sm-12 client-table">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr> 
                                                    <th>Order Details</th>


													<th>Date & Time</th>
                                                    <th>Total</th>
                                                    <th>Status</th>

                                                           
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-if="orders" v-for="order in orders" :key="order.id">
                                                <td>
                                                        <tr>
                                                             <td>
                                                             <a :href="order.dish.url"><img :src="order.dish.picture_url" width="58"></a>
                                                              </td>
                                                             <td><b>{{order.dish.name}} </b><br>Order ID :<b>PE-0-0{{order.id}}</b>
                                                             <br>Price :${{order.price.toFixed(2)}}
                                                            <br>Sales tax:${{order.sales_tax.toFixed(2)}}
                                                            <br>Txn Fee : ${{order.txn_fee.toFixed(2)}}</td>
                                                        </tr>
                                                         <tr>
                                                             <td></td>
                                                             <td></td>
                                                        </tr>
                                                         <tr>
                                                             <td>Chef Name : </td>
                                                             <td>{{order.dish.chef.full_name}}</td>
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
                                                    <td>${{order.net_price.toFixed(2)}}
                                                    <td>{{(order.status == 'pending' || order.status == 'completed')?order.status:'' }} 
                                                        <a :href="'/client/order/complete/'+order.id" v-if="order.status == 'accepted'">
                                                        <button class="btn btn-block btn-primary" type="submit">Review & Complete</button>
                                                    </a>
                                                    </td>

                                                    
                                                </tr>

                                            </tbody>
                                        </table>
                                        <a href="/profile">Go Back</a>
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
<style>
td{text-align:left;}
</style>

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

                 axios.get('/api/v1/client/order/list')
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


            }
           
            
        }
    }
</script>
