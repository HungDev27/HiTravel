<template>
    <header>
        <nav class="navbar navbar-expand-lg bd-navbar sticky-top" style="background-color: #3399FF">
            <div class="container"> <a class="navbar-brand fs-4 fw-bold" href="#"><span
                        class="text-danger"><i>Hi</i></span><i>Travel</i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <router-link to="/">
                            <li class="nav-item"> <a class="nav-link  text-light fs-6" aria-current="page"
                                    href="#"><b>Trang
                                        Chủ</b></a>
                            </li>
                        </router-link>
                        <router-link to="/gioi-thieu">
                            <li class="nav-item"> <a class="nav-link text-light fs-6" href="/gioi-thieu"><b>Giới
                                        Thiệu</b></a>
                            </li>
                        </router-link>
                        <router-link to="/">
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle text-light fs-6" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <b>Tour Du Lịch</b>
                                </a>
                                <ul class="dropdown-menu">
                                    <router-link to="/">
                                        <li><a class="dropdown-item" href="/">Tour Miền Bắc</a>
                                        </li>
                                    </router-link>
                                    <router-link to="/">
                                        <li><a class="dropdown-item" href="/">Tour Miền Trung</a>
                                        </li>
                                    </router-link>
                                    <router-link to="/">
                                        <li><a class="dropdown-item" href="/">Tour Miền Nam</a>
                                        </li>
                                    </router-link>
                                </ul>
                            </li>
                        </router-link>

                        <router-link to="/faqs">
                            <li class="nav-item"> <a class="nav-link text-light fs-6" href="/faqs"><b>Faqs</b></a>
                            </li>
                        </router-link>
                        <router-link to="/lien-he">
                            <li class="nav-item"> <a class="nav-link text-light fs-6" href="/gioi-thieu"><b>Liên
                                        Hệ</b></a>
                            </li>
                        </router-link>
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <!-- Search Icon -->
                        <a class="nav-link" href="#" title="Tìm kiếm">
                            <i class="bx bx-search" style="font-size: 31px; color: #fff;"></i>
                        </a>
                        <!-- Cart Icon -->
                        <router-link to="/cart" class="nav-link" title="Giỏ hàng">
                            <i class="bx bx-cart" style="font-size: 31px; color: #fff;"></i>
                        </router-link>
                        <!-- User Icon Dropdown -->
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" title="Tài khoản">
                                <i class="bx bx-user" style="font-size: 31px; color: #fff;"></i>
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
                            <i class="bx bx-phone-call" style="font-size: 31px; color: #fff;"></i>
                            <span class="ms-1 text-light fw-bold">01900 19000</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>
<script>
export default {

}
</script>
<style></style>