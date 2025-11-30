<template>
    <div class="container">
        <div class="card border-0 shadow-sm" style="background: bisque;">
            <div class="card-body">

                <!-- FILTER -->
                <div class="row g-3 mb-4 align-items-end">
                    <div class="col-12 col-lg-4">
                        <h4 class="fw-bold mb-1">Danh sách Booking</h4>
                        <span class="text-secondary small">Quản lý và theo dõi các đơn hàng</span>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="row g-2 justify-content-lg-end align-items-end">
                            <div class="col-6 col-md-4 col-lg-3">
                                <label class="text-secondary fw-bold mb-1" style="font-size: 0.85rem;">Từ ngày</label>
                                <input type="date" class="form-control form-control-sm" v-model="search.from_date">
                            </div>

                            <div class="col-6 col-md-4 col-lg-3">
                                <label class="text-secondary fw-bold mb-1" style="font-size: 0.85rem;">Đến ngày</label>
                                <input type="date" class="form-control form-control-sm" v-model="search.to_date">
                            </div>

                            <div class="col-6 col-md-2 col-lg-auto">
                                <button class="btn btn-primary btn-sm w-100 text-white" @click="locDanhSach()">
                                    <i class="fa-solid fa-magnifying-glass me-1"></i>Lọc
                                </button>
                            </div>

                            <div class="col-6 col-md-1 col-lg-auto">
                                <button class="btn btn-light btn-sm w-100 border text-secondary" title="Tải lại"
                                    @click="taiLai()">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0" style="min-width: 1000px;">
                        <thead class="bg-light">
                            <tr style="font-size: 0.85rem;">
                                <th class="text-secondary text-uppercase py-3 ps-3">Mã đơn</th>
                                <th class="text-secondary text-uppercase py-3">Khách hàng</th>
                                <th class="text-secondary text-uppercase py-3">Thông tin Tour</th>
                                <th class="text-secondary text-uppercase py-3">Số khách</th>
                                <th class="text-secondary text-uppercase py-3">Ngày đặt</th>
                                <th class="text-secondary text-uppercase py-3 text-end">Tổng tiền</th>
                                <th class="text-secondary text-uppercase py-3 text-center">Trạng thái</th>
                                <th class="text-secondary text-uppercase py-3 text-center">Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(value, index) in list_dsBooking" :key="index">

                                <!-- Mã đơn -->
                                <td class="ps-3">
                                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary">
                                        #{{ index + 1 }}
                                    </span>
                                </td>

                                <!-- Khách hàng -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img :src="value.avatar" class="border shadow-sm me-2"
                                            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">

                                        <div class="d-flex flex-column lh-sm">
                                            <span class="fw-bold text-dark" style="font-size: 0.95rem;">
                                                {{ value.ten_khach_hang }}
                                            </span>
                                            <small class="text-muted" style="font-size: 0.8rem;">
                                                <i class="fa-solid fa-address-card me-1"></i>
                                                {{ value.cccd }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <!-- Thông tin Tour -->
                                <td>
                                    <span class="fw-bold text-dark">{{ value.ten_tour }}</span>

                                    <!-- Voucher -->
                                    <div v-if="value.id_ma_giam_gia" class="mt-1">
                                        <span
                                            class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">
                                            <i class="fa-solid fa-ticket me-1"></i>
                                            Voucher: {{ value.phan_tram_giam }}%
                                        </span>
                                    </div>
                                </td>

                                <!-- Số khách -->
                                <td>
                                    <div
                                        class="d-inline-flex align-items-center bg-white border rounded-pill px-3 py-1 shadow-sm">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold text-dark small me-1">{{ value.so_nguoi_lon }}</span>
                                            <i class="fas fa-user text-secondary" style="font-size: 0.75rem;"></i>
                                        </div>
                                        <div class="border-start mx-2" style="height: 14px;"></div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-muted small me-1">{{ value.so_tre_em }}</span>
                                            <i class="fas fa-child text-secondary" style="font-size: 0.75rem;"></i>
                                        </div>
                                    </div>
                                </td>

                                <!-- Ngày đặt -->
                                <td>
                                    <span class="fw-bold text-dark">{{ value.ngay_dat }}</span>
                                </td>

                                <!-- Tổng tiền -->
                                <td class="text-end">
                                    <span class="fw-bold text-danger fs-6">{{ formatVND(value.tong_tien) }}</span>
                                </td>

                                <!-- Trạng thái -->
                                <td class="text-center">

                                    <span v-if="value.trang_thai === 'da_thanh_toan'" class="badge"
                                        style="background:#d8fbd0;color:limegreen;">
                                        Đã thanh toán
                                    </span>

                                    <span v-if="value.trang_thai === 'cho_xu_ly'" class="badge"
                                        style="background:khaki;color:darkorange;">
                                        Chờ xử lý
                                    </span>

                                    <span v-if="value.trang_thai === 'da_huy'" class="badge"
                                        style="background:lightpink;color:crimson;">
                                        Đã hủy
                                    </span>
                                </td>

                                <!-- Hành động -->
                                <td class="text-center">
                                    <button class="btn btn-link p-0 text-danger border-0 bg-transparent"
                                         @click="delete_booking = value" data-bs-toggle="modal" data-bs-target="#xoaModal">
                                        <i class="fa-solid fa-circle-minus" style="font-size: 30px;"></i>
                                    </button>
                                </td>

                            </tr>                                                       
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">

                <!-- Header -->
                <div class="modal-header bg-danger text-white border-0">
                    <h5 class="modal-title" id="xoaModalLabel">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Xác nhận xoá
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Đóng"></button>
                </div>

                <!-- Body -->
                <div class="modal-body text-center p-4">

                    <div style="font-size: 48px; color: #dc3545;">
                        <i class="bi bi-trash-fill"></i>
                    </div>


                    <p class="text-secondary" >Tên Tour: <span class="fw-bold">{{
                            delete_booking.ten_tour }}</span></p>
                            <span class="small text-danger">Hành động này không thể hoàn tác.</span>

                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger px-4" v-on:click="xoaDanhSach()"
                        data-bs-dismiss="modal">Xoá</button>
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
            list_dsBooking: [],
            delete_booking: {},
            search: {
                from_date: '',
                to_date: '',
            }
        }
    },

    methods: {

        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", {
                style: "currency",
                currency: "VND"
            }).format(number);
        },

        // LẤY DANH SÁCH
        getDanhSach() {
            axios.get('http://127.0.0.1:8000/api/admin/dat-tour/get-data')
                .then(res => {
                    this.list_dsBooking = res.data.data;
                });
        },


        // XOÁ
        xoaDanhSach(item) {
            axios.post('http://127.0.0.1:8000/api/admin/dat-tour/delete',
                this.delete_booking
            )
                .then(res => {
                    this.getDanhSach();
                    this.$toast.success(res.data.message);
                });
        },

        locDanhSach() {
            axios.post("http://127.0.0.1:8000/api/admin/dat-tour/loc-thong-tin", {
                from_date: this.search.from_date || null,
                to_date: this.search.to_date || null
            })
                .then(res => {
                    this.list_dsBooking = res.data.data;
                });
        },

        taiLai() {
            this.search.from_date = "";
            this.search.to_date = "";
            this.getDanhSach();
        }




    },

    mounted() {
        this.getDanhSach();
    }
}
</script>
