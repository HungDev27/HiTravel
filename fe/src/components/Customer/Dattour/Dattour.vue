<template>
    <div class="container">
        <h2 class="text-center mb-1 mt-4">
            <i class="fa-solid fa-car-on me-3 fa-lg text-primary"></i>
            <span class="fw-bolder" style="color: #007bff;">Hoàn Tất Đặt Tour</span>
        </h2>
        <p class="text-center text-muted mb-5 mt-3">
            Vui lòng điền thông tin liên hệ và số lượng hành khách chính xác
        </p>
        <div class="row">
            <div class="col-lg-7 p-4">
                <h3 class="mb-4 fw-bold text-primary">Thông Tin Đặt Chỗ</h3>
                <hr class="mb-4">

                <div v-if="!isLoggedIn" class="alert alert-info d-flex align-items-center mb-4 p-3 rounded-3 shadow-sm"
                    role="alert" style="border-left: 5px solid #007bff; background-color: #e7f5ff; color: #0c5460;">
                    <i class="fa-solid fa-user-circle me-3 fa-lg"></i>
                    <div>
                        Bạn chưa đăng nhập. <a href="/dang-nhap" class="alert-link fw-bold" style="color: #0c5460;">Đăng
                            nhập ngay</a> để nhận ưu đãi, tích điểm và quản lý đơn hàng dễ dàng hơn!
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3" style="background-color: #007bff; color: white;">
                        <h5 class="mb-0"><i class="fa-solid fa-address-book me-2"></i> Thông tin liên lạc</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Họ tên <span class="text-danger">*</span></label>
                                <input v-model="user.ho_ten" type="text" placeholder="Ví dụ: Nguyễn Văn A"
                                    class="form-control form-control-lg" style="border-radius: 50rem;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Điện thoại <span class="text-danger">*</span></label>
                                <input v-model="user.so_dien_thoai" class="form-control form-control-lg" type="tel"
                                    placeholder="Nhập số điện thoại" style="border-radius: 50rem;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" v-model="user.email" placeholder="Nhập email"
                                    class="form-control form-control-lg" style="border-radius: 50rem;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Địa chỉ</label>
                                <input v-model="user.dia_chi" class="form-control form-control-lg" type="text"
                                    placeholder="Nhập địa chỉ" style="border-radius: 50rem;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header py-3" style="background-color: #28a745; color: white;">
                        <h5 class="mb-0"><i class="fa-solid fa-users me-2"></i> Số lượng hành khách</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div
                                    class="d-flex justify-content-between align-items-center p-3 border rounded-3 bg-light">
                                    <div>
                                        <div class="fw-bold fs-5">Người lớn</div>
                                        <small class="text-muted">
                                            Từ 12 tuổi trở lên
                                            <i class="fa-solid fa-circle-info ms-1 text-info" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Sinh trước năm 2013"></i>
                                        </small>
                                    </div>

                                    <div class="input-group input-group-sm" style="width: 120px;">
                                        <button class="btn btn-outline-secondary" type="button" @click="updateAdult(-1)"
                                            :disabled="count_adult <= 1"
                                            style="width: 35px; height: 35px; font-size: 1.2rem; font-weight: bold; padding: 0; border-top-left-radius: 50rem; border-bottom-left-radius: 50rem; border-right: none;">–</button>
                                        <input type="text" class="form-control text-center bg-white"
                                            :value="count_adult" readonly
                                            style="height: 35px; border-radius: 0 !important; border-top: 1px solid #ced4da; border-bottom: 1px solid #ced4da; border-left: none; border-right: none;">
                                        <button class="btn btn-outline-secondary" type="button" @click="updateAdult(1)"
                                            style="width: 35px; height: 35px; font-size: 1.2rem; font-weight: bold; padding: 0; border-top-right-radius: 50rem; border-bottom-right-radius: 50rem; border-left: none;">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div
                                    class="d-flex justify-content-between align-items-center p-3 border rounded-3 bg-light">
                                    <div>
                                        <div class="fw-bold fs-5">Trẻ em</div>
                                        <small class="text-muted">
                                            Dưới 11 tuổi trở xuống
                                            <i class="fa-solid fa-circle-info ms-1 text-info" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Sinh trước năm 2023"></i>
                                        </small>
                                    </div>

                                    <div class="input-group input-group-sm" style="width: 120px;">
                                        <button class="btn btn-outline-secondary" type="button" @click="updateChild(-1)"
                                            :disabled="count_child <= 0"
                                            style="width: 35px; height: 35px; font-size: 1.2rem; font-weight: bold; padding: 0; border-top-left-radius: 50rem; border-bottom-left-radius: 50rem; border-right: none;">–</button>
                                        <input type="text" class="form-control text-center bg-white"
                                            :value="count_child" readonly
                                            style="height: 35px; border-radius: 0 !important; border-top: 1px solid #ced4da; border-bottom: 1px solid #ced4da; border-left: none; border-right: none;">
                                        <button class="btn btn-outline-secondary" type="button" @click="updateChild(1)"
                                            style="width: 35px; height: 35px; font-size: 1.2rem; font-weight: bold; padding: 0; border-top-right-radius: 50rem; border-bottom-right-radius: 50rem; border-left: none;">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card bên phải -->
            <div class="col-lg-5">
                <h5 class="mb-3"><b>Tóm tắt chuyến đi</b></h5>
                <div class="card" style="background-color: #FAFAFA;">
                    <div class="card-body">

                        <!-- Hình ảnh và tiêu đề -->
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2">
                                <img :src="dat_tour.anh_dai_dien || 'https://i.pinimg.com/736x/eb/55/4c/eb554c8ebd4ee9ff53b270504839b3d9.jpg'"
                                    style="border-radius: 10px; height: 130px; width: 160px;">


                            </div>
                            <div class="p-2">
                                <b style="font-size: 20px;">{{ dat_tour.ten_tour }}</b>
                                <p class="mt-2"><i class="fa-solid fa-ticket me-2"></i>Mã tour: <b
                                        class="text-primary">{{ dat_tour.ma_tour
                                        }}</b></p>
                                <p class="mt-2"><i class="fa-solid fa-check-to-slot me-2"></i>Số chỗ còn: <b
                                        class="text-danger">{{ dat_tour.so_cho_con
                                        }}</b></p>
                            </div>
                        </div>
                        <hr>

                        <!-- Thông tin bay -->
                        <img src="../../../assets/images/homecustomer/plane1.png" class="me-2"><b
                            style="font-size: 18px;">Thông tin chuyến <span class="text-primary">{{
                                dat_tour.phuong_tiens?.[0]?.ten_phuong_tien ||
                                'phương tiện' }}</span></b>
                        <!-- Nội dung -->
                        <div class="d-flex mt-3">
                            <div class="pe-3" style="margin-right: 10px;">
                                <b>Ngày đi - {{ formatDate(dat_tour.ngay_di) }}</b>
                                <div class="mt-2" style="display: flex; flex-direction: column; align-items: center;">
                                    <!-- Mốc thời gian -->
                                    <div
                                        style="display: flex; justify-content: space-between; width: 100%; font-weight: bold;">
                                        <span> {{ dat_tour.gio_di }} </span>
                                    </div>

                                    <!-- Thanh ngang -->
                                    <div style="position: relative; width: 220px; height: 10px; margin-top: 5px;">
                                        <div
                                            style="height: 2px; width: 100%; background: #bbb; position: absolute; top: 4px; left: 0;">
                                        </div>
                                        <div
                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; left: 0; top: 0; border-radius: 2px;">
                                        </div>
                                        <div
                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; right: -1px; top: 0; border-radius: 2px;">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="ps-3 border-start mb-3">
                                <b style="margin-left: 60px;">Ngày về - {{ formatDate(dat_tour.ngay_ve) }}</b>
                                <div class="mt-2" style="display: flex; flex-direction: column; align-items: center;">
                                    <!-- Mốc thời gian -->
                                    <div style="display: flex; justify-content: end; width: 100%; font-weight: bold;">
                                        <span> {{ dat_tour.gio_ve }} </span>
                                    </div>

                                    <!-- Thanh ngang -->
                                    <div style="position: relative; width: 220px; height: 10px; margin-top: 5px;">
                                        <div
                                            style="height: 2px; width: 100%; background: #bbb; position: absolute; top: 4px; left: 0;">
                                        </div>
                                        <div
                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; left: 0; top: 0; border-radius: 2px;">
                                        </div>
                                        <div
                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; right: -1px; top: 0; border-radius: 2px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <!-- Khách hàng -->
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <img src="../../../assets/images/homecustomer/people.png" class="me-2"><b
                                    style="font-size: 18px;">Khách hàng: </b>
                            </div>
                        </div>
                        <!-- Người lớn -->
                        <div style="display: flex; justify-content: space-between;">
                            <span style="font-size: 15px; margin-top: 10px;">Người lớn: </span>
                            <b style="font-size: 16px;">{{ count_adult }} x {{ formatVND(dat_tour.gia_nguoi_lon) }}</b>
                        </div>
                        <!-- Trẻ em -->
                        <div style="display: flex; justify-content: space-between;">
                            <span style="font-size: 15px; margin-top: 10px;">Trẻ em: </span>
                            <b style="font-size: 16px;">{{ count_child }} x {{ formatVND(dat_tour.gia_tre_em) }}</b>
                        </div>
                        <hr>
                        <!-- Voucher -->
                        <div class="mt-3 mb-3" style="display: flex; justify-content: space-between;">
                            <div>
                                <img alt="alt" title="voucher" loading="lazy" width="25" height="25" decoding="async"
                                    data-nimg="1" src="../../../assets/images/homecustomer/voucher.gif"
                                    style="color: transparent; max-width: 100%; margin-right: 10px;">
                                <b style="font-size: 18px;">Mã giảm giá: </b>
                            </div>
                            <div data-bs-toggle="modal" data-bs-target="#voucher" @click="loadVoucher">
                                <i class="fa-solid fa-circle-plus me-2 text-danger"></i>
                                <b class="text-danger" style="font-size: 18px;">Thêm mã giảm giá: </b>
                            </div>
                        </div>
                        <!-- Hiển thị mã giảm giá đã chọn -->
                        <div v-if="selectedVoucher"
                            class="p-3 mb-2 border rounded bg-light d-flex justify-content-between"
                            style="align-items: center;">
                            <div>
                                <b>Mã đã chọn: {{ selectedVoucher.ma }} - {{ selectedVoucher.phan_tram_giam }}%</b>
                                <p class="text-muted mb-1">{{ selectedVoucher.mo_ta }}</p>
                            </div>

                            <!-- nút xoá mã -->
                            <span @click="removeVoucher" class="text-danger"
                                style="cursor: pointer; font-weight: bold;">
                                Xóa mã
                            </span>
                        </div>

                        <hr>
                        <!-- Chính sách bảo mật và điều khoản -->
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="agreePolicy" v-model="agreePolicy">
                            <label class="form-check-label" for="agreePolicy">
                                Tôi đồng ý với
                                <a href="/chinh-sach-bao-mat" class="text-primary fw-semibold">Chính sách</a>
                                bảo vệ dữ liệu cá nhân và các
                                <a href="/dieu-khoan-su-dung" class="text-primary fw-semibold"> điều khoản</a>.
                            </label>
                        </div>
                        <!-- Tổng tiền -->
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h3><b>Tổng tiền</b></h3>
                            <h3><b class="text-danger">{{ formatVND(tien_thuc_nhan) }}</b></h3>
                        </div>
                        <!-- Nút đặt ngay -->
                        <button @click="bookTour" class="btn btn-danger w-100 mt-3" style="font-size: 18px;">
                            <b v-if="!isBooking">Đặt ngay</b>
                            <b v-else>Đang xử lý...</b>
                        </button>
                    </div>
                </div>

                <!-- Liên hệ -->
                <div class="text-end">
                    <router-link :to="`/lien-he`">
                        <button class="btn btn-outline-primary mb-3"><i class="fa-solid fa-envelope-open me-2"></i>Liên
                            hệ tư
                            vấn</button>
                    </router-link>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal mã giảm giá -->
    <div class="modal fade" id="voucher" tabindex="-1" aria-labelledby="voucherLabel" aria-hidden="true"
        style="top: 200px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="voucherLabel"><i class="fa-solid fa-ticket me-2"
                            style="color: #ff3300;"></i>Sử dụng mã giảm giá</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div v-if="vouchers.length === 0">
                        <p class="text-muted">Không có mã giảm giá phù hợp</p>
                    </div>

                    <div v-else>
                        <div v-for="vc in vouchers" :key="vc.id" class="border rounded p-3 mb-2"
                            style="cursor: pointer;" @click.stop="chooseVoucher(vc)" data-bs-dismiss="modal">
                            <b>{{ vc.ma }} - {{ vc.phan_tram_giam }}%</b>
                            <p class="text-muted">{{ vc.mo_ta }}</p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    * Đã hiển thị hết mã ưu đãi bạn có thể sử dụng
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Tooltip } from 'bootstrap';
import axios from 'axios';
import * as bootstrap from "bootstrap";


