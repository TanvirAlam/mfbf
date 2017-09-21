<template>
    <section class="hero is-bold topbar animated slideInDown">
        <div class="hero-head">
            <nav class="nav">
                <div class="nav-left">
                    <a class="nav-item is-hidden-tablet">
                        <i aria-hidden="true" class="fa fa-bars" v-on:click="toggleSidebar({ opened: sidebar.opened })"></i>
                    </a>
                </div>
                <div class="nav-center">
                    <a href="/" class="nav-item hero-brand">
                        <div class="is-hidden-mobile">
                            <span class="header-title-1">mfbf.</span><strong class="header-title-2">dk</strong>
                        </div>
                    </a>
                </div>
                <div class="nav-right is-flex"></div>
            </nav>
        </div>
    </section>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        name: 'topbar',

        computed: mapGetters({
          user: 'authUser',
          authenticated: 'authCheck'
        }),

        methods: mapActions({
            logout () {
              this.$store.dispatch('logout')
            },
        })
    }
</script>

<style lang="scss">
    @import '~bulma/sass/utilities/variables';
    @import '~bulma/sass/utilities/mixins';
    @import "~animate.css";

    .topbar {
        position: fixed;
        min-width: 100%;
        z-index: 1024;
        box-shadow: 0 2px 3px hsla(0, 0%, 7%, .1), 0 0 0 1px hsla(0, 0%, 7%, .1);
        height: 50px;
        background: #fff;

        .header-title-1 {
            margin-left: 10px;
            color: #36ac70;
        }

        .header-title-2 {
            color: #28374b;
        }
    }

    .img-circle {
        border-radius: 150%;
    }
</style>
