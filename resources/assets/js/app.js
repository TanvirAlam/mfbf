import Vue from 'vue'
import store from './store'
import router from './router'
import App from './components/App.vue'
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

Vue.component('icon', require('./components/Icon'))
Vue.component('loader', require('./components/Loader'))

const app = new Vue({
    el: '#app',
    store,
    router,
    ...App
})

app.$mount('#app')
