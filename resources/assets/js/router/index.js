import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes'

Vue.use(Router)

const router = new Router({
    mode: 'hash',
    linkActiveClass: 'is-active',
    routes
})

router.beforeEach((to, from, next) => {
    window.document.title = to.meta.title

    // TODO: If mobile, hide the menu again

    next()
})

export default router
