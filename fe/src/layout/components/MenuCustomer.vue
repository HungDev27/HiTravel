<template>
    <header>
        <nav class="navbar navbar-expand-lg bd-navbar sticky-top" style="background-color: #3399FF">
            <div class="container">

                <!-- Logo -->
                <a class="navbar-brand fs-4 fw-bold" href="#">
                    <span class="text-danger"><i>NH</i></span><i>Travel</i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent1">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                    <!-- MENU -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link text-light fs-6"><b>Trang Chủ</b></router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/gioi-thieu" class="nav-link text-light fs-6"><b>Giới
                                    Thiệu</b></router-link>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light fs-6" href="#" role="button"
                                data-bs-toggle="dropdown">
                                <b>Tour Du Lịch</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><router-link to="/tour-bac" class="dropdown-item">Tour Miền Bắc</router-link></li>
                                <li><router-link to="/tour-trung" class="dropdown-item">Tour Miền Trung</router-link>
                                </li>
                                <li><router-link to="/tour-nam" class="dropdown-item">Tour Miền Nam</router-link></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <router-link to="/bai-viet" class="nav-link text-light fs-6"><b>Bài Viết</b></router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/faqs" class="nav-link text-light fs-6"><b>Faqs</b></router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/lien-he" class="nav-link text-light fs-6"><b>Liên Hệ</b></router-link>
                        </li>
                    </ul>

                    <!-- ICONS -->
                    <div class="d-flex align-items-center gap-3">

                        <!-- ICON Search -->
                        <a class="nav-link" href="#"><i class="bx bx-search"
                                style="font-size: 31px; color: #fff"></i></a>

                        <!-- ICON Cart -->
                        <router-link to="/cart" class="nav-link">
                            <i class="bx bx-cart" style="font-size: 31px; color: #fff"></i>
                        </router-link>

                        <!-- USER DROPDOWN -->
                        <div class="dropdown">

                            <!-- Nếu đã đăng nhập -->
                            <template v-if="user">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    <img :src="user.avatar ?? defaultAvatar"
                                        style="height:35px;border-radius:50%;object-fit:cover;">
                                    <span class="ms-2 text-light">{{ user.ho_ten }}</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><router-link to="/" class="dropdown-item">Thông tin cá nhân</router-link>
                                    </li>
                                    <li><a class="dropdown-item" @click="dangXuat">Đăng xuất</a></li>
                                </ul>
                            </template>

                            <!-- Nếu chưa đăng nhập -->
                            <template v-else>
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    <i class="bx bx-user" style="font-size: 31px; color: #fff"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><router-link to="/dang-nhap" class="dropdown-item">Đăng nhập</router-link></li>
                                    <li><router-link to="/dang-ky" class="dropdown-item">Đăng ký</router-link></li>
                                </ul>
                            </template>

                        </div>

                        <!-- Hotline -->
                        <a class="nav-link d-flex align-items-center" href="tel:0123456789">
                            <i class="bx bx-phone-call" style="font-size: 31px; color: #fff"></i>
                            <span class="ms-1 text-light fw-bold">01900 19000</span>
                        </a>
                    </div>

                </div>
            </div>
        </nav>
    </header>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            user: null,
            defaultAvatar: "https://cdn-icons-png.flaticon.com/512/9187/9187604.png"
        };
    },

    mounted() {
        this.checkLogin();
    },

    methods: {
        checkLogin() {
            const token = localStorage.getItem("auth_token");
            if (!token) return;

            axios.get("http://127.0.0.1:8000/api/thong-tin", {
                headers: { Authorization: "Bearer " + token }
            })
                .then(res => {
                    this.user = res.data.data;
                })
                .catch(() => {
                    this.user = null;
                    localStorage.removeItem("auth_token");
                });
        },

        dangXuat() {
            const token = localStorage.getItem("auth_token");
            if (!token) return;

            axios.post("http://127.0.0.1:8000/api/dang-xuat", {}, {
                headers: { Authorization: "Bearer " + token }
            })
                .then(() => {
                    localStorage.removeItem("auth_token");
                    this.user = null;
                    this.$router.replace("/");
                })
                .catch(err => {
                    console.log(err);
                    this.$toast.error("Đăng xuất thất bại");
                });
        }

    }
};
</script>
