require('./bootstrap');

import Vue from 'vue'
import HomeComponent from "./components/HomeComponent";

Vue.component('home-component', HomeComponent);

const app = new Vue({
    el: '#app',
});
