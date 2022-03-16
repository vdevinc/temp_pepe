<template>

        <!--// Sidebar \\-->
        <div> 

            <div class="widget widget_popular_post bg" style="text-align: center; margin: 0px;border-bottom: none;padding-bottom: 0px;">
                <a href="#!"><img :src="user.avatar" alt="" style="width: 170px;border-radius: 50%;"></a>
                    <h4><b style="color:#B99563;" v-if="user">{{user.first_name}}</b></h4>
                
            </div>
            <!--// Widget Popular Post \\-->

            <!--// Widget Cetagories \\-->
            <div class="widget widget_cetagories bg" style="margin: 0px;border-top: none;padding-bottom: 329px;">
                <h2 class="widget-headings fm" style="font-size: 30px;color:#B99563;">My Dashboard</h2>
                <ul v-if="user">
                    <li><a href="/profile">Profile</a> </li>
                    <li v-if="user.role.slug == 'client'"><a href="/client/order/list">My Orders </a> </li>

                    <li v-if="user.role.slug == 'chef' && user.chef.is_approved"><a href="/dish/list">My Dishes </a> </li>
                    <li v-if="user.role.slug == 'chef' && user.chef.is_approved"><a href="/dish/create">Add a Dish</a> </li>
                    <li v-if="user.role.slug == 'chef' && user.chef.is_approved"><a href="/chef/order/list">Orders</a> </li>
                    <li v-if="user.role.slug == 'chef' && user.chef.is_approved"><a href="/chef/wallet">Wallet</a> </li>
                    <li v-if="user.role.slug == 'chef' && user.chef.is_approved"><a href="/chef/bank">Bank Account</a> </li>

                
                </ul>
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
