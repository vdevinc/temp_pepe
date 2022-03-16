<template>
   <form @submit.prevent="onSubmit"  > 

    <ul>
        <li>
            <div class="form-group">
            <input type="text" class="form-control" name="first_name" id="fname" v-model="form.first_name" placeholder="First Name*" required>
            </div>
        </li>
        <li>
            <div class="form-group">
            <input type="text" class="form-control"  name="middle_name" id="mname"  v-model="form.middle_name" placeholder="Middle Name" >
            </div>
        </li>
        <li>
            <div class="form-group">
            <input type="text" class="form-control" name="last_name"  id="lname"  v-model="form.last_name" placeholder="Last Name*" required>
            </div>
        </li>
        <li>
            <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" v-model="form.email" placeholder="Email*" required>
            </div>
        </li>
        <li>
            <div class="form-group">
            <input type="text" id="phone" name="phone" maxlength="10" v-model="form.phone"  placeholder="Phone*   +1 (123)456-789" required="">
            </div>
            
        </li>
        
        <li>
            <div class="form-group">
            <input type="number" id="zip" name="zip" maxlength="5" v-model="form.zip" placeholder="Zip Code* (12345)" required=""></div>
        </li>
        
        <li>
            <div class="form-group">
            <input type="text" id="addr1" name="addrres_line_1" v-model="form.address_line_1" placeholder="Street Address1*" required=""></div>
        </li>
        <li>
            <div class="form-group">
            <input type="text" id="addr2" name="addrres_line_2" v-model="form.address_line_2" placeholder="Street Address2" ></div>
        </li>
        <li>
            <div class="form-group">
            <input type="text" id="city" name="city" v-model="form.city" placeholder="City*" ></div>
        </li>

        
        
        <li>
            <div class="form-group">
                <select name="state" class="pass" id="state" v-model="form.state" required="">
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
            <textarea class="text-ht" name="about" v-model="form.about" placeholder="Tell me something good..."></textarea>
        </li>
       
        <li>
            <input type="password" class="pass" id="password" name="password" v-model="form.password"  placeholder="Password*" required="">
        </li>
        <li>
            <input type="password" class="pass" id="confirm_password" name="confirm_password" v-model="form.confirm_password" placeholder="Confirm Password*" required="">
        </li>
        <li>
            <label  >Any Foodborne Illness/Allergies ?</label>
            <input type="radio"  value="true" v-model="have_allergies">
            <span  >Yes</span> &nbsp;
            <input type="radio"  value="false" v-model="have_allergies">
            <span  >No</span>
        </li>
        <li v-if="have_allergies == 'true'">
            <input type="text" class="allergies" id="allergies" name="allergies" v-model="form.allergies"  placeholder="List Your Foodborne Illness/Allergies" required=""  >
        </li>
    
        <li>
                <div class="input-group ">
                <div class="input-group-prepend">
                <span class="input-group-text"><b  >Upload Profile Photo *</b></span>
                <br>
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_avatar" ref="file_avatar"    @change="onFileChange"  >
                </div>
                </div>
                <img class="marg-img" :src="urlAvatar" width="85" height="70">


        </li>

           
    </ul>	
    <!-- <a href="#!" class="my-btn">Submit</a> -->
     <input type="submit" class="my-btn" value="Submit">

      <loading
        :show="loaderShow"
        :label="loaderLabel"
        >
      </loading>

</form>

</template>

<script>

    import { required, email, minLength } from "vuelidate/lib/validators"


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
                    allergies: null,
                    web: '1'


                },
                have_allergies: 'false',
                
                formSubmiting: false,
                urlAvatar: '/images/small.png',
                loaderShow: false,
                loaderLabel: 'Submitting...',
            }

        },
        validations: {
            form: {
                first_name: { required },
                email: { required, email }
            },
        },
        methods: {
            onSubmit() { 

                this.createClient()

            },

            onFileChange(e) { 
                const file = e.target.files[0];
                if(e.target.getAttribute('name') == 'file_avatar')
                    this.urlAvatar = URL.createObjectURL(file);
    
            },
            createClient() {

                this.formSubmiting = true
                this.loaderShow = true

                let avatar =  this.$refs.file_avatar.files[0]    
                var formData = new FormData()

                for (let field in this.$data.form) {
                    formData.append(field, this.$data.form[field])
                }

                formData.append('file_avatar', avatar)                
                axios.post('/api/v1/client/register', formData, {
                    headers: {
                            'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => { console.log(res)
                    if(res.data.success){ console.log('####' + res.data.success)  
                        this.$toasted.show('Registration Success!',{duration: 4000})   
                        this.formSubmiting = false;
                        this.loaderShow = false
                        localStorage.setItem('user', JSON.stringify(res.data.success.data))
                        window.location.href = '/client/payment'
                    } else { console.log('error...')
                        this.$toasted.show('Registation failed: '+ res.data.error.message,{duration: 4000})  
                       this.formSubmiting = false;
                       this.loaderShow = false

                    }  
                    //commit('CREATE_POST', res.data)
                }).catch(err => {
                    this.formSubmiting = false;
                    this.loaderShow = false
                    this.$toasted.show('Registration failed: '+ err.data.error.message,{duration: 4000})  

                })
            }
        }
    }
</script>
