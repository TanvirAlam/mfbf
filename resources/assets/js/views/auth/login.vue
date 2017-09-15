<template>
    <div class="container is-centered box notification">
        <form @submit.prevent="validateBeforeSubmit">
            <article class="tile is-child">
                <p class="subtitle">Login</p>
                <div class="field">
                    <p :class="{ 'control': true }" class="control has-icons-left has-icons-right">
                        <input
                                v-model="email"
                                v-validate="'required|email'"
                                :class="{'input': true, 'is-danger': errors.has('email') }"
                                data-vv-delay="1000"
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
                <div class="field">
                    <p class="control has-icons-left">
                        <input v-validate="'required'" v-model="password" class="input" type="password" placeholder="Password">
                        <span class="icon is-small is-left">
                      <i class="fa fa-lock"></i>
                    </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" v-model="rememberMe">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Remember Me</span>
                        </label>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button :disabled="errors.any()" type="submit" class="button is-success">
                            Login
                        </button>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <router-link :to="{ name: 'auth.register' }">Register</router-link>
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
  import { Validator } from 'vee-validate';
  import axios from 'axios'

export default {
  name: 'login',

  metaInfo: { titleTemplate: 'Login | %s' },

  data () {
    return {
      email: '',
      password: '',
      rememberMe: false
    }
  },

  methods: {
/*    login () {
      this.form.post('/api/login')
        .then(({ data }) => {
          this.$store.dispatch('saveToken', {
            token: data.token,
            remember: this.form.remember
          })

          this.$store.dispatch('fetchUser').then(() => {
            this.$router.push({ name: 'home' })
          })
        })
    },*/

    login () {
      this.$store.dispatch('login', {
        email: this.email,
        password: this.password
      })

      this.clickHandler()

    },

    clickHandler () {
      this.$router.push({
        name: 'Dashboard',
        params: { email: this.email }
      });
    },

    validateBeforeSubmit() {
      this.$validator.validateAll().then(() => this.login())
    },
  }
}
</script>
