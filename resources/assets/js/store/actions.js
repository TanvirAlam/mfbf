import axios from 'axios'

export default {
  register: ({ commit }, { email, passwordConfirmation }) => {
    axios.post(`/api/register`, { email, password_confirmation: passwordConfirmation })
      .then(
        ({ data }) => {
          //console.log(data)
        },
        (error) => {
          console.log(error)
        }
      )
  },
}
