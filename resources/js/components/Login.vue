<template>
<div class="col-md-12" >
    <div class="hotmeal-search-page login-box" style="background-color: #ecf0f1;box-shadow: none;">
        <img src="/images/spice3.jpg" class="login-img">

        <div class="hotmeal-search-text login-input">
            <h1 class="fm">Pepe le Chef</h1>
            <h2 style="font-size"> Login</h2>
            <img src="/images/fancy-title-img.png" alt="">
            <form @submit.prevent="onSubmit"  > 

                <input type="text" placeholder="Email" class="m" v-model="form.email" style="margin-top: 20px;" required>
                                                                    
                <input type="password" class="pass m" placeholder="Password" v-model="form.password" style="margin-top: 20px;" required>
                
                <a href="javascript:void(0)" style="margin-top: 20px;" class="hotmeal-error-btn" @click="onSubmit" disabled="true">
                Login <small></small>					
                    </a>
                    <br>
                    <br>
                <a href="/#signup" class="sign-pass" >Sign Up</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <a href="/password/reset" class="sign-pass">Forgot Password</a>
            </form>    

        </div>
    </div>
    <loading
    :show="loaderShow"
    :label="loaderLabel"
    >
    </loading>
</div>            

  
</template>
<style type="text/css">
.m{ 
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)!important;
    border:none!important;}
</style>
<script>

    import { required, email, minLength } from "vuelidate/lib/validators";

    export default {
        data () {
            return {
                form : {
                    email: null,
                    password: null  
                },
                loaderShow: false,
                loaderLabel: 'Submitting...',    

            }

        },
        created: function () 
        {
            if(this.$appUser) 
                window.location.href = '/profile'

        },
        validations: {
            form: {
                email: { required, email },
                password: { required }
            }
        },
        methods: {
            onSubmit() {
                if (this.$v.$invalid || this.$v.$error) {
                    return 
                }
                this.login()

            },
            login() {

                this.loaderShow = true
                axios.post('/api/v1/login', this.$data.form)
                .then(res => { console.log(res)
                    if(res.data.success){   console.log('####' + res.data.success.data.token)
                        localStorage.setItem('user', JSON.stringify(res.data.success.data));
                        if(res.data.success.data.user.role.slug == 'chef' &&
                             res.data.success.data.user.chef.is_approved == 0 && 
                             res.data.success.data.user.chef.is_agrmt_signed == 0) {
                             window.location.href = '/chef/agreement'
                        }else if(res.data.success.data.user.role.slug == 'chef' &&
                             res.data.success.data.user.chef.is_approved == 0 && 
                             res.data.success.data.user.chef.is_agrmt_signed == 1) {
                             window.location.href = '/chef/agreement-approval'                        
                        }else if(res.data.success.data.user.chef.is_approved == 1 ) {
                             //window.location.href = '/dish/list'    
                            window.location.href = document.referrer;
                        }else  if(res.data.success.data.user.has_payment != true ) {                                
                             window.location.href = '/client/payment'
                        } else {
                            window.location.href = document.referrer;
                             //window.location.href = '/profile'
                        }
                    }else {

                        this.loaderShow = false
                        this.$toasted.show('Login failed, invalid credentials.',{duration: 800})                   
                    }    
                    //commit('CREATE_POST', res.data)
                }).catch(err => {
                    this.loaderShow = false
                    this.$toasted.show('Login failed, invalid credentials.',{duration: 800})                           
                    console.log(err)
            })
            }
        }
    }
</script>
