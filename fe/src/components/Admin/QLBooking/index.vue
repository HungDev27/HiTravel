<template>
    <div class="container py-4">
        <div class="card border-0 shadow-lg" style="background-color: white; border-radius: 12px;">
            <div class="card-body p-4">

                <!-- HEADER & FILTER -->
                <div class="row g-3 mb-4 align-items-end" style="border-bottom: 1px solid #e9ecef; padding-bottom: 20px;">
                    <div class="col-12 col-lg-5">
                        <h4 class="fw-bolder mb-1" style="color: #007bff;">
                            <i class="fa-solid fa-clipboard-list me-2"></i> DANH SÁCH BOOKING
                        </h4>
                        <span class="text-secondary small">Quản lý và theo dõi các đơn hàng du lịch của khách.</span>
                    </div>

                    <div class="col-12 col-lg-7">
                        <div class="row g-2 justify-content-lg-end align-items-end">
                            <div class="col-6 col-md-4 col-lg-3">
                                <label class="text-secondary fw-bold mb-1" style="font-size: 0.85rem;">Từ ngày</label>
                                <input type="date" class="form-control form-control-sm border-secondary" v-model="search.from_date" style="border-radius: 8px;">
                            </div>

                            <div class="col-6 col-md-4 col-lg-3">
                                <label class="text-secondary fw-bold mb-1" style="font-size: 0.85rem;">Đến ngày</label>
                                <input type="date" class="form-control form-control-sm border-secondary" v-model="search.to_date" style="border-radius: 8px;">
                            </div>

                            <div class="col-6 col-md-2 col-lg-auto">
                                <button class="btn btn-primary btn-sm w-100 text-white shadow-sm" @click="locDanhSach()" style="border-radius: 8px; font-weight: bold;">
                                    <i class="fa-solid fa-filter me-1"></i> Lọc
                                </button>
                            </div>

                            <div class="col-6 col-md-1 col-lg-auto">
                                <button class="btn btn-outline-secondary btn-sm w-100 border" title="Tải lại"
                                    @click="taiLai()" style="border-radius: 8px;">
                                    <i class="fa-solid fa-rotate-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="min-width: 1200px;">
                        <thead style="background-color: #f8f9fa;">
                            <tr style="font-size: 0.8rem; text-transform: uppercase;">
                                <th class="text-secondary py-3 ps-3" style="width: 100px;">Mã đơn hàng</th>
                                <th class="text-secondary py-3" style="width: 220px;">Khách hàng & Liên hệ</th>
                                <th class="text-secondary py-3" style="width: 250px;">Tour đã đặt</th>
                                <th class="text-secondary py-3" style="width: 150px;">Chi tiết đặt</th>
                                <th class="text-secondary py-3 text-center" style="width: 100px;">Ngày đặt</th>
                                <th class="text-secondary py-3 text-end" style="width: 150px;">Tổng tiền thực nhận</th>
                                <th class="text-secondary py-3 text-center" style="width: 120px;">Trạng thái</th>
                                <th class="text-secondary py-3 text-center" style="width: 110px;">Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Trạng thái Đang tải -->
                            <tr v-if="loading">
                                <td colspan="8" class="text-center py-5">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2 text-primary fw-bold">Đang tải dữ liệu...</p>
                                </td>
                            </tr>
                            
                            <!-- Trạng thái Không có dữ liệu -->
                            <tr v-else-if="list_dsBooking.length === 0">
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fa-solid fa-info-circle me-2"></i> Không tìm thấy đơn đặt tour nào trong phạm vi đã chọn.
                                </td>
                            </tr>
                            
                            <!-- Hiển thị Dữ liệu -->
                            <tr v-else v-for="(value, index) in list_dsBooking" :key="index" style="font-size: 0.9rem;">

                                <!-- Mã đơn Hàng -->
                                <td class="ps-3 fw-bold text-primary">
                                    #{{ value.ma_don_hang }}
                                </td>

                                <!-- Khách hàng -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img :src="value.avatar || 'https://placehold.co/40x40/adb5bd/FFFFFF?text=AV'" class="border shadow-sm me-3"
                                            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">

                                        <div class="d-flex flex-column lh-sm">
                                            <span class="fw-bold text-dark" style="font-size: 0.95rem;">
                                                {{ value.ten_khach_hang || value.ten_lien_lac }}
                                            </span>
                                            <small class="text-muted" style="font-size: 0.8rem;">
                                                <i class="fa-solid fa-phone me-1"></i>
                                                {{ value.so_dien_thoai_lien_lac }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <!-- Thông tin Tour -->
                                <td>
                                    <span class="fw-bold text-dark">{{ value.ten_tour }}</span>

                                    <!-- Voucher -->
                                    <div v-if="value.phan_tram_giam > 0" class="mt-1">
                                        <span
                                            class="badge text-danger border border-danger border-opacity-25"
                                            style="background: #fde8e8;">
                                            <i class="fa-solid fa-ticket me-1"></i>
                                            Voucher: -{{ value.phan_tram_giam }}%
                                        </span>
                                    </div>
                                </td>

                                <!-- Chi tiết đặt (Số khách & Voucher) -->
                                <td>
                                    <div
                                        class="d-inline-flex align-items-center bg-white border rounded-pill px-3 py-1 shadow-sm">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold text-dark small me-1">{{ value.so_nguoi_lon }}</span>
                                            <i class="fas fa-user text-primary" style="font-size: 0.75rem;"></i>
                                        </div>
                                        <div class="border-start mx-2" style="height: 14px;"></div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-muted small me-1">{{ value.so_tre_em }}</span>
                                            <i class="fas fa-child text-secondary" style="font-size: 0.75rem;"></i>
                                        </div>
                                    </div>
                                </td>

                                <!-- Ngày đặt (Đã thêm format) -->
                                <td class="text-center">
                                    <span class="fw-bold text-dark">{{ formatDate(value.ngay_dat) }}</span>
                                </td>

                                <!-- Tổng tiền THỰC NHẬN -->
                                <td class="text-end">
                                    <span class="fw-bolder fs-6" style="color: #dc3545;">{{ formatVND(value.tien_thuc_nhan) }}</span>
                                </td>

                                <!-- Trạng thái (Dropdown để thay đổi) -->
                                <td class="text-center">
                                    <select class="form-select form-select-sm fw-bold text-white mx-auto" 
                                            :value="value.trang_thai"
                                            @change="changeStatus(value.id, $event.target.value)"
                                            :style="getStatusStyle(value.trang_thai)"
                                            style="border: none; border-radius: 8px; min-width: 110px;">
                                        <option value="cho_xu_ly" style="background-color: #ffc107; color: #333;">Chờ xử lý</option>
                                        <option value="da_thanh_toan" style="background-color: #28a745; color: white;">Hoàn tất</option>
                                        <option value="da_huy" style="background-color: #dc3545; color: white;">Đã hủy</option>
                                    </select>
                                </td>

                                <!-- Hành động -->
                                <td class="text-center">                                    
                                    <button class="btn btn-sm btn-link p-1 text-danger border-0 bg-transparent"
                                            @click="delete_booking = value" data-bs-toggle="modal" data-bs-target="#xoaModal" title="Xóa đơn hàng">
                                        <i class="fa-solid fa-trash-can" style="font-size: 16px;"></i>
                                    </button>
                                </td>

                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- MODAL XÓA (Giữ nguyên cấu trúc nhưng dùng icon hiện đại hơn) -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow" style="border-radius: 12px;">

                <!-- Header -->
                <div class="modal-header bg-danger text-white border-0" style="border-radius: 12px 12px 0 0;">
                    <h5 class="modal-title" id="xoaModalLabel">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i> Xác nhận xoá đơn hàng
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Đóng"></button>
                </div>

                <!-- Body -->
                <div class="modal-body text-center p-4">

                    <div style="font-size: 48px; color: #dc3545;">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>

                    <h5 class="mt-3">Bạn có chắc chắn muốn xóa?</h5>
                    <p class="text-secondary" >Tên Tour: <span class="fw-bold">{{
                            delete_booking.ten_tour }}</span></p>
                        <span class="small text-danger fw-bold">Hành động này không thể hoàn tác và có thể ảnh hưởng đến dữ liệu thống kê.</span>

                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 50rem;">Hủy</button>
                    <button type="button" class="btn btn-danger px-4" v-on:click="xoaDanhSach()"
                        data-bs-dismiss="modal" style="border-radius: 50rem;">Xoá</button>
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
            loading: true, // Thêm trạng thái loading
            search: {
                from_date: '',
                to_date: '',
            }
        }
    },

    methods: {
        // Hàm định dạng tiền tệ VND
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", {
                style: "currency",
                currency: "VND"
            }).format(number);
        },
        
        // Hàm định dạng ngày tháng
        formatDate(dateString) {
            if (!dateString) return '---';
            const date = new Date(dateString);
            return `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
        },
        
        // Hàm trả về Style CSS cho Dropdown Trạng thái
        getStatusStyle(status) {
            switch (status) {
                case 'da_thanh_toan':
                    return 'background-color: #28a745; color: white;';
                case 'cho_xu_ly':
                    return 'background-color: #ffc107; color: #333;';
                case 'da_huy':
                    return 'background-color: #dc3545; color: white;';
                default:
                    return 'background-color: #f8f9fa; color: #333;';
            }
        },

        // THAY ĐỔI TRẠNG THÁI ĐƠN HÀNG (Mới)
        changeStatus(id, newStatus) {
            // Xác định đơn hàng đang được thay đổi
            const itemIndex = this.list_dsBooking.findIndex(item => item.id === id);
            if (itemIndex === -1) return;

            // Cập nhật tạm thời trên giao diện (Optimistic UI update)
            this.list_dsBooking[itemIndex].trang_thai = newStatus;

            // Gửi API POST để cập nhật trạng thái
            axios.post('http://127.0.0.1:8000/api/admin/dat-tour/change-status', {
                id: id,
                trang_thai: newStatus
            })
            .then(res => {
                if (res.data.status) {
                    this.$toast.success(res.data.message);
                } else {
                    // Nếu API thất bại, hiển thị lỗi và tải lại dữ liệu để đồng bộ trạng thái cũ
                    this.$toast.error(res.data.message || 'Cập nhật trạng thái thất bại.');
                    this.getDanhSach(); 
                }
            })
            .catch(error => {
                // Xử lý lỗi kết nối
                this.$toast.error('Lỗi hệ thống khi cập nhật trạng thái.');
                console.error("Lỗi cập nhật trạng thái:", error);
                this.getDanhSach(); // Tải lại để đồng bộ
            });
        },


        // LẤY DANH SÁCH
        getDanhSach() {
            this.loading = true; // Bắt đầu tải
            axios.get('http://127.0.0.1:8000/api/admin/chi-tiet-dat-tour/get-data')
                .then(res => {
                    this.list_dsBooking = res.data.data;
                })
                .catch(error => {
                    console.error("Lỗi tải danh sách booking:", error);
                    this.list_dsBooking = [];
                })
                .finally(() => {
                    this.loading = false; // Kết thúc tải
                });
        },


        // XOÁ
        xoaDanhSach() {
            axios.post('http://127.0.0.1:8000/api/admin/dat-tour/delete',
                this.delete_booking
            )
                .then(res => {
                    this.getDanhSach();
                    this.$toast.success(res.data.message);
                });
        },

        locDanhSach() {
            this.loading = true; // Bắt đầu tải
            axios.post("http://127.0.0.1:8000/api/admin/dat-tour/loc-thong-tin", {
                from_date: this.search.from_date || null,
                to_date: this.search.to_date || null
            })
                .then(res => {
                    this.list_dsBooking = res.data.data;
                })
                .catch(error => {
                    console.error("Lỗi lọc danh sách booking:", error);
                    this.list_dsBooking = [];
                })
                .finally(() => {
                    this.loading = false; // Kết thúc tải
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