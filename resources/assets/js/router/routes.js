import { authGuard, guestGuard } from '../utils/router'

export default [
    {
      name: 'auth.login',
      path: '/',
      component: require('../views/auth/login'),
      meta: { title: 'Login' }
    },

    ...authGuard([
        {
          name: 'Dashboard',
          path: '/dashboard',
          component: require('../views/Dashboard'),
          meta: { title: 'Dashboard' },
          props: true
        }
    ]),

    ...guestGuard([
        {
          name: 'auth.register',
          path: '/auth/register',
          component: require('../views/auth/register'),
          meta: { title: 'Register' }
        },
        {
          name: 'auth.verification',
          path: '/auth/verification/:email',
          component: require('../views/auth/verification'),
          meta: { title: 'Verification' },
          props: true
        },
    ]),

    { path: '*', redirect: '/' }
]
