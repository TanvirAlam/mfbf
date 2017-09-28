<template>
  <form @submit.prevent="validateBeforeSubmit">
    <section class="hero is-fullheight is-dark is-bold">
      <div class="hero-body">
        <div class="container">
          <div class="columns is-vcentered">
            <div class="column is-4 is-offset-4">
              <h1 class="title">
                Register
              </h1>
              <div class="box">
                <label class="label">Email</label>
                <p :class="{ 'control': true }" class="control has-icons-left has-icons-right">
                  <input
                          v-model="email"
                          v-validate="'required|email|unique'"
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
                <label class="label">Password</label>
                <p class="control">
                  <input v-validate="'required'" v-model="password" name="password" type="password" class="input" placeholder="Password">
                </p>
                <p class="control">
                  <input v-model="passwordConfirmation" v-validate="'required|confirmed:password'" name="passwordConfirmation" type="password" class="input" placeholder="Password, Again" data-vv-as="password">
                </p>
                <div class="alert alert-danger" v-show="errors.any()">
                  <div v-if="errors.has('passwordConfirmation')" class="help is-danger">
                    {{ errors.first('passwordConfirmation') }}
                  </div>
                </div>
                <p class="control">
                  <button :disabled="errors.any()" type="submit" class="button is-success">
                    Submit
                  </button>
                </p>
              </div>
              <p class="has-text-centered">
                <router-link :to="{ name: 'auth.login' }">Login</router-link>
                |
                <a href="#">Facebook</a> | <a href="#">Google</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</template>

<script>
  import { Validator } from 'vee-validate';
  import axios from 'axios'

  const isUnique = value => new Promise((resolve) => {
    setTimeout(() => {
      return axios.post('/api/checkEmail', { email: value }).then((response) => {
        if(response.data.exist) {
          return resolve({
            valid: false,
            data: {
              message: `${value} is already taken.`
            }
          });
        } else {
          return resolve({
            valid: true
          });
        }
      });
    }, 200);
  });

  Validator.extend('unique', {
    validate: isUnique,
    getMessage: (field, params, data) => {
      return data.message;
    }
  });

  export default {
    name: 'register',

    metaInfo: { titleTemplate: 'Register | %s' },

    data () {
      return {
        email: '',
        password: '',
        passwordConfirmation: ''
      }
    },

    methods: {
      register () {
        this.$store.dispatch('register', {
          email: this.email,
          password: this.password,
          passwordConfirmation: this.passwordConfirmation
        })

        this.clickHandler()
      },

      validateBeforeSubmit() {
        this.$validator.validateAll().then((result) => {
          if (result) {
            this.register()
          }
        })
      },

      clickHandler () {
        this.$router.push({
          name: 'auth.verification',
          params: { email: this.email }
        });
      }
    }


  }
</script>
