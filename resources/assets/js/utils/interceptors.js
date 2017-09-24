import axios from 'axios'
import store from '../store'
import swal from 'sweetalert2'

axios.interceptors.request.use(
  config => {
    //console.log(store.getters.authToken)
    if (store.getters.authToken) {
      config.headers.common['Authorization'] = `Bearer ${store.getters.authToken}`
    }

    return config
  },
  error => Promise.reject(error)
)

