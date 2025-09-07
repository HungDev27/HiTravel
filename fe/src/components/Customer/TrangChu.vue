<template>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    </head>

    <div>
        <!-- Carousel -->
        <Carousel />

        <!-- Thiết kế chức năng -->
        <div class="container">

            <!-- Navbar TẤT CẢ CÁC TAB -->
            <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">

                <!-- Tab khách sạn -->
                <li class="ms-5 nav-item me-3" role="presentation">
                    <button class="nav-link active d-flex justify-content-start" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                        aria-selected="true">
                        <img src="../../assets/images/homecustomer/hotel.png" alt="">
                        <h5 class="mt-2 ms-3">Khách sạn</h5>
                    </button>
                </li>

                <!-- Tab Vé máy bay -->
                <li class="nav-item me-3" role="presentation">
                    <button class="nav-link d-flex justify-content-start" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                        aria-selected="false">
                        <img src="../../assets/images/homecustomer/plane.png" alt="">
                        <h5 class="mt-2 ms-3">Vé máy bay</h5>
                    </button>
                </li>

                <!-- Tab vé xe khách -->
                <li class="nav-item me-3" role="presentation">
                    <button class="nav-link d-flex justify-content-start" id="contact-tab" data-bs-toggle="tab"
                        data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane"
                        aria-selected="false">
                        <img src="../../assets/images/homecustomer/bus.png" alt="">
                        <h5 class="mt-2 ms-3">Vé xe khách</h5>
                    </button>
                </li>

                <!-- Tab đưa đón sân bay -->
                <li class="nav-item me-3" role="presentation">
                    <button class="nav-link d-flex justify-content-start" id="driver-tab" data-bs-toggle="tab"
                        data-bs-target="#driver-tab-pane" type="button" role="tab" aria-controls="driver-tab-pane"
                        aria-selected="false">
                        <img src="../../assets/images/homecustomer/airport.png" alt="">
                        <h5 class="mt-2 ms-3">Đưa đón sân bay</h5>
                    </button>
                </li>

                <!-- Tab cho thuê xe -->
                <li class="nav-item me-3" role="presentation">
                    <button class="nav-link d-flex justify-content-start" id="rental-tab" data-bs-toggle="tab"
                        data-bs-target="#rental-tab-pane" type="button" role="tab" aria-controls="rental-tab-pane"
                        aria-selected="false">
                        <img src="../../assets/images/homecustomer/car-rental.png" alt="">
                        <h5 class="mt-2 ms-3">Cho thuê xe</h5>
                    </button>
                </li>

                <!-- Tab thêm -->
                <li class="nav-item me-5" role="presentation">
                    <button class="nav-link d-flex justify-content-start" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" type="button">
                        <img src="../../assets/images/homecustomer/map-travel.png" alt="">
                        <h5 class="mt-2 ms-3">Khác</h5>
                    </button>
                </li>

            </ul>


            <div class="tab-content" id="myTabContent">

                <!-- Nội dung trong tab KHÁCH SẠN -->
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">...</div>

                <!-- Nội dung trong tab VÉ MÁY BAY -->
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">...</div>

                <!-- Nội dung trong tab VÉ XE KHÁCH -->
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    <div>
                        <div class="d-flex align-items-center mt-4 ">
                            <img src="../../assets/images/homecustomer/bus_lane.png">
                            <h2 style="margin-bottom: 0px;" class="ms-4"><b>Tìm Chuyến Xe</b></h2>
                        </div>

                        <div style="display: flex; flex-wrap: wrap; gap: 15px;" class="mt-4">

                            <!-- Điểm đi -->
                            <div style="flex: 1 1 200px;">
                                <label for="selectFrom" class="form-label fw-bold">Chọn điểm đi<span
                                        class="text-danger"> *</span></label>
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

                            <!-- Icon chuyển đổi -->
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <button id="swapBtn" class="btn-gradient-blue btn-pill mt-4" type="button"
                                    aria-label="Đổi điểm đi/đến" :class="{ 'rot-180': rot }" @click="rot = !rot">
                                    <img src="../../assets/images/homecustomer/exchange.png" class="swap-icon">
                                </button>
                            </div>

                            <!-- Điểm đến -->
                            <div style="flex: 1 1 200px;">
                                <label for="selectTo" class="form-label fw-bold">Chọn điểm đến<span class="text-danger">
                                        *</span></label>
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

                            <!-- Ngày đi -->
                            <div style="flex: 1 1 200px;">
                                <label for="selectTo" class="form-label fw-bold">Chọn ngày đi<span class="text-danger">
                                        *</span></label>
                                <input class="form-control input__noBorder" type="date" required>
                            </div>

                            <!-- Ngày về -->
                            <div style="flex: 1 1 200px;">
                                <label>
                                    <input type="checkbox" style="margin-right: 8px; margin-bottom: 13px;"> <b>Khứ
                                        hồi</b>
                                </label><br>
                                <input class="form-control input__noBorder" type="date" required>
                            </div>

                            <div>
                                <label for="selectTo" class="form-label fw-bold">Số ghế<span class="text-danger">
                                        *</span></label>
                            <input class="form-control" type="number" required>
                            </div>

                            <!-- Nút tìm kiếm -->
                            <div style="flex: 1 1 100%; text-align: right;">
                                <button class="btn-gradient-blue btn-pill">
                                    <img src="../../assets/images/homecustomer/magnifier.png" alt="">
                                    Tìm kiếm</button>
                            </div>


                        </div>

                        <!-- Gợi ý nhanh -->
                        <div>
                            <strong>Gợi ý nhanh:</strong><br>
                            <div style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;">
                                <button class="btn-gradient-blue btn-pill btn-pill">
                                    Đà Nẵng - Đà Lạt</button>
                                <button class="btn-gradient-blue btn-pill btn-pill">
                                    Đà Nẵng - Cần Thơ</button>
                                <button class="btn-gradient-blue btn-pill btn-pill">
                                    Đà Nẵng - Hồ Chí Minh</button>
                                <button class="btn-gradient-blue btn-pill btn-pill">
                                    Đà Nẵng - Nha Trang</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nội dung trong tab CHO THUÊ XE -->
                <div class="tab-pane fade" id="driver-tab-pane" role="tabpanel" aria-labelledby="driver-tab"
                    tabindex="0">...</div>

                <!-- Nội dung trong tab THÊM -->
                <div class="tab-pane fade" id="rental-tab-pane" role="tabpanel" aria-labelledby="rental-tab"
                    tabindex="0">...</div>
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
        <h6>
            <p class="text-center text-muted mb-5">
                Chỉ với 3 bước đơn giản và dễ dàng có ngay trải nghiệm tuyệt vời!
            </p>
        </h6>

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
                        <img src="../../assets/images/homecustomer/earth.png" alt="Tìm nơi muốn đến" class="step-img" />
                        <h4 class="mt-3 fw-bold">Tìm nơi muốn đến</h4>
                        <h6>
                            <p class="text-muted small mb-0">
                                Bất cứ nơi đâu bạn muốn đến, chúng tôi có tất cả những gì bạn
                                cần
                            </p>
                        </h6>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="step">
                        <div class="badge-spot">
                            <span class="badge-number">2</span>
                            <span class="stem"></span>
                        </div>
                        <img src="../../assets/images/homecustomer/airplane-ticket2.png" alt="Đặt vé"
                            class="step-img" />
                        <h4 class="mt-3 fw-bold">Đặt vé</h4>
                        <h6>
                            <p class="text-muted small mb-0">
                                ND Travel sẽ hỗ trợ bạn đặt vé trực tiếp nhanh chóng và thuận
                                tiện
                            </p>
                        </h6>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="step">
                        <div class="badge-spot">
                            <span class="badge-number">3</span>
                            <span class="stem"></span>
                        </div>
                        <img src="../../assets/images/homecustomer/gift.png" alt="Thanh toán" class="step-img" />
                        <h4 class="mt-3 fw-bold">Thanh toán</h4>
                        <h6>
                            <p class="text-muted small mb-0">
                                Hoàn thành bước thanh toán và sẵn sàng cho chuyến đi ngay thôi
                            </p>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sản phẩm khác</h1>
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
import Carousel from "../Customer/Carousel.vue";
export default {
    components: { Carousel },
    data() {
        return {
            rot: false,
        };
    },
};
</script>

