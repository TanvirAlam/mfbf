<template>
    <div id="app">
        <topbar></topbar>
        <sidebar v-if="isLogged" :show="!sidebar.hidden"></sidebar>
        <section class="content">
            <router-view></router-view>
        </section>
    </div>
</template>

<script>
    import Topbar from './Layout/Topbar'
    import Sidebar from './Layout/Sidebar'
    import { mapActions, mapGetters } from 'vuex'

    export default {
        components: {
            Topbar,
            Sidebar
        },
        beforeMount () {
            const { body } = document
            const WIDTH = 200
            const RATIO = 3
            const handler = () => {
                if (!document.hidden) {
                    let rect = body.getBoundingClientRect()
                    let isMobile = rect.width - RATIO < WIDTH
                    this.toggleDevice(isMobile ? 'mobile' : 'other')
                    this.toggleSidebar({
                        opened: !isMobile
                    })
                }
            }
            document.addEventListener('visibilitychange', handler)
            window.addEventListener('DOMContentLoaded', handler)
            window.addEventListener('resize', handler)
        },
        computed: mapGetters({
          isLogged: 'authCheck',
          sidebar: 'sidebar',
        }),

        methods: mapActions([
            'toggleDevice',
            'toggleSidebar'
        ])
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
