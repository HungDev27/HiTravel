<template>

    <div class="position-relative">

        <!-- carousel -->
        <div id="carouselVideo" class="carousel slid" data-bs-ride="carousel" style="width: 100%;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <video autoplay loop muted playsinline style="width: 100%; height: 500px; object-fit: cover;">
                        <source src="../../assets/images/homecustomer/tour1.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ video.
                    </video>
                </div>
                <div class="carousel-item">
                    <video autoplay loop muted playsinline style="width: 100%; height: 500px; object-fit: cover;">
                        <source src="../../assets/images/homecustomer/tour2.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ video.
                    </video>
                </div>
                <div class="carousel-item">
                    <video autoplay loop muted playsinline style="width: 100%; height: 500px; object-fit: cover;">
                        <source src="../../assets/images/homecustomer/tour3.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ video.
                    </video>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselVideo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselVideo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div class="position-absolute top-100 start-50 translate-middle">

            <!-- FORM TÌM TOUR -->
            <div class="bg-white mb-5"
                style="padding: 1rem; border: 1px solid #0099ff; border-radius: 1rem; display: flex;">

                <input type="text" placeholder="Bạn muốn đi đâu?" class="me-2"
                    style="flex: 1; min-width: 180px; padding: 0.7rem 1rem; border: 1px solid #ccc; border-radius: 0.7rem; font-size: 1rem;">

                <div class="me-2" style="background-color: #f0f7ff; padding: 0.6rem; border-radius: 1rem;">
                    <img src="../../assets/images/homecustomer/map.png" style="width: 20px;">
                </div>

                <select class="me-2"
                    style="flex: 1; min-width: 150px; padding: 0.7rem 1rem; border: 1px solid #ccc; border-radius: 0.7rem; font-size: 1rem;">
                    <option>Chọn điểm đi</option>
                    <option>Hà Nội</option>
                    <option>Đà Nẵng</option>
                    <option>TP. Hồ Chí Minh</option>
                </select>

                <div class="me-2" style="background-color: #f0f7ff; padding: 0.6rem; border-radius: 1rem;">
                    <img src="../../assets/images/homecustomer/map.png" style="width: 20px;">
                </div>

                <select class="me-2"
                    style="flex: 1; min-width: 150px; padding: 0.7rem 1rem; border: 1px solid #ccc; border-radius: 0.7rem; font-size: 1rem;">
                    <option>Chọn điểm đến</option>
                    <option>Huế</option>
                    <option>Đà Lạt</option>
                    <option>Phú Quốc</option>
                </select>

                <div class="me-2" style="background-color: #f0f7ff; padding: 0.6rem; border-radius: 1rem;">
                    <img src="../../assets/images/homecustomer/map.png" style="width: 20px;">
                </div>

                <input type="date" class="me-2"
                    style="flex: 1; min-width: 150px; padding: 0.7rem 1rem; border: 1px solid #ccc; border-radius: 0.7rem; font-size: 1rem;">

                <button class="me-2"
                    style="background-color: #0099ff; color: white; border: none; border-radius: 0.7rem; padding: 0.7rem 1.5rem; font-size: 1rem; cursor: pointer;">
                    Tìm kiếm
                </button>

            </div>
        </div>

    </div>

    <!-- LÝ DO CHỌN HITRAVEL -->
    <div class="mt-5"
        style="background-color: #f0f8ff; padding: 3rem 1rem; border-top: 1px solid #0099ff; border-bottom: 1px solid #0099ff;">

        <h2 style="text-align: center; font-size: 1.8rem; font-weight: bold; margin-bottom: 2rem;">
            Vì sao bạn nên chọn HITravel
        </h2>

        <div
            style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem; max-width: 1200px; margin: auto;">

            <div class="row text-center">
                <div class="col-lg-4">
                    <div class="bg-primary"
                        style="border-radius: 1rem; width: 64px; height: 64px; margin: auto; display: flex; align-items: center; justify-content: center;">
                        <img src="../../assets/images/homecustomer/salary.png" style="width: 32px;" alt="Giá tốt">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Giá tốt nhất cho bạn</h4>
                    <p style="color: #555;">Có nhiều mức giá đa dạng phù hợp với ngân sách và nhu cầu của bạn</p>
                </div>

                <div class="col-lg-4">
                    <div class="bg-primary"
                        style="border-radius: 1rem; width: 64px; height: 64px; margin: auto; display: flex; align-items: center; justify-content: center;">
                        <img src="../../assets/images/homecustomer/world-tour.png" style="width: 32px;"
                            alt="Dễ dàng đặt tour">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Booking dễ dàng</h4>
                    <p style="color: #555;">Các bước booking và chăm sóc khách hàng nhanh chóng và thuận tiện</p>
                </div>

                <div class="col-lg-4">
                    <div class="bg-primary"
                        style="border-radius: 1rem; width: 64px; height: 64px; margin: auto; display: flex; align-items: center; justify-content: center;">
                        <img src="../../assets/images/homecustomer/tour-guide.png" style="width: 32px;"
                            alt="Tour tối ưu">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Tour du lịch tối ưu</h4>
                    <p style="color: #555;">Đa dạng các loại hình tour du lịch với nhiều mức giá khác nhau</p>
                </div>
            </div>

        </div>
    </div>

    <!-- BOOKING CÙNG HITRAVEL -->
    <div style="padding: 4rem 10rem; background-color: #fff; text-align: center; position: relative; overflow: hidden;">

        <h2> Booking cùng HITravel</h2>

        <p style="color: #666; font-size: 1rem; margin-bottom: 3rem;">
            Chỉ với 3 bước đơn giản và dễ dàng có ngay trải nghiệm tuyệt vời!
        </p>

        <div style="position: absolute; top: 140px; left: 0; right: 0; z-index: 0;">
            <hr class="mt-5" style="width:100%; height:150px; border-top:4px dashed #007bff; border-radius:50%;">
        </div>

        <div class="container">
            <!-- Booking cùng HITravel -->
            <div class="row">
                <div class="col-lg-4">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue;"><b>1</b></button>
                    <p><img src="../../assets/images/homecustomer/step1.png" alt="Tìm nơi muốn đến"
                            style="width: 100px;"></img></p>

                    <h4 style="font-weight: bold;">Tìm nơi muốn đến</h4>
                    <p style="color: #666;">Bất cứ nơi đâu bạn muốn đến, chúng tôi có tất cả những gì bạn cần</p>
                </div>

                <div class="col-lg-4">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue;"><b>2</b></button>
                    <p><img src="../../assets/images/homecustomer/step2.png" alt="Tìm nơi muốn đến"
                            style="width: 100px;"></img></p>

                    <h4 style="font-weight: bold;">Đặt vé</h4>
                    <p style="color: #666;">HITravel sẽ hỗ trợ bạn đặt vé trực tiếp nhanh chóng và thuận tiện</p>
                </div>

                <div class="col-lg-4">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue;"><b>2</b></button>
                    <p><img src="../../assets/images/homecustomer/step3.png" alt="Tìm nơi muốn đến"
                            style="width: 100px;"></img></p>
                    <h4 style="font-weight: bold;">Thanh toán</h4>
                    <p style="color: #666;">Hoàn thành bước thanh toán và sẵn sàng cho chuyến đi ngay thôi</p>
                </div>
            </div>

            <div class="row" style="padding: 6rem 1rem;">
                <!-- Hiểu hơn về chúng tôi -->
                <div class="col-lg-6 text-start">
                    <h4 class="text-primary"><b>Hiểu hơn về chúng tôi</b></h4>
                    <h2 class="mb-4">Lên kế hoạch cho chuyến đi của bạn cùng HITravel</h2>
                    <span class="text-secondary">Vinh hạnh của chúng tôi là mang đến cho bạn những chuyến đi đáng nhớ.
                        Mang đến cho bạn những chuyến đi đầy cảm hứng. Khám phá những vùng đất mới. Tự do khám phá cùng
                        chúng tôi.</span>
                    <h4 class="text-primary mt-5 mb-3"><b>Cơ hội tuyệt vời để gửi gắm niềm tin cùng HITravel. Tại sao
                            không?</b></h4>

                    <div class="row" style="display: flex; align-items: flex-start; max-width: 500px;">
                        <div class="col-lg-2">
                            <img src="../../assets/images/homecustomer/checklist.png" style="margin-top: 10px;"
                                class="ms-3">
                        </div>
                        <div class="col-lg-10" style="font-size: 19px;">
                            Hơn 10.000 khách hàng trên khắp cả nước đã đồng hành cùng chúng tôi
                        </div>
                    </div>

                    <div class="row mt-4" style="display: flex; align-items: flex-start; max-width: 500px;">
                        <div class="col-lg-2">
                            <img src="../../assets/images/homecustomer/checklist.png" class="ms-3">
                        </div>
                        <div class="col-lg-10" style="font-size: 19px;">
                            Bao phủ hơn 1.000 tour trong và ngoài nước

                        </div>
                    </div>

                    <div class="row mt-4" style="display: flex; align-items: flex-start; max-width: 500px;">
                        <div class="col-lg-2">
                            <img src="../../assets/images/homecustomer/checklist.png" class="ms-3">
                        </div>
                        <div class="col-lg-10" style="font-size: 19px;">
                            Tour và giá cả đa dạng
                        </div>
                    </div>
                </div>

                <!-- Ảnh -->
                <div class="col-lg-6">
                    <img src="../../assets/images/homecustomer/travel.png"
                        style="width: 450px; height: 500px; border-radius:14px; transition:0.4s;"
                        onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">
                </div>
            </div>

            <!-- Hot Deal -->
            <div class="d-flex justify-content-between" style="padding: 1rem 1rem;">
                <h3 style="font-family: 'Arial Black', Impact, sans-serif; letter-spacing: 1px;">HOT DEAL</h3>
                <router-link to="/tour-all">
                    <div class="text-success" style="font-size: 13px; border-radius: 1rem; transition:0.4s;"
                        onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">
                        <u>Xem thêm tour →</u>
                    </div>
                </router-link>
            </div>

            <!-- Tour -->
            <div class="row">
                <template v-for="(value, index) in listTour" :key="index">
                    <div class="col-lg-3">
                        <div class="position-relative">
                            <div class="card" style="width: 18rem; height: 28rem; transition:0.4s;"
                                onmouseover="this.style.transform='scale(1.05)';"
                                onmouseout="this.style.transform='scale(1)';">
                                <div class="position-relative">
                                    <img :src="value.url" class="card-img-top"
                                        style="height: 250px; width: 288px;">
                                    <!-- map -->
                                    <div class="position-absolute bottom-0 start-0">
                                        <button class="btn-white">
                                            <img src="../../assets/images/homecustomer/location.png">
                                            {{ value.dia_diem }}
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-nowrap">{{ value.ten_tour }}</h5>
                                    <p class="card-text">
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
                                    </p>
                                    <router-link :to="`/chi-tiet-tour/${value.id}`">
                                        <button class="btn text-white" style="background-color: darkorange;">Xem chi
                                            tiết</button></router-link>
                                </div>
                            </div>
                            <!-- deal -->
                            <div class="position-absolute top-0 start-0">
                                <button class="btn btn-warning text-white"
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 100%;"><b>DEAL
                                        Giá sốc!</b></button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <div class="container">

        <!-- Điểm đến yêu thích -->
        <div class="row mt-5">
            <!-- Tiêu đề -->
            <div class="text-center mb-3">
                <h2 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif; letter-spacing: 1px;"
                    class="text-primary"><b>Điểm đến yêu thích</b></h2>
                <span class="text-secondary">Tour du lịch Trong nước với HITravel. Hành hương đầu xuân - Tận hưởng bản
                    sắc
                    Việt.</span>
            </div>
        </div>

        <!-- Ảnh -->
        <div class="row mt-3">
            <template v-for="(value, index) in listDiaDiem" :key="index">
                <div class="col-lg-3">
                    <div class="position-relative">
                        <img :src="value.hinh_anh"
                            style="border-radius: 10%;height: 310px; width: 310px; transition:0.4s;"
                            onmouseover="this.style.transform='translateY(-10px)';"
                            onmouseout="this.style.transform='translateY(0)';">
                        <div class="position-absolute bottom-0 start-50 translate-middle-x">
                            <div class="text-center text-white ms-3 mb-5 fa-xl">
                                <b>{{ value.dia_diem }}</b>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <div class="row mt-4 mb-5">
            <span class="text-success text-center" style="transition:0.4s; font-size: 100%;"
                onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';"><u>Xem
                    thêm
                    tỉnh thành →</u></span>
        </div>


        <!-- TRẢI NGHIỆM SẮC XUÂN VIỆT NAM -->
        <div class="position-relative text-center">
            <img src="../../assets/images/homecustomer/nui.jpg" style="width: 1290px; height: 400px;">
            <div class="position-absolute top-50 translate-middle" style="margin-left: 32rem;">
                <div class="row">
                    <div class="col-lg-7 text-start" style="margin-top: 8rem;">
                        <h5 class="text-white me-5 "><b>TRẢI NGHIỆM SẮC XUÂN VIỆT NAM</b></h5>
                        <hr class="text-white">
                        <p>
                        <h2 class="text-white me-5 "><b>LỄ HỘI HOA 3 MIỀN</b></h2>
                        </p>
                        <span class="text-white">
                            Hòa mình vào sắc xuân rực rỡ khắp ba miền Việt Nam: ngắm hoa đào miền Bắc, hoa giấy và nét
                            cổ
                            kính miền Trung, mai vàng rực rỡ miền Nam, cùng trải nghiệm văn hóa – ẩm thực – lễ hội đặc
                            sắc
                            trên mọi nẻo đường.
                        </span>
                    </div>
                    <div class="col-lg-5" style="margin-top: 10rem;">
                        <video playsinline="" loop="" preload="auto"
                            poster="https://marketplace.canva.com/EAGC3ebVNXk/2/0/1600w/canva-GKQlDLVBLCo.jpg"
                            src="https://marketplace.canva.com/EAGC3ebVNXk/2/document_1440w/canva-IjuSvQXfjJQ.mp4"
                            autoplay="" class="CwbC6w" style="height: 300px; width: 600px;"></video>
                        <!-- <img src="../../assets/images/homecustomer/hoa.jpg" style="height: 300px; width: 600px;"> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- BÀI VIẾT -->
        <h2 class="text-center mb-4" style="margin-top: 5rem;">Cẩm nang du lịch</h2>
        <div class="row">
            <!-- listBaiViet.slice(0, 6) -->
            <template v-for="(value, index) in listBaiViet" :key="index">
                <div class="col-lg-4 mb-4 ">
                    <router-link :to="`/chi-tiet-bai-viet/${value.id}`">
                        <div class="card h-100">
                            <img :src="value.hinh_anh" class="card-img-top" style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">{{ value.tieu_de }}
                                </h5>
                                <p class="card-text text-dark">{{ value.mo_ta_ngan }}</p>
                            </div>
                        </div>
                    </router-link>
                </div>
            </template>
        </div>
    </div>


    <!-- Khách hàng đánh giá  -->
    <div class="row bg-white text-center">
        <h2 class="mt-4" style="font-family: 'Arial Black', Impact, sans-serif;">Khách hàng đánh giá</h2>
        <p class="mt-2 mb-3">Mục tiêu hàng đầu của chúng tôi là sự hài lòng của khách hàng</p>

        <!-- Đánh giá của người dùng -->
        <div class="position-relative">
            <!-- Ảnh -->
            <img src="../../assets/images/homecustomer/danhgia.jpg">

            <!-- Đánh giá -->
            <div class="position-absolute top-0 start-50 translate-middle-x">

                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-inner">

                        <div v-for="(value, index) in danhGiaList" :key="index" class="carousel-item"
                            :class="{ active: index === 0 }">

                            <div class="text-center p-4">
                                <p style="font-size: 1.1rem; font-style: italic;">"{{ value.binh_luan }}"</p>
                                <p style="margin-top: 1rem; font-weight: bold;">⭐ {{ value.diem }}/5</p>
                                <p>
                                    <img src="../../assets/images/homecustomer/avata.jpg" class="rounded-circle"
                                        style="height: 80px; width: 80px;">
                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- Nút điều hướng -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" style="background-color: #555;"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" style="background-color: #555;"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
    </div>


    <!-- Bạn có muốn nhận tin khuyến mãi? -->
    <div class="row text-center mb-5 mt-5">
        <h3>Bạn có muốn nhận tin khuyến mãi?</h3>
        <div class="mt-3 d-flex justify-content-center">
            <form class="d-flex" role="search" style="width: 600px;">
                <input class="form-control me-2" type="search" placeholder="Nhập địa chỉ email" aria-label="Search" />
                <button class="btn btn-success text-nowrap" type="submit"><i
                        class="fa-solid fa-paper-plane me-2"></i>Gửi
                    ngay</button>
            </form>
        </div>
    </div>