<style scoped>
.swap-icon {
    width: 24px;
    height: 24px;
    transform-origin: center;
    transition: transform .28s ease;
}

/* ảnh xoay 180° */
.rot-180 .swap-icon {
    transform: rotate(180deg);
}

.input__noBorder {
    border-radius: 12px;
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
    box-shadow: 0 2px 6px rgba(13, 110, 253, 0.15);
    transform: translateY(calc(-1 * var(--icon-lift)));
}

.stem {
    position: absolute;
    top: 42px;
    width: 2px;
    height: 26px;
    background: #0d6efd;
    opacity: 0.35;
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

.btn-gradient-blue {
    --from: #4a6ad3;
    --via: #8caae9;
    --to: #c1f5fe;

    color: #fff;
    background-image: linear-gradient(135deg, var(--from) 0%, var(--via) 48%, var(--to) 100%);
    background-size: 200% 200%;
    border: 0;
    border-radius: 12px;
    padding: 10px 22px;
    font-weight: 700;

    box-shadow: 0 10px 22px rgba(37, 99, 235, .28);
    transition: background-position .35s ease, transform .15s ease, box-shadow .15s ease;
}

.btn-gradient-blue:hover {
    background-position: 100% 0;
    transform: translateY(-1px);
    box-shadow: 0 14px 28px rgb(255, 255, 255);
}

.btn-pill {
    border-radius: 50px;
}
</style>
