<template>
    <div>
        
        <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">
            <h1 class="text-2xl font-bold text-center text-amber-500 sm:text-3xl mb-4">
            Login to get started
            </h1>

            <form @submit.prevent="login()" class="p-8 mt-6 mb-0 space-y-4 rounded-lg shadow-2xl">
            <p class="text-lg font-medium text-center text-amber-500 font-bolder">Login</p>
            <div>
                <label for="email" class="text-sm font-medium">Email</label>

                <div class="relative mt-1">
                <input
                    type="email"
                    id="email"
                    class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                    placeholder="Email"
                    v-model="email"
                />

                <span class="absolute inset-y-0 inline-flex items-center right-4">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                    />
                    </svg>
                </span>

                </div>
            </div>

            <div>
                <label for="password" class="text-sm font-medium">Password</label>

                <div class="relative mt-1">
                <input
                    type="password"
                    id="password"
                    class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                    placeholder="Password"
                    v-model="password"
                />

                <span class="absolute inset-y-0 inline-flex items-center right-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
              />
            </svg>
          </span>
                </div>
            </div>

            <button
                type="submit"
                class="block w-full px-5 py-3 font-medium text-white bg-amber-500 rounded-lg font-bold"
            >
                Login
            </button>

            <!-- <p class="text-sm text-center text-gray-500">
                No account?
                <a class="underline" href="">Sign up</a>
            </p> -->

            <p style="text-align: center;" class="text-sm text-center text-gray-500">Don't have an account? <span style="cursor: pointer;" class="text-blue-600 underline" @click="toggleComponent()">Sign Up</span></p>

            </form>
        </div>
        </div>

    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
export default {    
    setup(){
        let email = ref("");
        let password = ref("");
        let toggleComponent = () => {
            window.location.href = 'http://food.test/signup/';
        }
        let login = () => {
            axios.post('/api/customers/login', {
                email: email.value,
                password: password.value
            }).then(function(res){
                localStorage.setItem('token', res.data.data.token);
                window.location.href = "http://food.test/"
            }).catch(function(error){
                console.log(error);
            });
        }
        return {toggleComponent, login, email, password};
    }
}
</script>

<style>

</style>