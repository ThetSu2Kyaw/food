import './bootstrap';
import axios from 'axios';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import HomeComponent from './components/HomeComponent.vue';
import RestComponent from './components/RestComponent.vue';
import SignUp from './components/SignUp.vue';
import LogIn from './components/LogIn.vue';
import AccountComponent from './components/AccountComponent.vue';
const app = createApp({})

app.component('home-component', HomeComponent);
app.component('rest-component', RestComponent);
app.component('sign-up', SignUp);
app.component('log-in', LogIn);
app.component('account-component', AccountComponent);

app.mount("#app");
