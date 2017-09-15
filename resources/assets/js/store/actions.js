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
}
