export default [
    { name: 'auth.login', path: '/', component: require('../views/auth/login'), meta: { title: 'Login' } },

    { name: 'auth.register', path: '/auth/register', component: require('../views/auth/register'), meta: { title: 'Register' } },

    { name: 'mfbf', path: '/mfbf-dashboard', component: require('../views/Dashboard'), meta: { title: 'Dashboard' } },

    { path: '*', redirect: '/' }
]
