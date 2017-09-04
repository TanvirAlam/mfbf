<template>
    <div class="container is-centered box notification">
        <article class="tile is-child">
            <p class="subtitle">Login</p>
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email">
                    <span class="icon is-small is-left">
                      <i class="fa fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                      <i class="fa fa-check"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Password">
                    <span class="icon is-small is-left">
                      <i class="fa fa-lock"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-success">
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
    </div>
</template>

<script>
import Form from 'vform'

export default {
  name: 'login',

  metaInfo: { titleTemplate: 'Login | %s' },

  data: () => ({
    form: new Form({
      email: '',
      password: '',
      remember: false
    })
  }),

  methods: {
    login () {
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
    }
  }
}
</script>
