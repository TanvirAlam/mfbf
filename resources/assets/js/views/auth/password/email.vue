<template>

</template>

<script>
import Form from 'vform'

export default {
  metaInfo: { titleTemplate: 'Reset Password | %s' },

  data: () => ({
    status: null,
    form: new Form({ email: '' })
  }),

  methods: {
    send () {
      this.form.post('/api/password/email')
        .then(({ data: { status }}) => {
          this.form.reset()
          this.status = status
        })
    }
  }
}
</script>
