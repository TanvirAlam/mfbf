import Vue from 'vue'
import store from './store'
import router from './router'
import App from './components/App.vue'
import VeeValidate from 'vee-validate'
import VueSweetAlert from 'vue-sweetalert'
import './utils/interceptors'
import Buefy from 'buefy'
import 'buefy/lib/buefy.css'

Vue.use(VeeValidate)
Vue.use(VueSweetAlert)
Vue.use(Buefy)

Vue.component('icon', require('./components/Icon'))
Vue.component('alert', require('./components/Alert'))
Vue.component('loader', require('./components/Loader'))
Vue.component('auto-amount',require('./components/Autonumaric'))
Vue.component('b-field')

const app = new Vue({
    el: '#app',
    store,
    router,
    ...App
})

app.$mount('#app')
