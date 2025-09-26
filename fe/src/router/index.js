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
    {
        path : '/faqs',
        component: ()=>import('../components/Customer/Faqs.vue'),
        meta: { layout: "customer" },
    },
        {
        path: "/chi-tiet-bai-viet/:id_bai_viet",
        component: () => import("../components/Customer/ChiTietBaiViet.vue"),
        meta: { layout: "customer" },
        props: true,
    },
        {
        path: "/tour",
        component: () => import("../components/Customer/Tour.vue"),
        meta: { layout: "customer" },
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router