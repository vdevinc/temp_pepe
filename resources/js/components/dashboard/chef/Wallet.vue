<template>

    <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9">

            <section>
                <div class="hotmeal-main-section hotmeal-best-offerfull">
                    <div class="container" style="width: 100%;">
                        <div class="row">
                            <div class="hotmeal-best-offer">
                                <div class="row">
                                        <div class="hotmeal-best-offer-text" style="margin-top:-77px;">
                                            <h2 class="fm" style="color: #B99563;font-weight: 200;font-size: 45px;">&nbsp;&nbsp;My Wallet : $ {{wallet.balance}} </h2> 
                                            <br>
                                            <img src="/images/veg.png" class="spice">
                                         <div class="col-md-12 col-sm-12">
                                              <h6> Please contact Pepe Le Chef, if you need any help - support@pepelechef.com</h6> <br>
                                        </div>
                                        <div class="col-md-12 col-sm-12 client-table">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr> 
                                                    <th></th>
                                                    <th>OrderId</th>
                                                    <th>Type</th>
													<th>Amount</th>
													<th>Remarks</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-if="wallet.txns" v-for="txn in wallet.txns" :key="txn.id">
                                                    <td></td>
                                                    <td>{{txn.order_id}}</td>
                                                    <td>{{txn.txn_type}}</td>
                                                    <td>{{txn.amount}} </td>
                                                    <td>{{txn.remarks}}</td>
                                                    
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
                wallet: [],
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

            this.getWallet();

        },
       
        methods: { 

            getWallet() {  

                 axios.get('/api/v1/chef/wallet')
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        this.wallet = res.data.success.data.wallet
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
