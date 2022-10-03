<template>
    <div>
    <nav class="px-2 bg-white text-orange-600">
  <div class="container flex flex-wrap justify-between items-center mx-auto mt-4 md:mt-0 ">
    <a href="#" class="flex items-center">
        <img src="/assets/img/food1.png" class="mr-1 h-6 sm:h-10" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-amber-600">Foody</span>
    </a>
    <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex justify-center items-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300" aria-controls="navbar-multi-level" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
      <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
        <li class="cursor-pointer">
          <a @click="home()" class="block mt-3 py-2 pr-4 pl-3 text-lg hover:bg-gray-100 md:hover:bg-transparent rounded md:bg-transparent md:text-amber-600 md:p-0 hover:text-amber-500" aria-current="page">Home</a>
        </li>
        <!-- <li>
          <a @click="menu()" class="block mt-3 py-2 pr-4 pl-3 text-lg hover:bg-gray-100 md:hover:bg-transparent rounded md:bg-transparent md:text-amber-600 md:p-0 hover:text-amber-500" aria-current="page">Menu</a>
        </li> -->
        <li class="cursor-pointer">
          <a class="block mt-3 py-2 pr-4 pl-3 text-lg rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:text-amber-600 hover:text-amber-500">About Us</a>
        </li>
        <li class="cursor-pointer" v-if="check_account()">
          <a @click="account()" class="block mt-3 py-2 pr-4 pl-3 text-lg rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:text-amber-600 hover:text-amber-500">Account</a>
        </li>
        <li class="cursor-pointer" v-if="!check_account()">
          <a @click="signIn()" class="mt-2 block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">
            <button type="button" class="text-white bg-amber-500 hover:bg-amber-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none flex items-center justify-center font-bold">Sign In</button>
          </a>
        </li>
        <li class="cursor-pointer" v-if="check_account()">
          <a @click="logout()" class="mt-2 block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">
            <button type="button" class="text-white bg-amber-500 hover:bg-amber-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none flex items-center justify-center font-bold">Logout</button>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
</template>
<script>
import axios from 'axios';
  export default{
    setup(){
        let signIn = () => {
            window.location.href = "http://food.test/login";
        }
        let home = () => {
            window.location.href = "http://food.test/";
        }
        let check_account = () => {
           if(localStorage.getItem('token')){
            return true;
           }else{
            return false;
           }
        }
        let account = () => {
            window.location.href = "http://food.test/account";
        }
        let logout = () => {
          localStorage.clear();
          window.location.href = "http://food.test";
          //  window.location.href = "http://food.test/api/customer/logout";
          // axios.post("/api/customers/logout", 
          // {
          //   headers: {
          //           'Authorization': 'Bearer '+localStorage.getItem('token')
          //       }
          // })
          // .then((res) => {
          //   localStorage.clear();
          //   console.log(res.data);
          // })
          // .catch((error) => {
          //   console.log(error);
          // });
        }
        return {signIn, home, check_account, account, logout};
    }
  }
</script>
<style>
    .bg-color{
        background: #fd7e14;
    }
    .bg-color:hover{
        background: #f89647;
    }
    .color-orange{
        color: #fd7e14;
    }
    .color-orange::after{
        height: 10px;
        width: 10px;
        background-color: #fd7e14;
    }
    .color-orange:hover{
        color: #f89647;
    }

</style>