<template>
    <div class="container is-centered box notification">
        <article class="message is-success">
            <div class="message-header">
                <p>Verify Your Email Address</p>
            </div>
            <div class="message-body">
                We now need to verify your email address. We've sent an email to <strong>{{ email }}</strong>
                to verify your address. Please click the link in that email to verify.
            </div>
            <hr>
            <p class="control">
                <a v-on:click="resendEmail" class="button is-primary">
                    Resend Email
                </a>
            </p>

            <div class="field">
                <p class="control">
                    <router-link :to="{ name: 'auth.login' }">Login</router-link>
                </p>
            </div>
        </article>
    </div>
</template>

<script>
  import axios from 'axios'

  export default {
    props: ['email'],

    methods: {
      resendEmail () {
        this.$store.dispatch('resendEmail', {
          email: this.email
        })
      },
    }
  }
</script>
