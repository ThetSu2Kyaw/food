<template>
  <NavBarVue/>
  <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-transparent font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-3">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-amber-500 text-white uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Order ID</th>
                                <th class="py-3 px-6 text-left">Restaurant Image</th>
                                <th class="py-3 px-6 text-center">Restaurant Name</th>
                                <th class="py-3 px-6 text-center">Total</th>
                                <th class="py-3 px-6 text-center">Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light" v-for="order in orders" :key="order.id">
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <!-- <div class="mr-2">
                                            <img class="w-6 h-6" src="https://img.icons8.com/color/100/000000/vue-js.png"/>
                                        </div> -->
                                        <span class="font-medium">{{order.id}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <!-- <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        </div>
                                        <span>Anita Rodriquez</span> -->
                                        <img :src="order.restaurant.image_src" alt="" height="100" width="100">
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <!-- <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                    </div> -->
                                    <h3 class="font-bold">{{order.restaurant.name}}</h3>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <!-- <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Completed</span> -->
                                    <p>{{order.total}}</p>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <p>{{order.created_at}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <FooterVue></FooterVue>
</template>

<script>
import { onMounted, ref } from 'vue';
import NavBarVue from './NavBar.vue';
import FooterVue from './Footer.vue';
export default {
    components: {NavBarVue, FooterVue},
    setup(){
        let orders = ref([]);
        onMounted(() => {
            axios.get("/api/orders", {
                headers: {
                    'Authorization': 'Bearer '+localStorage.getItem('token')
                }
            })
            .then(function(res){
               console.log(res.data.data);
               orders.value = res.data.data.orders;
            })
            .catch(function(error){
                console.log(error);
            });
        });
        return {orders};
    }
}
</script>

<style>

</style>