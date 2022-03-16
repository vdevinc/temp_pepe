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
                        <div class="hotmeal-best-offer">
                            <div class="row">
                                <div class="col-md-8" style="margin-top: -40px;">
                                    <div class="hotmeal-best-offer-text">
                                        <h1 style="color: #B99563;font-size: 50px;" class="fm">My Profile</h1> 
                                       <img src="images/veg.png" style="width: 285px!important;" class="main-spice">
                                        <br>
                                    <div class="col-sm-12" style="margin-top: 20px;">
                                        <div class="row font-12">
                                        <div class="col-md-5 col-sm-3 pl-0">
                                            <p>First Name</p>
                                            <p>Middle Name</p>
                                            <p>Last Name</p>
                                            <p>Email</p>
                                            <p>Phone</p>
                                            <p>Zip Code</p>
                                            <p>Street Address1</p>
                                            <p>Street Address2</p>
                                            <p>City</p>
                                            <p>State</p>
                                            <br>
                                            
                                        </div>
                                        <div class="col-md-5 col-sm-3 second-box w-29">
                                            <p id="fname">:&nbsp;&nbsp;{{user.first_name}}</p>
                                            <p id="mname">:&nbsp;&nbsp;{{user.middle_name}}</p>
                                            <p id="lname">:&nbsp;&nbsp;{{user.last_name}}</p>
                                            <p id="email">:&nbsp;&nbsp;{{user.email}}</p>
                                            <p id="phone">:&nbsp;&nbsp;+1 {{user.phone}}</p>
                                            <p id="zip">:&nbsp;&nbsp;{{user.address[0].zip}}</p>
                                            <p id="addr1">:&nbsp;&nbsp;{{user.address[0].address_line_1}}</p>
                                            <p id="addr2">:&nbsp;&nbsp;{{user.address[0].address_line_2}}</p>
                                            <p id="city">:&nbsp;&nbsp;{{user.address[0].city}}</p>
                                            <p id="state">:&nbsp;&nbsp;{{user.address[0].state}}</p>
                                            <br>
                                           
                                        </div>
                                    </div>
                                   </div>
                                    <a href="/profile/edit"><button class="btn btn-block btn-primary approve" type="submit">Edit My Profile</button></a>
                                </div>
                                </div>
                              
                            </div>
                        </div>
             <!--        </div> -->
                </div>
            </div>
        </div>        
            
        </div>

    </div>    
  
</template>

<script>


    export default {
        data () {
            return {
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
        },
       
        methods: {
            
        }
    }
</script>