</template>
<script>
export default {
    data() {
        return {
            listTour: [
                { id: 1, ten_tour: "Nha Trang - Vinpearl Land", url: "https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/04/vinpearl-nha-trang.jpg", gia: 1800000, ngay_di: "2025-09-24", ngay_ve: "2025-09-27", dia_diem: "Nha Trang" },
                { id: 2, ten_tour: "Đà Nẵng - Bà Nà Hills", url: "https://i.pinimg.com/1200x/b1/b6/2e/b1b62ebf11a34189ae0ee007550a30e2.jpg", gia: 2500000, ngay_di: "2025-10-10", ngay_ve: "2025-10-12", dia_diem: "Đà Nẵng" },
                { id: 3, ten_tour: "Phú Quốc - Thiên đường biển", url: "https://dongtayland.vn/wp-content/uploads/2019/03/du-hoc-singapore-jcus-minh-hoa-phu-quoc.jpg", gia: 3200000, ngay_di: "2025-11-05", ngay_ve: "2025-11-09", dia_diem: "Phú Quốc" },
                { id: 4, ten_tour: "Hà Nội - Vịnh Hạ Long", url: "https://res.klook.com/images/fl_lossy.progressive,q_65/c_fill,w_1200,h_630/w_80,x_15,y_15,g_south_west,l_Klook_water_br_trans_yhcmh3/activities/qmgtdjekctlyucr8itqw/%C4%90%E1%BA%B7t%20tour%20%C4%91i%20V%E1%BB%8Bnh%20H%E1%BA%A1%20Long%20t%E1%BB%AB%20H%C3%A0%20N%E1%BB%99i.jpg", gia: 2800000, ngay_di: "2025-11-20", ngay_ve: "2025-11-22", dia_diem: "Hạ Long" },
            ],
            danhGiaList: [
                { id: 1, id_tour: 1, diem: 5, binh_luan: "Chuyến đi Nha Trang thật sự tuyệt vời. Hướng dẫn viên rất nhiệt tình, vui vẻ và luôn tạo không khí thoải mái cho đoàn. Các điểm tham quan được sắp xếp hợp lý, giúp mọi người vừa được trải nghiệm biển đảo, vừa có thời gian nghỉ ngơi chụp ảnh." },
                { id: 2, id_tour: 1, diem: 4, binh_luan: "Lịch trình được bố trí khá hợp lý, đi từ sáng đến chiều nhưng không quá mệt. Tôi thích nhất là được tham gia các hoạt động trải nghiệm như lặn ngắm san hô và đi thuyền." },
                { id: 3, id_tour: 2, diem: 3, binh_luan: "Chuyến đi Đà Nẵng mang lại nhiều kỷ niệm, các địa điểm nổi tiếng như Bà Nà Hills hay Ngũ Hành Sơn rất đẹp. Tuy nhiên do thời tiết nắng gắt nên việc di chuyển hơi vất vả. Nếu công ty chuẩn bị thêm nước uống hoặc khăn lạnh cho đoàn thì sẽ tuyệt vời hơn." },
                { id: 4, id_tour: 3, diem: 5, binh_luan: "Phú Quốc đúng là thiên đường biển. Nước biển trong xanh, bãi cát mịn và không khí trong lành. Tôi rất ấn tượng với chuyến đi cáp treo Hòn Thơm, cảm giác ngắm toàn cảnh từ trên cao thực sự khó quên." },
                { id: 5, id_tour: 2, diem: 4, binh_luan: "Tour giá cả hợp lý so với chất lượng dịch vụ. Nhân viên tư vấn từ lúc đăng ký đến khi đi đều rất tận tình. Tôi ấn tượng nhất là được ghé thăm các làng nghề truyền thống và thưởng thức ẩm thực địa phương." }
            ],
            listDiaDiem: [
                { id: 1, dia_diem: "Hà Nội", hinh_anh: "https://vietmytravel.com/wp-content/uploads/2019/04/vietmytravel_du-l%E1%BB%8Bch-h%C3%A0-n%E1%BB%99i.jpg" },
                { id: 2, dia_diem: "Ninh Bình", hinh_anh: "https://i.pinimg.com/1200x/e0/12/65/e01265f9116c51d9f2a0bddc628f5510.jpg" },
                { id: 3, dia_diem: "Đà Nẵng", hinh_anh: "https://i.pinimg.com/1200x/b1/b6/2e/b1b62ebf11a34189ae0ee007550a30e2.jpg" },
                { id: 4, dia_diem: "Sapa", hinh_anh: "https://i.pinimg.com/1200x/30/d4/38/30d4381118c455f270cd53dd38ec675e.jpg" }
            ],
            listBaiViet: [
                { id: 1, tieu_de: "Top 5 tour du lịch Việt Nam năm 2025", hinh_anh: "https://statics.vinpearl.com/diem-du-lich-01_1632671030%20(1)_1661249974.jpg", mo_ta_ngan: "Danh sách những tour du lịch hấp dẫn nhất năm 2025 trải dài từ Bắc vào Nam, mang đến cho bạn nhiều lựa chọn độc đáo và chất lượng." },
                { id: 2, tieu_de: "Trải nghiệm tour biển đảo tuyệt đẹp", hinh_anh: "https://resource.kinhtedothi.vn/2022/05/10/1fcea0e8-8981-4fe2-bea3-7acc01de4d98.jpg", mo_ta_ngan: "Nếu bạn là tín đồ của biển cả thì tour này sẽ đưa bạn đến những bãi cát trắng mịn, làn nước trong xanh cùng nhiều hoạt động vui chơi giải trí." },
                { id: 3, tieu_de: "Tour khám phá văn hoá, ẩm thực Đà Nẵng", hinh_anh: "https://truongsatour.com/uploads/images/tour-mua-he-da-nang-gia-sieu-re.jpg", mo_ta_ngan: "Một hành trình đặc sắc dành cho những ai yêu thích văn hóa Nhật Bản với trải nghiệm ẩm thực, tham quan đền chùa và các thành phố nổi tiếng." },
                { id: 4, tieu_de: "Khám phá bí mật thú vị trong tour đến miền Nam", hinh_anh: "https://cdn.tgdd.vn/Files/2022/03/26/1422479/17-diem-du-lich-mien-nam-dep-ly-tuong-nhat-khong-nen-bo-lo-202203261508470331.jpg", mo_ta_ngan: "Tour du lịch đến miền Nam độc đáo, đưa bạn đến những địa điểm quay nổi tiếng trong lịch sử và tận hưởng không khí mới lạ." },
                { id: 5, tieu_de: "Top 10 hướng dẫn viên nổi bật của công ty", hinh_anh: "https://hethonggiaoduc.edu.vn/uploads/news/imager_1175.jpg", mo_ta_ngan: "Danh sách những hướng dẫn viên được yêu thích nhất, luôn tận tâm và nhiệt huyết để mang đến trải nghiệm đáng nhớ cho khách hàng." },
                { id: 6, tieu_de: "Làm sao để nhận biết một tour chất lượng?", hinh_anh: "https://tour.dulichvietnam.com.vn/uploads/tour/tmp_1654660048.jpg", mo_ta_ngan: "Bí quyết lựa chọn tour du lịch uy tín thông qua lịch trình rõ ràng, phản hồi khách hàng trước đó và dịch vụ chu đáo từ công ty lữ hành." }
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