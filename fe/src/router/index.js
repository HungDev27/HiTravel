import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save

const routes = [
    // {
    //     path : '/',
    //     component: ()=>import('../layout/wrapper/index.vue')
    // },
    //Admin
    {
        path : '/admin/trang-chu',
        component: ()=>import('../components/Admin/TrangChu.vue')
    },

    //Staff
    {
        path : '/staff/trang-chu',
        component: ()=>import('../components/Staff/TrangChu.vue'),
        meta: { layout: "staff" },
    },

    //Customer
    {
        path : '/',
        component: ()=>import('../components/Customer/TrangChu.vue'),
        meta: { layout: "customer" },
    },
    {
        path : '/lien-he',
        component: ()=>import('../components/Customer/LienHe.vue'),
        meta: { layout: "customer" },
    },
    {
        path : '/gioi-thieu',
        component: ()=>import('../components/Customer/GioiThieu.vue'),
        meta: { layout: "customer" },
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router