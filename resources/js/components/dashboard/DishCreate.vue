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
                        <div class="hotmeal-best-offer" style="padding-top: 0;">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="hotmeal-best-offer-text">
                                        <h1 class="fm" style="color: #B99563;font-size: 45px;">Congratulations</h1>
                                        <h6>
                                            Start adding Dishes , You cannot edit the dishes once approved by Pepe Le Chef.
                                        </h6> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="hotmeal-best-thumb">
                                        <img src="/images/spice.png" alt="" style="margin: -31px -20px 0px 1px;">
                                    </div>
                                </div>
                            </div>
                            <div>
                            <div class="col-md-12 bg">
                        <div class="hotmeal-reserve-table hotmeal-reservation-wrap" style="box-shadow: none;">
                            <div class="hotmeal-fancy-title">
                                <h2>{{is_edit?'Edit':'Add'}} Dishes</h2>
                                <img src="/images/fancy-title-img.png" alt="">
                            </div>
                            <form @submit.prevent="onSubmit">
                                <ul>
                                    <li>
                                        <div class="form-group">
                                        <input type="text" class="form-control" id="fname" placeholder="Name of Dish*" v-model="form.name" required>
                                        </div>
                                    </li>
                                   
                                    <li>
                                        <div class="form-group">
                                        <input type="text" class="form-control" id="lname" placeholder="Type of cuisine*" v-model="form.cuisine_type"  required>
                                        </div>
                                    </li>
                                    <li>
                                          <select class="form-control pass bor-rad" id="select2" v-model="form.dish_service_type_id" required="">
                                            <option :value="null" disabled>Booking Type</option>
                                            <!-- <option value="1">Student</option> -->
                                            <option value="1">Just a Chef</option>
                                            <option value="2">Chef with  Ingredients</option>
                                          </select>
                                         
                                    </li>
                                    <li>
                                        <div class="form-group">
                                        <div class="col-md-4">
                                          Preparation Time (HH:MM) *
                                        </div>
                                         <div class="col-md-4">
                                        <input type="number" class="form-control" max="7" min="1"  placeholder="HH" v-model="form.hours" required>
                                        </div>
                                        <div class="col-md-4">
                                        <input type="number" class="form-control" max="60" min="0"  placeholder="MM" v-model="form.minutes">
                                        </div>
                                        </div>
                                        
                                    </li>

                                   
                                    <li class="full-form text-area">
                                        <textarea class="text-ht1" placeholder="Story Of Dish*" v-model="form.story" required></textarea>
                                    </li>
                                    <li class="full-form text-area" >
                                        <textarea v-if="form.dish_service_type_id != 1" class="text-ht1" placeholder=" Ingredients*" v-model="form.ingredients" required></textarea>
                                    </li>
                                     <li id="ingra-cost" v-if="form.dish_service_type_id != 1">
                                        <div class="form-group"> <br/>
                                         
                                       <input type="number" class="form-control"  placeholder=" Ingredients Cost ($)*" v-model="form.cost" required>
                                       
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <div class="form-group"> <br/>
                                        <input type="number" class="form-control"  placeholder="No.of Courses of this Dish" v-model="form.courses" >
                                        </div>
                                    </li>
                                    <li>
                                         <div class="input-group ">
                                          <div class="input-group-prepend">
                                          <span class="input-group-text"><b>Upload Dish Photo</b></span>
                                          <br>
                                          <input type="file" class="custom-file-input" name="file_picture" ref="file_picture"   @change="onFileChange" required>
                                          </div>
                                          </div>
                                        <span ><img style="float: right;" :src="urlPicture?urlPicture:form.picture_url" width="100"></span>

                                    </li>
                                </ul>   <br><br>
                                <button class="my-btn " style="margin-left: 312px;">Submit</button> 

                            </form>
                        
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
                    name: null,
                    cuisine_type: null,
                    dish_service_type_id: null,
                    hours: 0,
                    minutes:0,
                    story: null,
                    ingredients: null,
                    cost: null,
                    courses: null

                },    

                user: '',
                urlPicture: '',
                is_edit: false,
                loaderShow: false,
                loaderLabel: 'Submitting...',
            }
        },
        created: function(){ 
            axios.get('/api/v1/profile')
            .then(res => { 
                console.log(res)
                if(res.data.success){   console.log(res.data.success)
                    this.$data.user = res.data.success.data.user
                    // window.location.href = '/chef/dashboard'

                    if(this.$data.user.role.slug != 'chef' )
                        window.location.href = '/'
                     
                }else {
                }    
            }).catch(err => {
                console.log(err)
            })

            if(this.$route.params.id) {
                this.is_edit = true
                this.loadDish()
            }


        },
       
        methods: {
            onSubmit() { 

                if(this.form.cost == null)
                    this.form.cost = 0
                    
                if(this.form.courses == null)
                    this.form.courses = 0

                this.loaderShow = true 

                if(!this.is_edit)
                    this.createDish()
                else 
                    this.updateDish()    
                
            },
            onFileChange(e) { 
                const file = e.target.files[0];
                if(e.target.getAttribute('name') == 'file_picture')
                    this.urlPicture = URL.createObjectURL(file);
    
            },

            createDish() {
                let picture =  this.$refs.file_picture.files[0]    
                var formData = new FormData()
                for (let field in this.$data.form) { 
                    if(field != 'minutes' & field != 'hours')
                        formData.append(field, this.$data.form[field])
                    else if(field == 'hours'){
                        formData.append(field, (this.$data.form[field] * 60) + parseInt(this.$data.form.minutes))
                    }    
                }
                formData.append('file_picture', picture) 
                //this.$toasted.show('Adding a new dish...',{duration: 2000})   
                axios.post('/api/v1/dish', formData, {
                    headers: {
                            'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => { console.log(res)
                    if(res.data.success){
                        this.loaderShow = false   
                        this.$toasted.show('Dish submitted successfully.',{duration: 1000})  
                        window.location.href = '/dish/list'

                    } else {
                        this.loaderShow = false   
                        this.$toasted.show('Something went wrong!',{duration: 1000})  

                    }  
                }).catch(err => {
                    this.loaderShow = false   
                    this.$toasted.show('Something went wrong!',{duration: 1000})  
                })

            },

             updateDish() {
                let picture =  this.$refs.file_picture.files[0]    
                var formData = new FormData()
                for (let field in this.$data.form) {
                    if(field != 'minutes' & field != 'hours')
                        formData.append(field, this.$data.form[field])
                    else if(field == 'hours'){
                        formData.append(field, (this.$data.form[field] * 60) + parseInt(this.$data.form.minutes))
                    }  
                }
                formData.append('file_picture', picture) 
                formData.append('_method', 'PUT')

                //this.$toasted.show('Updating dish...',{duration: 2000})   
                axios.post('/api/v1/dish/'+this.form.id, formData, {
                    headers: {
                            'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => { console.log(res)
                    if(res.data.success){   
                        this.loaderShow = false   
                        this.$toasted.show('Dish updated successfully.',{duration: 1000})  
                        window.location.href = '/dish/list'

                    } else {
                        this.loaderShow = false  
                        this.$toasted.show('Something went wrong!',{duration: 1000})  

                    }  
                }).catch(err => {
                    this.loaderShow = false  
                    this.$toasted.show('Something went wrong!',{duration: 1000})  
                })

            },

            loadDish() { 
            console.log(this.$route.params.id)

                axios.get('/api/v1/dish/' + this.$route.params.id)
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log('data arrived')
                        this.form = res.data.success.data.dish
                        this.form.minutes = res.data.success.data.dish.hours % 60
                        this.form.hours = Math.floor(res.data.success.data.dish.hours / 60)  
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })

            }

            
        }
    }
</script>
