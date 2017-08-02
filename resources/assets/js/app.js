import Vue from 'vue'

import store from './store'
import router from './router'

Vue.component('example', require('./components/Example.vue'))

const app = new Vue({
    el: '#app',
    store,
    router
})
