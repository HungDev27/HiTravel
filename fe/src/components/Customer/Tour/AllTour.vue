<template>
    <div class="breadcrumb-image"
        style="background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(0, 128, 255, 0.8) 100%), url(https://timestravel.vn/themes/times-travel/images/banner/breadcrumb.png) no-repeat center/cover; height: 300px;">
        <div class="container">
            <h3 class="text-white" style="padding-top: 200px;">Tour</h3>
            <router-link :to="'/'">
                <p class="text-white">
                    <span style=" color: #333; 
          transition: color 0.3s ease;" onmouseover="this.style.color='#0d6efd';"
                        onmouseout="this.style.color='white';">
                        Trang chủ
                    </span>
                    <i class=" ms-2 fa-solid fa-angles-right me-2"></i>Tour
                </p>
            </router-link>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">

            <!-- Bảng lọc tìm kiếm -->
            <div class="col-lg-3">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5><b>Lọc Tour</b></h5>
                            <i class="fa-solid fa-filter" style="font-size: 20px;"></i>
                        </div>

                        <!-- Mức giá -->
                        <label class="text-secondary mt-3 mb-1" style="font-size: 17px;">Mức giá</label>
                        <input type="range" class="form-range" min="0" max="50000000" step="500000"
                            v-model.number="filter.maxPrice">
                        <output class="text-primary"><b>{{ formatVND(filter.maxPrice) }}</b></output>


                        <!-- Điểm đến -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Điểm đến</label></div>
                        <select class="form-select mt-1" v-model="filter.location">
                            <option value="">-- Chọn nơi bạn muốn đến --</option>
                            <option v-for="(loc, index) in locations" :key="index" :value="loc">
                                {{ loc }}
                            </option>
                        </select>


                        <!-- Ngày khởi hành -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Ngày khởi hành</label></div>
                        <div class="d-flex gap-2">
                            <input type="date" class="form-control mt-1" v-model="filter.startDate">
                        </div>

                        <!-- Ngày kết thúc -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Ngày kết thúc</label></div>
                        <div class="d-flex gap-2">
                            <input type="date" class="form-control mt-1" v-model="filter.endDate">
                        </div>


                        <!-- Loại Tour -->
                        <label class="text-secondary mt-4 fw-bold" style="font-size: 17px;">Loại Tour</label>
                        <div class="mt-2 d-flex flex-wrap gap-2">
                            <button v-for="danhMuc in danhMucs" :key="danhMuc.id" type="button"
                                class="btn d-flex align-items-center shadow-sm" :class="{
                                    'bg-white text-secondary border': !selectedDanhMucIds.includes(danhMuc.id),
                                    'bg-primary text-white border-primary shadow': selectedDanhMucIds.includes(danhMuc.id)
                                }" @click="toggleDanhMuc(danhMuc.id)" style="
                                        border-radius: 50px; 
                                        font-size: 12px; 
                                        padding: 8px 18px; 
                                        font-weight: 600; 
                                        transition: all 0.3s ease;
                                        border-color: #e9ecef; /* Màu viền xám nhẹ khi chưa chọn */
                                    "
                                onmouseover="if(!this.classList.contains('bg-primary')) { this.style.borderColor = '#0d6efd'; this.style.color = '#0d6efd'; }"
                                onmouseout="if(!this.classList.contains('bg-primary')) { this.style.borderColor = '#e9ecef'; this.style.color = '#6c757d'; }">
                                <i v-if="selectedDanhMucIds.includes(danhMuc.id)" class="fa-solid fa-check me-2"
                                    style="font-size: 11px;"></i>

                                {{ danhMuc.ten_danh_muc }}
                            </button>
                        </div>



                        <!-- Số lượng hành khách -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;"><i
                                    class="fa-solid fa-users me-2"></i>Số lượng hành khách</label></div>
                        <div class="mt-2"
                            style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 6px; width: 275px; height: 40px; justify-content: space-between;">
                            <label class="ms-2" for="nguoiLon" style="color: gray;">Hành khách:</label>
                            <input id="nguoiLon" type="number" min="1" v-model.number="filter.passengerCount"
                                style="color: dodgerblue;border: none; width: 50px; text-align: center; font-weight: bold; font-size: 16px; outline: none;" />

                        </div>

                        <!-- button -->
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-primary w-100" style="border-radius: 100px;"
                                @click.prevent="resetFilters">
                                Chọn lại
                            </button>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <!-- Tiêu đề trang -->
                <h3 class="text-primary">Tour</h3>
                <p style="
                            font-size: 16px; 
                            line-height: 1.8; 
                            color: #333333; 
                            font-family: 'Arial', 'Helvetica', sans-serif; 
                            text-align: justify;">HITravel tự hào là công ty du lịch lữ hành uy tín, chuyên tổ chức các
                    tour trong nước với lịch trình hấp dẫn và chi phí cạnh tranh. Chúng tôi mang đến nhiều lựa chọn
                    phong phú từ Bắc vào Nam, giúp bạn dễ dàng khám phá vẻ đẹp Việt Nam theo cách thuận tiện và tiết
                    kiệm nhất.</p>

                <!-- Bảng tìm kiếm -->
                <div class="row mt-5">
                    <div class="col-lg-12 col-xl-12">
                        <form class="float">
                            <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                <div class="col">
                                    <div class="position-relative text-primary">
                                        <input v-model="searchText" type="text" class="form-control ps-5"
                                            placeholder="Tìm kiếm Tour...">
                                        <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                class="bx bx-search"></i></span>
                                    </div>

                                </div>
                                <div class="col text-primary">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-white">Sắp xếp </button>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <!-- Dropdown sắp xếp -->
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li>
                                                    <a class="dropdown-item text-primary" href="#"
                                                        @click.prevent="sortOrder = 'asc'">
                                                        Giá tăng dần <i
                                                            class="fa-solid fa-arrow-up-wide-short ms-2 text-warning"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-primary" href="#"
                                                        @click.prevent="sortOrder = 'desc'">
                                                        Giá giảm dần <i
                                                            class="fa-solid fa-arrow-down-wide-short ms-2 text-warning"></i>
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="padding-left: 25%; padding-top: 1%;">
                                    <div style="font-size: 17px;">Chúng tôi tìm thấy<b class="text-primary ms-2 me-2"
                                            style="font-size: 20px;">{{ totalTours }} Tour</b>chương trình tour cho quý
                                        khách</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- List Tour -->
                <div class="row mt-5">
                    <div class="col-12 mb-3">

                        <template v-for="(value, index) in paginatedTours" :key="index">
                            <div class="col-12 mb-4">
                                <div class="card border-0 shadow-sm hover-scale overflow-hidden h-100"
                                    style="border-radius: 12px; transition: all 0.3s ease;"
                                    onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 12px 20px rgba(0,0,0,0.2)';"
                                    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">

                                    <div class="row g-0 h-100">

                                        <div class="col-md-4 position-relative">
                                            <div style="height: 250px; overflow: hidden;">
                                                <img :src="value.anh" class="img-fluid w-100"
                                                    style="object-fit: cover; height: 100%; width: 100%; border-radius: 12px 0 0 12px;">

                                                <span
                                                    class="position-absolute bottom-0 start-0 bg-white px-2 py-1 m-2 rounded shadow-sm text-primary fw-bold"
                                                    style="font-size: 12px;">
                                                    <i class="fa-solid fa-location-dot me-1"></i> {{ value.dia_diem }}
                                                </span>

                                                <span
                                                    class="position-absolute top-0 start-0 bg-warning text-white px-2 py-1 m-2 rounded fw-bold shadow-sm"
                                                    style="font-size: 11px;">
                                                    DEAL SỐC
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="card-body d-flex flex-column h-100 p-3">

                                                <h5 class="card-title fw-bold text-dark mb-1" style="font-size: 18px;">
                                                    {{ value.ten_tour }}
                                                </h5>

                                                <div class="d-flex gap-3 text-secondary mb-2" style="font-size: 13px;">
                                                    <span><i class="fa-regular fa-clock me-1"></i> {{
                                                        formatDate(value.ngay_di) }} → {{ formatDate(value.ngay_ve)
                                                        }}</span>
                                                    <span><i class="fa-solid fa-chair me-1"></i> Còn <span
                                                            class="text-danger fw-bold">{{ value.so_cho_con
                                                            }} chỗ</span></span>
                                                </div>

                                                <div class="d-flex gap-3 text-secondary"
                                                    style="font-size: 13px; display: flex; align-items: center;">
                                                    <span><i class="fa-solid fa-car-on fa-lg me-2"></i>Phương tiện:
                                                        <span class="text-primary fw-bold">{{ value.phuong_tien[0]
                                                            || 'Chưa rõ' }}</span></span>
                                                </div>

                                                <div
                                                    class="mt-auto d-flex justify-content-between align-items-end border-top pt-3">

                                                    <div>
                                                        <div class="d-flex align-items-center gap-2 mb-1">
                                                            <small class="text-muted">Người lớn:</small>
                                                            <span class="text-danger fw-bold fs-5">{{
                                                                formatVND(value.gia_nguoi_lon) }}</span>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <small class="text-muted">Trẻ em:</small>
                                                            <span class="text-primary fw-bold">{{
                                                                formatVND(value.gia_tre_em) }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex gap-2">
                                                        <router-link :to="`/chi-tiet-tour/${value.id}`">
                                                            <button class="btn btn-outline-warning fw-bold btn-sm">Xem
                                                                chi tiết</button>
                                                        </router-link>
                                                        <button class="btn btn-primary btn-sm"><i
                                                                class="fa-solid fa-cart-shopping"></i> Đặt
                                                            ngay</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Nhận ưu đãi -->
                <div class="row">
                    <div class="card" style="background-color: deepskyblue;">
                        <div class="car-body">
                            <div class="row mt-5 ms-5 mb-4 me-5">
                                <div class="col-lg-6 ">
                                    <h4 class="mb-2 text-white"><b>NHẬN ƯU ĐÃI</b></h4>
                                    <p class="text-white">Đăng ký ngay hôm nay để không bỏ lỡ các ưu đãi & nhận voucher
                                        giảm giá trực
                                        tiếp
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <div class="position-relative">
                                        <span class="position-absolute top-50 start-0 translate-middle-y">
                                            <i class="fa-regular fa-envelope fa-lg ms-4" style="color: #74C0FC;"></i>
                                        </span>
                                        <input type="email" placeholder="Nhập Email của bạn" class="form-control"
                                            style="height: 60px; padding-left: 50px; border-radius: 8px;">
                                        <span class="position-absolute top-50 end-0 translate-middle-y me-3">
                                            <button class="btn btn-dark"><i
                                                    class="fa-solid fa-paper-plane"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3 mb-5">
                    <!-- Previous -->
                    <button class="btn page-btn rounded-circle btn-outline-primary me-2" :disabled="currentPage === 1"
                        @click="goToPage(currentPage - 1)">
                        &lt;
                    </button>

                    <!-- Page Numbers -->
                    <button v-for="page in totalPages" :key="page"
                        class="btn page-btn rounded-circle btn-outline-primary me-2"
                        :class="{ 'active': currentPage === page }" @click="goToPage(page)">
                        {{ page }}
                    </button>

                    <!-- Next -->
                    <button class="btn page-btn rounded-circle btn-outline-primary me-2"
                        :disabled="currentPage === totalPages" @click="goToPage(currentPage + 1)">
                        &gt;
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