<template>
    <div id="app">
        <section class="content">
            <router-view></router-view>
        </section>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        components: {
        },
        computed: mapGetters({
          isLogged: 'authCheck',
        })
    }
</script>

<style lang="scss">
    @import '~animate.css';
    .animated {
        animation-duration: .377s;
    }

    @import '~bulma';

    html {
        background-color: whitesmoke;
    }
</style>
