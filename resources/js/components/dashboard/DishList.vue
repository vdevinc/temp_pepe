<template>

    <div class="row">

        <!--// Sidebar \\-->
        <aside class="col-md-3">

          <dashboard-sidebar :user="user"/> 

        </aside>

        <div class="col-md-9">

            <section>
                <div class="hotmeal-main-section hotmeal-best-offerfull">
                    <div class="container dash-new" style="width:100%;">
                        <div class="row">
                            <div class="hotmeal-best-offer" style=" margin-top: -70px;">
                                <div class="row">
                                        <div class="hotmeal-best-offer-text">
                                            <h2 class="fm" style="font-size: 40px;font-weight: 200; color: #B99563;">&nbsp;&nbsp;My Dishes</h2> 
                                            <img src="/images/spice.png" class="mar-2 elam">
                                         <div class="col-md-12 col-sm-12 rules">
                                           <h6>
                                           A Pepe LE Chef Team Member is reviewing your deliciousness and will <br>confirm back once approved so you can start accepting orders and get that dough!.<br>You cannot edit dishes without contacting the Pepe Le Chef admin once it approved.<br> Contact <b>support@pepelechef.com</b> if you have further questions</h6>
                                        </div>
                                        <div class="col-md-12 col-sm-12 client-table">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr> 
                                                    <th></th>
                                                    <th>Dish</th>
                                                    <th> Cusine</th>
                                                    <th>Booking Type</th>
                                                    <th>Hours Taken </th>
                                                    
                                                    <th>Ingredients</th>
                                                    <th> Cost</th>
                                                    
                                                    <th>Edit</th>
                                                    <!-- <th>Delete</th> -->
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="dish in dishes" :key="dish.id">
                                                <td><img :src="dish.picture_url" width="58"></td>
                                                
                                                    <td>{{dish.name}}</td>
                                                    <td>{{dish.cuisine_type}}</td>
                                                    <td>{{dish.service_type.name}}</td>
                                                    <td>
                                                         {{(dish.hours/60) >= 1?parseInt(dish.hours/60) + ' Hours' :'' }}
                                                        &nbsp;{{(dish.hours % 60) > 0?(dish.hours%60) + ' Minutes' :'' }}
                                                    </td>
                                                    <td>{{dish.ingredients}}</td>
                                                    <td>$&nbsp;{{dish.cost}}
                                                    </td>

                                                    <td> <a :href="'/dish/edit/'+dish.id">
                                                    <button v-if="dish.is_approved==0" class="btn btn-block btn-primary" type="submit">Edit</button>
                                                    </a></td>

                                                    <!-- <td> <button class="btn btn-block btn-danger" type="submit">Delete</button></td> -->
                                                    
                                                </tr>

                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </section>


            
        </div>

    </div>    
  
</template>

<script>

    export default {
        data () {
            return {
                dishes: [],
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

            this.getDishes();


        },
       
        methods: { 

            getDishes() {  

                 axios.get('/api/v1/dish/list')
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        this.$data.dishes = res.data.success.data.dishes
                       // window.location.href = '/chef/dashboard'
                    }else {
                    }    
                }).catch(err => {
                    console.log(err)
                })


            }
           
            
        }
    }
</script>
