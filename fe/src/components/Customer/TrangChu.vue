<template>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    </head>

    <div>
        <!-- Carousel -->
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://bizweb.dktcdn.net/100/295/221/themes/894730/assets/slider_2.jpg?1753157779024"
                        class="d-block w-100" style="height: 400px;" alt="slider" />
                </div>
                <div class="carousel-item">
                    <img src="https://bizweb.dktcdn.net/100/295/221/themes/894730/assets/slider_2.jpg?1753157779024"
                        class="d-block w-100" alt="slider" />
                </div>
                <div class="carousel-item">
                    <img src="https://bizweb.dktcdn.net/100/295/221/themes/894730/assets/slider_2.jpg?1753157779024"
                        class="d-block w-100" alt="slider" />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">
            <div class="marquee-box mt-3">
                <span class="marquee-text">
                    <h6 class="m-0"><i><span class="text-warning">2025</span> Ghi dấu từng khoảnh khắc</i></h6>
                </span>
            </div>

            <!-- Card “Điểm đến xem gần đây” -->
            <div class="card mt-2 border border-primary mb-3 rounded-5">
                <div class="card-body">
                    <div class="d-flex flex-row mb-3 align-items-center">
                        <div class="p-2"><img src="../../assets/images/homecustomer/search-history.png" alt="recent" />
                        </div>
                        <div class="p-2">
                            <h3 class="text-primary mb-0"><b>Điểm đến xem gần đây</b></h3>
                        </div>
                    </div>

                    <div class="row ms-2 me-2 gy-3 mb-3">
                        <div class="col-lg-4">
                            <label for="selectFrom" class="form-label fw-bold">Chọn điểm đi<span
                                    class="text-danger">*</span></label>
                            <select class="form-select input__noBorder" id="selectFrom" required>
                                <option value="">-- Chọn điểm đi --</option>
                                <option value="1">Hà Nội</option>
                                <option value="2">Hồ Chí Minh</option>
                                <option value="3">Đà Nẵng</option>
                                <option value="4">Nha Trang</option>
                                <option value="5">Huế</option>
                                <option value="6">Quy Nhơn</option>
                                <option value="7">Phú Quốc</option>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="selectTo" class="form-label fw-bold">Chọn điểm đến<span
                                    class="text-danger">*</span></label>
                            <select class="form-select input__noBorder" id="selectTo" required>
                                <option value="">-- Chọn điểm đến --</option>
                                <option value="1">Hà Nội</option>
                                <option value="2">Hồ Chí Minh</option>
                                <option value="3">Đà Nẵng</option>
                                <option value="4">Nha Trang</option>
                                <option value="5">Huế</option>
                                <option value="6">Quy Nhơn</option>
                                <option value="7">Phú Quốc</option>
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <div class="d-flex align-items-end h-100">
                                <div class="dropdown w-100">
                                    <button class="btn btn-info dropdown-toggle w-100" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Ngân sách
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark w-100">
                                        <li><a class="dropdown-item" href="#">Từ 5-10 triệu</a></li>
                                        <li><a class="dropdown-item" href="#">Từ 10-20 triệu</a></li>
                                        <li><a class="dropdown-item" href="#">Trên 20 triệu</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="d-flex align-items-end h-100">
                                <button class="btn btn-primary w-100">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border border-primary border-1 mt-5 mb-4 opacity-75" />

        <div class="container">
            <h2 class="text-center">Vì sao bạn nên chọn HITravel</h2>
            <div class="row gy-4 mt-2 mb-4">
                <div class="col-lg-4 col-md-4">
                    <div class="d-flex flex-row">
                        <div class="p-2 mt-2">
                            <img src="../../assets/images/homecustomer/money-bag.png" class="rounded-1 bg-info"
                                alt="price" />
                        </div>
                        <div class="p-2 ms-2">
                            <h4 class="mb-1">Giá tốt nhất cho bạn</h4>
                            <p class="mb-0">Có nhiều mức giá đa dạng phù hợp</p>
                            với ngân sách và nhu cầu của bạn
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="d-flex flex-row">
                        <div class="p-2 mt-2">
                            <img src="../../assets/images/homecustomer/airplane-ticket.png" class="rounded-1 bg-info"
                                alt="booking" />
                        </div>
                        <div class="p-2 ms-2">
                            <h4 class="mb-1">Booking dễ dàng</h4>
                            <p class="mb-0">Các bước booking và chăm sóc khách hàng</p>
                            nhanh chóng và thuận tiện
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="d-flex flex-row">
                        <div class="p-2 mt-2">
                            <img src="../../assets/images/homecustomer/world-tour.png" class="rounded-1 bg-info"
                                alt="tour" />
                        </div>
                        <div class="p-2 ms-2">
                            <h4 class="mb-1">Tour du lịch tối ưu</h4>
                            <p class="mb-0">Đa dạng các loại hình tour du lịch</p>
                            với nhiều mức giá khác nhau
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border border-primary border-1 mb-5 opacity-75" />
    </div>

    <!-- Booking cùng ND Travel -->
    <div class="my-5 position-relative booking-steps">
        <h2 class="fw-bold text-center mb-2">Booking cùng HITravel</h2>
        <h6><p class="text-center text-muted mb-5">
            Chỉ với 3 bước đơn giản và dễ dàng có ngay trải nghiệm tuyệt vời!
        </p></h6>

        <!-- Đường cong nét đứt: NẰM DƯỚI -->
        <svg class="steps-curve d-none d-md-block" viewBox="0 0 1200 160" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,100 C300,160 900,40 1200,100" fill="none" stroke="#9ec5fe" stroke-width="6"
                stroke-dasharray="12 12" stroke-linecap="round" />
        </svg>

        <div class="container">
            <div class="row text-center g-4 align-items-start">
            <div class="col-md-4">
                <div class="step">
                    <div class="badge-spot">
                        <span class="badge-number">1</span>
                        <span class="stem"></span>
                    </div>
                    <img src="../../assets/images/homecustomer/earth.png" alt="Tìm nơi muốn đến" class="step-img">
                    <h4 class="mt-3 fw-bold">Tìm nơi muốn đến</h4>
                    <h6><p class="text-muted small mb-0">Bất cứ nơi đâu bạn muốn đến, chúng tôi có tất cả những gì bạn cần
                    </p></h6>
                </div>
            </div>

            <div class="col-md-4">
                <div class="step">
                    <div class="badge-spot">
                        <span class="badge-number">2</span>
                        <span class="stem"></span>
                    </div>
                    <img src="../../assets/images/homecustomer/airplane-ticket2.png" alt="Đặt vé" class="step-img">
                    <h4 class="mt-3 fw-bold">Đặt vé</h4>
                    <h6><p class="text-muted small mb-0">ND Travel sẽ hỗ trợ bạn đặt vé trực tiếp nhanh chóng và thuận tiện
                    </p></h6>
                </div>
            </div>

            <div class="col-md-4">
                <div class="step">
                    <div class="badge-spot">
                        <span class="badge-number">3</span>
                        <span class="stem"></span>
                    </div>
                    <img src="../../assets/images/homecustomer/gift.png" alt="Thanh toán" class="step-img">
                    <h4 class="mt-3 fw-bold">Thanh toán</h4>
                    <h6><p class="text-muted small mb-0">Hoàn thành bước thanh toán và sẵn sàng cho chuyến đi ngay thôi</p></h6>
                </div>
            </div>
        </div>
        </div>
    </div>

