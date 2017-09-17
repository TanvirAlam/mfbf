import axios from 'axios'

export default {
  register: ({ commit }, { email, password, passwordConfirmation }) => {
    axios.post(`/api/register`, {
        email,
        password: password,
        password_confirmation: passwordConfirmation
    })
      .then(
        ({ data }) => {
          console.log(data)
        },
        (error) => {
          console.log(error)
        }
      )
  },

  login: ({ commit }, { email, password }) => {
    axios.post(`/api/login`, {
        email,
        password,
        token
    })
      .then(
        ({ data }) => {
          console.log(data)
        },
        (error) => {
          console.log(error)
        }
      )
  },

  fetchUser: ({ commit }) => {
    const user = axios.get('/api/user')
    if (user) {
      commit('FETCH_USER_SUCCESS', { user })
    } else {
      commit('FETCH_USER_FAILURE')
    }
  },

  saveToken ({ commit }, payload) {
      commit('SAVE_TOKEN', payload)
  },

  logout: ({ commit }) => {
    axios.post('/api/logout')
      .then(() => {
        commit('LOGOUT')
      })
  }
}
