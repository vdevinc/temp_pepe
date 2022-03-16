<template>
<div class="col-md-12">
    <div class="hotmeal-search-page login-box">
        <img src="/images/spice3.jpg" class="login-img">

        <div class="hotmeal-search-text login-input">
            <h1>Pepe le Chef</h1>
            <h2>Password Reset</h2>
            <img src="/images/fancy-title-img.png" alt="">
            <form @submit.prevent="onSubmit"  > 

                <input type="password" placeholder="Password" v-model="form.password" class="pass" style="margin-top: 20px;" required>                                                
                <input type="password" placeholder="Confirm Password" v-model="form.password_confirmation" class="pass" style="margin-top: 20px;" required>                                                
                <a href="javascript:void(0)" style="margin-top: 20px;" class="hotmeal-error-btn" @click="onSubmit" disabled="true">
                Submit <small></small>					
                    </a>
                       
    
            </form>    

        </div>
    </div>
</div>            

  
</template>

<script>

    import { required, email, minLength } from "vuelidate/lib/validators";

    export default {
        data () {
            return {
                form : {
                    email: '',
                    password: '',
                    password_confirmation: '',
                    token: ''
                }    

            }

        },
        validations: {
            form: {
              //  token: { required },
            }
        },
        created: function(){ 
            this.form.token = this.$route.query.token
            this.form.email = this.$route.query.email
        },    
        methods: {
            onSubmit() {
                if (this.$v.$invalid || this.$v.$error) {
                    return 
                }
                this.submit()

            },
            submit() {

                axios.post('/api/v1/password/reset-confirm', this.$data.form)
                .then(res => { console.log(res)
                    if(res.data.success){ 
                        this.$router.push({ name: 'login'})                        
                    }else {
                        this.$toasted.show(err.data.error.message,{duration: 2000})  

                    }    
                }).catch(err => {
                    this.$toasted.show(err.data.error.message,{duration: 2000})  
                    console.log(err)
            })
            }
        }
    }
</script>
