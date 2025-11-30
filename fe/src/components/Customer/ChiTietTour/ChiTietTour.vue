<template>
    <div class="container mt-2">

        <!-- Tiêu đề -->
        <div class="row" style="margin-inline-end: 200px;">
            <span style="color: #0066CC; font-size: 33px;"><b>Tour Nhật Bản 5N5Đ: HCM - Osaka - Kyoto - Tokyo - Thung
                    Lũng Korankei Mùa Thu</b></span>
        </div>
        <div class="mt-2" title="Click để xem đánh giá">
            <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading6"><span
                    style="font-size: 13px;" class="badge text-bg-success">10.0</span>
                <span class="ms-2 text-success"><b>Xem</b>
                    <span class="ms-2 text-black">2 đánh giá <i class="fa-solid fa-caret-down"></i></span>
                </span></a>
        </div>

        <div class="row mt-2">
            <div class="col-lg-8">

                <!-- Hình ảnh -->
                <div class="position-relative">
                    <div id="carouselExampleIndicators" class="carousel slide" style="height: 450px; width: 850px;">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner" style="height: 450px; width: 850px;">
                            <div class="carousel-item active">
                                <img src="https://i.pinimg.com/736x/af/4c/0e/af4c0ed2bc3c3a96db69bde76fc22513.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://i.pinimg.com/1200x/fd/94/a3/fd94a3ac5b23ff04af2dbd57b55701af.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://i.pinimg.com/736x/93/7a/d0/937ad0232cb7f9e3b68e9b23ada32c7a.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="position-absolute top-0 start-0 translate-middle"
                        style="background:#d32f2f; color:white; font-weight:bold; padding:6px 15px; font-size:14px; border-radius:2px; margin-left: 140px; margin-top: 50px;">
                        Giảm 4 Triệu Nhóm 4 | 34.899k/khách
                        <!-- Tam giác bên trái -->
                        <div style="position:absolute; left:0; bottom:-8px;
                width:0; height:0;
                border-left:10px solid transparent;
                border-top:8px solid #a62828;"></div>
                    </div>
                </div>

                <!-- Thanh tab -->
                <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3"
                    style="position:fixed;top:0;left:0px;width:100%;z-index:1000; background-color: antiquewhite;">
                    <ul class="nav nav-pills justify-content-center" style="padding-left: 90px;">
                        <li class="nav-item">
                            <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading2">Tổng
                                quan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading4">Chương
                                trình
                                tour</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading5">Thông tin
                                cần lưu
                                ý</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading6">Đánh giá
                                của khách
                                hàng</a>
                        </li>
                    </ul>
                </nav>

                <!-- Nội dung của thanh tab -->
                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                    data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">

                    <!-- Lịch khởi hành -->
                    <div v-if="showSchedule">
                        <h4 id="scrollspyHeading1">Lịch khởi hành & giá tour</h4>
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end text-danger">
                                        <b style="font-size: 20px;">{{ selectedDate }}</b>
                                    </div>
                                    <!-- Phương tiện di chuyển -->
                                    <div class="d-flex justify-content-center">
                                        <b style="font-size: 20px; color: #0066CC;">Phương tiện di chuyển</b>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="d-flex">
                                            <div class="pe-3">
                                                <div class="d-flex justify-content-between">
                                                    <span>Ngày đi - 10/10/2025</span>
                                                    <div style="margin-left: 130px;" class="text-primary">
                                                        <i class="fa-solid fa-plane-departure"></i>
                                                        Máy bay
                                                    </div>
                                                </div>
                                                <div
                                                    style="display: flex; flex-direction: column; align-items: center;">
                                                    <!-- Mốc thời gian -->
                                                    <div
                                                        style="display: flex; justify-content: space-between; width: 100%; font-weight: bold;">
                                                        <span>11:35</span>
                                                        <span>20:40</span>
                                                    </div>

                                                    <!-- Thanh ngang -->
                                                    <div
                                                        style="position: relative; width: 90%; height: 10px; margin-top: 5px;">
                                                        <div
                                                            style="height: 2px; background: #bbb; position: absolute; top: 4px; left: 0; right: 0;">
                                                        </div>
                                                        <div
                                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; left: 0; top: 0; border-radius: 2px;">
                                                        </div>
                                                        <div
                                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; right: 0; top: 0; border-radius: 2px;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="ps-3 border-start">
                                                <div class="d-flex justify-content-between">
                                                    <span>Ngày về - 10/10/2025</span>
                                                    <div style="margin-left: 120px;" class="text-primary">
                                                        <i class="fa-solid fa-plane-departure"></i>
                                                        Máy bay
                                                    </div>
                                                </div>
                                                <div
                                                    style="display: flex; flex-direction: column; align-items: center;">
                                                    <!-- Mốc thời gian -->
                                                    <div
                                                        style="display: flex; justify-content: space-between; width: 100%; font-weight: bold;">
                                                        <span>11:35</span>
                                                        <span>20:40</span>
                                                    </div>

                                                    <!-- Thanh ngang -->
                                                    <div
                                                        style="position: relative; width: 90%; height: 10px; margin-top: 5px;">
                                                        <div
                                                            style="height: 2px; background: #bbb; position: absolute; top: 4px; left: 0; right: 0;">
                                                        </div>
                                                        <div
                                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; left: 0; top: 0; border-radius: 2px;">
                                                        </div>
                                                        <div
                                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; right: 0; top: 0; border-radius: 2px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <b style="font-size: 20px; color: #0066CC;">Giá</b>
                                    </div>
                                    <div class="row mt-2">
                                        <!-- Cột người lớn -->
                                        <div class="col-6">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <b>Người lớn:</b>
                                                    <div style="color: #aaa; font-size: 15px;">(Từ 12 tuổi trở lên)
                                                    </div>
                                                </div>
                                                <div style="color: red; font-size: 22px; font-weight: bold;">99.000.000đ
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Cột trẻ em -->
                                        <div class="col-6 border-start">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <b>Trẻ em:</b>
                                                    <div style="color: #aaa; font-size: 15px;">(Dưới 12 tuổi trở xuống)
                                                    </div>
                                                </div>
                                                <div style="color: red; font-size: 22px; font-weight: bold;">99.000.000đ
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tổng quan -->
                    <div class="card">
                        <div class="card-body">
                            <h3 id="scrollspyHeading2"><b>Tổng quan</b></h3>
                            <div>
                                - Tận hưởng suối nước nóng Onsen truyền thống.
                                <br>
                                - Hái và thưởng thức trái cây tươi tại vườn theo mùa.
                                <br>
                                - Thưởng thức bữa bò Kobe cao cấp trứ danh Nhật Bản.
                                <br>
                                - Tham quan Chùa Vàng Kinkakuji và chùa cổ Asakusa linh thiêng.
                                <br>
                                - Ngắm lá đỏ rực rỡ tại thung lũng Korankei và đường hầm lá phong Momiji Kairo.
                            </div>
                        </div>
                    </div>

                    <!-- Lịch trình -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h3 id="scrollspyHeading4"><b>Chương trình tour</b></h3>
                                <b class="text-primary" style="cursor: pointer;" @click="toggleAll">
                                    {{ allExpanded ? 'Thu gọn' : 'Xem tất cả' }}
                                </b>
                            </div>

                            <!-- Nội dung lịch -->
                            <div class="accordion mt-3" id="accordionExample">
                                <div v-for="(ngay, index) in chuongTrinhTour" :key="index"
                                    class="accordion-item shadow-sm rounded mb-3">
                                    <h2 class="accordion-header" :id="'heading' + index">
                                        <button class="accordion-button collapsed d-flex align-items-center"
                                            type="button" @click="toggleItem(index)"
                                            :aria-expanded="ngay.expanded.toString()"
                                            :data-bs-target="'#collapse' + index" :style="{
                                                backgroundColor: ngay.expanded ? '#f1f1f1' : '#f8f9fa',
                                                color: ngay.expanded ? '#0d6efd' : 'black',
                                                borderRadius: '10px',
                                                transition: 'all 0.3s ease'
                                            }">
                                            <img :src="ngay.image" alt="Ảnh tour"
                                                style="width: 200px; height: 110px; object-fit: cover; border-radius: 5px; margin-right: 15px;" />
                                            <div>
                                                <div style="font-size: 16px; color: gray;">{{ ngay.title }}</div>
                                                <div style="font-size: 18px; font-weight: bold;">{{ ngay.subtitle }}
                                                </div>
                                            </div>
                                        </button>
                                    </h2>

                                    <div :id="'collapse' + index" class="accordion-collapse collapse"
                                        :class="{ show: ngay.expanded }" :aria-labelledby="'heading' + index"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body" style="font-size: 16px;">
                                            <p v-html="ngay.content"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Thông tin cần lưu ý -->
                    <div class="card">
                        <div class="card-body">
                            <h3 id="scrollspyHeading5"><b>Thông tin cần lưu ý</b></h3>

                            <!-- Nội dung -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="gia-tab" data-bs-toggle="tab"
                                        data-bs-target="#gia-tab-pane" type="button" role="tab"
                                        aria-controls="gia-tab-pane" aria-selected="true">Giá bao gồm</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="gia-ko-tab" data-bs-toggle="tab"
                                        data-bs-target="#gia-ko-tab-pane" type="button" role="tab"
                                        aria-controls="gia-ko-tab-pane" aria-selected="false">Giá không bao gồm</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="phu-thu-tab" data-bs-toggle="tab"
                                        data-bs-target="#phu-thu-tab-pane" type="button" role="tab"
                                        aria-controls="phu-thu-tab-pane" aria-selected="false">Phụ thu</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="huy-tab" data-bs-toggle="tab"
                                        data-bs-target="#huy-tab-pane" type="button" role="tab"
                                        aria-controls="huy-tab-pane" aria-selected="false">Huỷ đổi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="luu-y-tab" data-bs-toggle="tab"
                                        data-bs-target="#luu-y-tab-pane" type="button" role="tab"
                                        aria-controls="luu-y-tab-pane" aria-selected="false">Lưu ý</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="hdv-tab" data-bs-toggle="tab"
                                        data-bs-target="#hdv-tab-pane" type="button" role="tab"
                                        aria-controls="hdv-tab-pane" aria-selected="false">Hướng dẫn viên</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent" style="margin-top: 10px; margin-left: 10px;">
                                <div class="tab-pane fade show active" id="gia-tab-pane" role="tabpanel"
                                    aria-labelledby="gia-tab" tabindex="0">
                                    <b>Vận chuyển:</b><br>
                                    - Di chuyển bằng <b>xe du lịch đời mới, máy lạnh</b> suốt hành trình.<br>
                                    - Tài xế thân thiện, chuyên nghiệp, phục vụ theo đúng lịch trình.<br><br>

                                    <b>Lưu trú:</b><br>
                                    - Nghỉ tại <b>khách sạn tiêu chuẩn 3–4 sao</b> (hoặc tương đương).<br>
                                    - Phòng 2 khách/phòng; phòng 3 sẽ được bố trí khi cần thiết.<br><br>

                                    <b>Ăn uống:</b><br>
                                    - Bao gồm <b>các bữa ăn theo chương trình</b> (thực đơn thay đổi linh hoạt mỗi
                                    ngày).<br>
                                    - <b>Nước suối</b> 01 chai/người/ngày.<br><br>

                                    <b>Hướng dẫn viên:</b><br>
                                    - <b>HDV chuyên nghiệp, nhiệt tình</b>, đồng hành và hỗ trợ đoàn suốt tuyến.<br><br>

                                    <b>Bảo hiểm & vé tham quan:</b><br>
                                    - <b>Bảo hiểm du lịch trong nước</b>, mức bồi thường tối đa <b>100.000.000
                                        VNĐ/trường hợp</b>.<br>
                                    - <b>Vé tham quan</b> các điểm có trong chương trình.
                                </div>
                                <div class="tab-pane fade" id="gia-ko-tab-pane" role="tabpanel"
                                    aria-labelledby="gia-ko-tab" tabindex="0">
                                    - Chi phí cá nhân ngoài chương trình (giặt ủi, điện thoại, minibar, mua sắm, ăn uống
                                    riêng...).<br>
                                    - Chi phí tham quan, vui chơi ngoài chương trình.<br>
                                    - Thuế VAT (nếu có yêu cầu xuất hóa đơn).<br>
                                    - Phụ thu phòng đơn (nếu khách đi lẻ hoặc yêu cầu ở riêng).<br>
                                    - Tiền tip cho hướng dẫn viên và tài xế (tự nguyện, không bắt buộc).

                                </div>
                                <div class="tab-pane fade" id="phu-thu-tab-pane" role="tabpanel"
                                    aria-labelledby="phu-thu-tab" tabindex="0">
                                    - <b>Phụ thu phòng đơn:</b> 1.000.000đ/khách/đêm (áp dụng khi khách ở 1 mình).<br>
                                    - <b>Phụ thu lễ, Tết:</b> tuỳ từng thời điểm khởi hành, sẽ thông báo khi đăng ký
                                    tour.<br>
                                    - <b>Trẻ em:</b> giá vé tính theo độ tuổi và quy định cụ thể của từng chương trình.
                                </div>
                                <div class="tab-pane fade" id="huy-tab-pane" role="tabpanel" aria-labelledby="huy-tab"
                                    tabindex="0">
                                    - <b>Huỷ tour trước 10 ngày khởi hành:</b> hoàn 80% giá tour.<br>
                                    - <b>Huỷ tour trước 5–9 ngày:</b> hoàn 50% giá tour.<br>
                                    - <b>Huỷ tour dưới 5 ngày:</b> không hoàn tiền.<br><br>
                                    - Trường hợp huỷ tour do thiên tai, dịch bệnh hoặc lý do bất khả kháng, công ty sẽ
                                    hỗ trợ tối đa tuỳ tình huống thực tế.

                                </div>
                                <div class="tab-pane fade" id="luu-y-tab-pane" role="tabpanel"
                                    aria-labelledby="luu-y-tab" tabindex="0">
                                    - Quý khách mang theo <b>CMND/CCCD bản gốc</b> khi đi tour.<br>
                                    - Trẻ em cần mang theo <b>giấy khai sinh hoặc hộ chiếu</b> (bản chính).<br>
                                    - Lịch trình có thể thay đổi thứ tự điểm tham quan nhưng vẫn đảm bảo đầy đủ nội dung
                                    chương trình.<br>
                                    - Quý khách nên mang theo <b>kem chống nắng, nón, áo khoác mỏng</b> khi đi tour.<br>
                                    - Đoàn khởi hành khi đủ số lượng khách theo quy định.

                                </div>
                                <div class="tab-pane fade" id="hdv-tab-pane" role="tabpanel" aria-labelledby="hdv-tab"
                                    tabindex="0">
                                    - Hướng dẫn viên là người <b>am hiểu địa phương, chuyên nghiệp và thân
                                        thiện</b>.<br>
                                    - Luôn <b>đồng hành cùng đoàn</b> trong suốt hành trình, hỗ trợ khách sạn, ăn uống,
                                    điểm tham quan.<br>
                                    - Cung cấp thông tin thú vị, giúp du khách hiểu rõ hơn về <b>văn hoá và ẩm thực vùng
                                        miền</b>.<br>
                                    - Là cầu nối giữa du khách và nhà tổ chức để mang lại chuyến đi trọn vẹn nhất.

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Đánh giá -->
                    <div class="card">
                        <div class="card-body">
                            <div id="scrollspyHeading6" style="font-size: 17px; color: #0066CC;"><b>Đánh giá khách hàng
                                    về Tour Nhật Bản 5N5Đ: HCM - Osaka - Kyoto - Tokyo - Thung Lũng Korankei Mùa Thu</b>
                            </div>

                            <!-- Nội dung -->
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="bg-white rounded shadow-sm p-4 h-100">
                                        <h5 class="fs-5 fw-bold mb-4 border-bottom pb-2">Đánh Giá Tour</h5>
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="text-center">
                                                        <h3 class="fw-bold text-success mb-0">4.2</h3>
                                                        <p class="text-muted small mb-0">/5 (NHTravel)</p>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="progress" style="height: 8px;">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 84%;" aria-valuenow="84" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <p class="text-muted small mt-1">Dựa trên 567 đánh giá</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="row g-3 ">
                                                <div class="col-auto">
                                                    <select class="form-select" aria-label="Rating select">
                                                        <option selected>Chọn điểm số</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-auto">
                                                    <textarea class="form-control" rows="2"
                                                        placeholder="Viết đánh giá của bạn..."></textarea>
                                                </div>
                                            </div>
                                            <div class="mt-3 text-end">
                                                <button type="submit" class="btn btn-success px-4 py-2 fw-semibold">Gửi
                                                    đánh
                                                    giá</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="bg-white rounded shadow-sm p-4 h-100">
                                        <h5 class="fs-5 fw-bold mb-4 border-bottom pb-2">Bình Luận</h5>
                                        <div class="mb-4">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <img src="https://i.pinimg.com/736x/4b/64/88/4b64889d358844f4dc024d2ecd1ed609.jpg"
                                                        alt="User Avatar" class="rounded-circle" width="45" height="45">
                                                </div>
                                                <div class="col">
                                                    <textarea id="noidung" v-model="noi_dung_binh_luan"
                                                        class="form-control" rows="1"
                                                        placeholder="Viết bình luận của bạn..." required></textarea>
                                                </div>
                                                <div class="col-auto">
                                                    <button
                                                        class="btn btn-danger px-4 py-2 btn-sm fw-semibold">Gửi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top pt-4">
                                            <div
                                                class="mb-3 mt-2 bg-secondary bg-opacity-10 border border-secondary rounded-3 p-3">
                                                <div class="d-flex align-items-start gap-3">
                                                    <img src="https://i.pinimg.com/736x/4b/64/88/4b64889d358844f4dc024d2ecd1ed609.jpg"
                                                        alt="User Avatar" class="rounded-circle" width="45" height="45">
                                                    <div class="flex-grow-1">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <h6 class="fw-bold mb-0">Ngô Nhi</h6>
                                                            <small class="text-muted">10/10</small>
                                                        </div>
                                                        <p class="mb-0 text-secondary">
                                                            Hay quá
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bảng bên phải chọn ngày khởi hành -->
            <div class="col-lg-4">
                <div style="position: sticky; top: 100px;">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa-solid fa-ticket me-2"></i>Mã tour: <b>NH123</b>
                            <br>
                            <div class="mt-2"><i class="fa-solid fa-calendar-days me-2"></i>Ngày khởi hành:</div>
                            <br>
                            <a href="#scrollspyHeading1">
                                <!-- Các nút chọn ngày -->
                                <button v-for="(ngay, index) in ngay_di" :key="index" class="btn"
                                    :class="selectedDate === ngay ? 'btn-primary' : 'btn-outline-primary'"
                                    style="margin-right: 8px;" @click="chonNgay(ngay)">
                                    {{ ngay }}
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="card" v-if="showSchedule">
                        <div class="card-body">
                            <h5 class="card-title"><b>Giá từ:</b></h5>
                            <h2 class="text-danger"><b>9500000đ</b><span class="text-black" style="font-size: 22px;"> /
                                    Khách</span></h2>
                            <i class="fa-solid fa-ticket me-2"></i>Mã tour: <b class="text-primary">NH123</b>
                            <br>
                            <i class="fa-solid fa-map-pin ms-1"
                                style="margin-right: 13px; margin-top: 10px; margin-block-end: 10px;"></i>Khởi hành: <b
                                class="text-primary">Hà Nội</b>
                            <br>
                            <i class="fa-solid fa-calendar-days"
                                style="margin-right: 13px; margin-block-end: 10px;"></i>Ngày khởi
                            hành: <b class="text-primary">{{ selectedDate }}</b>
                            <br>
                            <img src="../../../assets/images/homecustomer/car-seat.png" style="margin-right: 5px;">Số chỗ
                            còn: <b class="text-primary">10</b>
                            <button class="btn mt-3 w-100 text-white" style="background-color: crimson;"><b>Đặt
                                    ngay</b></button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end" v-if="showSchedule">
                        <button class="btn btn-outline-primary mb-3"><i class="fa-solid fa-envelope-open me-2"></i>Liên hệ tư
                            vấn</button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>
