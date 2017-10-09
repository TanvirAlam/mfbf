import Vue from 'vue'
import store from './store'
import router from './router'
import App from './components/App.vue'
import VeeValidate from 'vee-validate'
import VueSweetAlert from 'vue-sweetalert'
import './utils/interceptors'

const config = {
  errorBagName: 'errors', // change if property conflicts.
  fieldsBagName: 'fields',
  delay: 0,
  locale: 'en',
  dictionary: null,
  strict: true,
  classes: false,
  classNames: {
    touched: 'touched', // the control has been blurred
    untouched: 'untouched', // the control hasn't been blurred
    valid: 'valid', // model is valid
    invalid: 'invalid', // model is invalid
    pristine: 'pristine', // control has not been interacted with
    dirty: 'dirty' // control has been interacted with
  },
  events: 'input|blur',
  inject: true,
  validity: true,
  aria: true
};

Vue.use(VeeValidate, config);
Vue.use(VueSweetAlert)

Vue.component('icon', require('./components/Icon'))
Vue.component('alert', require('./components/Alert'))
Vue.component('loader', require('./components/Loader'))
Vue.component('flash', require('./components/Flash'))

const app = new Vue({
    el: '#app',
    store,
    router,
    ...App
})

app.$mount('#app')
