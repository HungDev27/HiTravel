<template>

    <div class="position-relative">

        <!-- carousel -->
        <div id="carouselVideo" class="carousel slide" data-bs-ride="carousel" style="width: 100%;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <video autoplay loop muted playsinline style="width: 100%; height: 500px; object-fit: cover;">
                        <source src="../../../assets/images/homecustomer/tour1.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ video.
                    </video>
                </div>
                <div class="carousel-item">
                    <video autoplay loop muted playsinline style="width: 100%; height: 500px; object-fit: cover;">
                        <source src="../../../assets/images/homecustomer/tour2.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ video.
                    </video>
                </div>
                <div class="carousel-item">
                    <video autoplay loop muted playsinline style="width: 100%; height: 500px; object-fit: cover;">
                        <source src="../../../assets/images/homecustomer/tour3.mp4" type="video/mp4">
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
                    <img src="../../../assets/images/homecustomer/map.png" style="width: 20px;">
                </div>

                <select class="me-2"
                    style="flex: 1; min-width: 150px; padding: 0.7rem 1rem; border: 1px solid #ccc; border-radius: 0.7rem; font-size: 1rem;">
                    <option>Chọn điểm đi</option>
                    <option>Hà Nội</option>
                    <option>Đà Nẵng</option>
                    <option>TP. Hồ Chí Minh</option>
                </select>

                <div class="me-2" style="background-color: #f0f7ff; padding: 0.6rem; border-radius: 1rem;">
                    <img src="../../../assets/images/homecustomer/map.png" style="width: 20px;">
                </div>

                <select class="me-2"
                    style="flex: 1; min-width: 150px; padding: 0.7rem 1rem; border: 1px solid #ccc; border-radius: 0.7rem; font-size: 1rem;">
                    <option>Chọn điểm đến</option>
                    <option>Huế</option>
                    <option>Đà Lạt</option>
                    <option>Phú Quốc</option>
                </select>

                <div class="me-2" style="background-color: #f0f7ff; padding: 0.6rem; border-radius: 1rem;">
                    <img src="../../../assets/images/homecustomer/map.png" style="width: 20px;">
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

    <!-- LÝ DO CHỌN NHTRAVEL -->
    <div class="mt-5"
        style="background-color: #f0f8ff; padding: 3rem 1rem; border-top: 1px solid #0099ff; border-bottom: 1px solid #0099ff;">

        <h2 style="text-align: center; font-size: 1.8rem; font-weight: bold; margin-bottom: 2rem;">
            Vì sao bạn nên chọn NHTravel
        </h2>

        <div
            style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem; max-width: 1200px; margin: auto;">

            <div class="row text-center">
                <div class="col-lg-4">
                    <div class="bg-primary"
                        style="border-radius: 1rem; width: 64px; height: 64px; margin: auto; display: flex; align-items: center; justify-content: center;">
                        <img src="../../../assets/images/homecustomer/salary.png" style="width: 32px;" alt="Giá tốt">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Giá tốt nhất cho bạn</h4>
                    <p style="color: #555;">Có nhiều mức giá đa dạng phù hợp với ngân sách và nhu cầu của bạn</p>
                </div>

                <div class="col-lg-4">
                    <div class="bg-primary"
                        style="border-radius: 1rem; width: 64px; height: 64px; margin: auto; display: flex; align-items: center; justify-content: center;">
                        <img src="../../../assets/images/homecustomer/world-tour.png" style="width: 32px;"
                            alt="Dễ dàng đặt tour">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Booking dễ dàng</h4>
                    <p style="color: #555;">Các bước booking và chăm sóc khách hàng nhanh chóng và thuận tiện</p>
                </div>

                <div class="col-lg-4">
                    <div class="bg-primary"
                        style="border-radius: 1rem; width: 64px; height: 64px; margin: auto; display: flex; align-items: center; justify-content: center;">
                        <img src="../../../assets/images/homecustomer/tour-guide.png" style="width: 32px;"
                            alt="Tour tối ưu">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Tour du lịch tối ưu</h4>
                    <p style="color: #555;">Đa dạng các loại hình tour du lịch với nhiều mức giá khác nhau</p>
                </div>
            </div>

        </div>
    </div>

    <!-- BOOKING CÙNG NHTRAVEL -->
    <div style="padding: 4rem 10rem; background-color: #fff; text-align: center; position: relative; overflow: hidden;">

        <h2> Booking cùng NHTravel</h2>

        <p style="color: #666; font-size: 1rem; margin-bottom: 3rem;">
            Chỉ với 3 bước đơn giản và dễ dàng có ngay trải nghiệm tuyệt vời!
        </p>

        <div style="position: absolute; top: 140px; left: 0; right: 0; z-index: 0;">
            <hr class="mt-5" style="width:100%; height:150px; border-top:4px dashed #007bff; border-radius:50%;">
        </div>

        <div class="container">
            <!-- Booking cùng NHTravel -->
            <div class="row">
                <div class="col-lg-4">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue;"><b>1</b></button>
                    <p><img src="../../../assets/images/homecustomer/step1.png" alt="Tìm nơi muốn đến"
                            style="width: 100px;"></img></p>

                    <h4 style="font-weight: bold;">Tìm nơi muốn đến</h4>
                    <p style="color: #666;">Bất cứ nơi đâu bạn muốn đến, chúng tôi có tất cả những gì bạn cần</p>
                </div>

                <div class="col-lg-4">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue;"><b>2</b></button>
                    <p><img src="../../../assets/images/homecustomer/step2.png" alt="Tìm nơi muốn đến"
                            style="width: 100px;"></img></p>

                    <h4 style="font-weight: bold;">Đặt vé</h4>
                    <p style="color: #666;">NHTravel sẽ hỗ trợ bạn đặt vé trực tiếp nhanh chóng và thuận tiện</p>
                </div>

                <div class="col-lg-4">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue;"><b>2</b></button>
                    <p><img src="../../../assets/images/homecustomer/step3.png" alt="Tìm nơi muốn đến"
                            style="width: 100px;"></img></p>
                    <h4 style="font-weight: bold;">Thanh toán</h4>
                    <p style="color: #666;">Hoàn thành bước thanh toán và sẵn sàng cho chuyến đi ngay thôi</p>
                </div>
            </div>

            <div class="row" style="padding: 6rem 1rem;">
                <!-- Hiểu hơn về chúng tôi -->
                <div class="col-lg-6 text-start">
                    <h4 class="text-primary"><b>Hiểu hơn về chúng tôi</b></h4>
                    <h2 class="mb-4">Lên kế hoạch cho chuyến đi của bạn cùng NHTravel</h2>
                    <span class="text-secondary">Vinh hạnh của chúng tôi là mang đến cho bạn những chuyến đi đáng nhớ.
                        Mang đến cho bạn những chuyến đi đầy cảm hứng. Khám phá những vùng đất mới. Tự do khám phá cùng
                        chúng tôi.</span>
                    <h4 class="text-primary mt-5 mb-3"><b>Cơ hội tuyệt vời để gửi gắm niềm tin cùng NHTravel. Tại sao
                            không?</b></h4>

                    <div class="row" style="display: flex; align-items: flex-start; max-width: 500px;">
                        <div class="col-lg-2">
                            <img src="../../../assets/images/homecustomer/checklist.png" style="margin-top: 10px;"
                                class="ms-3">
                        </div>
                        <div class="col-lg-10" style="font-size: 19px;">
                            Hơn 10.000 khách hàng trên khắp cả nước đã đồng hành cùng chúng tôi
                        </div>
                    </div>

                    <div class="row mt-4" style="display: flex; align-items: flex-start; max-width: 500px;">
                        <div class="col-lg-2">
                            <img src="../../../assets/images/homecustomer/checklist.png" class="ms-3">
                        </div>
                        <div class="col-lg-10" style="font-size: 19px;">
                            Bao phủ hơn 1.000 tour trong và ngoài nước

                        </div>
                    </div>

                    <div class="row mt-4" style="display: flex; align-items: flex-start; max-width: 500px;">
                        <div class="col-lg-2">
                            <img src="../../../assets/images/homecustomer/checklist.png" class="ms-3">
                        </div>
                        <div class="col-lg-10" style="font-size: 19px;">
                            Tour và giá cả đa dạng
                        </div>
                    </div>

                </div>

                <!-- Ảnh -->
                <div class="col-lg-6">
                    <img src="../../../assets/images/homecustomer/travel.png"
                        style="width: 450px; height: 500px; border-radius:14px; transition:0.4s;"
                        onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">
                </div>

                <router-link to="/gioi-thieu" style="text-decoration: none;">
                    <div style="text-align: center; margin-top: 2rem;">

                        <div onmouseover="this.style.color='white'; this.querySelector('.bg-slide').style.width='100%'; this.querySelector('.bg-slide').style.opacity='1';"
                            onmouseout="this.style.color='#e56b2f'; this.querySelector('.bg-slide').style.width='0'; this.querySelector('.bg-slide').style.opacity='0';"
                            style="
                                    position: relative; 
                                    display: inline-block; 
                                    padding: 0.8rem 1.5rem; 
                                    border: 2px solid #e56b2f; 
                                    background: transparent;
                                    color: #e56b2f; 
                                    font-weight: bold; 
                                    font-size: 15px; 
                                    cursor: pointer; 
                                    overflow: hidden; 
                                    transition: color 0.3s; 
                                    /* Quan trọng: display inline-block để bọc vừa nội dung */
                                ">
                            <span style="position: relative; z-index: 2;">Tìm hiểu thêm →</span>

                            <span class="bg-slide" style="
                                position: absolute; 
                                top: 0; 
                                left: 0; 
                                height: 100%; 
                                width: 0; 
                                opacity: 0; 
                                background-color: #e56b2f; 
                                z-index: 1; 
                                transition: width 0.4s, opacity 0.2s;">
                            </span>
                        </div>

                    </div>
                </router-link>
            </div>

            <!-- Hot Deal -->
            <div class="d-flex justify-content-between mt-0" style="padding: 1rem 1rem;">
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
                            <div class="card" style="width: 18rem; height: 30rem; transition:0.4s;"
                                onmouseover="this.style.transform='scale(1.05)';"
                                onmouseout="this.style.transform='scale(1)';">
                                <div class="position-relative">
                                    <img :src="value.url" class="card-img-top" style="height: 250px; width: 288px;">
                                    <!-- map -->
                                    <div class="position-absolute bottom-0 start-0">
                                        <button class="btn-white">
                                            <img src="../../../assets/images/homecustomer/location.png">
                                            {{ value.dia_diem }}
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body d-flex flex-column justify-content-between text-start"
                                    style="height: 230px;">
                                    <div>
                                        <!-- Tiêu đề tour -->
                                        <h5 class="card-title truncate-2-lines" style="max-width: 100%;">{{
                                            value.ten_tour }}</h5>

                                        <!-- Ngày đi / về -->
                                        <div class="text-secondary mt-2">
                                            <i class="fa-solid fa-clock me-2"></i>
                                            <span>
                                                {{ formatDate(value.ngay_di) }} → {{ formatDate(value.ngay_ve) }}
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <!-- Giá -->
                                        <div class="d-flex align-items-baseline text-darkorange">
                                            <span class="text-secondary me-1" style="font-size: 13px;">Người lớn:</span>
                                            <h5 class="mb-0 fw-bold" style="color: darkorange;">
                                                {{ formatVND(value.gia_nguoi_lon) }}
                                            </h5>
                                        </div>

                                        <div class="d-flex align-items-baseline text-secondary mt-1 mb-2">
                                            <span class="me-1" style="font-size: 12px;">Trẻ em:</span>
                                            <span class="fw-semibold" style="font-size: 14px;">
                                                {{ formatVND(value.gia_tre_em) }}
                                            </span>
                                        </div>

                                        <!-- Nút xem chi tiết -->
                                        <router-link :to="`/chi-tiet-tour/${value.id}`">
                                            <button class="btn text-white" style="background-color: darkorange;">Xem chi
                                                tiết</button>
                                        </router-link>
                                    </div>
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
                <span class="text-secondary">Tour du lịch Trong nước với NHTravel. Hành hương đầu xuân - Tận hưởng bản
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
            <img src="../../../assets/images/homecustomer/nui.jpg" style="width: 1290px; height: 400px;">
            <div class="position-absolute top-50 translate-middle" style="margin-left: 32rem;">
                <div class="row">
                    <div class="col-lg-7 text-start" style="margin-top: 8rem;">
                        <h5 class="text-white me-5 "><b>TRẢI NGHIỆM SẮC XUÂN VIỆT NAM</b></h5>
                        <hr class="text-white">
                        <div>
                            <h2 class="text-white me-5 "><b>LỄ HỘI HOA 3 MIỀN</b></h2>
                        </div>
                        <span class="text-white">
                            Hòa mình vào sắc xuân rực rỡ khắp ba miền Việt Nam: ngắm hoa đào miền Bắc, hoa giấy và nét
                            cổ
                            kính miền Trung, mai vàng rực rỡ miền Nam, cùng trải nghiệm văn hóa – ẩm thực – lễ hội đặc
                            sắc
                            trên mọi nẻo đường.
                        </span>
                    </div>
                    <div class="col-lg-5" style="margin-top: 10rem;">
                        <video autoplay loop muted playsinline preload="auto"
                            poster="../../../assets/images/homecustomer/flower.jpg"
                            style="width: 600px; height: 300px; object-fit: contain;">
                            <source src="../../../assets/images/homecustomer/flower.mp4" type="video/mp4">
                            Trình duyệt của bạn không hỗ trợ video.
                        </video>

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
            <img src="../../../assets/images/homecustomer/danhgia.jpg">

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
                                    <img :src="value.avatar" class="rounded-circle" style="height: 80px; width: 80px;">
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
import axios from 'axios'
export default {

    data() {
        return {
            listTour: [],
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
            listBaiViet: []
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number,);
        },
        formatDate(date) {
            return new Date(date).toLocaleDateString('vi-VI');
        },
        loadData() {
            axios.get('http://127.0.0.1:8000/api/home-page')
                .then((res) => {
                    this.listTour = res.data.data_tour.map(tour => {
                        return {
                            ...tour,
                            url: tour.anh ? tour.anh.url : 'default.jpg'
                        }
                    });
                    this.listBaiViet = res.data.data_bv;
                })
        }

    }
}
</script>
