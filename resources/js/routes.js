import VueRouter from 'vue-router';
const components = './components/admin/';


let routes = [
    {
        name: 'users',
        path: '/users',
        component: require('./components/admin/users/index').default
    },
    {
        name: 'createUser', 
        path: '/createUser', 
        component: require('./components/admin/users/create').default
    },
    {
        name: 'editUser',
        path: '/editUser/:id',
        component: require('./components/admin/users/edit').default
    },
    {
        name: 'laws',
        path: '/laws',
        component: require('./components/admin/laws/index').default
    },
    {
        name: 'createLaw',
        path: '/createLaw',
        component: require('./components/admin/laws/create').default
    },
    {
        name: 'editLaw',
        path: '/editLaw/:id',
        component: require('./components/admin/laws/edit').default
    },
    {
        name: 'articles',
        path: '/articles',
        component: require('./components/admin/articles/index').default
    },
    {
        name: 'createArticle',
        path: '/createArticle',
        component: require('./components/admin/articles/create').default
    },
    {
        name: 'editArticle',
        path: '/editArticle/:id',
        component: require('./components/admin/articles/edit').default
    },
    {
        name: 'judgements',
        path: '/judgements',
        component: require('./components/admin/judgements/index').default
    },
    {
        name: 'createJudgement',
        path: '/createJudgement',
        component: require('./components/admin/judgements/create').default
    },
    {
        name: 'editJudgement',
        path: '/editJudgement/:id',
        component: require('./components/admin/judgements/edit').default
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: require('./views/dashboard').default
    },
    {
        name: 'something-new',
        path: '/something-new',
        component: require('./views/something-new').default
    }
];

export default new VueRouter({
    base: '/admin/',
    mode: 'history',
    routes,
    linkActiveClass: 'active'
});
