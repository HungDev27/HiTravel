<template>
    <div class="container py-4" style="background-color: #f7f9fc;">
        <h2 class="fw-bolder mb-3"
            style="color: #007bff; border-left: 5px solid #007bff; padding-left: 15px; font-size: 1.75rem;">
            <i class="fa-solid fa-clock-rotate-left"></i> Lịch Sử Đơn Hàng
        </h2>
        <p class="text-muted mb-4" style="font-style: italic; font-size: 0.9rem;">Quản lý các chuyến đi đã đặt và thanh
            toán sau.</p>

        <template v-for="(value, index) in list_dat_tour" :key="index">

            <!-- THẺ ĐƠN HÀNG: CHỜ THANH TOÁN (cho_xu_ly) -->
            <div v-if="value.trang_thai === 'cho_xu_ly'" class="card shadow-sm mb-4" style="
                        border: 1px solid #007bff; 
                        border-radius: 12px; 
                        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.1); 
                        transition: all 0.4s ease;
                    "
                onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 20px rgba(0, 123, 255, 0.2)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 15px rgba(0, 123, 255, 0.1)'">

                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <!-- Cột 1: Thông tin Tour & Ảnh -->
                        <div class="col-lg-5 d-flex align-items-center">
                            <div style="position: relative;">
                                <span style="
                        position: absolute; top: -8px; left: -8px; 
                        background-color: #ffc107; color: white; 
                        border-radius: 4px; padding: 1px 6px; font-size: 0.65rem; font-weight: bold;
                        box-shadow: 0 1px 3px rgba(0,0,0,0.15);
                    ">CHỜ TT</span>

                                <img :src="value.tour.anh[0]?.url" alt="Ảnh Tour"
                                    style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;"
                                    class="me-3 shadow-sm">
                            </div>

                            <div style="padding-left: 10px;">
                                <h6 class="fw-bolder mb-1" style="color: #007bff; font-size: 1rem;">{{
                                    value.tour.ten_tour }}</h6> <small class="d-block"
                                    style="color: #6c757d; font-size: 0.8rem;">Mã:
                                    <b>{{ value.tour.ma_tour }}</b></small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.8rem;">Đặt:
                                    {{ formatDate(value.created_at) }}</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.8rem;">Phương Tiện: {{
                                    value.phuong_tien?.ten_phuong_tien || 'Không có' }}</small>
                            </div>
                        </div>

                        <!-- Cột 2: Chi tiết cơ bản -->
                        <div class="col-lg-3 py-1" style="border-right: 1px dashed #dee2e6;">
                            <div class="row g-0" style="font-size: 0.85rem;">
                                <div class="col-6 mb-1"><strong><i class="fa-regular fa-calendar-alt me-1"></i>
                                        Đi:</strong>
                                    {{ formatDate(value.tour.ngay_di) }}</div>
                                <div class="col-6 mb-1"><strong><i class="fa-solid fa-users me-1"></i> Khách:</strong>
                                    {{ value.so_nguoi_lon }}
                                    NL, {{ value.so_tre_em }} TE</div>
                                <div class="col-6"><strong><i class="fa-solid fa-calendar-check me-1"></i> Về:</strong>
                                    {{ formatDate(value.tour.ngay_ve) }}</div>
                                <div class="col-6"><strong><i class="fa-solid fa-tag me-1"></i> Voucher:</strong> <span
                                        class="fw-bold text-success">{{ value.voucher?.ma || 'Không có' }}</span></div>
                            </div>
                        </div>

                        <!-- Cột 3: Tổng tiền & Trạng thái & Nút -->
                        <div class="col-lg-4 text-lg-end d-flex flex-column justify-content-center">

                            <div class="d-flex justify-content-lg-end align-items-center mb-1">
                                <div class="me-3">
                                    <span class="text-muted d-block" style="font-size: 0.75rem;">Tổng phải trả:</span>
                                    <span class="fw-bolder fs-4" style="color: #dc3545;">{{
                                        formatVND(value.tien_thuc_nhan) }}</span>
                                </div>

                                <button class="btn shadow-sm" data-bs-toggle="modal" data-bs-target="#paymentModal"
                                    @click="chonDonHang(value)" style="font-weight: bold; 
                            border-radius: 50rem; 
                            padding: 0.4rem 1rem;
                            font-size: 0.9rem; 
                            background-image: linear-gradient(to right, #007bff, #0056b3); 
                            border: none;
                            color: white;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.filter='brightness(1.1)'; this.style.transform='scale(1.02)'"
                                    onmouseout="this.style.filter='brightness(1.0)'; this.style.transform='scale(1.0)'">
                                    <i class="fa-solid fa-credit-card me-1"></i> Thanh Toán
                                </button>
                            </div>

                            <div class="text-end mt-1">
                                <span class="badge rounded-pill text-dark"
                                    style="font-size: 0.75rem; padding: 0.3em 0.8em; background-color: #ffeb3b; font-weight: bold;">
                                    Chờ xử lý & TT
                                </span>
                                <small class="text-muted ms-2" style="font-size: 0.75rem;">
                                    TT: <span class="fw-bold" style="color: #ff9800;">Chờ thanh toán</span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer"
                    style="background-color: #e9ecef; border-top: 1px solid #ddd; border-radius: 0 0 12px 12px; padding: 0.4rem 1rem;">
                    <small class="text-muted fw-bold" style="font-size: 0.8rem;">
                        Chi tiết: Tiền gốc: {{ formatVND(value.tong_tien) }} | Giảm: {{ formatVND(value.giam_gia) }}
                    </small>
                </div>
            </div>

            <!-- THẺ ĐƠN HÀNG: THẤT BẠI/ĐÃ HỦY (da_huy) -->
            <div v-else-if="value.trang_thai === 'da_huy'" class="card shadow-sm mb-4" style="
                            border: 1px solid #dc3545; 
                            border-radius: 12px; 
                            opacity: 0.9;
                            transition: all 0.4s ease;
                        " onmouseover="this.style.transform='translateY(-3px)'"
                onmouseout="this.style.transform='translateY(0)'">

                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <!-- Cột 1: Thông tin Tour & Ảnh -->
                        <div class="col-lg-5 d-flex align-items-center">
                            <img :src="value.tour.anh[0]?.url" alt="Ảnh Tour"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;"
                                class="me-3 shadow-sm">

                            <div style="padding-left: 10px;">
                                <h6 class="fw-bolder mb-1" style="color: #dc3545; font-size: 1rem;">{{
                                    value.tour.ten_tour }}</h6>
                                <small class="d-block" style="color: #6c757d; font-size: 0.8rem;">Mã:
                                    <b>{{ value.tour.ma_tour }}</b></small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.8rem;">Đặt:
                                    {{ formatDate(value.created_at) }}</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.8rem;">Phương Tiện: {{
                                    value.phuong_tien?.ten_phuong_tien || 'Không có' }}</small>
                            </div>
                        </div>

                        <!-- Cột 2: Chi tiết cơ bản -->
                        <div class="col-lg-3 py-1" style="border-right: 1px dashed #dee2e6;">
                            <div class="row g-0" style="font-size: 0.85rem;">
                                <div class="col-6 mb-1"><strong><i class="fa-regular fa-calendar-alt me-1"></i>
                                        Đi:</strong>
                                    {{ formatDate(value.tour.ngay_di) }}</div>
                                <div class="col-6 mb-1"><strong><i class="fa-solid fa-users me-1"></i> Khách:</strong>
                                    {{ value.so_nguoi_lon }}
                                    NL, {{ value.so_tre_em }} TE</div>
                                <div class="col-6"><strong><i class="fa-solid fa-calendar-check me-1"></i> Về:</strong>
                                    {{ formatDate(value.tour.ngay_ve) }}</div>
                                <div class="col-6"><strong><i class="fa-solid fa-tag me-1"></i> Voucher:</strong> <span
                                        class="text-muted">{{ value.voucher?.ma || 'Không có' }}</span></div>
                            </div>
                        </div>

                        <!-- Cột 3: Tổng tiền & Trạng thái -->
                        <div class="col-lg-4 text-lg-end d-flex flex-column justify-content-center">

                            <div class="d-flex justify-content-lg-end align-items-center mb-1">
                                <div class="me-3">
                                    <span class="text-muted d-block" style="font-size: 0.75rem;">Tổng phải trả:</span>
                                    <span class="fw-bolder fs-4" style="color: #dc3545;">{{
                                        formatVND(value.tien_thuc_nhan) }}</span>
                                </div>
                                <!-- Vùng trống tương đương nút Thanh toán -->
                                <div style="width: 130px; height: 36px;"></div>
                            </div>

                            <div class="text-end mt-1">
                                <span class="badge rounded-pill text-white"
                                    style="font-size: 0.75rem; padding: 0.3em 0.8em; background-color: #dc3545; font-weight: bold;">
                                    <i class="fa-solid fa-ban me-1"></i> Đã huỷ
                                </span>
                                <small class="text-muted ms-2" style="font-size: 0.75rem;">
                                    TT: <span class="fw-bold" style="color: #dc3545;">Không thành công</span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer"
                    style="background-color: #e9ecef; border-top: 1px solid #ddd; border-radius: 0 0 12px 12px; padding: 0.4rem 1rem;">
                    <small class="text-muted fw-bold" style="font-size: 0.8rem;">
                        Chi tiết: Tiền gốc: {{ formatVND(value.tong_tien) }} | Giảm: {{ formatVND(value.giam_gia) }}
                    </small>
                </div>
            </div>

            <!-- THẺ ĐƠN HÀNG: ĐÃ THANH TOÁN (da_thanh_toan) -->
            <div v-else class="card shadow-sm mb-4" style="
                        border: 1px solid #28a745; 
                        border-radius: 12px; 
                        opacity: 0.9;
                        transition: all 0.4s ease;
                    " onmouseover="this.style.transform='translateY(-3px)'"
                onmouseout="this.style.transform='translateY(0)'">

                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <!-- Cột 1: Thông tin Tour & Ảnh -->
                        <div class="col-lg-5 d-flex align-items-center">
                            <img :src="value.tour.anh[0]?.url" alt="Ảnh Tour"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;"
                                class="me-3 shadow-sm">

                            <div style="padding-left: 10px;">
                                <h6 class="fw-bolder mb-1" style="color: #28a745; font-size: 1rem;">{{
                                    value.tour.ten_tour }}</h6>
                                <small class="d-block" style="color: #6c757d; font-size: 0.8rem;">Mã:
                                    <b>{{ value.tour.ma_tour }}</b></small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.8rem;">Đặt:
                                    {{ formatDate(value.created_at) }}</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.8rem;">Phương Tiện: {{
                                    value.phuong_tien?.ten_phuong_tien || 'Không có' }}</small>
                            </div>
                        </div>

                        <!-- Cột 2: Chi tiết cơ bản -->
                        <div class="col-lg-3 py-1" style="border-right: 1px dashed #dee2e6;">
                            <div class="row g-0" style="font-size: 0.85rem;">
                                <div class="col-6 mb-1"><strong><i class="fa-regular fa-calendar-alt me-1"></i>
                                        Đi:</strong>
                                    {{ formatDate(value.tour.ngay_di) }}</div>
                                <div class="col-6 mb-1"><strong><i class="fa-solid fa-users me-1"></i> Khách:</strong>
                                    {{ value.so_nguoi_lon }}
                                    NL, {{ value.so_tre_em }} TE</div>
                                <div class="col-6"><strong><i class="fa-solid fa-calendar-check me-1"></i> Về:</strong>
                                    {{ formatDate(value.tour.ngay_ve) }}</div>
                                <div class="col-6"><strong><i class="fa-solid fa-tag me-1"></i> Voucher:</strong> <span
                                        class="text-muted">{{ value.voucher?.ma || 'Không có' }}</span></div>
                            </div>
                        </div>

                        <!-- Cột 3: Tổng tiền & Trạng thái -->
                        <div class="col-lg-4 text-lg-end d-flex flex-column justify-content-center">

                            <div class="d-flex justify-content-lg-end align-items-center mb-1">
                                <div class="me-3">
                                    <span class="text-muted d-block" style="font-size: 0.75rem;">Tổng đã trả:</span>
                                    <span class="fw-bolder fs-4" style="color: #28a745;">{{
                                        formatVND(value.tien_thuc_nhan) }}</span>
                                </div>
                                <!-- Vùng trống tương đương nút Thanh toán -->
                                <div style="width: 130px; height: 36px;"></div>
                            </div>

                            <div class="text-end mt-1">
                                <span class="badge rounded-pill text-white"
                                    style="font-size: 0.75rem; padding: 0.3em 0.8em; background-color: #28a745; font-weight: bold;">
                                    <i class="fa-solid fa-check-circle me-1"></i> Đã thanh toán
                                </span>
                                <small class="text-muted ms-2" style="font-size: 0.75rem;">
                                    TT: <span class="fw-bold" style="color: #28a745;">Thành công</span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer"
                    style="background-color: #e9ecef; border-top: 1px solid #ddd; border-radius: 0 0 12px 12px; padding: 0.4rem 1rem;">
                    <small class="text-muted fw-bold" style="font-size: 0.8rem;">
                        Chi tiết: Tiền gốc: {{ formatVND(value.tong_tien) }} | Giảm: {{ formatVND(value.giam_gia) }}
                    </small>
                </div>
            </div>
        </template>



    </div>

    <!-- Modal Thanh toán -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true"
        style="display: none; background-color: rgba(0,0,0,0.5);">

        <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
            <div class="modal-content" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">

                <div class="modal-header"
                    style="background-color: #007bff; color: white; border-radius: 15px 15px 0 0; border-bottom: none;">
                    <h5 class="modal-title fw-bold" id="paymentModalLabel">
                        <i class="fa-solid fa-wallet me-2"></i> Thanh Toán Đơn Hàng
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white; filter: invert(1) grayscale(100%) brightness(200%);"></button>
                </div>

                <div class="modal-body p-4">

                    <div class="alert alert-info text-center"
                        style="border-radius: 8px; border: 1px solid #007bff; background-color: #e6f7ff;">
                        <p class="mb-1" style="font-size: 0.9rem;">Mã đơn: <b style="color: #007bff;">{{
                            don_hang_chon?.ma_don_hang }}</b>
                        </p>
                        <p class="mb-0 fw-bold fs-5">
                            Tổng tiền: <span style="color: #dc3545;">{{ formatVND(don_hang_chon?.tien_thuc_nhan)
                                }}</span>
                        </p>
                    </div>

                </div>

                <div class="modal-footer justify-content-center" style="border-top: none;">
                    <button class="btn btn-success" @click="thanhToanVNPAY">
                        Thanh toán VNPay
                    </button>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            list_dat_tour: [],
            don_hang_chon: null,
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number);
        },
        formatDate(date) {
            const d = new Date(date);
            return `${d.getDate()}/${d.getMonth() + 1}/${d.getFullYear()}`;
        },
        loadData() {
            const user = JSON.parse(localStorage.getItem("auth_user"));
            if (!user) {
                this.$toast.error("Vui lòng đăng nhập để xem lịch sử!");
                return;
            }

            axios.get(
                "http://127.0.0.1:8000/api/customer/ls-dat-tour/list",
                {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                    }
                }
            )
                .then((res) => {
                    if (res.data.status) {
                        this.list_dat_tour = res.data.data;
                        console.log("Dữ liệu LS đơn hàng:", this.list_dat_tour);
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(() => {
                    this.$toast.error("Lỗi khi tải dữ liệu!");
                });
        },
        chonDonHang(value) {
            this.don_hang_chon = value;
        },
        thanhToanVNPAY() {
            if (!this.don_hang_chon) {
                this.$toast.error("Không tìm thấy đơn hàng!");
                return;
            }

            axios.post("http://127.0.0.1:8000/api/payment/vnpay/create", {
                ma_don_hang: this.don_hang_chon.ma_don_hang,
                id_dat_tour: this.don_hang_chon.id,
                total_vnpay: this.don_hang_chon.tien_thuc_nhan
            })
                .then(res => {
                    if (res.data.status) {
                        window.location.href = res.data.payment_url;
                    } else {
                        this.$toast.error("Không tạo được liên kết thanh toán!");
                    }
                })
                .catch(err => {
                    console.log(err);
                    this.$toast.error("Lỗi khi tạo thanh toán!");
                });
        }


    },

}
</script>
<style></style>