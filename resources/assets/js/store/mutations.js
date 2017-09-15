import Cookies from 'js-cookie'

const SAVE_TOKEN = 'SAVE_TOKEN'
const FETCH_USER = 'FETCH_USER'
const FETCH_USER_SUCCESS = 'FETCH_USER_SUCCESS'
const FETCH_USER_FAILURE = 'FETCH_USER_FAILURE'
const LOGOUT = 'LOGOUT'

export default {
  SAVE_TOKEN: (state, { token, remember }) => {
    state.token = token
    Cookies.set('token', token, { expires: remember ? 365 : null })
  },

  FETCH_USER_SUCCESS: (state, { user }) => {
    state.user = user
  },

  FETCH_USER_FAILURE: (state) => {
    state.token = null
    Cookies.remove('token')
  },

  LOGOUT: (state) => {
    state.user = null
    state.token = null

    Cookies.remove('token')
  },
}
