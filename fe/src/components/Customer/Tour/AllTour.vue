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
                        <input type="range" class="form-range" min="0" max="50000000" v-model="rangeValue" id="range4">
                        <output class="text-primary"><b>{{ formatVND(rangeValue) }}</b></output>

                        <!-- Điểm đến -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Điểm đến</label></div>
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected>-- Chọn nơi bạn muốn đến --</option>
                            <option>Phú Quốc</option>
                            <option>Huế</option>
                            <option>Hà Nội</option>
                            <option>Hồ Chí Minh</option>
                            <option>Đà Nẵng</option>
                            <option>Hải Phòng</option>
                        </select>

                        <!-- Ngày khởi hành -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Ngày khởi hành</label></div>
                        <input type="date" class="form-control mt-1">

                        <!-- Loại Tour -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Loại Tour</label></div>
                        <div class="mt-1"
                            style="border: 1px solid #ccc; border-radius: 8px; padding: 10px; width: 275px; height: 100px; overflow-y: auto;">
                            <div>
                                <input class="me-2" type="checkbox" id="sunworld" name="loai_tour" value="Sunworld">
                                <label for="mienbac">Miền Bắc</label>
                            </div>

                            <div>
                                <input class="me-2" type="checkbox" id="hanoi" name="loai_tour" value="Hà Nội">
                                <label for="mientrung">Miền Trung</label>
                            </div>

                            <div>
                                <input class="me-2" type="checkbox" id="dalat" name="loai_tour" value="Đà Lạt">
                                <label for="miennam">Miền Nam</label>
                            </div>
                        </div>

                        <!-- Số lượng hành khách -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;"><i
                                    class="fa-solid fa-users me-2"></i>Số lượng hành khách</label></div>
                        <div class="mt-2"
                            style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 6px; width: 275px; height: 40px; justify-content: space-between;">
                            <label class="ms-2" for="nguoiLon" style="color: gray;">Hành khách:</label>
                            <input id="nguoiLon" type="number" value="0" min="1"
                                style="color: dodgerblue;border: none; width: 50px; text-align: center; font-weight: bold; font-size: 16px; outline: none;" />
                        </div>

                        <!-- button -->
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-primary me-5" style="border-radius: 100px;">Chọn lại</button>
                            <button class="btn btn-primary" style="border-radius: 100px;">Lọc ngay</button>
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
                                        <input type="text" class="form-control ps-5" placeholder="Tìm kiếm Tour...">
                                        <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                class="bx bx-search"></i></span>
                                    </div>

                                </div>
                                <div class="col text-primary">
                                    <button class="btn btn-primary me-3">Tìm kiếm</button>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-white">Sắp xếp </button>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-chevron-down'></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li><a class="dropdown-item text-primary" href="#">Giá tăng dần<i
                                                            class="fa-solid fa-arrow-up-wide-short ms-2 text-warning"></i></a>
                                                </li>
                                                <li><a class="dropdown-item text-primary" href="#">Giá giảm dần<i
                                                            class="fa-solid fa-arrow-down-wide-short ms-2 text-warning"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col text-primary">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-white">Loại Tour</button>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bxs-category'></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li><a class="dropdown-item text-primary" href="#">Khuyến mãi hot<i
                                                            class="fa-solid fa-tags ms-2 text-danger"></i></a></li>
                                                <li><a class="dropdown-item text-primary" href="#">Tour yêu thích<i
                                                            class="fa-solid fa-heart ms-2"
                                                            style="color: #ff0000;"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" style="padding-left: 25%; padding-top: 1%;">
                                    <div style="font-size: 17px;">Chúng tôi tìm thấy<b class="text-primary ms-2 me-2"
                                            style="font-size: 20px;">12 Tour</b>chương trình tour cho quý khách</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- List Tour -->
                <div class="row mt-5">
                    <div class="col-12 mb-3">

                        <template v-for="(value, index) in listTour" :key="index">
                            <div class="card-group"
                                style=" transition: 0.4s; box-shadow: 0 2px 4px rgba(0,0,0,0.1); border-radius: 8px;"
                                onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 12px 20px rgba(0,0,0,0.2)';"
                                onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                                <div class="position-relative">
                                    <img :src="value.url"
                                        style="height: 280px; width: 320px; border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                                    <div class="position-absolute top-0 start-0">
                                        <button class="btn btn-primary d-flex align-items-center justify-content-center"
                                            style="height: 30px;border-top-left-radius: 20px; border-bottom-right-radius: 10px; font-size: 15px;">Giảm
                                            {{ value.phan_tram_giam }}%</button>
                                    </div>
                                </div>
                                <div class="card" style="height: 280px;">
                                    <div class="card-body rounded-end ms-3">
                                        <h4><b>{{ value.ten_tour }}</b></h4>
                                        <div class="d-flex justify-content-between">
                                            <p class="mt-4 mb-2 text-black" style="font-size: 17px;">
                                                <img src="../../../assets/images/homecustomer/seat.png" class="me-2">
                                                Số chỗ: <span class="badge text-bg-secondary">{{
                                                    value.so_cho }}</span>
                                            </p>
                                            <span class="mt-4 text-black" style="font-size: 17px;"><i
                                                    class="fa-solid fa-map-location-dot me-2"></i>Khởi hành:
                                                <b class="text-primary">{{ value.dia_diem }}</b></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="mb-2 text-black" style="font-size: 17px;">
                                                <img src="../../../assets/images/homecustomer/seat(1).png" class="me-2">
                                                Số chỗ còn lại: <span class="badge text-bg-primary">{{
                                                    value.so_cho_con }}</span></span>
                                            <span class="text-black mb-1" style="font-size: 17px;">
                                                <img src="../../../assets/images/homecustomer/airplane.png" class="me-2">
                                                Phương tiện:
                                                {{ value.ten_phuong_tien }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between" style="font-size: 17px;">
                                            <p class="mt-2 text-black">Đánh giá:
                                                <!-- Sao vàng -->
                                                <i v-for="n in value.diem" :key="'star-' + n"
                                                    class="fa-solid fa-star text-warning me-1"></i>
                                                <!-- Sao trống -->
                                                <i v-for="n in (5 - value.diem)" :key="'empty-' + n"
                                                    class="fa-regular fa-star me-1" style="color: #FFD43B;"></i>
                                            </p>
                                            <span class="text-black text-end" style="font-size: 17px;">Giá:
                                                    <p class="text-danger mt-2 mb-2" style="font-size: 25px;">
                                                        <b>{{ formatVND(value.gia) }}</b>
                                                    </p></span>

                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <router-link :to="`/chi-tiet-tour/${value.id}`">
                                                <button class="btn btn-outline-warning">Xem chi tiết</button>
                                            </router-link>
                                            <button class="btn btn-outline-primary">Đặt ngay<i
                                                    class="fa-solid fa-cart-shopping ms-2"></i></button>
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

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3 mb-5">
                    <!-- Nút Previous -->
                    <button class="btn page-btn rounded-circle btn-outline-primary me-2">&lt;</button>

                    <!-- Các số trang -->
                    <button class="btn page-btn rounded-circle btn-outline-primary me-2 active">1</button>
                    <button class="btn page-btn rounded-circle btn-outline-primary me-2">2</button>
                    <button class="btn page-btn rounded-circle btn-outline-primary me-2">3</button>

                    <!-- Nút Next -->
                    <button class="btn page-btn rounded-circle btn-outline-primary me-2">&gt;</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            rangeValue: 50000000,
            listTour: [
                { id: 1, ten_tour: "Tour Hà Nội - Ninh Bình 3N2Đ", url: "https://sodulich.ninhbinh.gov.vn/uploads/images/32.jpg", gia: 3500000, diem: 5, ten_phuong_tien: "Máy bay", dia_diem: "Hà Nội, Ninh Bình", so_cho: 40, so_cho_con: 25, trang_thai: 1, phan_tram_giam: 100 },
                { id: 2, ten_tour: "Tour Đà Nẵng - Hội An 4N3Đ", url: "https://dulichvn.org.vn/nhaptin/uploads/images/2023/Thang4/0604Hoi-An1.jpg", gia: 5200000, diem: 4, ten_phuong_tien: "Máy bay", dia_diem: "Đà Nẵng, Hội An", so_cho: 35, so_cho_con: 15, trang_thai: 0, phan_tram_giam: 50 },
                { id: 3, ten_tour: "Tour Sa Pa - Fansipan 3N2Đ", url: "https://mia.vn/media/uploads/blog-du-lich/dien-dao-truoc-ve-dep-hung-vi-cua-fansipan-noc-nha-dong-duong-1624924043.jpg", gia: 4500000, diem: 5, ten_phuong_tien: "Máy bay", dia_diem: "Sa Pa, Lào Cai", so_cho: 30, so_cho_con: 12, trang_thai: 1, phan_tram_giam: 20 },
                { id: 4, ten_tour: "Tour Phú Quốc 4N3Đ", url: "https://bcp.cdnchinhphu.vn/334894974524682240/2025/6/23/phu-quoc-17506756503251936667562.jpg", gia: 6900000, diem: 4, ten_phuong_tien: "Máy bay", dia_diem: "Phú Quốc, Kiên Giang", so_cho: 50, so_cho_con: 30, trang_thai: 1, phan_tram_giam: 10 },
                { id: 5, ten_tour: "Tour Huế - Động Phong Nha 5N4Đ", url: "https://husta.vn/wp-content/uploads/2023/11/Hue-9357c48e.jpg", gia: 7800000, diem: 4, ten_phuong_tien: "Máy bay", dia_diem: "Huế, Quảng Bình", so_cho: 40, so_cho_con: 18, trang_thai: 1, phan_tram_giam: 40 },
                { id: 6, ten_tour: "Tour Miền Tây Sông Nước 3N2Đ", url: "https://baoduyentourist.com/uploads/tin-tuc/2025_05/du-lich-mien-tay-tet-4.jpg", gia: 3200000, diem: 5, ten_phuong_tien: "Máy bay", dia_diem: "Cần Thơ, An Giang", so_cho: 25, so_cho_con: 10, trang_thai: 0, phan_tram_giam: 30 }
            ]

        };
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VN').format(number) + ' VNĐ';
        },
        formatDate(date) {
            return new Date(date).toLocaleDateString('vi-VI');
        }
    }
}
</script>

<style></style>