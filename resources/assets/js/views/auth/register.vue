<template>
  <div class="container is-centered box notification">
    <form id="demo" @submit.prevent="validateBeforeSubmit()">
      <article class="tile is-child">
        <p class="subtitle">Register</p>
        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left has-icons-right">
            <p :class="{ 'control': true }" class="control has-icons-left has-icons-right">
              <input v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" name="email" type="text" placeholder="Email">
              <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
              <span class="icon is-small is-left is-success">
                <i class="fa fa-envelope"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fa" :class="{'icon': true, 'fa-warning': errors.has('email') }"></i>
              </span>
            </p>
          </div>
        </div>
        <div class="field">
          <label class="label">Password</label>
          <input v-validate="'required'" name="password" type="password" class="input" placeholder="Password">
        </div>
        <div class="field">
          <label class="label">Confirm Password</label>
          <input v-validate="'required|confirmed:password'" name="password_confirmation" type="password" class="input" placeholder="Password, Again" data-vv-as="password">
        </div>
        <div class="alert alert-danger" v-show="errors.any()">
          <div v-if="errors.has('password_confirmation')">
            {{ errors.first('password_confirmation') }}
          </div>
        </div>
        <div class="field">
          <p class="control">
            <button :disabled="errors.has('password_confirmation')" class="button is-success">
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
    </form>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  name: 'register',

  metaInfo: { titleTemplate: 'Register | %s' },

  data: () => ({
    form: new Form({
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
    },

    validateBeforeSubmit() {
      this.$validator
        .validateAll()
        .then(function(response) {
          // Validation success if response === true
        })
        .catch(function(e) {
          // Catch errors
        })
    }
  }
}
</script>
