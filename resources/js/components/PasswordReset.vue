<template>
<div class="col-md-12">
    <div class="hotmeal-search-page login-box">
        <img src="/images/spice3.jpg" class="login-img">

        <div class="hotmeal-search-text login-input">
            <h1>Pepe le Chef</h1>
            <h2>Password Reset</h2>
            <img src="/images/fancy-title-img.png" alt="">
            <form @submit.prevent="onSubmit"  > 

                <input type="text" placeholder="Email" v-model="form.email" style="margin-top: 20px;" required>                                                

                <a href="javascript:void(0)" style="margin-top: 20px;" id="sendbutton" class="hotmeal-error-btn"  @click="onSubmit" disabled="true">

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
                    email: null,
                },
                isSubmitted: false  

            }

        },
        validations: {
            form: {
                email: { required, email },
            }
        },
        methods: {
            onSubmit() {
                if (this.$v.$invalid || this.$v.$error || this.isSubmitted == true) {
                    return 
                }
                this.submit()
                this.isSubmitted = true

            },
            submit() {

                axios.post('/api/v1/password/reset', this.$data.form)
                .then(res => { console.log(res)
                    if(res.data.success){   
                        this.$toasted.show('Please check your email for reset password link',{duration: 2000})  
                    }else {
                        this.isSubmitted = false
                        this.$toasted.show(err.data.error.message,{duration: 2000})  
                    }    
                }).catch(err => {
                    this.isSubmitted = false
                    this.$toasted.show(err.data.error.message,{duration: 2000})  
                    console.log(err)
            })
            }
        }
    }
</script>
