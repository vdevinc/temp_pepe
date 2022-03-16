<template>

    <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9" style="margin-top: 40px;">

             <div class="hotmeal-main-section hotmeal-best-offerfull pt-10" style="background-color: #ecf0f1;">
            <div class="container box-width">
                <div class="row">
                  <!--   <div class="col-md-9"> -->
                        <div class="hotmeal-best-offer">
                            <div class="row">
                           
                                    <div class="hotmeal-best-offer-text">
                                        <h2 class="edit" style="text-align:center;">Edit My Profile</h2>
                                       
                                        
                                        <div class="col-md-12">
                                            <div class="hotmeal-reserve-table hotmeal-reservation-wrap add-box">
                                                
                                                <form @submit.prevent="onSubmit">
                                                    <ul>
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="text"  v-model="form.first_name" class=""  placeholder="First Name*"  required>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="text" v-model="form.middle_name" class=""  placeholder="Middle Name">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="text"  v-model="form.last_name" class=""  placeholder="Last Name*" required>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="email"  v-model="form.email"  class=""  placeholder="Email*" required>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="text"  v-model="form.phone"   maxlength="10" placeholder="Phone*   +1 (123)456-789" required="">
                                                            </div>
                                                            
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="number"  v-model="form.zip"  maxlength="5" placeholder="Zip Code* (12345)" required=""></div>
                                                        </li>
                                                        
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="text"  v-model="form.address_line_1"    placeholder="Street Address1*" required=""></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="text"  v-model="form.address_line_2"  placeholder="Street Address2" ></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                            <input type="text"  v-model="form.city"    placeholder="City*" ></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                             <select name="State*" class="pass" id="state" v-model="form.state" required="">
                     <option :value="null" disabled>Select a State</option>
                    <option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
                    </select>
                                                            </div>
                                                        </li>
                                                        
                                                        <li class="full-form text-area">
                                                            <textarea   v-model="form.about" class="area-ht" placeholder="Tell me something good..."></textarea>
                                                        </li>
                                                        
                                                        <!-- <li>
                                                            <select v-model="form.chef_type" class=" pass bor-rad" id="select1" required="">
                                                                <option :value="null" disabled>You Register As</option>
                                                                <option value="1" :selected="user.chef.chef_type_id == 1">Professional Chef</option>
                                                                <option value="2" :selected="user.chef.chef_type_id == 2">Student Chef</option>
                                                            </select>
                                                            
                                                        </li> -->

                                                        <!-- <li id="culi-input" v-if="form.chef_type == 2">
                                                            <input type="text" v-model="form.school" id="school"  placeholder="Name of the culinary school*" required="">
                                                        </li> -->
                                                        <li>
                                                            <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><b>Upload Profile Photo</b></span>
                                                            <br>
                                                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_avatar" ref="file_avatar"  @change="onFileChange" >
                                                            </div>
                                                            </div>
                                                            <span ><img style="width: 200px;" :src="urlAvatar?urlAvatar:user.avatar"></span>
                                                        </li>
                                                    </ul>   
                                                    <button  class="my-btn prof-btn" >Submit</button>

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
                 form : {
                    first_name: null,
                    last_name: null,
                    middle_name: null,
                    email: null,
                    phone: null,
                    zip: null,
                    address_line_1: null,
                    address_line_2: null,
                    city: null,
                    state: null,
                    about: null,
                    password: null,
                    confirm_password: null,
                    chef_type: null,
                    school: null
                },
                user: '',
                urlAvatar: '',
                loaderShow: false,
                loaderLabel: 'Submitting...',
            }
        },
        created: function(){ 
                axios.get('/api/v1/profile')
                .then(res => { 
                    console.log(res)
                    if(res.data.success){    
                        let user = res.data.success.data.user;
                        this.user = user
                        console.log('#****************************', user.address[0].address_line_1);
                        this.form.first_name = user.first_name
                        this.form.middle_name = user.middle_name
                        this.form.last_name = user.last_name
                        this.form.email = user.email
                        this.form.phone = user.phone
                        this.form.about =  user.about
                        this.form.school = user.chef.school
                        this.form.chef_type = user.chef.chef_type_id
                        this.form.zip = user.address[0].zip
                        this.form.address_line_1 = user.address[0].address_line_1
                        this.form.address_line_2 = user.address[0].address_line_2
                        this.form.city = user.address[0].city
                        this.form.state = user.address[0].state
                        
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })
        },
       
        methods: {
            onSubmit() {
                this.updateUser()
            },
            onFileChange(e) { 
                const file = e.target.files[0];
                if(e.target.getAttribute('name') == 'file_avatar')
                    this.urlAvatar = URL.createObjectURL(file);
              
            },
            updateUser() {

                let avatar =  this.$refs.file_avatar.files[0]
                            
                var formData = new FormData()

                for (let field in this.$data.form) {
                    formData.append(field, this.$data.form[field])
                }

                formData.append('file_avatar', avatar)  
                formData.append('_method', 'PUT')
              
        
                //this.$toasted.show('Updating  your profile..',{duration: 4000})  
                this.loaderShow = true

                axios.post('/api/v1/profile/update', formData, {
                    headers: {
                        'Content-Type': 'x-www-form-urlencoded'
                    }
                })
                .then(res => { console.log(res)
                    this.loaderShow = false
                    if(res.data.success){ 
                        this.$toasted.show('Updated Sucessfully.',{duration: 4000})  
                    }else {
                         this.$toasted.show('Update failed: '+res.data.error.message,{duration: 4000})  
                    }    
                }).catch(err => { 
                    this.loaderShow = false
                    this.$toasted.show('Update failed: '+err.data.error.message,{duration: 4000})  
                })
            }
            
        }
    }
</script>
