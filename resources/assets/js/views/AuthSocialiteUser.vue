<template>

</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import { Validator } from 'vee-validate';
  import axios from 'axios'

  export default {
    mounted () {
      axios.post('/api/sociallite')
        .then(response => {
          console.log(response)
          this.$store.dispatch('saveToken', {
            token: response.data.token
          })
          this.$store.dispatch('fetchUser').then(() => {
            this.$router.push({
              name: 'Dashboard',
              params: { email: this.email }
            });
          })
        }).catch(error => {
      })
    }
  }
</script>
