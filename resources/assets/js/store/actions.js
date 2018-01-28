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

  searchCategory: ({ commit }, {query}) => {
    console.log(query)
    axios.post(`/api/income/search`, {
      query
    })
  },

  saveCategory: ({ commit }, {query}) => {
    console.log(query)
    axios.post(`/api/income/category/save`, {
      query
    })
  },

  deleteCategory: ({ commit }, {query}) => {
    console.log(query)
    axios.post(`/api/income/category/delete`, {
      query
    })
  },

  fetchUser: ({ commit }) => {
    const user = axios.get('/api/user')

    //console.log(user)
    if (user) {
      commit('FETCH_USER_SUCCESS', user)
    } else {
      commit('FETCH_USER_FAILURE')
    }
  },

  saveToken ({ commit }, payload) {
    commit('SAVE_TOKEN', payload)
  },

  logout: ({ commit }) => {
    commit('LOGOUT')
  }
}