<script>
import axios from 'axios';
export default {
    props: ["id_tour"],
    data() {
        return {
            chi_tiet_tour: {},
            showSchedule: false, // ẩn mặc định
            selectedDate: '',
            allExpanded: false,
            ngay_di: ['25/9', '29/9', '01/10', '10/10'],
            chuongTrinhTour: [
                {
                    title: 'Đêm 1',
                    subtitle: 'HCM - Kansai (Nghỉ Đêm Trên Máy Bay)',
                    image: 'https://i.pinimg.com/736x/fd/94/a3/fd94a3ac5b23ff04af2dbd57b55701af.jpg',
                    content: 'Quý khách tập trung tại sân bay <b>Tân Sơn Nhất</b>, làm thủ tục chuyến bay <b>VN320 00:10 - 07:00</b> đi Nhật Bản. Quý khách nghỉ đêm trên máy bay.',
                    expanded: false
                },
                {
                    title: 'Ngày 1',
                    subtitle: 'Kansai - Kyoto - Osaka',
                    image: 'https://i.pinimg.com/736x/93/7a/d0/937ad0232cb7f9e3b68e9b23ada32c7a.jpg',
                    content: 'Đến sân bay Kansai, hướng dẫn viên đón đoàn. Tham quan <b>Chùa Vàng Kinkakuji</b>, phố cổ Gion. Buổi chiều di chuyển đến Osaka, tự do tham quan Dotonbori.',
                    expanded: false
                }
            ],
        };
    },
    mounted() {
        window.scrollTo({ top: 0, behavior: "smooth" });
    },
    methods: {
        chonNgay(ngay) {
            // nếu bấm cùng ngày thì ẩn hiện toggle
            if (this.selectedDate === ngay) {
                this.showSchedule = !this.showSchedule;
            } else {
                this.selectedDate = ngay;
                this.showSchedule = true;
            }
        },
        toggleItem(index) {
            this.chuongTrinhTour[index].expanded = !this.chuongTrinhTour[index].expanded;
        },
        toggleAll() {
            this.allExpanded = !this.allExpanded;
            this.chuongTrinhTour.forEach(item => {
                item.expanded = this.allExpanded;
            });
        }
    }
};
</script>


<style></style>