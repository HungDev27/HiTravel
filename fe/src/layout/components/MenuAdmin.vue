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
            <nav class="navbar navbar-expand-xl w-100 text-nowrap">
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


                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret show"
                            data-bs-toggle="dropdown" aria-expanded="true">
                            <div class="parent-icon"><i class="fa-solid fa-user-group"></i>
                            </div>
                            <div class="menu-title">Quản lý tài khoản</div>
                        </a>
                        <ul class="dropdown-menu show" data-bs-popper="static">
                            <router-link to="/admin/nhan-vien">
                                <li>
                                    <a class="dropdown-item" href="/admin/nhan-vien"><i
                                            class="bx bx-right-arrow-alt"></i>Tài Khoản Nhân
                                        viên</a>
                                </li>
                            </router-link>
                            <router-link to="/admin/khach-hang">
                                <li>
                                    <a class="dropdown-item" href="/admin/khach-hang"><i
                                            class="bx bx-right-arrow-alt"></i>Tài khoản Khách
                                        hàng</a>
                                </li>
                            </router-link>
                        </ul>
                    </li>


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

                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret show"
                            data-bs-toggle="dropdown" aria-expanded="true">
                            <div class="parent-icon"><i class="fa-brands fa-servicestack"></i>
                            </div>
                            <div class="menu-title">Quản lý Dịch Vụ</div>
                        </a>
                        <ul class="dropdown-menu show" data-bs-popper="static">
                            <router-link to="/admin/voucher">
                                <li>
                                    <a class="dropdown-item" href="/admin/voucher"><i
                                            class="bx bx-right-arrow-alt"></i>Voucher</a>
                                </li>
                            </router-link>
                            <router-link to="/admin/phuong-tien">
                                <li>
                                    <a class="dropdown-item" href="/admin/phuong-tien"><i
                                            class="bx bx-right-arrow-alt"></i>Phương tiện</a>
                                </li>
                            </router-link>
                        </ul>
                    </li>

                    <router-link to="/admin/phan-quyen">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/phan-quyen">
                                <div class="parent-icon">
                                    <i class="fa-solid fa-user-shield"></i>
                                </div>
                                <div class="menu-title">Phân Quyền</div>
                            </a>
                        </li>
                    </router-link>

                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret show"
                            data-bs-toggle="dropdown" aria-expanded="true">
                            <div class="parent-icon"><i class="fa-regular fa-comments"></i>
                            </div>
                            <div class="menu-title">Tương tác</div>
                        </a>
                        <ul class="dropdown-menu show" data-bs-popper="static">
                            <router-link to="/admin/binh-luan">
                                <li>
                                    <a class="dropdown-item" href="/admin/binh-luan"><i
                                            class="bx bx-right-arrow-alt"></i>Bình Luận</a>
                                </li>
                            </router-link>
                            <router-link to="/admin/lien-he">
                                <li>
                                    <a class="dropdown-item" href="/admin/lien-he">
                                        <i class="bx bx-right-arrow-alt"></i>Quản Lý Liên Hệ
                                    </a>
                                </li>
                            </router-link>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret show"
                            data-bs-toggle="dropdown" aria-expanded="true">
                            <div class="parent-icon"><i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div class="menu-title">Thống kê</div>
                        </a>
                        <ul class="dropdown-menu show" data-bs-popper="static">
                            <router-link to="/admin/thong-ke/khach-hang-dang-ky">
                                <li>
                                    <a class="dropdown-item" href="/admin/thong-ke/khach-hang-dang-ky"><i
                                            class="bx bx-right-arrow-alt"></i>Thống Kê Lượt Đăng Ký</a>
                                </li>
                            </router-link>
                            <!-- <router-link to="/admin/thong-ke/don-hang">
							<li>
								<a class="dropdown-item" href="/admin/thong-ke/don-hang"><i
										class="bx bx-right-arrow-alt"></i>Thống kê đơn hàng</a>
							</li>
						</router-link>
						<router-link to="/admin/thong-ke/ve">
							<li>
								<a class="dropdown-item" href="/admin/thong-ke/ve"><i
										class="bx bx-right-arrow-alt"></i>Thống Kê Vé Bán</a>
							</li>
						</router-link>
						<router-link to="/admin/thong-ke/suat-chieu">
							<li>
								<a class="dropdown-item" href="/admin/thong-ke/suat-chieu"><i
										class="bx bx-right-arrow-alt"></i>Thống Kê Suất Chiếu</a>
							</li>
						</router-link>
						<router-link to="/admin/thong-ke/phim">
							<li>
								<a class="dropdown-item" href="/admin/thong-ke/phim"><i
										class="bx bx-right-arrow-alt"></i>Thống Kê Phim</a>
							</li>
						</router-link>
						<router-link to="/admin/thong-ke/voucher">
							<li>
								<a class="dropdown-item" href="/admin/thong-ke/voucher"><i
										class="bx bx-right-arrow-alt"></i>Thống Kê Voucher</a>
							</li>
						</router-link>
						<router-link to="/admin/thong-ke/dich-vu">
							<li>
								<a class="dropdown-item" href="/admin/thong-ke/dich-vu"><i
										class="bx bx-right-arrow-alt"></i>Thống Kê Dịch Vụ</a>
							</li>
						</router-link>
						<router-link to="/admin/thong-ke/khach-hang-chi-tieu">
							<li>
								<a class="dropdown-item" href="/admin/thong-ke/khach-hang-chi-tieu"><i
										class="bx bx-right-arrow-alt"></i>Thống kê chi tiêu</a>
							</li>
						</router-link> -->


                        </ul>
                    </li>
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