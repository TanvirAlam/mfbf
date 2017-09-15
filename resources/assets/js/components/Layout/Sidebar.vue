<template>
    <aside class="menu sidebar animated" :class="{ slideInLeft: show, slideOutLeft: !show }">
        <ul class="menu-list">
            <div class="level-right">
                <figure class="image is-32x32">
                    <img src="img/avatar1.png" alt="User Image" class="img-circle">
                </figure>
                <nav class="level is-mobile">
                    <div class="level-left">
                        <a class="level-item">
                            <span class="icon is-small"><i class="fa fa-cogs"></i></span>
                        </a>
                        <a class="level-item">
                            <span class="icon is-small"><i class="fa fa-university"></i></span>
                        </a>
                        <a class="level-item" @click="logout">
                            <span class="icon is-small"><i class="fa fa-sign-out"></i></span>
                        </a>
                    </div>
                </nav>
            </div>
        </ul>
        <ul class="menu-list">
            <li>
                <router-link to="/" :exact="true">
                        <span class="icon is-small">
                            <i class="fa fa-dashboard"></i>
                        </span>
                    <span>Dashboard</span>
                </router-link>
            </li>
        </ul>
    </aside>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'

    export default {
        name: 'sidebar',

        props: {
            show: Boolean
        },

      methods: {
        logout () {
          this.$store.dispatch('logout')
        },
      }
    }
</script>

<style lang="scss">
    @import '~bulma/sass/utilities/variables';
    @import '~bulma/sass/utilities/mixins';

    .sidebar {
        position: fixed;
        top: 50px;
        left: 0;
        bottom: 0;
        padding: 20px 0 50px;
        width: 180px;
        min-width: 45px;
        max-height: 100vh;
        height: calc(100% - 50px);
        z-index: 1024 - 1;
        background: #FFF;
        box-shadow: 0 2px 3px rgba(17, 17, 17, 0.1), 0 0 0 1px rgba(17, 17, 17, 0.1);
        overflow-y: auto;
        overflow-x: hidden;

        @include mobile() {
            transform: translate3d(-180px, 0, 0);
        }
        .icon {
            vertical-align: baseline;
            &.is-angle {
                position: absolute;
                right: 10px;
                transition: transform .377s ease;
            }
        }
        .menu-label {
            padding-left: 5px;
        }
        .menu-list {
            li a {
                &[aria-expanded="true"] {
                    .is-angle {
                        transform: rotate(180deg);
                    }
                }
            }
            li a + ul {
                margin: 0 10px 0 15px;
            }
        }
    }
</style>
