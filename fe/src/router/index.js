import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save

const routes = [
  // {
  //     path : '/',
  //     component: ()=>import('../layout/wrapper/index.vue')
  // },

  //Admin
  {
    path: "/admin",
    component: () => import("../components/Admin/TrangChu/index.vue"),
  },
  {
    path: "/admin/quan-ly-nguoi-dung",
    component: () => import("../components/Admin/QLNguoiDung/index.vue"),
  },
  {
    path: "/admin/them-tour",
    component: () => import("../components/Admin/QLTour/ThemTour/index.vue"),
  },
  {
    path: "/admin/danh-sach-tour",
    component: () =>
      import("../components/Admin/QLTour/DanhSachTour/index.vue"),
  },
  {
    path: "/admin/quan-ly-booking",
    component: () => import("../components/Admin/QLBooking/index.vue"),
  },
  {
    path: "/admin/quan-ly-khuyen-mai",
    component: () => import("../components/Admin/QLKhuyenMai/index.vue"),
  },
  {
    path: "/admin/quan-ly-lien-he",
    component: () => import("../components/Admin/QLLienHe/indedx.vue"),
  },

  //Staff
  // {
  //     path : '/staff/trang-chu',
  //     component: ()=>import('../components/Staff/TrangChu.vue'),
  //     meta: { layout: "staff" },
  // },

  //Customer
  {
    path: "/",
    component: () => import("../components/Customer/TrangChu.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/lien-he",
    component: () => import("../components/Customer/LienHe.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/gioi-thieu",
    component: () => import("../components/Customer/GioiThieu.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/faqs",
    component: () => import("../components/Customer/Faqs.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/chi-tiet-bai-viet/:id_bai_viet",
    component: () => import("../components/Customer/ChiTietBaiViet.vue"),
    meta: { layout: "customer" },
    props: true,
  },
  {
    path: "/bai-viet",
    component: () => import("../components/Customer/BaiViet.vue"),
    meta: { layout: "customer" },
    props: true,
  },
  {
    path: "/tour-bac",
    component: () => import("../components/Customer/Tour/TourBac.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/tour-nam",
    component: () => import("../components/Customer/Tour/TourNam.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/tour-trung",
    component: () => import("../components/Customer/Tour/TourTrung.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/tour-all",
    component: () => import("../components/Customer/Tour/AllTour.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/chi-tiet-tour/:id_tour",
    component: () => import("../components/Customer/ChiTietTour.vue"),
    meta: { layout: "customer" },
    props: true,
  },
  {
    path: "/chinh-sach-bao-mat",
    component: () =>
      import("../components/Customer/ChinhSachBaoMat/ChinhSachBaoMat.vue"),
    meta: { layout: "customer" },
  },
  {
    path: "/dieu-khoan-su-dung",
    component: () =>
      import("../components/Customer/DieuKhoanSD/DieuKhoanSD.vue"),
    meta: { layout: "customer" },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes: routes,
});

export default router;
