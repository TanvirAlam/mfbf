import Vue from 'vue'
import Vuex from 'vuex'
import Cookies from 'js-cookie'

import getters from './getters'
import actions from './actions'
import mutations from './mutations'
import modules from './modules'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      user: null,
      token: Cookies.get('token'),
      isLogged: !!localStorage.getItem('token')
    },
    modules,
    getters,
    actions,
    mutations
})
