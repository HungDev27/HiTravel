<template>
    <div class="breadcrumb-image"
        style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 123, 255, 0.6) 100%), url(https://timestravel.vn/themes/times-travel/images/banner/breadcrumb.png) no-repeat center/cover; height: 350px;">
        <div class="container" style="padding-top: 220px;">
            <h3 class="text-white fw-bolder mb-1" style="font-size: 2.5rem;">KHÁM PHÁ TOUR</h3>
            <router-link :to="'/'" style="text-decoration: none;">
                <p class="text-white fw-light" style="font-size: 1rem;">
                    <span style="color: white; transition: color 0.3s ease;" onmouseover="this.style.color='#ffc107';"
                        onmouseout="this.style.color='white';">
                        Trang chủ
                    </span>
                    <i class=" ms-2 fa-solid fa-angles-right mx-2" style="color: #ffc107;"></i>Tour
                </p>
            </router-link>
        </div>
    </div>

    <div class="container py-5">
        <div class="row mt-3 g-5">

            <div class="col-lg-3">
                <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center mb-4 pb-2"
                            style="border-bottom: 2px solid #007bff;">
                            <h5 class="fw-bold" style="color: #007bff;"><i class="fa-solid fa-sliders me-2"></i> BỘ LỌC
                                TOUR</h5>
                            <i class="fa-solid fa-filter fa-lg text-secondary"></i>
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold mb-2" style="font-size: 1rem; color: #333;"><i
                                    class="fa-solid fa-money-bill-wave me-2 text-success"></i> Mức giá tối đa</label>
                            <input type="range" class="form-range" min="0" max="50000000" step="500000"
                                v-model.number="filter.maxPrice" style="accent-color: #28a745;">
                            <output class="d-block text-end" style="color: #dc3545; font-size: 1.1rem;">**{{
                                formatVND(filter.maxPrice) }}**</output>
                        </div>


                        <div class="mb-4">
                            <label class="fw-bold mb-2" style="font-size: 1rem; color: #333;"><i
                                    class="fa-solid fa-location-dot me-2 text-primary"></i> Điểm đến</label>
                            <select class="form-select" v-model="filter.location"
                                style="border-radius: 8px; font-size: 0.95rem;">
                                <option value="">-- Tất cả điểm đến --</option>
                                <option v-for="(loc, index) in locations" :key="index" :value="loc">
                                    {{ loc }}
                                </option>
                            </select>
                        </div>


                        <div class="mb-4">
                            <label class="fw-bold mb-2" style="font-size: 1rem; color: #333;"><i
                                    class="fa-regular fa-calendar-days me-2 text-info"></i> Ngày khởi hành</label>
                            <input type="date" class="form-control" v-model="filter.startDate"
                                style="border-radius: 8px;">
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold mb-2" style="font-size: 1rem; color: #333;"><i
                                    class="fa-regular fa-calendar-check me-2 text-info"></i> Ngày kết thúc</label>
                            <input type="date" class="form-control" v-model="filter.endDate"
                                style="border-radius: 8px;">
                        </div>


                        <div class="mb-4">
                            <label class="fw-bold mb-2" style="font-size: 1rem; color: #333;"><i
                                    class="fa-solid fa-layer-group me-2 text-warning"></i> Loại Tour</label>
                            <div class="mt-2 d-flex flex-wrap gap-2">
                                <button v-for="danhMuc in danhMucs" :key="danhMuc.id" type="button"
                                    class="btn d-flex align-items-center shadow-sm btn-filter-tag"
                                    :class="{ 'bg-primary text-white': selectedDanhMucIds.includes(danhMuc.id) }"
                                    @click="toggleDanhMuc(danhMuc.id)" style="
                                        border-radius: 50px; 
                                        font-size: 13px; 
                                        padding: 8px 18px; 
                                        font-weight: 600; 
                                        transition: all 0.3s ease;
                                        border: 1px solid #ddd;
                                        background-color: white; 
                                        color: #6c757d;
                                    "
                                    onmouseover="this.style.backgroundColor = this.classList.contains('bg-primary') ? '#0056b3' : '#f0f8ff';"
                                    onmouseout="this.style.backgroundColor = this.classList.contains('bg-primary') ? '#007bff' : 'white';">
                                    <i v-if="selectedDanhMucIds.includes(danhMuc.id)" class="fa-solid fa-check me-2"
                                        style="font-size: 11px;"></i>
                                    {{ danhMuc.ten_danh_muc }}
                                </button>
                            </div>
                        </div>


                        <div class="mb-4">
                            <label class="fw-bold mb-2" style="font-size: 1rem; color: #333;"><i
                                    class="fa-solid fa-users me-2 text-secondary"></i>Số lượng hành khách</label>
                            <div class="input-group" style="border-radius: 8px; overflow: hidden;">
                                <span class="input-group-text" style="background-color: #f8f9fa; color: #6c757d;">Số
                                    lượng</span>
                                <input id="nguoiLon" type="number" min="1" v-model.number="filter.passengerCount"
                                    class="form-control text-center fw-bold" style="color: #007bff; font-size: 1rem;">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center pt-3">
                            <button class="btn btn-outline-danger w-100 fw-bold" style="border-radius: 50rem;"
                                @click.prevent="resetFilters"
                                onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#dc3545';">
                                <i class="fa-solid fa-xmark me-2"></i> Đặt lại bộ lọc
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <h3 class="text-primary fw-bolder mb-2" style="font-size: 2rem;"><i class="fa-solid fa-globe me-2"></i>
                    Danh sách Tour</h3>
                <p style="
                        font-size: 16px; 
                        line-height: 1.6; 
                        color: #555; 
                        font-family: 'Arial', 'Helvetica', sans-serif; 
                        text-align: justify;
                        border-bottom: 1px solid #eee;
                        padding-bottom: 15px;
                        ">HITravel tự hào là công ty du lịch lữ hành uy tín, chuyên tổ chức các
                    tour trong nước với lịch trình hấp dẫn và chi phí cạnh tranh. Chúng tôi mang đến nhiều lựa chọn
                    phong phú từ Bắc vào Nam, giúp bạn dễ dàng khám phá vẻ đẹp Việt Nam theo cách thuận tiện và tiết
                    kiệm nhất.</p>

                <div class="row mt-4 align-items-center bg-white shadow-sm p-3" style="border-radius: 10px;">
                    <div class="col-lg-6 col-md-6 mb-3 mb-md-0">
                        <div class="position-relative">
                            <input v-model="searchText" type="text" class="form-control ps-5"
                                style="border-radius: 50rem; border: 1px solid #ccc; height: 45px;"
                                placeholder="Tìm kiếm Tour...">
                            <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex justify-content-between align-items-center">

                        <div class="btn-group me-3" role="group">
                            <button type="button" class="btn btn-white text-secondary fw-bold">Sắp xếp theo:</button>
                            <button id="sortDropdown" type="button"
                                class="btn btn-outline-primary dropdown-toggle fw-bold" data-bs-toggle="dropdown"
                                aria-expanded="false" style="border-radius: 50rem;">
                                {{ sortOrder === 'asc' ? 'Giá tăng' : (sortOrder === 'desc' ? 'Giá giảm' : 'Mặc định')
                                }}
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="sortDropdown" style="border-radius: 10px;">
                                <li>
                                    <a class="dropdown-item" href="#" @click.prevent="sortOrder = 'asc'">
                                        Giá tăng dần <i class="fa-solid fa-arrow-up-wide-short ms-2 text-success"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" @click.prevent="sortOrder = 'desc'">
                                        Giá giảm dần <i class="fa-solid fa-arrow-down-wide-short ms-2 text-danger"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div style="font-size: 1rem; white-space: nowrap;">
                            Tìm thấy <b class="text-primary ms-1" style="font-size: 1.25rem;">{{ totalTours }} Tour</b>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 g-4">

                    <div v-if="totalTours === 0" class="col-12 text-center py-5">
                        <i class="fa-solid fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h4 class="text-muted">Không tìm thấy Tour nào phù hợp với tiêu chí lọc của bạn.</h4>
                        <p class="text-secondary">Vui lòng thử điều chỉnh lại bộ lọc.</p>
                    </div>

                    <div v-for="(value, index) in paginatedTours" :key="index" class="col-12">
                        <div class="card border-0 shadow-lg overflow-hidden"
                            style="border-radius: 15px; transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);"
                            onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.25)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.1)'">

                            <div class="row g-0">

                                <div class="col-md-4 position-relative">
                                    <img :src="value.anh" class="img-fluid w-100"
                                        style="object-fit: cover; height: 100%; min-height: 250px; border-radius: 15px 0 0 15px;">

                                    <span
                                        class="position-absolute bottom-0 start-0 bg-white px-3 py-1 m-3 rounded-pill shadow-lg text-primary fw-bold"
                                        style="font-size: 14px;">
                                        <i class="fa-solid fa-location-dot me-1"></i> {{ value.dia_diem }}
                                    </span>

                                    <span
                                        class="position-absolute top-0 start-0 bg-danger text-white px-3 py-1 m-3 rounded-pill fw-bold shadow"
                                        style="font-size: 12px;">
                                        <i class="fa-solid fa-bolt me-1"></i> DEAL SỐC
                                    </span>
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column h-100 p-4">

                                        <h4 class="card-title fw-bolder text-dark mb-3"
                                            style="font-size: 20px; color: #333 !important;">
                                            {{ value.ten_tour }}
                                        </h4>

                                        <div class="row mb-3" style="font-size: 15px; color: #555;">
                                            <div class="col-sm-6 d-flex align-items-center mb-2">
                                                <i class="fa-regular fa-calendar-alt me-2 text-info"></i>
                                                Thời gian: {{ formatDate(value.ngay_di) }} → {{
                                                formatDate(value.ngay_ve) }}
                                            </div>
                                            <div class="col-sm-6 d-flex align-items-center mb-2">
                                                <i class="fa-solid fa-chair me-2 text-danger"></i>
                                                Còn: <span class="fw-bold ms-1" style="color: #dc3545;">{{
                                                    value.so_cho_con }} chỗ</span>
                                            </div>
                                            <div class="col-sm-6 d-flex align-items-center">
                                                <i class="fa-solid fa-bus me-2 text-success"></i>
                                                Phương tiện: <span class="fw-bold ms-1 text-primary">{{
                                                    value.phuong_tien[0] || 'Chưa rõ' }}</span>
                                            </div>
                                            <!-- <div class="col-sm-6 d-flex align-items-center">
                                                <i class="fa-solid fa-layer-group me-2" style="color: #ff9800;"></i>
                                                Loại: <span class="fw-bold ms-1 text-secondary">{{
                                                    value.ten_danh_muc }}</span>
                                            </div> -->
                                        </div>

                                        <div
                                            class="mt-auto d-flex justify-content-between align-items-end border-top pt-3">

                                            <div>
                                                <small class="text-muted d-block mb-1" style="font-size: 0.85rem;">Giá
                                                    từ:</small>
                                                <div class="d-flex align-items-baseline">
                                                    <span class="text-danger fw-bolder"
                                                        style="font-size: 1.75rem; line-height: 1;">{{
                                                            formatVND(value.gia_nguoi_lon) }}</span>
                                                    <span class="text-muted ms-2" style="font-size: 0.9rem;">/ Người
                                                        lớn</span>
                                                </div>
                                                <small class="text-secondary">Trẻ em: {{ formatVND(value.gia_tre_em)
                                                    }}</small>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <router-link :to="`/chi-tiet-tour/${value.id}`">
                                                    <button class="btn btn-outline-primary fw-bold"
                                                        style="border-radius: 50rem;">
                                                        <i class="fa-solid fa-eye me-1"></i> Chi tiết
                                                    </button>
                                                </router-link>
                                                <router-link :to="`/dat-tour/${value.id}`">
                                                    <button class="btn btn-danger fw-bold"
                                                        style="border-radius: 50rem; background-color: #ff5722; border-color: #ff5722;"
                                                        onmouseover="this.style.backgroundColor='#e64a19'; this.style.borderColor='#e64a19'"
                                                        onmouseout="this.style.backgroundColor='#ff5722'; this.style.borderColor='#ff5722'">
                                                        <i class="fa-solid fa-cart-shopping me-1"></i> Đặt ngay
                                                    </button>
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="card border-0 shadow-lg"
                        style="background-image: linear-gradient(to right, #007bff, #00aaff); border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <h4 class="mb-2 text-white fw-bolder">NHẬN ƯU ĐÃI ĐỘC QUYỀN!</h4>
                                    <p class="text-white opacity-75" style="font-size: 0.95rem;">Đăng ký ngay hôm nay để
                                        không bỏ lỡ các ưu đãi & nhận voucher giảm giá trực tiếp cho chuyến đi tiếp
                                        theo.</p>
                                </div>
                                <div class="col-lg-6">
                                    <div class="position-relative bg-white"
                                        style="border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                                        <input type="email" placeholder="Nhập Email của bạn"
                                            class="form-control border-0"
                                            style="height: 55px; padding-left: 50px; border-radius: 10px; font-size: 1rem;">
                                        <span class="position-absolute top-50 start-0 translate-middle-y ms-3">
                                            <i class="fa-regular fa-envelope fa-lg" style="color: #007bff;"></i>
                                        </span>
                                        <span class="position-absolute top-50 end-0 translate-middle-y me-2">
                                            <button class="btn btn-danger fw-bold"
                                                style="border-radius: 8px; height: 45px; transition: all 0.3s;"
                                                onmouseover="this.style.backgroundColor='#e64a19'"
                                                onmouseout="this.style.backgroundColor='#dc3545'">
                                                <i class="fa-solid fa-paper-plane me-1"></i> Đăng ký
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3 mb-5">
                    <button class="btn btn-outline-primary me-2 page-nav" :disabled="currentPage === 1"
                        @click="goToPage(currentPage - 1)"
                        style="width: 40px; height: 40px; border-radius: 50%; font-weight: bold; transition: background-color 0.3s, transform 0.3s;"
                        onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#007bff';">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>

                    <button v-for="page in totalPages" :key="page" class="btn me-2 page-num"
                        :class="{ 'bg-primary text-white': currentPage === page, 'btn-outline-primary': currentPage !== page }"
                        @click="goToPage(page)"
                        style="width: 40px; height: 40px; border-radius: 50%; font-weight: bold; transition: background-color 0.3s, transform 0.3s;"
                        onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        {{ page }}
                    </button>

                    <button class="btn btn-outline-primary me-2 page-nav" :disabled="currentPage === totalPages"
                        @click="goToPage(currentPage + 1)"
                        style="width: 40px; height: 40px; border-radius: 50%; font-weight: bold; transition: background-color 0.3s, transform 0.3s;"
                        onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#007bff';">
                        <i class="fa-solid fa-chevron-right"></i>
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
            filter: {
                maxPrice: 50000000,   // Mức giá tối đa mặc định
                location: "",      // <--- ĐIỂM ĐẾN ĐANG CHỌN
                startDate: "",
                endDate: "",
                passengerCount: 1
            },
            locations: [],
            searchText: '',
            sortOrder: '',
            selectedTourType: '',
            allTours: [],
            currentPage: 1,
            perPage: 6,
            selectedDanhMucIds: [], // chứa các id_danh_muc được tick
            danhMucs: [],
        };
    },

    mounted() {
        this.getDanhSachTour();
        this.getDanhMuc();

        // LẤY GIÁ TRỊ tìm kiếm TỪ QUERY URL
        const q = this.$route.query;

        if (q.location) {
            this.searchText = q.location;       // Để hiển thị chữ lên ô Input "Tìm kiếm Tour..."
        }

        if (q.startDate) this.filter.startDate = q.startDate;
        if (q.maxPrice) this.filter.maxPrice = parseInt(q.maxPrice);
    },
    computed: {
        filteredTours() {
            return this.allTours
                //* Lọc theo TÊN TOUR
                .filter(tour =>
                    tour.ten_tour.toLowerCase().includes(this.searchText.toLowerCase())
                )
                //* Lọc theo GIÁ
                .filter(tour =>
                    tour.gia_nguoi_lon <= this.filter.maxPrice
                )
                //* Lọc theo ĐIỂM ĐẾN
                .filter(tour => {
                    if (!this.filter.location) return true;   // nếu chưa chọn -> bỏ qua
                    return tour.dia_diem.toLowerCase() === this.filter.location.toLowerCase();
                })
                //* Lọc theo THỜI GIAN
                .filter(tour => {
                    if (!this.filter.startDate && !this.filter.endDate) return true;

                    const tourDate = new Date(tour.ngay_di);
                    const start = this.filter.startDate ? new Date(this.filter.startDate) : null;
                    const end = this.filter.endDate ? new Date(this.filter.endDate) : null;

                    if (start && end) {
                        return tourDate >= start && tourDate <= end;
                    } else if (start) {
                        return tourDate >= start;
                    } else if (end) {
                        return tourDate <= end;
                    }

                    return true;
                })
                // * Lọc theo LOẠI TOUR
                .filter(tour => {
                    if (this.selectedDanhMucIds.length === 0) return true;

                    // Kiểm tra xem tour có trường id_danh_muc không, nếu không có thì bỏ qua (tránh lỗi)
                    if (!tour.id_danh_muc) return false;

                    // Ép kiểu tour.id_danh_muc về Number trước khi kiểm tra
                    return this.selectedDanhMucIds.includes(Number(tour.id_danh_muc));
                })
                // * Lọc theo HÀNH KHÁCH
                .filter(tour => {
                    // Nếu chưa chọn thì không lọc theo hành khách
                    if (!this.filter.passengerCount) return true;

                    // Nếu còn đủ chỗ thì giữ lại
                    return tour.so_cho_con >= this.filter.passengerCount;
                })
        },
        sortedTours() {
            const sorted = [...this.filteredTours];
            if (this.sortOrder === 'asc') {
                sorted.sort((a, b) => a.gia_nguoi_lon - b.gia_nguoi_lon);
            } else if (this.sortOrder === 'desc') {
                sorted.sort((a, b) => b.gia_nguoi_lon - a.gia_nguoi_lon);
            }
            return sorted;
        },
        paginatedTours() {
            const start = (this.currentPage - 1) * this.perPage;
            return this.sortedTours.slice(start, start + this.perPage);
        },
        totalTours() {
            return this.sortedTours.length;
        },
        totalPages() {
            return Math.ceil(this.sortedTours.length / this.perPage);
        }

    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VN').format(number) + ' VNĐ';
        },
        formatDate(date) {
            return new Date(date).toLocaleDateString('vi-VI');
        },
        getDanhSachTour() {
            axios.get("http://127.0.0.1:8000/api/customer/tour/get-data")
                .then(res => {
                    this.allTours = res.data.data.filter(tour => tour.so_cho_con > 0);
                    console.log("Dữ liệu 1 tour mẫu:", this.allTours[0]);
                    console.log("ID Danh mục của tour mẫu:", this.allTours[0].id_danh_muc, typeof (this.allTours[0].id_danh_muc));
                    // Lấy danh sách điểm đến UNIQUE
                    const diaDiems = this.allTours.map(t => t.dia_diem);
                    this.locations = [...new Set(diaDiems)];
                })
                .catch(err => {
                    if (err.response?.status === 401) {
                        alert("Token hết hạn hoặc không hợp lệ. Vui lòng đăng nhập lại!");
                    }
                });
        },
        goToPage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
            }
        },
        getDanhMuc() {
            axios.get("http://127.0.0.1:8000/api/admin/danh-muc-tour/get-data")
                .then(res => {
                    this.danhMucs = res.data.data;
                    console.log("Danh mục nhận được:", this.danhMucs); // kiểm tra cấu trúc
                })
                .catch(err => {
                    console.error("Lỗi khi lấy danh mục", err);
                });
        },
        toggleDanhMuc(id) {
            const index = this.selectedDanhMucIds.indexOf(id);
            if (index > -1) {
                this.selectedDanhMucIds.splice(index, 1); // Bỏ chọn
            } else {
                this.selectedDanhMucIds.push(id); // Chọn thêm
            }
        },
        resetFilters() {
            this.filter = {
                maxPrice: 50000000,
                location: "",
                startDate: "",
                endDate: "",
                passengerCount: 1
            };
            this.searchText = "";
            this.selectedDanhMucIds = [];
            this.sortOrder = "";
            this.currentPage = 1;
        }
    },
    watch: {
        searchText() {
            this.currentPage = 1;
        },
        selectedTourType() {
            this.currentPage = 1;
        },
        sortOrder() {
            this.currentPage = 1;
        },
        "filter.location"() {
            this.currentPage = 1;
        }
    }

}
</script>

<style></style>