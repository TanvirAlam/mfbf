import store from '../store'
import Router from 'vue-router'

/**
 * Add the "authenticated" guard.
 *
 * @param  {Array} routes
 * @return {Array}
 */
export function authGuard (routes) {
  return guard(routes, (to, from, next) => {
    console.log(store.getters.authCheck)
    if (store.getters.authCheck) {
      next()
    } else {
      next({ name: 'auth.login' })
    }
  })
}

/**
 * Add the "guest" guard.
 *
 * @param  {Array} routes
 * @return {Array}
 */
export function guestGuard (routes) {
  return guard(routes, (to, from, next) => {
    console.log(store.getters.authCheck)
    if (store.getters.authCheck) {
      next({ name: 'auth.login' })
    } else {
      next()
    }
  })
}

/**
 * @param  {Array} routes
 * @param  {Function} guard
 * @return {Array}
 */
function guard (routes, guard) {
  routes.forEach(route => { route.beforeEnter = guard })

  return routes
}
