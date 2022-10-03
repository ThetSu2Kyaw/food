<template>
  <div>
    <!-- <div class="container flex flex-col flex-wrap justify-center items-center mx-auto mt-4 md:mt-0">
        <div>
            <p>Hello, Su Su</p><br>
            <p>What would you like to eat?</p>
        </div> 
    </div> -->
    <div class="container flex flex-col flex-wrap justify-center items-center mx-auto mt-8 md:mt-0">
        <form class="flex items-center w-1/2 mt-4">   
            <label for="simple-search" class="sr-only">Search Restaurant</label>
            <div class="relative w-full">
                <button type="submite">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 cursor-pointe top-5">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                </button>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 p-2.5" placeholder="Search" required>
            </div>
            <!-- <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button> -->
        </form>
    </div>
    <div class="container flex flex-col flex-wrap justify-center items-center mx-auto mt-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full mt-6 md:gap-0">
            <div v-for="restaurant in restaurants" :key="restaurant.id">
                <a @click="showRestaurantDetail(restaurant.id)">
                    <div class="flex flex-col rounded-md border-2 border-gray-300 cursor-pointer" style="width: 90%; margin: auto; margin-bottom: 25px;">
                    <img src="https://dalivonebokeotour.weebly.com/uploads/4/4/8/3/44836601/1516816_orig.jpg" alt="" class="rounded-t" style="height: 200px;">
                    <div class="bg-white mx-4 text-amber-500 my-4">
                        <div class="flex justify-between">
                            <h3>{{restaurant.name}}</h3>
                            <div class="flex">
                                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                                </svg>
                                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                                </svg>
                                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" />
                                </svg>
                            </div>
                        </div>
                        <p>{{restaurant.restaurant_category.name}}</p>
                        <p>{{restaurant.township.name}}</p>
                        <p>
                            <div v-if="restaurant.is_open">
                                Open
                            </div>
                            <div v-else>
                                Close
                            </div>
                        </p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';
import { onMounted } from 'vue';
export default {
    // props: ['restaurants'],
    setup(){
        let restaurants = ref([]);

        let showRestaurantDetail = (id) => {
            window.location.href = 'http://food.test/restaurants/'+ id;
        }
        // let getUser = () => {
        //     axios.get('/admin/restaurants').then((response)=> {
        //         console.log(response.data);
        //         // restaurants.value = response.data;
        //     });
        // }
        onMounted(()=> {
            axios.get('/api/restaurants').then((res) => {
                restaurants.value = res.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
            
        });
        return {restaurants, showRestaurantDetail};
    },
    
}
</script>

<style>
/* .text{
    width: 80%;
    margin: auto;
}
.search-button{
    left: 100px;
    top: 20px;
    cursor: pointer;
} */
</style>