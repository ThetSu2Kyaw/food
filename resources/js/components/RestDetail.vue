<template>
    <div>
        <div class="container flex flex-col flex-wrap justify-center items-center mx-auto mt-4" v-if="show_order_detail">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-0 w-full mt-6 md:gap-0">
                <div class="col-span-2">
                    <!-- <img src="https://img.freepik.com/premium-photo/big-hamburger-with-double-beef-french-fries_252907-8.jpg?w=2000" alt="" style="height: 300px; width: 100%;"> -->
                    <img :src="restaurant.image_src" alt="" style="height: 300px; width: 100%;">
                    <div class="bg-gray-100 p-4">
                        <h3 class="text-2xl">{{restaurant.name}}</h3>
                        <h5>Main Menu</h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 w-full mt-6 md:gap-4">

                            <div class="p-4 max-w-sm bg-white border border-gray-200 shadow-md rounded" v-for="menu in restaurant.menus" :key="menu.id">
                                <div class="flex">
                                    <div>
                                        <h3 class="text-lg leading-3 tracking-tight">{{menu.name}}</h3>
                                        <p class="text-gray-500 leading-4 tracking-tight font-xs font-thin my-2">{{menu.description}}</p>
                                        <h2 class="text-xl leading-3 tracking-tight">MMK {{menu.price}}</h2>
                                    </div>
                                    <div v-if="menu.image_src" class="relative">
                                        <!-- <h1>Hello</h1> -->
                                        <img :src="menu.image_src" alt="" style="width: 100px; height: 100px;" class="ml-2 rounded">
                                        <span class="bg-amber-500 h-8 w-8 rounded-full flex items-center justify-center shadow-sm absolute bottom-2 right-0 cursor-pointer" @click="addMenu(menu)">+</span>
                                    </div>
                                    <div v-else class="relative">
                                        <img src="https://media.baamboozle.com/uploads/images/152185/1607591595_198751" alt="" style="width: 100px; height: 100px;" class="ml-2 rounded">
                                        <span class="bg-amber-500 h-8 w-8 rounded-full flex items-center justify-center shadow-sm absolute bottom-2 right-0 cursor-pointer" @click="addMenu(menu.id)">+</span>
                                    </div>
                                    
                                </div>    
                            </div>
                
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex justify-center align-center">
                        <img src="/assets/img/cart.png" alt="">
                    </div>
                    <div class="text-center text-sm">
                        Congrats! You get free delivery.
                    </div>
                    <div class="bg-gray-300 w-100 h-2 rounded mt-2"></div>
                    <div class="flex flex-col mt-4">
                        
                        <div v-for="cart in carts" :key="cart.id">
                
                            <div class="p-4 max-w-sm bg-white">
                            <div class="flex">
                                <img :src="cart.image_src" alt="" style="width: 100px; height: 100px;" class="mr-2 rounded">
                                <div>
                                
                                    <div class="flex justify-between">
                                        <h3 class="text-xl leading-3 tracking-tight">{{cart.name}}</h3>
                                        <div style="position:relative; top: -5px;" @click="delete_menu(cart.id)">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="cursor-pointer">
                                                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    <p class="text-gray-500 leading-4 tracking-tight font-xs font-thin my-2">{{cart.description}}</p>
                                    <div class="flex justify-between items-center">
                                        <h2 class="text-lg leading-3 tracking-tight">MMK {{cart.total_price}}</h2>
                                        <div class="border border-green-700 px-3 py-1 rounded">
                                            <span class="cursor-pointer" @click="cart.qty--; cart.total_price -= cart.price;count_total()" v-show="cart.qty > 1">-</span>
                                            {{cart.qty}}
                                            <span class="cursor-pointer" @click="cart.qty++; cart.total_price += cart.price;count_total()">+</span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>    
                        </div>
                        <hr>
                        </div>

                        <div class="p-4 max-w-sm bg-white text-gray-500">
                            <div class="flex justify-between">
                                <div>Subtotal</div>
                                <div>MMK {{total}}</div>
                            </div>
                            <div class="flex justify-between">
                                <div>tax</div>
                                <div>MMK 0</div>
                            </div>
                            <div class="flex justify-between font-bold">
                                <div>Total (Incl. tax)</div>
                                <div>MMK {{total}}</div>
                            </div>
                            
                            <button class="btn bg-amber-500 text-white font-bold p-2 my-4 rounded w-full hover:bg-amber-400" @click="submitOrder()" type="button" v-if="carts.length > 0 && !orderLoading">Go to checkout</button>
                            <span v-if="carts.length > 0 && orderLoading" class="flex justify-center w-100 mt-8">
                                <!-- Loading... -->
                                <div role="status">
                                    <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin fill-amber-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </span>
                        </div>


                        <!-- <div class="p-4 max-w-sm bg-white">
                            <div class="flex">
                                <img src="https://media.baamboozle.com/uploads/images/152185/1607591595_198751" alt="" style="width: 100px; height: 100px;" class="mr-2">
                                <div>
                                
                                    <div class="flex justify-between">
                                        <h3 class="text-lg leading-3 tracking-tight">Fried Chicken</h3>
                                        <div style="position:relative; top: -5px;">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="cursor-pointer">
                                                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    <p class="text-gray-500 leading-4 tracking-tight font-xs font-thin my-2">Roasted pumpkin with cumin and turmeric full of flvor on the top ...</p>
                                    <h2 class="text-xl leading-3 tracking-tight">MMK 2,300</h2>
                                </div>
                               
                            </div>    
                        </div>
                        <hr> -->
                    </div>
                </div>
            </div>
        </div>

        <div v-else>
            
              <!-- component -->
