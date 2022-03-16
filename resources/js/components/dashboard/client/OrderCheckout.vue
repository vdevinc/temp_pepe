<template>

     <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

         <div class="col-md-9">

             <div class="hotmeal-main-section hotmeal-best-offerfull pt-10 ">
            <div class="container box-width">
                <div class="row">
                  <!--   <div class="col-md-9"> -->
                        <div class="hotmeal-best-offer" style="padding-top: 0px;">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="hotmeal-best-offer-text">
                                        <h1 class="fm" style="color: #B99563;font-size: 40px;">Order Checkout</h1> 
                                       <img style="margin: -94px 0px 20px 522px;width: 54%;position: absolute;" src="/images/spicecheckout.png" class="veg">
                                        <br> <br>
                                    <div class="col-sm-12" style="margin-top: 20px;">
                                        <div class="row font-12">
                                        <div class="col-md-10 col-sm-3 pl-0">
                                            <p>Meal Price for  {{this.form.no_of_people}} persons + Surcharge ({{surcharge}}) : </p>
                                            <p>Tax (7%) : </p>
                                            <p>Transation Fee (3% + $1.3) : </p>
                                            <br>
                                            <p style="font-size:16px;"><b>Total : </b></p>
                                            <br>
                                            
                                        </div>
                                        <div class="col-md-2 col-sm-3 second-box w-29">
                                            <p>${{price.toFixed(2)}}</p>
                                            <p>${{sales_tax.toFixed(2)}}</p>
                                            <p>${{txn_fee.toFixed(2)}}</p>
                                            <br>
                                            <p style="font-size:16px;">${{net_price.toFixed(2)}}</p>

                                            <br>
                                           
                                        </div>
                                    </div>
                                   </div>
                                    <a href="javascript:void(0)"><button class="btn btn-block btn-primary" style="width: 273px!important;    margin-left: 16px;float:right;" type="submit" @click="placeOrder()" >Confirm</button></a>
                                </div>
                                </div>
                              
                            </div>
                        </div>
             <!--        </div> -->
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


    export default {
        data () {
            return {
                user: '',
                dish: '',
                surcharge: 0,
                sales_tax: 0,
                txn_fee: 0,
                price: 0,
                net_price: 0,
                form: {
                    dish_id: null,
                    no_of_people: 1,
                    service_type: 'just-a-chef',
                    time_slot: null,
                },
                loaderShow: false,
                loaderLabel: 'Submitting...',

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
                }else {
                }    
            }).catch(err => {
                console.log(err)
            })

            this.form.no_of_people = parseInt(this.$route.params.no_of_people)
            this.form.service_type = this.$route.params.service_type
            this.form.time_slot = this.$route.params.time_slot
            this.loadDish()
        },
       
        methods: {
            
            loadDish() {
                axios.get('/api/v1/dish/'+ this.$route.params.dish_id)
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

                if(this.form.no_of_people > 3 && this.form.no_of_people <= 6)   
                    chef_fee += 90
                else if(this.form.no_of_people > 6) {
                    chef_fee = 90
                    let groups_of_four = Math.ceil( (this.form.no_of_people - 6) / 4)
                    chef_fee +=  (50 * groups_of_four)                    
                }

                if(this.dish.hours > 180) {
                    this.surcharge = Math.ceil((this.dish.hours - 180) / 60) * 50
                }

                this.price = (this.dish.cost * 3 ) * this.form.no_of_people + chef_fee + this.surcharge  
                this.sales_tax =  (this.price * 7 ) / 100 
                this.txn_fee = (this.price * 3 ) / 100  + 1.3
                this.net_price = this.price + this.sales_tax + this.txn_fee
                this.net_price = Math.round(this.net_price * 100) /100

            },

            placeOrder() 
            {


                this.loaderShow = true
                //this.$toasted.show('Sending order request..',{duration: 2000})   
               
                axios.post('/api/v1/order', this.form, {
        
                })
                .then(res => { console.log(res)
                    if(res.data.success){   
                        this.loaderShow = false
                        this.$toasted.show('Request is placed successfully. You will be notified on chef approval',{duration: 2000})  
                        //window.location.href = '/order/list'
                        this.$router.push({ name: 'client-order-list'}) 

                    } else { console.log('error...')
                        this.loaderShow = false
                        this.$toasted.show('Something went wrong!',{duration: 2000})  

                    }  
                }).catch(err => {
                    this.loaderShow = false
                    this.$toasted.show(err.data.error.message,{duration: 2000})  
                })

            }

            

          
            
            
        }
    }
</script>