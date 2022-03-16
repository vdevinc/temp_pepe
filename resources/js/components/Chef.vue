<template>

<div class="row">
    <div class="col-md-12">
        <div class="hotmeal-team-detail">
            <div class="row">
                <div class="col-md-3">
                    <div class="hotmeal-modern-gallery-wrap" style=" width: 285px;">
                    <figure class="hotmeal-team-thumb"><img :src="chef.avatar_large_url" alt=""></figure>
                    </div>
                </div>
                <div class="col-md-9" style="    padding-left: 50px;">
                    <div class="hotmeal-team-detail-text">
                        <h2>{{chef.full_name}}</h2>
                         <!-- <div class="ratings">
                                                    <div class="empty-stars"></div>
                                                    <div class="full-stars" :style="{width: '0%'}"></div>
                                                </div> -->
                        <br>
                     
                        <p>{{chef.about}}</p>
                        <!-- <p>Fusce pulvinar tortor viverra aliquam semper. Cras in sapien ultrices, molestie sapien ac, sodales leo. Aenean ultricies tellus eget sem viverra, eu venenatis ipsum congue. Vivamus malesuada nunc nibh. Aenean eu leo nec sapien ornare luctus et at justo.</p> -->
                        <!-- <div class="hotmeal-shop-social">
                            <ul>
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i> <span class="btn-shape"></span></a></li>
                                <li><a href="https://twitter.com/login"><i class="fa fa-twitter"></i> <span class="btn-shape"></span></a></li>
                                <li><a href="https://www.linkedin.com/uas/login"><i class="fa fa-linkedin"></i> <span class="btn-shape"></span></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        
        <h2 class="hotmeal-section-heading">My Special Dishes</h2>
        <div class="hotmeal-gallery hotmeal-modern-gallery ">
            <ul class="row">
                <li class="col-md-3 element-item Bevrages" v-for="dish in chef.dishes" :key="dish.id">
                    <div class="hotmeal-modern-gallery-wrap">
                        <figure>
                        <a :href="'/dish/'+dish.id" style="width: 220px;"><img :src="dish.picture_url?dish.picture_url:'/extra-images/modern-gallery-img1.jpg'" alt="" ></a>
                            <figcaption>
                                <h5><a :href="'/dish/'+dish.id">{{dish.name}}</a></h5>
                                <span><a :href="'/dish/'+dish.id">{{dish.cuisine_type}}</a></span>
                            </figcaption>
                        </figure> <br/><br/><br/><br/><br/>
                    </div>
                </li>

            </ul>
        </div>
    </div>

</div>


</template>

<script>


    export default {
        data () {
            return {
                chef: '',
            }
        },
        created: function(){ 
            this.loadChef()

        },
       
        methods: {

            loadChef() {
                axios.get('/api/v1/chef/'+this.$route.params.id)
                .then(res => { 
                    console.log(res)
                    if(res.data.success){   console.log(res.data.success)
                        this.chef = res.data.success.data.chef
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
<style type="text/css">
    figure img{width: 263px;
    height: 219px;}
</style>
