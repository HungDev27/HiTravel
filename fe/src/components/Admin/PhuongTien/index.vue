<template>
    <div class="container">
        <div class="row">

            <!-- Thêm mới -->
            <div class="col-lg-3">
                <div
                    style="font-family: Arial, sans-serif; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 20px;">
                    <div
                        style="background: #1976d2; color: #fff; margin: -20px -20px 20px -20px; padding: 12px; border-top-left-radius: 8px; border-top-right-radius: 8px; font-size: 16px; text-align: center;">
                        THÊM PHƯƠNG TIỆN MỚI
                    </div>

                    <input v-model="create_phuongtien.ten_phuong_tien" type="text" placeholder="Tên phương tiện"
                        style="width: 100%; padding: 8px; margin-bottom: 10px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <select v-model="create_phuongtien.id_tour" class="form-select mb-3">
                        <option value="" disabled>-- Chọn tour --</option>
                        <option v-for="tour in tours" :key="tour.id" :value="tour.id">
                            {{ tour.ten_tour }}
                        </option>
                    </select>

                    <label><b>Biển số xe</b></label>
                    <input type="text" v-model="create_phuongtien.bien_so" @blur="validateBienSo"
                        placeholder="Ví dụ: 43A-12345"
                        style="width:100%; padding:8px; margin-bottom:5px; border:none; border-bottom:1px solid #ccc; outline:none; font-size:14px;" />

                    <p v-if="error_bienso" style="color:red; font-size:13px; margin-top:3px;">
                        {{ error_bienso }}
                    </p>

                    <input v-model="create_phuongtien.suc_chua" type="number" placeholder="Sức chứa (số ghế)"
                        style="width: 100%; padding: 8px; margin-bottom: 10px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <select class="form-select mb-3" aria-label="Default select example"
                        v-model="create_phuongtien.trang_thai">
                        <option selected disabled>Chọn trạng thái của xe</option>
                        <option value="1">Sẵn sàng</option>
                        <option value="0">Đang sử dụng</option>
                        <option value="2">Bảo trì</option>
                    </select>

                    <textarea v-model="create_phuongtien.ghi_chu"
                        placeholder="Ghi chú phân công (Ví dụ: Xe đón khách VIP)..." rows="4" class="form-control mb-3"
                        style="width: 100%; height: 80px; padding: 8px; font-size: 14px; box-sizing: border-box;"></textarea>

                    <button v-on:click="themPhuongTien()"
                        style="width: 100%; background-color: #1976d2; color: white; padding: 10px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer;">
                        LƯU THÔNG TIN
                    </button>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <template v-for="(value, index) in phuongTiens" :key="index">
                        <div class="col-lg-6 col-md-12 mb-4">

                            <div class="card h-100 border-0 shadow"
                                style="border-radius: 20px; overflow: hidden; background: #fff;">
                                <div class="row g-0 h-100">

                                    <div class="col-md-5 p-3">
                                        <div class="d-flex align-items-center justify-content-center h-100"
                                            style="background-color: #e1e7f3; border-radius: 16px; min-height: 140px; overflow: hidden;">
                                            <img :src="layHinhAnhXe(value.ten_phuong_tien)" alt="Xe"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="card-body d-flex flex-column py-3 pe-3 ps-0 h-100">

                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <h5 class="fw-bold text-primary mb-0 me-2" style="font-size: 1.1rem; line-height: 1.4; 
                                                        display: -webkit-box; -webkit-line-clamp: 2; 
                                                        -webkit-box-orient: vertical; overflow: hidden;">
                                                    {{ value.ten_phuong_tien }}
                                                </h5>

                                                <div @click="doiTrangThai(value)"
                                                    style="cursor: pointer; flex-shrink: 0;">
                                                    <span v-if="value.trang_thai == 2"
                                                        class="badge rounded-pill bg-danger text-white px-3 py-2 d-flex align-items-center"
                                                        style="font-weight: 600; font-size: 0.85rem; box-shadow: 0 4px 8px rgba(220,53,69,0.3);">
                                                        <i class="fa-solid fa-gear me-2"></i> Bảo trì
                                                    </span>
                                                    <span v-if="value.trang_thai == 1"
                                                        class="badge rounded-pill bg-success text-white px-3 py-2 d-flex align-items-center"
                                                        style="font-weight: 600; font-size: 0.85rem; box-shadow: 0 4px 8px rgba(25,135,84,0.3);">
                                                        <i class="fa-solid fa-circle-check me-2"></i> Sẵn sàng
                                                    </span>
                                                    <span v-if="value.trang_thai == 0"
                                                        class="badge rounded-pill bg-primary text-white px-3 py-2 d-flex align-items-center"
                                                        style="font-weight: 600; font-size: 0.85rem; box-shadow: 0 4px 8px rgba(13,110,253,0.3);">
                                                        <i class="fa-solid fa-circle-play me-2"></i> Đang dùng
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="p-2 d-flex flex-column justify-content-center border"
                                                        style="background-color: #dbe4ef; border-radius: 12px; height: 100%; border-color: #dbe4ef !important;">
                                                        <div class="d-flex align-items-center text-secondary mb-1">
                                                            <i class="fa-solid fa-id-card me-2"
                                                                style="font-size: 12px;"></i>
                                                            <small style="font-size: 11px; font-weight: 500;">Biển
                                                                số</small>
                                                        </div>
                                                        <span class="fw-bold text-dark ps-1 text-break"
                                                            style="font-size: 13px;">
                                                            {{ value.bien_so }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="p-2 d-flex flex-column justify-content-center border"
                                                        style="background-color: #dbe4ef; border-radius: 12px; height: 100%; border-color: #dbe4ef !important;">
                                                        <div class="d-flex align-items-center text-secondary mb-1">
                                                            <i class="fa-solid fa-users me-2"
                                                                style="font-size: 12px;"></i>
                                                            <small style="font-size: 11px; font-weight: 500;">Sức
                                                                chứa</small>
                                                        </div>
                                                        <span class="fw-bold text-dark ps-1" style="font-size: 13px;">
                                                            {{ value.suc_chua }} chỗ
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-auto pt-3 border-top d-flex align-items-center gap-2"
                                                style="border-color: #e0e0e0 !important;">

                                                <button @click="openDetail(value)" type="button"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#chitietModal" style="border-radius: 50px;">
                                                    <i class="fa-solid fa-circle-info me-0"></i> <span class="mb-1">Chi
                                                        tiết</span>
                                                </button>

                                                <button @click="openEdit(value)" type="button"
                                                    class="btn btn-sm btn-outline-warning rounded-circle d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="modal" data-bs-target="#suaModal"
                                                    style="width: 38px; height: 38px; border-width: 2px; padding: 0;">
                                                    <i class="fa-solid fa-pen ms-1" style="font-size: 15px;"></i>
                                                </button>

                                                <button type="button" @click="delete_phuongtien = value"
                                                    class="btn btn-sm btn-outline-danger rounded-circle d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="modal" data-bs-target="#xoaModal"
                                                    style="width: 38px; height: 38px; border-width: 2px; padding: 0;">
                                                    <i class="fa-solid fa-minus ms-1" style="font-size: 15px;"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Chi tiết phương tiện -->
    <div class="modal fade" id="chitietModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">

                <div class="modal-header border-0 pb-0 d-flex flex-column align-items-center pt-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-bus" style="font-size: 24px;"></i>
                    </div>
                    <h5 class="modal-title fw-bold text-uppercase" style="letter-spacing: 1px;">
                        {{ currentPhuongTien.ten_phuong_tien }}
                    </h5>
                    <p class="text-muted small mb-2">Thông tin chi tiết xe</p>
                </div>

                <div class="modal-body px-4 pt-2 pb-4">

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3 h-100 border border-light">
                                <small class="text-muted d-block mb-1"><i class="fa-solid fa-id-card me-1"></i> Biển
                                    số</small>
                                <span class="fw-bold text-dark">{{ currentPhuongTien.bien_so }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3 h-100 border border-light">
                                <small class="text-muted d-block mb-1"><i class="fa-solid fa-users me-1"></i> Sức
                                    chứa</small>
                                <span class="fw-bold text-dark">{{ currentPhuongTien.suc_chua }} chỗ</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div
                                class="p-3 bg-light rounded-3 h-100 border border-light d-flex flex-column justify-content-center align-items-center">
                                <small class="text-muted d-block mb-1"><i class="fa-solid fa-info-circle me-1"></i>
                                    Trạng thái hiện tại</small>
                                <div>
                                    <span v-if="currentPhuongTien.trang_thai == 2"
                                        class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2">
                                        <i class="fa-solid fa-gear me-1"></i> Bảo trì
                                    </span>
                                    <span v-if="currentPhuongTien.trang_thai == 1"
                                        class="badge bg-success bg-opacity-10 text-success rounded-pill px-2">
                                        <i class="fa-solid fa-circle-check me-1"></i> Sẵn sàng
                                    </span>
                                    <span v-if="currentPhuongTien.trang_thai == 0"
                                        class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-2">
                                        <i class="fa-solid fa-circle-play me-1"></i> Đang dùng
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border rounded-3 mb-3 bg-white">
                        <div class="text-center">
                            <small class="text-muted d-block mb-1">Đang chạy Tour</small>
                            <div class="fw-bold text-danger">
                                <i class="fa-solid fa-route me-1"></i>
                                {{ currentPhuongTien.tours?.[0]?.tour?.ten_tour || "Chưa được phân công" }}
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border rounded-3 mb-3 bg-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-center">
                                <small class="text-muted d-block mb-1">Ngày đi (Theo Tour)</small>
                                <div class="fw-bold text-primary">
                                    <i class="fa-regular fa-calendar-minus me-1"></i>
                                    {{ currentPhuongTien.tours?.[0]?.tour?.ngay_di || "--" }}
                                </div>
                            </div>
                            <div class="text-muted px-2"><i class="fa-solid fa-arrow-right"></i></div>
                            <div class="text-center">
                                <small class="text-muted d-block mb-1">Ngày về (Theo Tour)</small>
                                <div class="fw-bold text-success">
                                    <i class="fa-regular fa-calendar-check me-1"></i>
                                    {{ currentPhuongTien.tours?.[0]?.tour?.ngay_ve || "--" }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fw-bold text-secondary small text-uppercase">
                            <i class="fa-regular fa-note-sticky me-1"></i> Ghi chú phân công
                        </label>
                        <div class="p-3 bg-light rounded-3 text-secondary fst-italic border border-light"
                            style="min-height: 80px; font-size: 0.95rem;">
                            {{ currentPhuongTien.tours?.[0]?.ghi_chu || "Không có ghi chú" }}
                        </div>
                    </div>

                </div>

                <div class="modal-footer border-0 pt-0 px-4 pb-4">
                    <button type="button" class="btn btn-secondary w-100 rounded-pill fw-bold py-2"
                        data-bs-dismiss="modal">
                        Đóng lại
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal sửa -->
    <div class="modal fade" id="suaModal" tabindex="-1" aria-labelledby="suaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Sửa Thông Tin Xe & Phân Công</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form id="formSuaXe" @submit.prevent="capNhatPhuongTien">

                        <label class="mb-1 text-muted small">Phân công Tour</label>
                        <select v-model="edit_phuongtien.id_tour" class="form-select mb-3">
                            <option value="" disabled>-- Chọn tour --</option>
                            <option v-for="tour in tours" :key="tour.id" :value="tour.id">
                                {{ tour.ten_tour }}
                            </option>
                        </select>

                        <hr class="my-3">
                        <label class="mb-2 text-muted small fw-bold">Thông tin xe</label>

                        <div class="mb-3">
                            <input v-model="edit_phuongtien.ten_phuong_tien" type="text" class="form-control"
                                placeholder="Tên phương tiện">
                        </div>

                        <div class="mb-3">
                            <input v-model="edit_phuongtien.bien_so" type="text" class="form-control"
                                placeholder="Biển số xe">
                        </div>

                        <div class="mb-3">
                            <input v-model="edit_phuongtien.suc_chua" type="number" class="form-control"
                                placeholder="Sức chứa">
                        </div>

                        <div class="mb-3">
                            <select v-model="edit_phuongtien.trang_thai" class="form-select">
                                <option value="" disabled>Chọn trạng thái xe</option>
                                <option value="1">Sẵn sàng</option>
                                <option value="0">Đang sử dụng</option>
                                <option value="2">Bảo trì</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="mb-1 text-muted small">Ghi chú phân công</label>
                            <textarea v-model="edit_phuongtien.tours.ghi_chu" class="form-control" rows="3"
                                placeholder="Ghi chú nhiệm vụ của xe này trong tour..."></textarea>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" form="formSuaXe" class="btn btn-primary" data-bs-dismiss="modal">
                        Sửa thông tin
                    </button>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal xoá -->
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

                    <p class="mt-3 fs-5 fw-semibold text-dark">Bạn có chắc chắn muốn xoá {{
                        delete_phuongtien.ten_phuong_tien }}?</p>
                    <p class="text-secondary" id="thongTinXeCanXoa">Biển số: <span class="fw-bold">{{
                        delete_phuongtien.bien_so }}</span></p>

                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger px-4" @click="xoaPhuongTien()"
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
            phuongTiens: [],
            tours: [],
            error_bienso: "",

            create_phuongtien: {
                ten_phuong_tien: "",
                id_tour: "",
                bien_so: "",
                suc_chua: "",
                trang_thai: 1,
                ghi_chu: "",
            },

            edit_phuongtien: {
                id_tour: "",
                ten_phuong_tien: "",
                bien_so: "",
                suc_chua: "",
                trang_thai: "",
                tours: { // Object chứa thông tin phân công
                    id: "",
                    ghi_chu: "",
                }
            },

            delete_phuongtien: {},
            currentPhuongTien: {}, // Dùng cho modal chi tiết
        };
    },

    mounted() {
        this.getPhuongTien();
        this.getListTour();
    },

    methods: {
        layHinhAnhXe(ten_xe) {
            if (!ten_xe) return 'https://cdn-icons-png.flaticon.com/512/3202/3202926.png'; // Ảnh mặc định

            let ten = ten_xe.toLowerCase();

            // 1. Nếu là Limousine
            if (ten.includes('limousine')) {
                return 'https://i.pinimg.com/1200x/d1/fa/79/d1fa79dab3c2108a2c9af27858dab473.jpg';
            }

            // 2. Nếu là Giường nằm
            if (ten.includes('giường') || ten.includes('thaco')) {
                return 'https://i.pinimg.com/1200x/9b/0e/13/9b0e1307546d85026acc141657804f57.jpg';
            }

            // 3. Nếu là xe 16 chỗ (Ford Transit)
            if (ten.includes('16 chỗ') || ten.includes('transit')) {
                return 'https://i.pinimg.com/736x/9f/2d/40/9f2d40d52f71a01d96c89f1e79c812fd.jpg';
            }

            // 4. Nếu là xe 7 chỗ (Innova/Fortuner)
            if (ten.includes('7 chỗ') || ten.includes('innova') || ten.includes('ô tô')) {
                return 'https://i.pinimg.com/736x/4e/f2/ee/4ef2ee4e5078e2117093176bf7b4b792.jpg';
            }

            // 5. Xe điện
            if (ten.includes('điện')) {
                return 'https://i.pinimg.com/1200x/2f/31/36/2f31367faa060516483190a6b034e357.jpg';
            }

            // 6. Xe bus
            if (ten.includes('bus')) {
                return 'https://i.pinimg.com/736x/65/67/da/6567da2df1f5a45695f118751786b777.jpg';
            }

            // 7. Xe máy
            if (ten.includes('máy')) {
                return 'https://i.pinimg.com/736x/1b/d9/0e/1bd90e087c4d5cdde65a45a2175c7bd8.jpg';
            }

            // Mặc định
            return 'https://cdn-icons-png.flaticon.com/512/3202/3202926.png';
        },
        getPhuongTien() {
            axios.get('http://127.0.0.1:8000/api/admin/phuong-tien/get-data', {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    this.phuongTiens = res.data.data;
                })
                .catch(error => {
                    console.error('Lỗi lấy phương tiện:', error);
                });
        },


        getListTour() {
            axios.get('http://127.0.0.1:8000/api/admin/tour/get-data', {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    this.tours = res.data.data;
                })
                .catch(error => {
                    console.error('Lỗi khi lấy danh sách tour:', error);
                    if (error.response) {
                        console.log("Chi tiết lỗi:", error.response.data);
                    }
                });
        },

        themPhuongTien() {
            if (!this.validateForm()) { return; }
            axios.post('http://127.0.0.1:8000/api/admin/phuong-tien/add-data', this.create_phuongtien, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            }
            )
                .then((res) => {
                    if (!res.data.status) {
                        this.$toast.error(res.data.message);
                        return;
                    }

                    let idPT = res.data.data.id;
                    return axios.post('http://127.0.0.1:8000/api/admin/tour-pt/add-data', {
                        id_tour: this.create_phuongtien.id_tour,
                        id_phuong_tien: idPT,
                        ghi_chu: this.create_phuongtien.ghi_chu,
                    });
                })
                .then(() => {
                    this.$toast.success("Thêm và phân công xe thành công!");
                    this.getPhuongTien();
                    this.create_phuongtien = {
                        ten_phuong_tien: "",
                        id_tour: "",
                        bien_so: "",
                        suc_chua: "",
                        trang_thai: 1,
                        ghi_chu: "",
                    };
                    this.error_bienso = "";
                })
                .catch((err) => {
                    console.error(err);
                    this.$toast.error("Có lỗi xảy ra! Có thể biển số đã tồn tại.");
                });
        },

        capNhatPhuongTien() {
            axios.post('http://127.0.0.1:8000/api/admin/phuong-tien/update', this.edit_phuongtien,
                {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                    }
                }
            )
                .then((res) => {
                    if (!res.data.status) {
                        this.$toast.error(res.data.message);
                        return;
                    }

                    if (this.edit_phuongtien.tours && this.edit_phuongtien.tours.id) {
                        return axios.post('http://127.0.0.1:8000/api/admin/tour-pt/update', {
                            id: this.edit_phuongtien.tours.id, // ID dòng phân công
                            id_tour: this.edit_phuongtien.id_tour,
                            id_phuong_tien: this.edit_phuongtien.id,
                            ghi_chu: this.edit_phuongtien.tours.ghi_chu,
                        });
                    }
                })
                .then(() => {
                    this.$toast.success("Cập nhật thành công!");
                    this.getPhuongTien();
                })
                .catch(() => {
                    this.$toast.error("Lỗi cập nhật!");
                });
        },

        openEdit(pt) {
            this.edit_phuongtien = {
                ...pt,
                id_tour: "",
                tours: {
                    id: "",
                    ghi_chu: "",
                }
            };

            axios.get(`http://127.0.0.1:8000/api/admin/tour-pt/get-by-pt/${pt.id}`)
                .then((res) => {
                    if (res.data.data.length > 0) {
                        let t = res.data.data[0];
                        this.edit_phuongtien.tours = t; // Gán object phân công
                        this.edit_phuongtien.id_tour = t.id_tour; // Gán ID để hiển thị select box
                    }
                });
        },

        openDetail(pt) {
            this.currentPhuongTien = pt;
            axios.get(`http://127.0.0.1:8000/api/admin/tour-pt/get-by-pt/${pt.id}`)
                .then((res) => {
                    this.currentPhuongTien = {
                        ...pt,
                        tours: res.data.data // Gán mảng kết quả vào thuộc tính tours
                    };
                })
                .catch(err => console.log("Xe này chưa có tour", err));
        },

        xoaPhuongTien() {
            axios.post('http://127.0.0.1:8000/api/admin/phuong-tien/delete', {
                id: this.delete_phuongtien.id,

            }, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            },)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success('Xoá thành công!');
                        this.getPhuongTien();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(() => this.$toast.error("Lỗi kết nối API!"));
        },

        doiTrangThai(pt) {
            axios.post('http://127.0.0.1:8000/api/admin/phuong-tien/chang-status', { id: pt.id },
                {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                    }
                }
            )
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success("Đã đổi trạng thái!");
                        this.getPhuongTien();
                    }
                });
        },

        validateBienSo() {
            const bienSo = this.create_phuongtien.bien_so.toUpperCase().trim();
            // Regex cơ bản cho biển số xe ô tô VN (VD: 43A-123.45 hoặc 43A-12345)
            // Cho phép có dấu chấm hoặc không
            const regex = /^[0-9]{2}[A-Z]-[0-9]{3}(\.)?[0-9]{2}$|^[0-9]{2}[A-Z]-[0-9]{4,5}$/;

            if (bienSo && !regex.test(bienSo)) {
                this.error_bienso = "Biển số không đúng định dạng (VD: 43A-12345)";
                return false;
            }
            this.error_bienso = "";
            return true;
        },

        validateForm() {
            if (!this.create_phuongtien.ten_phuong_tien.trim()) {
                this.$toast.error("Tên phương tiện không được để trống!");
                return false;
            }
            if (!this.create_phuongtien.id_tour) {
                this.$toast.error("Vui lòng chọn tour để phân công!");
                return false;
            }
            // Gọi hàm validate biển số
            if (this.create_phuongtien.bien_so && !this.validateBienSo()) {
                this.$toast.error("Biển số xe không hợp lệ!");
                return false;
            }

            if (!this.create_phuongtien.suc_chua || this.create_phuongtien.suc_chua <= 0) {
                this.$toast.error("Sức chứa phải lớn hơn 0!");
                return false;
            }
            return true;
        }
    }
};
</script>