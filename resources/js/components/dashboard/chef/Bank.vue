<template>

     <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9 bg">

             <div class="hotmeal-main-section hotmeal-best-offerfull pt-10">
            <div class="container box-width">
                <div class="row">
                  <!--   <div class="col-md-9"> -->
                    <div class="hotmeal-best-offer">
                        <div class="row">
                        
                            <div class="hotmeal-best-offer-text">
                              
                                <div class="col-md-12">
                                    <div class="hotmeal-reserve-table hotmeal-reservation-wrap add-box" style="padding-top: 0px;margin-top: -23px;">
                                       <h2 class="fm" style="color: #B99563;font-weight: 200;font-size: 40px;">Add Bank Account</h2>
                                         <br>  <br>
                                        <form @submit.prevent="onSubmit">
                                            <ul>
                                                
                                                <li>
                                                    <div class="form-group">
                                                    <input type="text"  v-model="form.account_holder_name" class=""  placeholder="Account Holder Name*"  required>
                                                    </div>
                                                </li>
                                                
            
                                              
                                                <li>
                                                    <div class="form-group">
                                                    <input type="text"  v-model="form.account_number" class=""  placeholder="Account No*" required :disabled="form.last4 != null">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group">
                                                    <input type="text"  v-model="form.routing_number" class=""  placeholder="Routing No*" required :disabled="form.last4 != null">
                                                    </div>
                                                </li>

                                                <!-- <li>
                                                    <div class="form-group">
                                                        <datetime type="date" v-model="form.dob"   placeholder="Date of Birth*"
                                                            :format="{ year: 'numeric', month: 'long', day: 'numeric' }"
                                                        use12-hour required></datetime>

                                                    </div>
                                                </li> -->
                                                
                                               
                                         

                                            </ul>  
                                                <div>
                                              
                                            <p><img src="/images/stripe.png" style="width:16%;"></p><p><img src="/images/stripe4.png" style="width:16%;"></p>

                                                <br>
                                             </div>
                                            <div>
                                                <button  class="my-btn" style="margin-left: 338px;">Save</button>
                                                <br>
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

    let stripe = Stripe(process.env.MIX_STRIPE_KEY),
    elements = stripe.elements(),
    card = undefined;

    export default {
        data () {
            return {
                user: '',
                form: {
                    account_holder_name: null,
                    account_number : null,
                    routing_number: null
                },
                bank : null
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

                this.loadPayment()
        },
       
        methods: {
            onSubmit() {

                if(this.form.routing_number.length != 9)  {
                    this.$toasted.show('Routing number must have 9 digits',{duration: 2000})   
                    return;

                }    
                
                this.saveAccount()    
                
            },

            saveAccount() 
            { 
                this.$toasted.show('Saving bank account in Stripe.',{duration: 2000})   
               
                axios.post('/api/v1/payment/bank', this.form, {
                })
                .then(res => { console.log(res)
                    if(res.data.success){   
                        this.$toasted.show('Account saved successfully.',{duration: 1000})  
                        window.location.href = '/chef/bank'

                    } else { console.log('error...')
                        this.$toasted.show('Something went wrong!',{duration: 1000})  

                    }  
                }).catch(err => {
                    this.$toasted.show(err.data.error.message,{duration: 1000})  
                })

            },

            loadPayment() 
            {
                axios.get('/api/v1/payment/bank')
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        if(res.data.success.data.bank != null) {
                            this.form = res.data.success.data.bank
                            this.form.account_number = '*********'+ this.form.last4
                        }    
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
