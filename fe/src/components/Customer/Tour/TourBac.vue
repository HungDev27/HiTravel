<template>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../../assets/images/homecustomer/listtour1.jpeg" class="d-block w-100"
                    style="width: 100%; height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item ">
                <img src="../../../assets/images/homecustomer/listtour2.jpg" class="d-block w-100"
                    style="width: 100%; height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item ">
                <img src="../../../assets/images/homecustomer/listtuor4.jpg" class="d-block w-100 img-fluid"
                    style="width: 100%; height: 250px; object-fit: cover;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="text-center mb-3">
                <h4 class="text-uppercase fs-3 text-dark">Danh mục Tour Miền Bắc</h4>
            </div>

            <template v-for="(value, index) in listTour" :key="index">
                <template v-if="value.trang_thai == 2">
                    <div class="col-lg-3 col-md-4 rounded mb-5" style="flex: 0 0 auto;">
                        <div class="rounded position-relative"
                            style="transition: transform 0.3s ease, box-shadow 0.3s ease; overflow: hidden; height: 100%;"
                            onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.2)'; this.querySelector('.btn-overlay').style.opacity = '1'"
                            onmouseout="this.style.transform='none'; this.style.boxShadow='none'; this.querySelector('.btn-overlay').style.opacity = '0'">

                            <div class="card-img-top">
                                <div class="position-relative">
                                    <img :src="value.hinh_anh" class="card-img-top"
                                        style="height: 270px; width: 320px;">
                                    <!-- map -->
                                    <div class="position-absolute bottom-0 start-0">
                                        <span class="badge bg-danger">
                                            <i class="fa-solid fa-map-pin"></i>
                                            {{ value.dia_diem }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-overlay text-center position-absolute w-100"
                                style="top: 40%; left: 50%; transform: translate(-50%, -50%); opacity: 0; transition: opacity 0.3s ease;">
                                <router-link :to="`/chi-tiet-tour/${value.id}`">
                                    <button class="btn btn-success p-2 " style="width: 170px;">
                                        <i class="fa-solid fa-plane"></i>
                                        Xem chi tiết</button>
                                </router-link>
                            </div>
                            <div class="card-body ms-2 mt-2 me-2">
                                <h5 class="card-title text-nowrap">{{ value.ten_tour }}</h5>
                                <div class="card-text">
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="text-secondary">
                                            <i class="fa-solid fa-clock me-2"></i>
                                            <span>
                                                {{ formatDate(value.ngay_di) }} → {{ formatDate(value.ngay_ve) }}
                                            </span>
                                        </div>
                                        <div class="text-secondary">
                                            <i class="fa-solid fa-car me-3"></i>
                                            <i class="fa-solid fa-bus-simple"></i>
                                        </div>
                                    </div>
                                    <h4 style="color: darkorange;" class="text-start mt-2">
                                        {{ formatVND(value.gia) }}
                                    </h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </template>
            </template>
        </div>
    </div>

</template>
<script>
export default {
    data() {
        return {
            listTour: [
                { id: 1, ten_tour: "Nha Trang - Vinpearl Land", hinh_anh: "https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/04/vinpearl-nha-trang.jpg", gia: 1800000, ngay_di: "2025-09-24", ngay_ve: "2025-09-27", dia_diem: "Nha Trang", trang_thai: 1 },
                { id: 2, ten_tour: "Đà Nẵng - Bà Nà Hills", hinh_anh: "https://cdn3.ivivu.com/2024/04/sun-world-ba-na-hills-ivivu45.jpg", gia: 2500000, ngay_di: "2025-10-10", ngay_ve: "2025-10-12", dia_diem: "Đà Nẵng", trang_thai: 2 },
                { id: 3, ten_tour: "Phú Quốc - Thiên đường biển", hinh_anh: "https://dongtayland.vn/wp-content/uploads/2019/03/du-hoc-singapore-jcus-minh-hoa-phu-quoc.jpg", gia: 3200000, ngay_di: "2025-11-05", ngay_ve: "2025-11-09", dia_diem: "Phú Quốc", trang_thai: 2 },
                { id: 4, ten_tour: "Hà Nội - Vịnh Hạ Long", hinh_anh: "https://res.klook.com/images/fl_lossy.progressive,q_65/c_fill,w_1200,h_630/w_80,x_15,y_15,g_south_west,l_Klook_water_br_trans_yhcmh3/activities/qmgtdjekctlyucr8itqw/%C4%90%E1%BA%B7t%20tour%20%C4%91i%20V%E1%BB%8Bnh%20H%E1%BA%A1%20Long%20t%E1%BB%AB%20H%C3%A0%20N%E1%BB%99i.jpg", gia: 2800000, ngay_di: "2025-11-20", ngay_ve: "2025-11-22", dia_diem: "Hạ Long", trang_thai: 1 },
                { id: 5, ten_tour: "Sapa - Núi Fansipan", hinh_anh: "https://www.kynghidongduong.vn/userfiles/images/Vietnam/Sapa/fansipan-sapa-kynghidongduong.vn%20(10)%20(Nguon%20Andrey%20Sulitskiy).jpg", gia: 3000000, ngay_di: "2025-12-01", ngay_ve: "2025-12-04", dia_diem: "Sapa", trang_thai: 2 },
                { id: 6, ten_tour: "Huế - Kinh thành cổ", hinh_anh: "https://cdn3.ivivu.com/2022/09/quan-the-di-tich-co-do-hue-ivivu-6.jpeg", gia: 2200000, ngay_di: "2025-12-10", ngay_ve: "2025-12-12", dia_diem: "Huế", trang_thai: 2 },
                { id: 7, ten_tour: "Đà Lạt - Thành phố ngàn hoa", hinh_anh: "https://imgcdn.tapchicongthuong.vn/tcct-media/20/6/15/vuon-hoa-thanh-pho-da-lat-3.jpg", gia: 2600000, ngay_di: "2026-01-05", ngay_ve: "2026-01-08", dia_diem: "Đà Lạt", trang_thai: 2 },
                { id: 8, ten_tour: "Quảng Bình - Động Phong Nha", hinh_anh: "https://media.vietravel.com/images/Content/du-lich-phong-nha-ke-bang-01.png", gia: 2400000, ngay_di: "2026-01-15", ngay_ve: "2026-01-17", dia_diem: "Quảng Bình", trang_thai: 2 },
                { id: 9, ten_tour: "Cần Thơ - Chợ nổi Cái Răng", hinh_anh: "https://mia.vn/media/uploads/blog-du-lich/kham-pha-net-dac-sac-cua-cho-noi-cai-rang-chon-mien-tay-song-nuoc-12-1649149954.jpeg", gia: 2100000, ngay_di: "2026-02-02", ngay_ve: "2026-02-04", dia_diem: "Cần Thơ", trang_thai: 1 },
                { id: 10, ten_tour: "Ninh Bình - Tràng An", hinh_anh: "https://cdn.nhandan.vn/images/1ef398c4e2fb4bf07980a2ded785b3efda87c6c9f0f780f004189243092dbc007ca3b3ab6a1d6a3ebee3c3a4aeeedc55816293cdf6654406f2883bf8d3c287eaa918db6777bd21040da6d9ea10a7c60c3fdb800e713f924ec1c12b2084e828d69e59a5531b85ca769b0060d1803beb2a276f5d5ded26ab6fcf331462f71b83b8/doc-dao-le-hoi-trang-an-net-van-hoa-tin-nguong-cua-ninh-binh-1640505232-5579-5773.jpg", gia: 2300000, ngay_di: "2026-02-20", ngay_ve: "2026-02-22", dia_diem: "Ninh Bình", trang_thai: 2 },
            ]
        }

    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number,);
        },
        formatDate(date) {
            return new Date(date).toLocaleDateString('vi-VI');
        }
    }
}
</script>
<style></style>