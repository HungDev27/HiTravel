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

        <div class="position-absolute top-100 start-50 translate-middle w-50">

            <!-- KHUNG TÌM KIẾM CHÍNH (Đã thu gọn) -->
            <div class="bg-white d-flex align-items-center py-3 px-4 rounded-pill shadow-lg mb-3" style="
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
                        opacity: 0; 
                        transform: translateY(50px); 
                        transition: all 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                        border: 2px solid #f0f0f0;
                    " data-animate="fade-in-up">

                <div class="flex-grow-1 px-3">
                    <label
                        style="font-weight: 800; font-size: 0.95rem; color: #1e3a8a; margin-bottom: 2px; display: block;">
                        <i class="fa-solid fa-location-dot me-2 text-primary"></i>
                        Điểm đến <span style="color: #f87171;">*</span>
                    </label>
                    <input type="text" v-model="searchText"
                        style="border: none; outline: none; width: 100%; color: #374151; font-size: 1.1rem; padding: 0; background: transparent;"
                        placeholder="Tìm kiếm thành phố, điểm tham quan...">
                    <p v-if="errors.diaDiem" class="text-danger mt-1" style="font-size: 0.85rem;">
                        {{ errors.diaDiem }}
                    </p>

                </div>

                <div class="d-none d-md-block"
                    style="width: 1px; height: 35px; background-color: #d1d5db; margin: 0 8px;"></div>

                <div class="px-3" style="min-width: 180px;">
                    <label
                        style="font-weight: 800; font-size: 0.95rem; color: #1e3a8a; margin-bottom: 2px; display: block;">
                        <i class="fa-regular fa-calendar-alt me-2 text-success"></i>
                        Ngày đi
                    </label>
                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" v-model="ngayDi"
                        style="border: none; outline: none; width: 100%; color: #374151; font-size: 1.1rem; padding: 0; background: transparent;"
                        placeholder="Chọn ngày">
                </div>

                <div class="d-none d-md-block"
                    style="width: 1px; height: 35px; background-color: #d1d5db; margin: 0 8px;"></div>

                <div class="px-3" style="min-width: 160px;">
                    <label
                        style="font-weight: 800; font-size: 0.95rem; color: #1e3a8a; margin-bottom: 2px; display: block;">
                        <i class="fa-solid fa-sack-dollar me-2" style="color: #f59e0b;"></i>
                        Ngân sách
                    </label>
                    <select class="form-select border-0 p-0" v-model="nganSach"
                        style="border: none !important; outline: none !important; width: 100%; color: #374151; font-size: 1.1rem; padding: 0 !important; background: transparent !important; background-image: none !important; box-shadow: none !important;">
                        <option value="" disabled selected style="color: #6c757d;">Mức giá</option>
                        <option value="1">&lt; 5 triệu</option>
                        <option value="2">5 - 10 triệu</option>
                        <option value="3">&gt; 10 triệu</option>
                    </select>
                </div>

                <div class="ps-2">
                    <button class="shadow-lg border-0" @click="submitSearch" style="
                width: 50px; 
                height: 50px; 
                border-radius: 50%; 
                background-color: #ff5722; /* Màu cam nổi bật */
                color: white; 
                display: flex; 
                align-items: center; 
                justify-content: center; 
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Hiệu ứng Pop-up */
            " onmouseover="this.style.backgroundColor='#e64a19'; this.style.transform='scale(1.15) rotate(5deg)'"
                        onmouseout="this.style.backgroundColor='#ff5722'; this.style.transform='scale(1) rotate(0deg)'">
                        <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- LÝ DO CHỌN NHTRAVEL -->
    <div class="mt-5"
        style="background-color: #f4f8ff; padding: 4rem 1rem; border-top: 1px solid #0099ff; border-bottom: 1px solid #0099ff;">

        <h2 style="text-align: center; font-size: 1.8rem; font-weight: bold; margin-bottom: 2.5rem; opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;" data-animate="fade-in-up">
            Vì sao bạn nên chọn NHTravel 💙
        </h2>

        <div class="row justify-content-center g-4 mx-auto"
            style="max-width: 1200px; opacity: 0; transform: translateY(30px); transition: all 0.8s ease;"
            data-animate="fade-in-up">

            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-sm p-4 text-center h-100"
                    style="border-radius: 1rem; border: 1px solid #eee; transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);"
                    onmouseover="this.style.transform='translateY(-10px) scale(1.02)'; this.style.boxShadow='0 15px 30px rgba(0, 0, 0, 0.15)'"
                    onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 1px 2px rgba(0,0,0,0.07)'">

                    <div class="mx-auto"
                        style="border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: #28a745;">
                        <img src="../../../assets/images/homecustomer/salary.png" style="width: 40px;" alt="Giá tốt">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Giá tốt nhất cho bạn</h4>
                    <p style="color: #555;">Có nhiều mức giá đa dạng phù hợp với ngân sách và nhu cầu của bạn</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-sm p-4 text-center h-100"
                    style="border-radius: 1rem; border: 1px solid #eee; transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);"
                    onmouseover="this.style.transform='translateY(-10px) scale(1.02)'; this.style.boxShadow='0 15px 30px rgba(0, 0, 0, 0.15)'"
                    onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 1px 2px rgba(0,0,0,0.07)'">
                    <div class="mx-auto"
                        style="border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: #007bff;">
                        <img src="../../../assets/images/homecustomer/world-tour.png" style="width: 40px;"
                            alt="Dễ dàng đặt tour">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Booking dễ dàng</h4>
                    <p style="color: #555;">Các bước booking và chăm sóc khách hàng nhanh chóng và thuận tiện</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-sm p-4 text-center h-100"
                    style="border-radius: 1rem; border: 1px solid #eee; transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);"
                    onmouseover="this.style.transform='translateY(-10px) scale(1.02)'; this.style.boxShadow='0 15px 30px rgba(0, 0, 0, 0.15)'"
                    onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 1px 2px rgba(0,0,0,0.07)'">
                    <div class="mx-auto"
                        style="border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: #ffc107;">
                        <img src="../../../assets/images/homecustomer/tour-guide.png" style="width: 40px;"
                            alt="Tour tối ưu">
                    </div>
                    <h4 style="margin-top: 1rem; font-weight: bold;">Tour du lịch tối ưu</h4>
                    <p style="color: #555;">Đa dạng các loại hình tour du lịch với nhiều mức giá khác nhau</p>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOKING CÙNG NHTRAVEL -->
    <div style="padding: 4rem 10rem; background-color: #fff; text-align: center; position: relative; overflow: hidden;opacity: 0; transform: translateY(30px); transition: all 0.8s ease;"
        data-animate="fade-in-up">

        <h2> Booking cùng NHTravel</h2>

        <p style="color: #666; font-size: 1rem; margin-bottom: 3rem;">
            Chỉ với 3 bước đơn giản và dễ dàng có ngay trải nghiệm tuyệt vời!
        </p>

        <div style="position: absolute; top: 140px; left: 0; right: 0; z-index: 0;">
            <hr class="mt-5" style="width:100%; height:150px; border-top:4px dashed #007bff; border-radius:50%;">
        </div>

        <div class="container">
            <div class="row" style="position: relative; z-index: 1;">

                <div class="col-lg-4" style="transition: transform 0.3s, box-shadow 0.3s;"
                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.1)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue; width: 50px; height: 50px; font-size: 1.2rem; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;"><b>1</b></button>
                    <p><img src="../../../assets/images/homecustomer/step1.png" alt="Tìm nơi muốn đến"
                            style="width: 100px;"></img></p>

                    <h4 style="font-weight: bold;">Tìm nơi muốn đến</h4>
                    <p style="color: #666;">Bất cứ nơi đâu bạn muốn đến, chúng tôi có tất cả những gì bạn cần</p>
                </div>

                <div class="col-lg-4" style="transition: transform 0.3s, box-shadow 0.3s;"
                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.1)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue; width: 50px; height: 50px; font-size: 1.2rem; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;"><b>2</b></button>
                    <p><img src="../../../assets/images/homecustomer/step2.png" alt="Đặt vé"
                            style="width: 100px;"></img></p>

                    <h4 style="font-weight: bold;">Đặt vé</h4>
                    <p style="color: #666;">NHTravel sẽ hỗ trợ bạn đặt vé trực tiếp nhanh chóng và thuận tiện</p>
                </div>

                <div class="col-lg-4" style="transition: transform 0.3s, box-shadow 0.3s;"
                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.1)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    <button class="btn btn-white text-white"
                        style="border-radius: 60%; background-color: deepskyblue; width: 50px; height: 50px; font-size: 1.2rem; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;"><b>3</b></button>
                    <p><img src="../../../assets/images/homecustomer/step3.png" alt="Thanh toán"
                            style="width: 100px;"></img></p>
                    <h4 style="font-weight: bold;">Thanh toán</h4>
                    <p style="color: #666;">Hoàn thành bước thanh toán và sẵn sàng cho chuyến đi ngay thôi</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container">

        <!-- Điểm đến yêu thích -->
        <div class="row" data-animate="fade-in-up"
            style="opacity: 0; transform: translateY(30px); transition: all 0.8s ease;">
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
        <div class="row" data-animate="fade-in-up"
            style="opacity: 0; transform: translateY(30px); transition: all 0.8s ease;">
            <template v-for="(value, index) in listTour" :key="index">
                <div class="col-lg-3 mb-4">
                    <div class="position-relative">
                        <div class="card h-100 shadow-sm"
                            style="width: 20rem; height: 30rem; border-radius: 12px; border: none; overflow: hidden; transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);"
                            onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 20px 40px rgba(0, 0, 0, 0.15)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 2px rgba(0,0,0,0.07)'">
                            <div class="position-relative">
                                <img :src="value.url" class="card-img-top"
                                    style="height: 250px; width: 100%; object-fit: cover; border-radius: 12px 12px 0 0;">
                                <div class="position-absolute bottom-0 start-0">
                                    <button class="btn text-white py-1 px-2"
                                        style="background-color: rgba(0, 0, 0, 0.6); border-radius: 0 10px 0 12px; font-size: 0.9rem;">
                                        <i class="fa-solid fa-map-marker-alt me-1"></i>
                                        {{ value.dia_diem }}
                                    </button>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column justify-content-between text-start"
                                style="height: 230px;">
                                <div>
                                    <h5 class="card-title truncate-2-lines fw-bold"
                                        style="max-width: 100%; color: #333;">{{
                                            value.ten_tour }}</h5>

                                    <div class="text-secondary mt-2" style="font-size: 0.9rem;">
                                        <i class="fa-solid fa-clock me-2 text-primary"></i>
                                        <span>
                                            {{ formatDate(value.ngay_di) }} → {{ formatDate(value.ngay_ve) }}
                                        </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="d-flex align-items-baseline">
                                        <span class="text-secondary me-1" style="font-size: 13px;">Người lớn:</span>
                                        <h4 class="mb-0 fw-bold" style="color: #ff9800; font-size: 1.5rem;">
                                            {{ formatVND(value.gia_nguoi_lon) }}
                                        </h4>
                                    </div>

                                    <div class="d-flex align-items-baseline text-secondary mt-1 mb-2">
                                        <span class="me-1" style="font-size: 12px;">Trẻ em:</span>
                                        <span class="fw-semibold" style="font-size: 14px;">
                                            {{ formatVND(value.gia_tre_em) }}
                                        </span>
                                    </div>

                                    <div class="d-flex justify-content-between"
                                        style="align-items: center; border-top: 1px solid #eee; padding-top: 10px;">
                                        <router-link :to="`/chi-tiet-tour/${value.id}`">
                                            <span class="text-primary fw-bold" style="transition: color 0.3s;"
                                                onmouseover="this.style.color='#0077cc'"
                                                onmouseout="this.style.color='#0099ff'"><u>Xem chi
                                                    tiết</u></span>
                                        </router-link>
                                        <router-link :to="`/dat-tour/${value.id}`">
                                            <button class="btn text-white fw-bold"
                                                style="background-color: #ff5722; transition: background-color 0.3s;"
                                                onmouseover="this.style.backgroundColor='#e64a19'"
                                                onmouseout="this.style.backgroundColor='#ff5722'">
                                                <i class="fa-brands fa-opencart me-2"></i>Đặt tour
                                            </button>
                                        </router-link>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="position-absolute top-0 start-0">
                            <button class="btn btn-danger text-white py-1 px-3"
                                style="border-radius: 12px 0 12px 0; font-size: 0.9rem;"><b>DEAL
                                    Giá sốc!</b></button>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- TRẢI NGHIỆM SẮC XUÂN VIỆT NAM -->
        <div class="position-relative text-center mt-5" data-animate="fade-in-up"
            style="opacity: 0; transform: translateY(30px); transition: all 0.8s ease;">
            <img src="../../../assets/images/homecustomer/nui.jpg" style="width: 1290px; height: 400px;">
            <div class="position-absolute top-50 translate-middle" style="margin-left: 32rem;">
                <div class="row">
                    <div class="col-lg-7 text-start" style="margin-top: 8rem;">
                        <h5 class="me-5" style="color: #0099ff;"><b>TRẢI NGHIỆM SẮC XUÂN VIỆT NAM</b></h5>
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
        <h2 data-animate="fade-in-up"
            style="opacity: 0; transform: translateY(30px); transition: all 0.8s ease; margin-top: 5rem;"
            class="text-center fw-bold mb-5 text-primary">Cẩm nang Du lịch</h2>

        <div class="row" data-animate="fade-in-up"
            style="opacity: 0; transform: translateY(30px); transition: all 0.8s ease;">
            <template v-for="(value, index) in listBaiViet" :key="index">
                <div class="col-lg-4 mb-5">
                    <router-link :to="`/chi-tiet-bai-viet/${value.id}`" style="text-decoration: none; color: inherit;">
                        <div class="card h-100 shadow-sm" style="
                                border: none; 
                                border-radius: 12px; 
                                overflow: hidden; 
                                transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
                            "
                            onmouseover="this.style.boxShadow='0 15px 30px rgba(0, 0, 0, 0.15)'; this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.1)'; this.style.transform='translateY(0)'">

                            <img :src="value.hinh_anh" class="card-img-top" style="height: 250px; object-fit: cover;">

                            <div class="card-body">
                                <h5 class="card-title text-truncate fw-bold" style="color: #333;">
                                    {{ value.tieu_de }}
                                </h5>
                                <p class="card-text text-secondary mb-3" style="font-size: 0.95rem;">
                                    {{ value.mo_ta_ngan }}
                                </p>
                                <span class="text-primary fw-bold" style="font-size: 0.9rem;">
                                    Đọc thêm →
                                </span>
                            </div>

                        </div>
                    </router-link>
                </div>
            </template>
        </div>
    </div>


    <!-- Khách hàng đánh giá  -->
    <div class="row bg-white text-center" data-animate="fade-in-up"
        style="opacity: 0; transform: translateY(30px); transition: all 0.8s ease;">
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
                { id: 4, dia_diem: "Cần Thơ", hinh_anh: "https://cdn.nhandan.vn/images/d233c8299c7755bbf317d96e7a85fcf76f122b8bec1cf47c6fed69884ee6e90197a1a52235ea7b286c8b22ded92e7550648fb2c5e9c154b96547b2ea607cb2cf/can_tho_1-1629939987931.jpg" }
            ],
            listBaiViet: [],
            diaDiem: "",
            ngayDi: "",
            nganSach: "", // Ví dụ: 1 = <5tr, 2 = 5–10tr, 3 = >10tr
            searchText: "",
            errors: {
                diaDiem: "",
            }

        }
    },
    mounted() {
        this.loadData();
        this.getDanhGia();

        // Delay animation setup để chắc chắn DOM đã render
        setTimeout(() => {
            this.initFadeInAnimation();
        }, 500); // có thể chỉnh về 300 nếu thấy mượt
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
                            url: (tour.anh && tour.anh.length > 0) ? tour.anh[0].url : 'default.jpg'
                        }
                    });
                    this.listBaiViet = res.data.data_bv;
                })
        },
        submitSearch() {
            this.errors.diaDiem = ""; // reset lỗi

            if (!this.searchText.trim()) {
                this.errors.diaDiem = "Vui lòng nhập điểm đến!";
                return;
            }

            const query = {
                location: this.searchText.trim(),
            };

            if (this.ngayDi) query.startDate = this.ngayDi;
            if (this.nganSach === "1") query.maxPrice = 5000000;
            else if (this.nganSach === "2") query.maxPrice = 10000000;
            else if (this.nganSach === "3") query.maxPrice = 50000000;

            this.$router.push({ path: "/tour-all", query });
        },
        getDanhGia() {
            axios.get("http://127.0.0.1:8000/api/danh-gia")
                .then(res => {
                    this.danhGiaList = res.data.map(item => {
                        return {
                            diem: item.diem,
                            binh_luan: item.binh_luan,
                            avatar: item.nguoi_dung?.avatar ?? "https://i.pinimg.com/736x/57/7c/c8/577cc844392618013ce82797abd4169e.jpg"
                        }
                    });
                });
        },
        initFadeInAnimation() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target); // Chỉ trigger 1 lần
                    }
                });
            }, { threshold: 0.1 });

            const targets = document.querySelectorAll('[data-animate="fade-in-up"]');
            targets.forEach(el => observer.observe(el));
        }

    }
}
</script>
