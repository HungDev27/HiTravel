<template>
    <div>
        <div class="nav-container primary-menu ">
            <div class="mobile-topbar-header">
                <div>
                    <img src="../../assets/images/anh/logoNHTravel.jpg" class="logo-icon" alt="logo icon"
                        style="width: 60px; height: 50px;">
                </div>
                <div>
                    <h4 class="logo-text">NHTravel</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <nav class="navbar navbar-expand-xl w-100">
                <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                    <router-link to="/admin">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">
                                <div class="parent-icon">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                <div class="menu-title">Dashboard</div>
                            </a>
                        </li>
                    </router-link>


                    <router-link to="/admin/quan-ly-nguoi-dung">
                        <a class="nav-link" href="/admin/quan-ly-nguoi-dung">
                            <div class="parent-icon"><i class="fa-solid fa-user-group"></i>
                            </div>
                            <div class="menu-title">Quản Lý Người Dùng</div>
                        </a>
                    </router-link>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="fa-solid fa-plane-departure"></i>
                            </div>
                            <div class="menu-title">Quản Lý Tour</div>
                        </a>
                        <ul class="dropdown-menu">
                            <router-link to="/admin/them-tour">
                                <li> <a class="dropdown-item" href="/admin/them-tour"><i
                                            class="bx bx-right-arrow-alt"></i>Thêm Tour</a>
                                </li>
                            </router-link>
                            <router-link to="/admin/danh-sach-tour">
                                <li> <a class="dropdown-item" href="/admin/danh-sach-tour"><i
                                            class="bx bx-right-arrow-alt"></i>Danh Sách
                                        Tour</a>
                                </li>
                            </router-link>
                            <router-link to="/admin/danh-muc-tour">
                                <li> <a class="dropdown-item" href="/admin/danh-muc-tour"><i
                                            class="bx bx-right-arrow-alt"></i>Danh Mục
                                        Tour</a>
                                </li>
                            </router-link>
                        </ul>
                    </li>


                    <a class="nav-link" href="/admin/quan-ly-booking">
                        <div class="parent-icon" href="/admin/quan-ly-booking"><i class="fa-solid fa-passport"></i>
                        </div>
                        <div class="menu-title">Quản Lý Booking</div>
                    </a>

                    <a class="nav-link" href="/admin/quan-ly-khuyen-mai">
                        <div class="parent-icon" href="/admin/quan-ly-khuyen-mai"><i class="fa-solid fa-ticket"></i>
                        </div>
                        <div class="menu-title">Quản lý Khuyến Mãi</div>
                    </a>

                    <a class="nav-link" href="/admin/quan-ly-lien-he">
                        <div class="parent-icon" href="/admin/quan-ly-lien-he"><i
                                class="fa-solid fa-square-envelope"></i>
                        </div>
                        <div class="menu-title">Quản Lý Liên Hệ</div>
                    </a>

                    <a class="nav-link" href="">
                        <div class="parent-icon" href=""><i class="fa-solid fa-chart-column"></i>
                        </div>
                        <div class="menu-title">Thống Kê </div>
                    </a>

                </ul>
            </nav>
        </div>
    </div>
</template>
<script>
export default {

}
</script>
<style></style>