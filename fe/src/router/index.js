import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save

const routes = [
    // {
    //     path : '/',
    //     component: ()=>import('../layout/wrapper/index.vue')
    // },
    {
        path : '/',
        component: ()=>import('../components/Customer/TrangChu.vue'),
        meta: { layout: "customer" },
    },
    {
        path : '/admin/trang-chu',
        component: ()=>import('../components/Admin/TrangChu.vue')
    },
    {
        path : '/staff/trang-chu',
        component: ()=>import('../components/Staff/TrangChu.vue'),
        meta: { layout: "staff" },
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router