<div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-transparent font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-3">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-amber-500 text-gray-600 uppercase text-sm leading-normal">
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

        </div>


    </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';
export default {
    props: ['restaurant', 'order_id'],
    setup(props){
        let orderLoading = ref(false);
        let carts = ref([]);
        let order_id = ref('');
        let total = ref(0);
        let final_total = ref(0);
        let show_order_detail = ref(true);
        let orders = ref([]);
        let order_details = ref('');
        let delete_menu = (id) => {
            carts.value = carts.value.filter(menu => {
                return menu.id != id;
            });
        };
        let submitOrder = () => {
            orderLoading.value = true;
            if(!localStorage.getItem('token')){
                alert("You need to Sign In first!");
                orderLoading.value = false;
                return;
            }
            axios.post("/api/orders", {
                // customer_id : 1,
                restaurant_id: props.restaurant.id,
                is_finish: 0,
                remark: null,
                carts: carts.value,
                total: total.value,
            }, {
                headers: {
                    'Authorization': 'Bearer '+localStorage.getItem('token')  
                }
            }).then(function(res){
                orderLoading.value = false;
                alert("successfully order");
                carts.value = [];
                final_total.value = total.value;
                total.value = '';
                order_id.value = res.data.data.order_details.order_id;
                window.location.href = "http://food.test/account";
                // orders.value = res.data.data.orders;
                // order_details.value = res.data.data.order_details;
                // console.log(res.data.data);
                show_order_detail.value = false;
            }).catch(function(error){
                console.log(error);
            });


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

        }
        let count_total = () => {
           total.value = 0;
           carts.value.forEach((cart) => {
                total.value += cart.total_price;
           });
        }
        let increase_price = (price) => {
            price = parseInt(price);
            price += price;
        }
        let addMenu = (menu) => {
            let obj = {           
                "menu_id": menu.id,
                "image_src": menu.image_src,
                "qty": 1,
                "name": menu.name,
                "price": parseInt(menu.price),
                "total_price": parseInt(menu.price),
                "description": menu.description
            };
            carts.value.push(obj);
            count_total();
        };

        let currentDateTime = () => {
            const current = new Date();
            const date = current.getFullYear()+'-'+(current.getMonth()+1)+'-'+current.getDate();
            const time = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
            const dateTime = date +' '+ time;

            return dateTime;
        }
        
        return {
            addMenu, 
            carts, 
            delete_menu, 
            total, 
            increase_price, 
            count_total, 
            submitOrder, 
            orderLoading,
            show_order_detail,
            orders,
            order_details,
            order_id,
            final_total,
            currentDateTime
        };
    }
}
</script>

<style>

</style>