export default {
    async mounted() {
        await this.checkAuth();
        this.loadDatTour();
        this.tinhTien();
    },

    data() {
        return {
            isLoggedIn: false,   // Trạng thái đăng nhập
            user: {
                ho_ten: '',
                email: '',
                so_dien_thoai: '',
                dia_chi: '',
            },

            id_tour: this.$route.params.id_tour,
            dat_tour: {},
            vouchers: [],
            loadingVoucher: false,
            selectedVoucher: null,
            count_adult: 1,   // Số người lớn
            count_child: 0,   // Số trẻ em
            tong_tien: 0,
            giam_gia: 0,
            tien_thuc_nhan: 0,
            agreePolicy: false,
            isBooking: false,
        };
    },
    methods: {
        formatTime(time) {
            return time.slice(0, 5);
        },
        formatDate(date) {
            const d = new Date(date);
            return `${d.getDate()}/${d.getMonth() + 1}/${d.getFullYear()}`;
        },
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number);
        },
        updateAdult(delta) {
            const next = this.count_adult + delta;
            if (next < 1) return;

            const total = next + this.count_child;
            if (this.dat_tour.so_cho_con && total > this.dat_tour.so_cho_con) {
                this.$toast.error("Số khách vượt quá số chỗ còn lại của tour!");
                return;
            }

            this.count_adult = next;
            this.tinhTien();
        },
        updateChild(delta) {
            const next = this.count_child + delta;
            if (next < 0) return;

            const total = next + this.count_adult;
            if (this.dat_tour.so_cho_con && total > this.dat_tour.so_cho_con) {
                this.$toast.error("Số khách vượt quá số chỗ còn lại của tour!");
                return;
            }

            this.count_child = next;
            this.tinhTien();
        },
        checkAuth() {
            // Kích hoạt tooltip
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            tooltipTriggerList.forEach((el) => new Tooltip(el));

            // Kiểm tra user
            const user = JSON.parse(localStorage.getItem('auth_user'));
            if (user) {
                this.isLoggedIn = true;
                this.user = user;
            }
        },
        loadDatTour() {
            var payload = {
                id: this.id_tour
            }
            axios.post('http://127.0.0.1:8000/api/customer/chi-tiet-dat-tour/get-data', payload)
                .then((res) => {
                    console.log('Dữ liệu trả về:', res.data);
                    if (res.data.status) {
                        this.dat_tour = res.data.data_tour;
                        // this.anh_carousel = res.data.data_tour.anh || [];
                        // this.formatDate(this.chi_tiet_tour.ngay_di);
                    } else {
                        this.$toast.error(res.data.message);
                    }
                });
        },
        async loadVoucher() {
            this.loadingVoucher = true;
            let res = await axios.get("http://127.0.0.1:8000/api/customer/voucher/list");
            if (res.data.status) {
                this.vouchers = res.data.voucher;
            }
            this.loadingVoucher = false;
        },
        tinhTien() {
            axios.post("http://127.0.0.1:8000/api/customer/dat-tour/tinh-tien", {
                id_tour: this.id_tour,
                so_nguoi_lon: this.count_adult,
                so_tre_em: this.count_child,
                id_ma_giam_gia: this.selectedVoucher?.id || null
            })
                .then(res => {
                    if (res.data.status) {
                        this.tong_tien = res.data.tong_tien;
                        this.giam_gia = res.data.giam_gia;
                        this.tien_thuc_nhan = res.data.tien_thuc_nhan;
                    }
                });
        },
        bookTour() {

            // 1) Kiểm tra tick điều khoản
            if (!this.agreePolicy) {
                this.$toast.error("Bạn phải đồng ý với điều khoản trước khi đặt tour!");
                return;
            }

            // 2) Kiểm tra họ tên
            if (!this.user.ho_ten || !this.user.ho_ten.trim()) {
                this.$toast.error("Vui lòng nhập họ tên!");
                return;
            }

            // 3) Kiểm tra số điện thoại
            const phoneRegex = /^0\d{9}$/;
            if (!phoneRegex.test(this.user.so_dien_thoai)) {
                this.$toast.error("Số điện thoại phải bắt đầu bằng 0 và gồm đúng 10 số!");
                return;
            }

            // 4) Kiểm tra email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.user.email)) {
                this.$toast.error("Email không hợp lệ!");
                return;
            }

            // 5) Kiểm tra địa chỉ
            if (this.user.dia_chi && this.user.dia_chi.trim().length < 5) {
                this.$toast.error("Địa chỉ quá ngắn, vui lòng nhập cụ thể hơn!");
                return;
            }

            // 6) Kiểm tra đăng nhập
            const auth = JSON.parse(localStorage.getItem('auth_user'));
            if (!auth) {
                this.$toast.error("Bạn cần đăng nhập để đặt tour!");
                return;
            }

            // 7) Bật trạng thái loading để disable nút Đặt Ngay
            this.isBooking = true;

            axios.post("http://127.0.0.1:8000/api/customer/dat-tour/dat", {
                id_khach_hang: auth.id,
                id_tour: this.id_tour,

                so_nguoi_lon: this.count_adult,
                so_tre_em: this.count_child,

                id_ma_giam_gia: this.selectedVoucher?.id ?? null,

                ten_lien_lac: this.user.ho_ten,
                email_lien_lac: this.user.email,
                so_dien_thoai_lien_lac: this.user.so_dien_thoai,
                dia_chi_lien_lac: this.user.dia_chi,
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success("Đặt tour thành công!");
                        this.$router.push("/lich-su-don-hang");
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(() => {
                    this.$toast.error("Có lỗi xảy ra, vui lòng thử lại!");
                })
                .finally(() => {
                    // 8) Tắt trạng thái loading để bật lại nút
                    this.isBooking = false;
                });
        },
        removeVoucher() {
            this.selectedVoucher = null;
            this.giam_gia = 0;
            this.tinhTien();
            this.$toast.info("Đã xoá mã giảm giá");
        },
        chooseVoucher(vc) {
            console.log(">>> CLICK VOUCHER", vc);   // bắt buộc phải thấy log này
            this.selectedVoucher = { ...vc };

            this.$toast.success("Đã áp dụng mã: " + vc.ma);

            this.tinhTien();

            // đóng modal
            const modal = bootstrap.Modal.getInstance(
                document.getElementById('voucher')
            );
            if (modal) modal.hide();
        }
    },
    watch: {
        selectedVoucher(v) {
            console.log("selectedVoucher CHANGED:", v);
        }
    }

};
</script>
<style></style>