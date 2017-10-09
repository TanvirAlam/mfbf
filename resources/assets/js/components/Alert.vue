<template>
    <article class="message is-success" v-show="show">
        <slot></slot>
    </article>
</template>

<script>
    export default {
      props: {
        timeout: { default: 3000 }
      },

      data () {
        return { show: true }
      },

      mounted () {
        setTimeout(
          () => this.show = false,
          this.timeout
        )
      },

      methods: {
        hide () {

        }
      }
    }
</script>

<style>

</style>