<template>
    <header>
        <nav class="navbar navbar-expand-lg bd-navbar sticky-top" style="background-color: #3399FF">
            <div class="container"> <a class="navbar-brand fs-4 fw-bold" href="#"><span
                        class="text-danger"><i>NH</i></span><i>Travel</i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <!-- Trang Chủ -->
                        <li class="nav-item">
                            <router-link to="/" class="nav-link text-light fs-6"><b>Trang Chủ</b></router-link>
                        </li>

                        <!-- Giới Thiệu -->
                        <li class="nav-item">
                            <router-link to="/gioi-thieu" class="nav-link text-light fs-6"><b>Giới
                                    Thiệu</b></router-link>
                        </li>

                        <!-- Dropdown Tour Du Lịch -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light fs-6" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <b>Tour Du Lịch</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <router-link to="/tour-bac" class="dropdown-item">Tour Miền Bắc</router-link>
                                </li>
                                <li>
                                    <router-link to="/tour-trung" class="dropdown-item">Tour Miền Trung</router-link>
                                </li>
                                <li>
                                    <router-link to="/tour-nam" class="dropdown-item">Tour Miền Nam</router-link>
                                </li>
                            </ul>
                        </li>
                        

                        <!-- Bài Viết -->
                        <li class="nav-item">
                            <router-link to="/bai-viet" class="nav-link text-light fs-6"><b>Bài Viết</b></router-link>
                        </li>

                        <!-- Faqs -->
                        <li class="nav-item">
                            <router-link to="/faqs" class="nav-link text-light fs-6"><b>Faqs</b></router-link>
                        </li>

                        <!-- Liên Hệ -->
                        <li class="nav-item">
                            <router-link to="/lien-he" class="nav-link text-light fs-6"><b>Liên Hệ</b></router-link>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-3">
                        <!-- Search Icon -->
                        <a class="nav-link" href="#" title="Tìm kiếm">
                            <i class="bx bx-search" style="font-size: 31px; color: #fff"></i>
                        </a>
                        <!-- Cart Icon -->
                        <router-link to="/cart" class="nav-link" title="Giỏ hàng">
                            <i class="bx bx-cart" style="font-size: 31px; color: #fff"></i>
                        </router-link>
                        <!-- User Icon Dropdown -->
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" title="Tài khoản">
                                <i class="bx bx-user" style="font-size: 31px; color: #fff"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <router-link to="/login" class="dropdown-item">Đăng nhập</router-link>
                                </li>
                                <li>
                                    <router-link to="/register" class="dropdown-item">Đăng ký</router-link>
                                </li>
                                <li>
                                    <router-link to="/favorite-tours" class="dropdown-item">Tour yêu thích</router-link>
                                </li>
                            </ul>
                        </div>
                        <!-- Hotline Icon & Number -->
                        <a class="nav-link d-flex align-items-center" href="tel:0123456789" title="Hotline">
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
import LogoText from "./LogoText.vue";
export default {
    components: { LogoText },
};
</script>
<style scoped>
.topbar {
    display: flex;
    align-items: center;
    gap: 16px;
}

.brand {
    text-decoration: none;
}
</style>