</template>

<script>
export default {

};
</script>

<style scoped>
.input__noBorder {
    border-radius: 12px;
}

.marquee-box {
    overflow: hidden;
    white-space: nowrap;
}

.marquee-text {
    display: inline-block;
    padding-left: 100%;
    animation: marquee 20s linear infinite;
}

.marquee-box:hover .marquee-text {
    animation-play-state: paused;
}

.step-img {
    max-height: 80px;
    width: auto;
}

:root {
    --curve-top: 84px;
    --icon-max-h: 84px;
    --icon-lift: 26px;
}

.steps-curve {
    position: absolute;
    top: var(--curve-top);
    left: 0;
    width: 100%;
    height: 160px;
    pointer-events: none;
    z-index: 0;
}

.step {
    position: relative;
    z-index: 2;
}

.step-img {
    max-height: var(--icon-max-h);
    width: auto;
    display: block;
    margin: 0 auto;
    object-fit: contain;
    transform: translateY(calc(-1 * var(--icon-lift)));
}

.badge-spot {
    height: 55px;
    margin-bottom: 6px;
    position: relative;
    z-index: 3;
}

.badge-number {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: #eaf3ff;
    color: #0d6efd;
    font-weight: 700;
    font-size: 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(13, 110, 253, .15);
    transform: translateY(calc(-1 * var(--icon-lift)));
}

.stem {
    position: absolute;
    top: 42px;
    width: 2px;
    height: 26px;
    background: #0d6efd;
    opacity: .35;
    border-radius: 2px;
    transform: translateY(calc(-1 * var(--icon-lift)));
}

@media (max-width: 767.98px) {
    .steps-curve {
        display: none;
    }

    :root {
        --icon-lift: 0px;
        --icon-max-h: 72px;
    }
}

@keyframes marquee {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-100%);
    }
}
</style>
