<template>
    <div class="container py-4" style="background-color: #f7f9fc;">
        <h2 class="fw-bolder mb-3"
            style="color: #007bff; border-left: 5px solid #007bff; padding-left: 15px; font-size: 1.75rem; background-color: white; padding-top: 5px; padding-bottom: 5px; border-radius: 4px;">
            <i class="fa-solid fa-clock-rotate-left me-2"></i> Lịch Sử Đơn Hàng
        </h2>
        <p class="text-muted mb-5" style="font-style: italic; font-size: 0.95rem;">Quản lý các chuyến đi đã đặt và thanh
            toán. **Sử dụng màu sắc để phân biệt trạng thái.**</p>

        <template v-for="(value, index) in list_dat_tour" :key="index">

            <div v-if="value.trang_thai === 'cho_xu_ly'" class="card shadow-lg mb-5" style="
                        border: 2px solid #ffc107; 
                        border-radius: 15px; 
                        box-shadow: 0 8px 25px rgba(255, 193, 7, 0.2); /* Đổ bóng vàng */
                        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                    "
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 30px rgba(255, 193, 7, 0.4)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(255, 193, 7, 0.2)'">

                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-5 d-flex align-items-center">

                            <div class="text-nowrap" style="position: relative;">
                                <span style="
                                    position: absolute; top: -12px; left: -12px; 
                                    background-color: #ffc107; color: white; 
                                    border-radius: 8px; padding: 2px 8px; font-size: 0.75rem; font-weight: bold;
                                    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                                ">CHỜ THANH TOÁN</span>

                                <img :src="value.tour.anh[0]?.url" alt="Ảnh Tour"
                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 12px;"
                                    class="me-3 shadow">
                            </div>

                            <div style="padding-left: 15px;">
                                <h5 class="fw-bolder mb-1 text-truncate"
                                    style="color: #007bff; font-size: 1.1rem; max-width: 90%;">{{
                                        value.tour.ten_tour }}</h5>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Mã Đơn:
                                    **{{ value.ma_don_hang }}**</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Ngày Đặt:
                                    {{ formatDate(value.created_at) }}</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Phương Tiện: **{{
                                    value.phuong_tien?.ten_phuong_tien || 'Không có' }}**</small>
                            </div>
                        </div>

                        <div class="col-lg-3 py-1 text-center" style="border-right: 1px dashed #dee2e6;">
                            <div class="row g-0" style="font-size: 0.9rem;">
                                <div class="col-6 mb-2"><strong><i
                                            class="fa-solid fa-plane-departure me-1 text-info"></i> Đi:</strong>
                                    <span class="d-block fw-bold">{{ formatDate(value.tour.ngay_di) }}</span>
                                </div>
                                <div class="col-6 mb-2"><strong><i class="fa-solid fa-users me-1 text-secondary"></i>
                                        Khách:</strong>
                                    <span class="d-block fw-bold">{{ value.so_nguoi_lon }} NL, {{ value.so_tre_em }}
                                        TE</span>
                                </div>
                                <div class="col-6"><strong><i class="fa-solid fa-plane-arrival me-1 text-info"></i>
                                        Về:</strong>
                                    <span class="d-block fw-bold">{{ formatDate(value.tour.ngay_ve) }}</span>
                                </div>
                                <div class="col-6"><strong><i class="fa-solid fa-tag me-1 text-success"></i>
                                        Voucher:</strong>
                                    <span class="d-block fw-bold text-success">{{ value.voucher?.ma || 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 text-center text-lg-end d-flex flex-column justify-content-center align-items-center align-items-lg-end">

                            <div class="mb-3">
                                <span class="text-muted d-block" style="font-size: 0.8rem;">Tổng tiền:</span>
                                <span class="fw-bolder fs-3" style="color: #dc3545;">{{
                                    formatVND(value.tien_thuc_nhan) }}</span>
                            </div>

                            <button class="btn btn-pay-now shadow" data-bs-toggle="modal" data-bs-target="#paymentModal"
                                @click="chonDonHang(value)" style="font-weight: bold; 
                                border-radius: 50rem; 
                                padding: 0.5rem 1.5rem;
                                font-size: 0.95rem; 
                                background-image: linear-gradient(to right, #007bff, #0056b3); 
                                border: none;
                                color: white;
                                transition: all 0.3s ease;
                            " onmouseover="this.style.filter='brightness(1.1)'; this.style.transform='scale(1.05)'"
                                onmouseout="this.style.filter='brightness(1.0)'; this.style.transform='scale(1.0)'">
                                <i class="fa-solid fa-credit-card me-1"></i> THANH TOÁN NGAY
                            </button>

                            <small class="text-muted mt-2" style="font-size: 0.75rem;">
                                Trạng thái TT: <span class="fw-bold" style="color: #ff9800;">Chờ thanh toán</span>
                            </small>
                        </div>
                    </div>
                </div>

                <div class="card-footer"
                    style="background-color: #fff9e6; border-top: 1px solid #ffecb3; border-radius: 0 0 15px 15px; padding: 0.6rem 1.5rem;">
                    <small class="text-muted fw-bold" style="font-size: 0.85rem;">
                        Chi tiết: Tiền gốc: {{ formatVND(value.tong_tien) }} | Giảm: {{ formatVND(value.giam_gia) }}
                    </small>
                </div>
            </div>

            <div v-else-if="value.trang_thai === 'da_huy'" class="card shadow-sm mb-5" style="
                        border: 2px solid #dc3545; 
                        border-radius: 15px; 
                        opacity: 0.8;
                        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                    "
                onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 20px rgba(220, 53, 69, 0.2)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 5px rgba(0,0,0,0.1)'">

                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-5 d-flex align-items-center">

                            <div style="position: relative;">
                                <span style="
                                    position: absolute; top: -12px; left: -12px; 
                                    background-color: #dc3545; color: white; 
                                    border-radius: 8px; padding: 2px 8px; font-size: 0.75rem; font-weight: bold;
                                    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                                ">ĐÃ HỦY</span>

                                <img :src="value.tour.anh[0]?.url" alt="Ảnh Tour"
                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 12px; filter: grayscale(100%);"
                                    class="me-3 shadow">
                            </div>

                            <div style="padding-left: 15px;">
                                <h5 class="fw-bolder mb-1 text-truncate"
                                    style="color: #dc3545; font-size: 1.1rem; max-width: 90%;">{{
                                        value.tour.ten_tour }}</h5>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Mã Đơn:
                                    **{{ value.ma_don_hang }}**</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Ngày Đặt:
                                    {{ formatDate(value.created_at) }}</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Phương Tiện: **{{
                                    value.phuong_tien?.ten_phuong_tien || 'Không có' }}**</small>
                            </div>
                        </div>

                        <div class="col-lg-3 py-1 text-center" style="border-right: 1px dashed #dee2e6;">
                            <div class="row g-0" style="font-size: 0.9rem; color: #6c757d;">
                                <div class="col-6 mb-2"><strong><i
                                            class="fa-solid fa-plane-departure me-1 text-info"></i> Đi:</strong>
                                    <span class="d-block fw-bold">{{ formatDate(value.tour.ngay_di) }}</span>
                                </div>
                                <div class="col-6 mb-2"><strong><i class="fa-solid fa-users me-1"></i> Khách:</strong>
                                    <span class="d-block fw-bold">{{ value.so_nguoi_lon }} NL, {{ value.so_tre_em }}
                                        TE</span>
                                </div>
                                <div class="col-6"><strong><i class="fa-solid fa-plane-arrival me-1 text-info"></i>
                                        Về:</strong>
                                    <span class="d-block fw-bold">{{ formatDate(value.tour.ngay_ve) }}</span>
                                </div>
                                <div class="col-6"><strong><i class="fa-solid fa-tag me-1"></i> Voucher:</strong>
                                    <span class="d-block fw-bold">{{ value.voucher?.ma || 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 text-center text-lg-end d-flex flex-column justify-content-center align-items-center align-items-lg-end">

                            <div class="mb-3">
                                <span class="text-muted d-block" style="font-size: 0.8rem;">Tổng đã đặt:</span>
                                <span class="fw-bolder fs-3" style="color: #dc3545;">{{
                                    formatVND(value.tien_thuc_nhan) }}</span>
                            </div>

                            <div style="width: 180px; height: 38px;">
                                <span class="text-muted fst-italic" style="font-size: 0.9rem;">(Đã hủy đơn)</span>
                            </div>

                            <small class="text-muted mt-2" style="font-size: 0.75rem;">
                                Trạng thái TT: <span class="fw-bold" style="color: #dc3545;">Không thành công</span>
                            </small>
                        </div>
                    </div>
                </div>

                <div class="card-footer"
                    style="background-color: #fcebeb; border-top: 1px solid #f5c6cb; border-radius: 0 0 15px 15px; padding: 0.6rem 1.5rem;">
                    <small class="text-muted fw-bold" style="font-size: 0.85rem;">
                        Chi tiết: Tiền gốc: {{ formatVND(value.tong_tien) }} | Giảm: {{ formatVND(value.giam_gia) }}
                    </small>
                </div>
            </div>

            <div v-else-if="value.trang_thai === 'Success' || value.trang_thai === 'da_thanh_toan'" class="card shadow-lg mb-5" style="
                        border: 2px solid #28a745; 
                        border-radius: 15px; 
                        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.2); /* Đổ bóng xanh */
                        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                    "
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 30px rgba(40, 167, 69, 0.4)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(40, 167, 69, 0.2)'">

                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-5 d-flex align-items-center">

                            <div style="position: relative;">
                                <span style="
                                    position: absolute; top: -12px; left: -12px; 
                                    background-color: #28a745; color: white; 
                                    border-radius: 8px; padding: 2px 8px; font-size: 0.75rem; font-weight: bold;
                                    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                                ">HOÀN TẤT</span>

                                <img :src="value.tour.anh[0]?.url" alt="Ảnh Tour"
                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 12px;"
                                    class="me-3 shadow">
                            </div>

                            <div style="padding-left: 15px;">
                                <h5 class="fw-bolder mb-1 text-truncate"
                                    style="color: #28a745; font-size: 1.1rem; max-width: 90%;">{{
                                        value.tour.ten_tour }}</h5>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Mã Đơn:
                                    **{{ value.ma_don_hang }}**</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Ngày Đặt:
                                    {{ formatDate(value.created_at) }}</small>
                                <small class="d-block" style="color: #6c757d; font-size: 0.85rem;">Phương Tiện: **{{
                                    value.phuong_tien?.ten_phuong_tien || 'Không có' }}**</small>
                            </div>
                        </div>

                        <div class="col-lg-3 py-1 text-center" style="border-right: 1px dashed #dee2e6;">
                            <div class="row g-0" style="font-size: 0.9rem;">
                                <div class="col-6 mb-2"><strong><i
                                            class="fa-solid fa-plane-departure me-1 text-info"></i> Đi:</strong>
                                    <span class="d-block fw-bold">{{ formatDate(value.tour.ngay_di) }}</span>
                                </div>
                                <div class="col-6 mb-2"><strong><i class="fa-solid fa-users me-1 text-secondary"></i>
                                        Khách:</strong>
                                    <span class="d-block fw-bold">{{ value.so_nguoi_lon }} NL, {{ value.so_tre_em }}
                                        TE</span>
                                </div>
                                <div class="col-6"><strong><i class="fa-solid fa-plane-arrival me-1 text-info"></i>
                                        Về:</strong>
                                    <span class="d-block fw-bold">{{ formatDate(value.tour.ngay_ve) }}</span>
                                </div>
                                <div class="col-6"><strong><i class="fa-solid fa-tag me-1 text-success"></i>
                                        Voucher:</strong>
                                    <span class="d-block fw-bold text-success">{{ value.voucher?.ma || 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 text-center text-lg-end d-flex flex-column justify-content-center align-items-center align-items-lg-end">

                            <div class="mb-3">
                                <span class="text-muted d-block" style="font-size: 0.8rem;">Tổng đã trả:</span>
                                <span class="fw-bolder fs-3" style="color: #28a745;">{{
                                    formatVND(value.tien_thuc_nhan) }}</span>
                            </div>

                            <div style="width: 180px; height: 38px;">
                                <span class="text-success fw-bold" style="font-size: 0.95rem;">Đã thanh toán!</span>
                            </div>

                            <small class="text-muted mt-2" style="font-size: 0.75rem;">
                                Trạng thái TT: <span class="fw-bold" style="color: #28a745;">Thành công</span>
                            </small>
                        </div>
                    </div>
                </div>

                <div class="card-footer"
                    style="background-color: #e6ffe6; border-top: 1px solid #c8e6c9; border-radius: 0 0 15px 15px; padding: 0.6rem 1.5rem;">
                    <small class="text-muted fw-bold" style="font-size: 0.85rem;">
                        Chi tiết: Tiền gốc: {{ formatVND(value.tong_tien) }} | Giảm: {{ formatVND(value.giam_gia) }}
                    </small>
                </div>
            </div>
        </template>

        <div v-if="list_dat_tour.length === 0" class="text-center p-5 shadow-sm"
            style="background-color: white; border-radius: 12px; border: 1px dashed #ddd;">
            <i class="fa-solid fa-box-open fa-3x text-secondary mb-3"></i>
            <h4 class="text-muted">Bạn chưa có đơn hàng nào.</h4>
            <p class="text-secondary">Hãy đặt chuyến đi đầu tiên của bạn ngay hôm nay!</p>
        </div>


    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true"
        style="display: none; background-color: rgba(0,0,0,0.5);">

        <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
            <div class="modal-content" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">

                <div class="modal-header"
                    style="background-image: linear-gradient(to right, #007bff, #0056b3); color: white; border-radius: 15px 15px 0 0; border-bottom: none;">
                    <h5 class="modal-title fw-bold" id="paymentModalLabel">
                        <i class="fa-solid fa-wallet me-2"></i> Thanh Toán Đơn Hàng
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white; filter: invert(1) grayscale(100%) brightness(200%);"></button>
                </div>

                <div class="modal-body p-4">

                    <div class="alert alert-info text-center"
                        style="border-radius: 10px; border: 1px solid #007bff; background-color: #e6f7ff; padding: 1.5rem;">
                        <p class="mb-2" style="font-size: 1rem; color: #007bff;">Mã đơn: <b style="color: #dc3545;">{{
                            don_hang_chon?.ma_don_hang }}</b>
                        </p>
                        <p class="mb-0 fw-bold fs-4">
                            Tổng tiền cần trả: <br>
                            <span style="color: #dc3545;">{{ formatVND(don_hang_chon?.tien_thuc_nhan)
                            }}</span>
                        </p>
                    </div>

                </div>

                <div class="modal-footer justify-content-center" style="border-top: none; padding-bottom: 25px;">
                    <button class="btn btn-lg shadow" @click="thanhToanVNPAY"
                        style="background-color: #28a745; color: white; border-radius: 50rem; font-weight: bold; transition: all 0.3s;"
                        onmouseover="this.style.backgroundColor='#1e7e34'"
                        onmouseout="this.style.backgroundColor='#28a745'">
                        <i class="fa-solid fa-arrow-right-to-bracket me-2"></i> Thanh toán VNPay
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

            // Gửi request tạo link
            axios.post("http://127.0.0.1:8000/api/payment/vnpay/create", {
                ma_don_hang: this.don_hang_chon.ma_don_hang,
                id_dat_tour: this.don_hang_chon.id, // Backend sẽ dùng cái này làm TxnRef
                total_vnpay: this.don_hang_chon.tien_thuc_nhan
            })
                .then(res => {
                    // --- SỬA Ở ĐÂY ---
                    // Backend trả về: { code: '00', data: 'url...' }
                    if (res.data.status == true) {
                        // Chuyển hướng sang VNPAY
                        window.location.href = res.data.payment_url;
                    } else {
                        this.$toast.error("Không tạo được liên kết thanh toán!");
                    }
                    // -----------------
                })
                .catch(err => {
                    console.log(err);
                    this.$toast.error("Lỗi khi tạo thanh toán!");
                });
        }


    },

}
</script>