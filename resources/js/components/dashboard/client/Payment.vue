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
                                    <div class="hotmeal-reserve-table  add-box">
                                     <center><h2 style="color:#B99563;font-size:30px;padding-bottom:2%;border-bottom:1px solid #B99563;">Update Credit Card Details</h2></center>
                                        <div style="margin:11% 0% 20% 13%;">
                                        <form @submit.prevent="onSubmit">
                                            <ul>
                                                <li>
                                                      <div ref="card"></div>
                                                      <div id="card-errors" role="alert"></div>
                                                </li>       

                                            </ul>  

                                            <div>
                                                <button  class="my-btn prof-btn" style="margin:0px !important;">Save</button>
                                             </div> 

                                        </form>
                                    <br> <br>
                                    <p>
Payment will be deducted only after a Pepe Le Chef approves your order <br> Enjoy hassle free checkout!                                    </p>
    </div>
<center>
<p><img src="/images/stripe.png" style="width:16%;"></p><p><img src="/images/stripe4.png" style="width:16%;"></p>
</center>
                                    </div>                      
                                
                                </div>

                            </div>
                        
                        </div>
                    </div>
                 </div>
            </div>
        </div>

            
        </div>

        <loading
        :show="loaderShow"
        :label="loaderLabel"
        >
        </loading>

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
                    token: ''
                },
                loaderShow: false,
                loaderLabel: 'Submitting...',

            }
        },
        mounted: function () {  


            let style = {
            base: {
                border: '1px solid #D8D8D8',
                borderRadius: '4px',
                color: "#000",
            },

            invalid: {
                // All of the error styles go inside of here.
            }

            };

            card = elements.create('card',{hidePostalCode: true,style});
            card.mount(this.$refs.card);


        },
        created: function(){ 
                axios.get('/api/v1/profile')
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        this.$data.user = res.data.success.data.user
                       //window.location.href = '/dishes'
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })
        },
       
        methods: {
            onSubmit() {

                let $this = this
                stripe.createToken(card).then(function(result) {
                    console.log("Token.....", result.token)
                    $this.form.token = result.token.id   
                    $this.saveCard();
                }).catch(err => {
                    this.$toasted.show('Something went wrong!',{duration: 1000})  
                })
                
            },

            saveCard() 
            { 
                this.loaderShow = true

                //this.$toasted.show('Saving Your Card on Strip..',{duration: 2000})   
               
                axios.post('/api/v1/payment/save', this.form, {
                })
                .then(res => { console.log(res)
                    if(res.data.success){  
                        this.loaderShow = false
                        this.$toasted.show('Card Saved successfully.',{duration: 1000})  
                        window.location.href = '/dishes'

                    } else { console.log('error...')
                        this.loaderShow = false
                        this.$toasted.show('Something went wrong!',{duration: 1000})  

                    }  
                }).catch(err => {
                    this.loaderShow = false
                    this.$toasted.show('Something went wrong!',{duration: 1000})  
                })

            },

            loadUser() 
            {
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

            }


          
            
            
        }
    }
</script>
