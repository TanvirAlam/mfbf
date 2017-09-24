const SAVE_TOKEN = 'SAVE_TOKEN'
const FETCH_USER = 'FETCH_USER'
const FETCH_USER_SUCCESS = 'FETCH_USER_SUCCESS'
const FETCH_USER_FAILURE = 'FETCH_USER_FAILURE'
const LOGOUT = 'LOGOUT'

export default {
  SAVE_TOKEN: (state, { token }) => {
    state.token = token
    localStorage.setItem("token", token);
  },

  FETCH_USER_SUCCESS: (state, { user }) => {
    state.user = user
  },

  FETCH_USER_FAILURE: (state) => {
    state.token = null
    localStorage.removeItem('token')
  },

  LOGOUT: (state) => {
    state.user = null
    state.token = null
    localStorage.removeItem('token')
  },
}
