

<template>

    <div class="hotmeal-best-offer" style="margin-top:-56px;">
        <div class="row">
            <div class="col-md-8">
                <div class="hotmeal-best-offer-text">
                    <h1 class="fm" style="color: #B99563;font-size: 40px;;">Hi {{user.first_name}}</h1>
                    <h6>
                        You successfully completed the first phase of registration, good job! 

In order to be considered for approval by PEPE LE CHEF, you must read and sign the independent contractors agreement. 

Your steps away from cookin'!!
                    </h6> 
                    <div style="font-size: 17px;">
                        <br>
                        Status : <span class="agree-sign">Waiting for Contract Sign Up</span>
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


</template>

<script>

    export default {
        props: ['user'],
        data () {
            return {
            }

        },

        mounted() {
        },
       
        methods: {
            onSubmit() {
                 //this.$router.push('/')

            }
        }
    }
</script>



