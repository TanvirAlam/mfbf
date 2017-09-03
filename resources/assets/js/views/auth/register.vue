<template>
  <div class="container is-centered box notification">
    <article class="tile is-child">
      <p class="subtitle">Register</p>
      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
          <span class="icon is-small is-left">
            <i class="fa fa-envelope"></i>
          </span>
                <span class="icon is-small is-right">
            <i class="fa fa-warning"></i>
          </span>
        </div>
        <p class="help is-danger">This email is invalid</p>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <input class="input" type="password" placeholder="Password" name="password">
      </div>
      <div class="field">
        <label class="label">Confirm Password</label>
        <input class="input" type="password" placeholder="Password" name="cpassword">
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-success">
            Submit
          </button>
        </p>
      </div>
      <div class="field">
        <p class="control">
          <router-link :to="{ name: 'auth.login' }">Login</router-link>
        </p>
      </div>
      <div class="field">
        <p class="control">
          <a href="#">Facebook</a> | <a href="#">Google</a>
        </p>
      </div>
    </article>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  name: 'register',

  metaInfo: { titleTemplate: 'Register | %s' },

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    })
  }),

  methods: {
    register () {
      this.form.post('/api/register')
        .then(() => this.login())
    },

    login () {
      this.form.post('/api/login')
        .then(({ data: { token }}) => {
          this.$store.dispatch('saveToken', { token })

          this.$store.dispatch('fetchUser').then(() => {
            this.$router.push({ name: 'home' })
          })
        })
    }
  }
}
</script>
