import Vue from 'vue'
import store from './store'
import router from './router'
import App from './components/App.vue'
import VeeValidate from 'vee-validate'
import VueSweetAlert from 'vue-sweetalert'
import './utils/form'
import './utils/interceptors'
import Buefy from 'buefy'
import 'buefy/lib/buefy.css'
import vSelect from 'vue-select'


Vue.use(VeeValidate);
Vue.use(VueSweetAlert)
Vue.use(Buefy)

Vue.component('icon', require('./components/Icon'))
Vue.component('alert', require('./components/Alert'))
Vue.component('loader', require('./components/Loader'))
Vue.component('autocomplete',require('./components/Autocomplete'))
Vue.component('b-field')
Vue.component('v-select', vSelect)

const EventBus = new Vue()

const app = new Vue({
    el: '#app',
    store,
    router,
    ...App
})

app.$mount('#app')
