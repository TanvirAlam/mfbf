export default [
    { name: 'Login', path: '/', component: require('../views/auth/login.vue'), meta: { title: 'Login' } },
    { path: '*', redirect: '/' }
]
