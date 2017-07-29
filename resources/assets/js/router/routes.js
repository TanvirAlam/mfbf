export default [
    {
        name: 'Dashboard',
        path: '/',
        component: require('../views/Dashboard'),
        meta: {
            title: 'Dashboard'
        }
    },
    {
        path: '*',
        redirect: '/'
    }
]
