<template>

    <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

            <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9">

            <div class="hotmeal-main-section hotmeal-best-offerfull">
                <div class="container" style="width: 850px;">
                    <div class="row">
                    <!--   <div class="col-md-9"> -->
                            <div class="hotmeal-best-offer">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="hotmeal-best-offer-text" v-if="user.chef.is_approved==0"> 
                                            <h1 class="fm" style="color: #B99563;font-size: 45px;font-weight: 200;" v-if="user">Welcome {{user.first_name}}</h1>
                                            <h6>
                                                You successfully signed the Independent Contractor's Agreement with Pepe Le Chef, LLC. Hang tight...a Team Member is reviewing your application, will get right back to you! 

                                            </h6> 
                                            <div style="font-size: 17px;">
                                                <br>
                                                Status : <span class="agree-sign">Waiting for Admin Approval</span>
                                            </div>
                                        </div>
                                        <div class="hotmeal-best-offer-text" v-if="user.chef.is_approved==1"> 
                                            <h1 class="fm" style="color: #B99563;font-size: 45px;" v-if="user">Welcome {{user.first_name}}</h1>
                                            <h6>
                                                Great! , Approval process completed by Pepe Le Chef . Start adding Dish by clicking the "Add A dish"

                                            </h6> 
                                            <div style="font-size: 17px;">
                                                <br>
                                                Status : <span class="agree-sign">Approved</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="hotmeal-best-thumb">
                                            <img src="/images/spice.png" alt="" style="margin: -31px -20px 0px 1px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!--        </div> -->
                    </div>
                </div>
            </div>    

            
            <section id="pdf">
                 <embed WMODE="transparent" :src="'/uploads/user/'+ user.id +'/agreement.pdf'"  style="border:1px solid #999;" type="application/pdf" width="100%" height="500px" />
            </section>            
            
        </div>

    </div>    


  
</template>

<script>


    export default {
        data () {
            return {
                user: null     

            }

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
        },
       
        methods: {
            onSubmit() {
               

            },
            
            mounted() {

                conosle.log('Mounted........+++++');

            },

            login() {
                axios.post('/api/v1/login', this.$data.form)
                .then(res => { console.log(res)
                    if(res.data.success){ 
                        localStorage.setItem('user', JSON.stringify(res.data.success.data));
                       // window.location.href = '/chef/dashboard'
                    }else {
                        this.$toasted.show('Login failed, invalid credentials.',{duration: 800})                   
                    }    
                    //commit('CREATE_POST', res.data)
                }).catch(err => {
                    
                    console.log(err)
                })
            }
        }
    }
</script>
