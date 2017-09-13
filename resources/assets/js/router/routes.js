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
          name: 'mfbf',
          path: '/mfbf-dashboard',
          component: require('../views/Dashboard'),
          meta: { title: 'Dashboard' }
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
