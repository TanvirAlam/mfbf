<template>
  <div class="container is-centered box notification">
    <form @submit.prevent="validateBeforeSubmit">
      <article class="tile is-child">
        <p class="subtitle">Register</p>
        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left has-icons-right">
            <p :class="{ 'control': true }" class="control has-icons-left has-icons-right">
              <input
                      v-model="email"
                      v-validate="'required|email'"
                      :class="{'input': true, 'is-danger': errors.has('email') }"
                      data-vv-delay="1000"
                      :keyup="checkEmail"
                      name="email"
                      type="text"
                      placeholder="Email">
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
          <input v-model="passwordConfirmation" v-validate="'required|confirmed:password'" name="passwordConfirmation" type="password" class="input" placeholder="Password, Again" data-vv-as="password">
        </div>
        <div class="alert alert-danger" v-show="errors.any()">
          <div v-if="errors.has('passwordConfirmation')" class="help is-danger">
            {{ errors.first('passwordConfirmation') }}
          </div>
        </div>
        <div class="field">
          <p class="control">
            <vue-recaptcha :sitekey="sitekey"></vue-recaptcha>
          </p>
        </div>
        <div class="field">
          <p class="control">
            <button :disabled="errors.has('passwordConfirmation')" type="submit" class="button is-success">
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
  import VueRecaptcha from 'vue-recaptcha'

  export default {
    name: 'register',

    metaInfo: { titleTemplate: 'Register | %s' },

    data: () => ({
      email: '',
      password: '',
      passwordConfirmation: '',
      sitekey: '6LdUpy4UAAAAAOnpvNBQCUIkvfPMG185j7TvRlX4'
    }),

    components: {
      'vue-recaptcha': VueRecaptcha
    },

    methods: {
      register () {
        this.$store.dispatch('register', {
          email: this.email,
          passwordConfirmation: this.passwordConfirmation
        })

        this.clickHandler()
      },

      checkEmail: function(event) {
        alert(event.key)
      },

      login () {
        axios.post('/api/login')
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
          .then(() => this.register())
          .catch(function(e) {
            console.log(e)
          })
      },

      onSubmit: function () {
        this.$refs.invisibleRecaptcha.execute()
      },

      onVerify: function (response) {
        console.log('Verify: ' + response)
      },

      onExpired: function () {
        console.log('Expired')
      },

      resetRecaptcha () {
        this.$refs.recaptcha.reset() // Direct call reset method
      },

      clickHandler () {
        this.$swal('hello')
      }
    }
  }
</script>
