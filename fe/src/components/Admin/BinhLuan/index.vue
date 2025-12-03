<template>
    <div class="container">
        <div class="d-flex justify-content-start">
            <i class="fa-regular fa-comment-dots fa-2xl me-2 mt-3"></i>
            <h3>Quản lý đánh giá</h3>
        </div>
        <span class="text-secondary">Xem ý kiến khách hàng về các Tour du lịch</span>

        <!-- ĐẾM -->
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="d-flex justify-content-start mt-2 ms-3 mb-3">
                        <span
                            style="background: #bed9ee; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 10px; margin-top: 7px; margin-right: 10px;"><i
                                class="fa-lg fa-regular fa-comment text-primary"></i></span>
                        <div class="d-flex flex-column">
                            <div style="font-size: large;"><b>{{ reviews.length }}</b></div>
                            <div class="text-secondary">Tổng đánh giá</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="d-flex justify-content-start mt-2 ms-3 mb-3">
                        <span
                            style="background: #ffea9e; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 10px; margin-top: 7px; margin-right: 10px;">
                            <i class="fa-regular fa-star" style="color: #e0b000;"></i>
                        </span>
                        <div class="d-flex flex-column">
                            <div style="font-size: large;"><b>{{ diemTB }}/5</b></div>
                            <div class="text-secondary">Điểm trung bình</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="d-flex justify-content-start mt-2 ms-3 mb-3">
                        <span
                            style="background: #ffb8c6; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 10px; margin-top: 7px; margin-right: 10px;">
                            <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        </span>
                        <div class="d-flex flex-column">
                            <div style="font-size: large;"><b>{{ xulygap }}</b></div>
                            <div class="text-secondary">Cần xử lý gấp</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="d-flex justify-content-between mt-3 ms-3 mb-3">
                        <div
                            style="display: flex; align-items: center; width: 100%; max-width: 400px; padding: 10px 16px; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #ffffff; box-sizing: border-box;">
                            <svg style="width: 20px; height: 20px; color: #9ca3af; margin-right: 10px; flex-shrink: 0;"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>

                            <!-- TÌM KIẾM -->
                            <input type="text" v-model="timkiem" placeholder="Tìm kiếm khách hàng, tour, bình luận..."
                                style="border: none; outline: none; width: 100%; font-size: 14px; color: #333; background: transparent;">

                        </div>
                        <div class="d-flex justify-content-end">
                            <!-- LỌC SAO -->
                            <select v-model="locSao" @change="applyFilter" class="form-select fw-bold me-3"
                                aria-label="Star Rating" style="width: 130px; border-radius: 12px;
                                border: 1px solid #dee2e6; box-shadow: 0 2px 4px rgba(0,0,0,0.03);
                                cursor: pointer; color: #495057; background-color: #fff;"
                                onfocus="this.style.borderColor='#86b7fe'; this.style.boxShadow='0 0 0 0.25rem rgba(13,110,253,.25)'"
                                onblur="this.style.borderColor='#dee2e6'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.03)'">

                                <option selected value="all">Tất cả sao</option>

                                <option value="5" style="color: #ffc107; font-weight: bold;">
                                    5 &#9733;&#9733;&#9733;&#9733;&#9733;
                                </option>

                                <option value="4" style="color: #ffc107; font-weight: bold;">
                                    4 &#9733;&#9733;&#9733;&#9733;
                                </option>

                                <option value="3" style="color: #ffc107; font-weight: bold;">
                                    3 &#9733;&#9733;&#9733;
                                </option>

                                <option value="2" style="color: #ffc107; font-weight: bold;">
                                    2 &#9733;&#9733;
                                </option>
                                <option value="1" style="color: #ffc107; font-weight: bold;">
                                    1 &#9733;
                                </option>

                            </select>

                            <!-- LỌC ẢNH -->
                            <select v-model="locAnh" @change="applyFilter" class="form-select fw-bold me-3"
                                aria-label="Star Rating" style="border-radius: 12px;
                                border: 1px solid #dee2e6; box-shadow: 0 2px 4px rgba(0,0,0,0.03);
                                cursor: pointer; color: #495057; background-color: #fff;"
                                onfocus="this.style.borderColor='#86b7fe'; this.style.boxShadow='0 0 0 0.25rem rgba(13,110,253,.25)'"
                                onblur="this.style.borderColor='#dee2e6'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.03)'">

                                <option selected value="all">Tất cả bình luận</option>

                                <option value="5" style="color: #333; font-weight: bold;">
                                    Có ảnh
                                </option>

                                <option value="4" style="color: #333; font-weight: bold;">
                                    Không có ảnh
                                </option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div style="background-color: #f9fafb; min-height: 100vh;" class="p-3">

                    <table class="table table-borderless"
                        style="border-collapse: separate; border-spacing: 0 15px; min-width: 1000px;">

                        <thead>
                            <tr
                                style="font-size: 12px; text-transform: uppercase; color: #6c757d; letter-spacing: 0.5px;">
                                <th class="fw-bold ps-4">ID</th>
                                <th class="fw-bold">Khách hàng</th>
                                <th class="fw-bold">Tour & Thời gian</th>
                                <th class="fw-bold">Đánh giá</th>
                                <th class="fw-bold" style="width: 30%;">Nội dung</th>
                                <th class="text-secondary text-uppercase py-3 text-center">Trạng thái</th>
                                <th class="fw-bold text-end pe-4">Tác vụ</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(review, index) in loc" :key="index"
                                style="box-shadow: 0 2px 6px rgba(0,0,0,0.02);">

                                <!-- id -->
                                <td class="bg-white align-middle ps-4"
                                    style="border-top-left-radius: 12px; border-bottom-left-radius: 12px; padding: 20px;">
                                    <span class="text-secondary fw-bold" style="font-size: 14px;">#{{ index + 1
                                    }}</span>
                                </td>

                                <!-- Tên khách hàng với email -->
                                <td class="bg-white align-middle">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white me-3"
                                            style="width: 40px; height: 40px; background-color: #00c853; font-size: 14px;">
                                            {{ review.ten_khach.charAt(0) }}
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold text-dark" style="font-size: 14px;">{{ review.ten_khach
                                                }}</span>
                                            <span class="text-muted" style="font-size: 12px;">{{ review.email }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Tên tour với ngày tạo BL -->
                                <td class="bg-white align-middle">
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold mb-1" style="font-size: 14px; color: #6f42c1;">
                                            {{ review.tour_ten }}
                                        </span>
                                        <span class="text-muted" style="font-size: 12px;">
                                            <i class="fa-regular fa-calendar me-1"></i> {{ review.created_at }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Đánh giá sao -->
                                <td class="bg-white align-middle">
                                    <div class="d-flex align-items-center">
                                        <span class="fw-bold me-2" style="color: #ffc107;">{{ review.diem }}</span>
                                        <i class="fa-solid fa-star text-warning" style="font-size: 12px;"></i>
                                    </div>
                                </td>

                                <!-- Bình luận kèm hình ảnh -->
                                <td class="bg-white align-middle">
                                    <p class="text-dark mb-2" style="font-size: 13px; line-height: 1.5;">
                                        "{{ review.binh_luan }}"
                                    </p>

                                    <div class="d-flex gap-2 flex-wrap">
                                        <div v-for="(img, i) in review.hinh_anh" :key="i"
                                            class="position-relative d-inline-block cursor-pointer hover-zoom"
                                            @click="openZoomModal(review.hinh_anh)" style="width: 50px; height: 50px;">

                                            <img :src="img" class="img-thumbnail"
                                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px; padding: 2px;">
                                        </div>
                                    </div>

                                </td>

                                <!-- Trạng thái -->
                                <td class="text-center align-middle">
                                    <span class="badge" style="background: #d8fbd0; color: limegreen;"><i
                                            class="fa-solid fa-circle fa-xs me-2" style="color: limegreen;"></i>Hiển
                                        thị</span>
                                    <!-- <span class="badge" style="background: khaki; color: darkorange;"><i
                                        class="fa-solid fa-circle fa-xs me-2" style="color: darkorange;"></i>Chờ duyệt</span>
                                <span class="badge" style="background: lightpink; color: crimson;"><i
                                        class="fa-solid fa-circle fa-xs me-2" style="color: crimson;"></i>Ẩn</span> -->
                                </td>

                                <!-- Nút hành động -->
                                <td class="bg-white align-middle text-end pe-4"
                                    style="border-top-right-radius: 12px; border-bottom-right-radius: 12px;">
                                    <button data-bs-toggle="modal" data-bs-target="#xemModal"
                                        @click="xemChiTiet(review)"
                                        class="btn btn-light rounded-2 me-1 text-primary bg-primary bg-opacity-10 border-0">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button data-bs-toggle="modal" data-bs-target="#xoaModal"
                                        @click="chonDanhGiaCanXoa(review)"
                                        class="btn btn-light rounded-2 text-danger bg-danger bg-opacity-10 border-0">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal zoom ảnh -->
    <div class="modal fade" id="imageZoomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0 shadow-none">
                <div class="modal-body p-0 position-relative">

                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"
                        style="z-index: 1056; background-color: rgba(255,255,255,0.8); padding: 10px; border-radius: 50%;"></button>

                    <div id="reviewCarousel" class="carousel slide" data-bs-ride="false">

                        <div class="carousel-inner rounded shadow-lg">
                            <div v-for="(img, index) in zoomedImageList" :key="index"
                                :class="['carousel-item', { active: index === 0 }]">
                                <img :src="img" class="d-block w-100" style="max-height: 85vh; object-fit: contain;">
                            </div>
                        </div>

                        <button v-if="zoomedImageList.length > 1" class="carousel-control-prev" type="button"
                            data-bs-target="#reviewCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"
                                aria-hidden="true"></span>
                        </button>
                        <button v-if="zoomedImageList.length > 1" class="carousel-control-next" type="button"
                            data-bs-target="#reviewCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"
                                aria-hidden="true"></span>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal xem chi tiết -->
    <div class="modal fade" id="xemModal" tabindex="-1" aria-hidden="true" v-if="chiTiet">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">

                <div class="modal-header bg-primary text-white py-3">
                    <h5 class="modal-title fw-bold text-uppercase" style="font-size: 16px; letter-spacing: 1px;">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        Chi tiết đánh giá #{{ chiTiet?.id }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">

                    <div class="d-flex align-items-start mb-3">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-sm"
                                style="width: 60px; height: 60px; background-color: #28a745; font-size: 24px;">
                                {{ chiTiet?.ten_khach?.charAt(0) }}
                            </div>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">
                                        {{ chiTiet?.ten_khach }}
                                    </h6>

                                    <p class="text-muted small mb-1">
                                        <i class="fa-solid fa-envelope me-1"></i>{{ chiTiet?.email }}
                                    </p>

                                    <p class="text-primary small fw-bold mb-2">
                                        {{ chiTiet?.tour_ten }}
                                        <span class="text-secondary fw-normal ms-2">
                                            <i class="fa-regular fa-clock me-1"></i>{{ chiTiet?.created_at }}
                                        </span>
                                    </p>
                                </div>

                                <div class="text-end">
                                    <span class="fw-bold me-2" style="color: #ffc107;">
                                        {{ chiTiet?.diem }}/5
                                    </span>
                                    <i class="fa-solid fa-star text-warning" style="font-size: 12px;"></i>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded-3 border mt-2 position-relative">
                                <i
                                    class="fa-solid fa-quote-left text-secondary position-absolute top-0 start-0 m-2 opacity-25 fa-2x"></i>

                                <p class="fst-italic text-dark mb-0 ms-4" style="line-height: 1.6;">
                                    "{{ chiTiet?.binh_luan }}"
                                </p>
                            </div>

                            <div class="mt-3">
                                <p class="fw-bold text-secondary small mb-2">Hình ảnh đính kèm:</p>
                                <div class="d-flex gap-2 flex-wrap mt-2">
                                    <img v-for="(img, i) in chiTiet?.hinh_anh" :key="i" :src="img"
                                        class="rounded border shadow-sm cursor-pointer hover-scale"
                                        style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" style="border-top: 2px dashed #e0e0e0;">

                    <div class="bg-white rounded-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-2">
                                <i class="fa-solid fa-user-shield"></i>
                            </div>
                            <h6 class="fw-bold text-primary mb-0">Phản hồi & Kiểm duyệt</h6>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold text-secondary small">
                                    Nội dung trả lời khách hàng
                                </label>
                                <textarea class="form-control bg-light" rows="4"
                                    placeholder="Ví dụ: Cảm ơn quý khách đã góp ý..."
                                    v-model="chiTiet.phan_hoi"></textarea>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary small">
                                    Trạng thái hiển thị
                                </label>
                                <select class="form-select fw-bold text-success border-success">
                                    <option value="hien_thi" selected>Đang hiển thị</option>
                                    <option value="cho_duyet">Chờ duyệt</option>
                                    <option value="an">Ẩn bài viết</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-light border-top-0 py-3">
                    <button type="button" class="btn btn-outline-secondary px-4 rounded-pill fw-bold"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary px-4 rounded-pill fw-bold shadow-sm" @click="PhanHoi">
                        <i class="fa-solid fa-paper-plane me-2"></i>Gửi phản hồi & Lưu
                    </button>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal Xoa -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">

                <div class="modal-header border-0 pb-0 d-flex flex-column align-items-center pt-4">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 60px; height: 60px; background-color: #fce7e7; border: 4px solid #f9dcdc;">
                        <i class="fa-solid fa-triangle-exclamation fa-xl text-danger"></i>
                    </div>
                    <h5 class="modal-title fw-bold text-dark mt-3" id="xoaModalLabel">Xác nhận Xóa Đánh giá</h5>
                </div>

                <div class="modal-body text-center pt-3 pb-4 px-4">
                    <p class="text-secondary mb-3" style="font-size: 0.95rem;">
                        Bạn sắp xóa **vĩnh viễn** đánh giá sau. Hành động này **không thể hoàn tác**.
                    </p>

                    <div class="p-3 bg-light rounded-3 text-start border">
                        <p class="mb-1 fw-bold text-dark">
                            ID: <span class="text-danger">{{ delete_binh_luan.id }}</span>
                        </p>
                        <p class="mb-1 text-dark">
                            Khách hàng: <span class="fw-bold">{{ delete_binh_luan.ten_khach }}</span>
                        </p>
                        <p class="mb-0 text-muted small">
                            Tour: <span class="fw-medium">{{ delete_binh_luan.tour_ten }}</span>
                        </p>
                    </div>
                </div>

                <div class="modal-footer border-0 d-flex justify-content-center gap-2 pt-0 pb-4">
                    <button type="button" class="btn btn-outline-secondary px-4 rounded-pill fw-bold"
                        data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button type="button" class="btn btn-danger px-4 rounded-pill fw-bold shadow-sm" @click="xoa()">
                        <i class="fa-solid fa-trash-can me-2"></i>Xóa Đánh giá
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
// import { Modal } from 'bootstrap'; // Nếu cần

export default {
    data() {
        return {
            reviews: [], // 1. Khai báo mảng rỗng ban đầu
            zoomedImageList: [],
            locSao: 'all',
            locAnh: 'all',
            timkiem: "",
            chiTiet: null,
            delete_binh_luan: {},


        }
    },

    mounted() {
        this.getData();
    },
    computed: {
        diemTB() {
            if (this.loc.length === 0) return 0;
            const tong = this.loc.reduce((sum, r) => sum + r.diem, 0);
            return (tong / this.loc.length).toFixed(1);
        },
        xulygap() {
            return this.loc.filter(r => r.diem <= 2).length;
        },

        loc() {
            return this.reviews
                .filter(r => {

                    //tìm kiếm theo bình luận
                    const key = this.timkiem.toLowerCase();
                    if (key) {
                        const match = r.binh_luan.toLowerCase().includes(key);

                        if (!match) return false;
                    }
                    // 1. Lọc sao
                    if (this.locSao !== "all" && r.diem != this.locSao) return false;

                    // 2. Lọc hình ảnh
                    if (this.locAnh === "5" && r.hinh_anh.length === 0) return false; // có ảnh
                    if (this.locAnh === "4" && r.hinh_anh.length > 0) return false; // không ảnh
                    return true;
                });
        }

    },

    methods: {
        // ... (các hàm openZoomModal của bạn giữ nguyên) ...
        openZoomModal(listImages) {
            if (!listImages || listImages.length === 0) return;
            this.zoomedImageList = listImages;
            const modalElement = document.getElementById('imageZoomModal');
            if (modalElement && window.bootstrap) {
                const myModal = new window.bootstrap.Modal(modalElement);
                myModal.show();
            }
        },
        getData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/binh-luan/get-data', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                    }
                }

                )
                .then((res) => {

                    this.reviews = res.data.data.map(item => {
                        return {
                            id: item.id,
                            ten_khach: item.ho_ten,
                            email: item.email,
                            tour_ten: item.ten_tour,
                            diem: item.diem,
                            binh_luan: item.binh_luan,
                            phan_hoi: item.phan_hoi ?? "",
                            created_at: this.formatDate(item.created_at),
                            hinh_anh: Array.isArray(item.hinh_anh)
                                ? item.hinh_anh
                                : (item.hinh_anh ? JSON.parse(item.hinh_anh) : []),


                            trang_thai: item.trang_thai,
                        }
                    });

                });
        },
        PhanHoi() {
            axios.post('http://127.0.0.1:8000/api/admin/binh-luan/phan-hoi', {
                id: this.chiTiet.id,
                phan_hoi: this.chiTiet.phan_hoi,
            }, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then(res => {

                    if (res.data.status) {

                        this.$toast.success(res.data.message);

                        this.getData();

                        // Đóng modal sau khi gửi
                        // const modal = bootstrap.Modal.getInstance(document.getElementById("xemModal"));
                        // if (modal) modal.hide();
                    }
                    else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(() => {
                    this.$toast.error("Không thể gửi phản hồi!");
                });
        },
        xoa() {
            axios.post('http://127.0.0.1:8000/api/admin/binh-luan/delete',
                this.delete_binh_luan, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            }
            )
                .then(res => {


                   if (res.data.status) {
                         this.getData();
                        this.$toast.success(res.data.message);

                       

                        
                    }
                    else {
                        this.$toast.error(res.data.message);
                    }
                });
        },


        formatDate(dateString) {
            if (!dateString) return "";
            const d = new Date(dateString);
            return d.toISOString().slice(0, 10);
        },
        xemChiTiet(review) {
            this.chiTiet = review;
        },
        chonDanhGiaCanXoa(review) {
            this.delete_binh_luan = {
                id: review.id,
                ten_khach: review.ten_khach,
                tour_ten: review.tour_ten,
            };
        }


    }
}
</script>
<style></style>