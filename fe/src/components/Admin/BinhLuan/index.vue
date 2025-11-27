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
                            <div style="font-size: large;"><b>10</b></div>
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
                            <div style="font-size: large;"><b>3.5/5</b></div>
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
                            <div style="font-size: large;"><b>10</b></div>
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
                            <input type="text" placeholder="Tìm kiếm khách hàng, tour..."
                                style="border: none; outline: none; width: 100%; font-size: 14px; color: #333; font-family: sans-serif; background: transparent;">
                        </div>
                        <div class="d-flex justify-content-end">
                            <!-- LỌC SAO -->
                            <select class="form-select fw-bold me-3" aria-label="Star Rating" style="width: 130px; border-radius: 12px;
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

                            </select>

                            <!-- LỌC ẢNH -->
                            <select class="form-select fw-bold me-3" aria-label="Star Rating" style="border-radius: 12px;
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
                            <tr v-for="(review, index) in reviews" :key="index"
                                style="box-shadow: 0 2px 6px rgba(0,0,0,0.02);">

                                <!-- id -->
                                <td class="bg-white align-middle ps-4"
                                    style="border-top-left-radius: 12px; border-bottom-left-radius: 12px; padding: 20px;">
                                    <span class="text-secondary fw-bold" style="font-size: 14px;">#{{ review.id
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
                                            <span class="text-muted" style="font-size: 12px;">customer@email.com</span>
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

                                    <div v-if="review.hinh_anh && review.hinh_anh.length > 0"
                                        class="position-relative d-inline-block cursor-pointer hover-zoom"
                                        @click="openZoomModal(review.hinh_anh)" style="width: 50px; height: 50px;">

                                        <img :src="review.hinh_anh[0]" class="img-thumbnail"
                                            style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px; padding: 2px;">

                                        <div v-if="review.hinh_anh.length > 1"
                                            class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                            style="background-color: rgba(0,0,0,0.5); border-radius: 8px; color: white; font-weight: bold; font-size: 14px;">
                                            +{{ review.hinh_anh.length - 1 }}
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
                                        class="btn btn-light rounded-2 me-1 text-primary bg-primary bg-opacity-10 border-0">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button data-bs-toggle="modal" data-bs-target="#xoaModal"
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
    <div class="modal fade" id="xemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">

                <div class="modal-header bg-primary text-white py-3">
                    <h5 class="modal-title fw-bold text-uppercase" style="font-size: 16px; letter-spacing: 1px;">
                        <i class="fa-solid fa-circle-info me-2"></i>Chi tiết đánh giá #1024
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">

                    <div class="d-flex align-items-start mb-3">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-sm"
                                style="width: 60px; height: 60px; background-color: #28a745; font-size: 24px;">
                                A
                            </div>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">Nguyễn Văn An</h6>
                                    <p class="text-muted small mb-1">
                                        <i class="fa-solid fa-envelope me-1"></i>an.nguyen@gmail.com
                                    </p>
                                    <p class="text-primary small fw-bold mb-2">
                                        Tour Phú Quốc 3N2Đ - Đảo Ngọc
                                        <span class="text-secondary fw-normal ms-2">
                                            <i class="fa-regular fa-clock me-1"></i>15/10/2023
                                        </span>
                                    </p>
                                </div>
                                <div class="text-end">
                                    <span class="fw-bold me-2" style="color: #ffc107;">5/5</span>
                                    <i class="fa-solid fa-star text-warning" style="font-size: 12px;"></i>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded-3 border mt-2 position-relative">
                                <i
                                    class="fa-solid fa-quote-left text-secondary position-absolute top-0 start-0 m-2 opacity-25 fa-2x"></i>
                                <p class="fst-italic text-dark mb-0 ms-4" style="line-height: 1.6;">
                                    "Dịch vụ tuyệt vời, hướng dẫn viên nhiệt tình. Tuy nhiên xe di chuyển hơi ồn một
                                    chút, mong công ty khắc phục. Đồ ăn ngon!"
                                </p>
                            </div>

                            <div class="mt-3">
                                <p class="fw-bold text-secondary small mb-2">Hình ảnh đính kèm:</p>
                                <div class="d-flex gap-2">
                                    <img src="https://i.pinimg.com/736x/59/53/4f/59534ffa7437ee202dbb8cb48d3dfcd7.jpg"
                                        class="rounded border shadow-sm cursor-pointer hover-scale"
                                        style="width: 80px; height: 80px; object-fit: cover;">

                                    <img src="https://i.pinimg.com/236x/2f/67/3e/2f673e7241569c895c969639b497f934.jpg"
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
                                <label class="form-label fw-bold text-secondary small">Nội dung trả lời khách
                                    hàng</label>
                                <textarea class="form-control bg-light" rows="4"
                                    placeholder="Ví dụ: Cảm ơn quý khách đã góp ý, chúng tôi sẽ kiểm tra lại xe..."></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary small">Trạng thái hiển thị</label>
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
                    <button type="button" class="btn btn-primary px-4 rounded-pill fw-bold shadow-sm">
                        <i class="fa-solid fa-paper-plane me-2"></i>Gửi phản hồi & Lưu
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Xoa -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="xoaModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
            zoomedImageList: [], // Biến cho modal slide ảnh
        }
    },

    // --- CHÈN VÀO ĐÂY ---
    mounted() {
        // 2. Giả lập dữ liệu ngay khi trang vừa load xong
        this.reviews = [
            {
                id: 1,
                ten_khach: "Nguyễn Văn A", // Thêm tên nếu cần hiển thị
                tour_ten: "Tour Phú Quốc",
                diem: 5,
                binh_luan: "Tuyệt vời, cảnh rất đẹp!",
                created_at: "2023-10-20",
                // Mảng hình ảnh (Demo hiển thị số lượng +2)
                hinh_anh: [
                    "https://i.pinimg.com/736x/59/53/4f/59534ffa7437ee202dbb8cb48d3dfcd7.jpg",
                    "https://i.pinimg.com/736x/c4/92/d9/c492d9257f12219021ea3b98ff1626d7.jpg",
                    "https://i.pinimg.com/736x/87/0e/3a/870e3a76cf8969643cd6067289c85fc2.jpg"
                ]
            },
            {
                id: 2,
                ten_khach: "Trần Thị B",
                tour_ten: "Tour Đà Nẵng",
                diem: 4,
                binh_luan: "Hướng dẫn viên nhiệt tình.",
                created_at: "2023-10-21",
                // Mảng hình ảnh (Chỉ có 1 ảnh)
                hinh_anh: [
                    "https://i.pinimg.com/736x/c4/92/d9/c492d9257f12219021ea3b98ff1626d7.jpg"
                ]
            }
        ];

        // Nếu sau này có API thật thì gọi hàm này đè lên dữ liệu giả
        // this.getReviews(); 
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
        }
    }
}
</script>
<style></style>