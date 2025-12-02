<template>
    <div class="container mt-2">

        <!-- Tiêu đề -->
        <div class="row" style="margin-inline-end: 200px;">
            <span style="color: #0066CC; font-size: 33px;"><b>{{ chi_tiet_tour.ten_tour || 'Đang tải tour...'
            }}</b></span>
        </div>
        <div class="mt-2" title="Click để xem đánh giá">
            <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading6"><span
                    style="font-size: 13px;" class="badge text-bg-success">{{ diemTrungBinh }}</span>
                <span class="ms-2 text-success"><b>Xem</b>
                    <span class="ms-2 text-black">{{ soLuongDanhGia }} đánh giá <i
                            class="fa-solid fa-caret-down"></i></span>
                </span></a>
        </div>

        <div class="row mt-2">
            <div class="col-lg-8">

                <!-- Hình ảnh -->
                <div class="position-relative">
                    <div v-if="anh_carousel.length" id="carouselExampleIndicators" class="carousel slide"
                        data-bs-ride="carousel" style="width: 100%; max-width: 850px;">
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button v-for="(img, index) in anh_carousel" :key="'btn-' + index" type="button"
                                data-bs-target="#carouselExampleIndicators" :data-bs-slide-to="index"
                                :class="{ active: index === 0 }" :aria-label="'Slide ' + (index + 1)">
                            </button>
                        </div>

                        <!-- Carousel Items -->
                        <div class="carousel-inner" style="height: 450px;">
                            <div v-for="(img, index) in anh_carousel" :key="'img-' + index"
                                :class="['carousel-item', { active: index === 0 }]">
                                <img :src="img.url" class="d-block w-100" style="height: 450px; object-fit: cover;"
                                    :alt="img.mo_ta || 'Ảnh tour'">
                            </div>
                        </div>

                        <!-- Controls -->
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
                                                    <span><b>Ngày đi:</b> {{ formatDate(chi_tiet_tour.ngay_di) }}</span>
                                                    <div style="margin-left: 70px;" class="text-primary">
                                                        <i class="fa-solid fa-car-rear"></i>
                                                        {{ chi_tiet_tour.phuong_tiens.map(p => p.ten_phuong_tien).join(', ') }}
                                                    </div>
                                                </div>
                                                <div
                                                    style="display: flex; flex-direction: column; align-items: center;">
                                                    <!-- Mốc thời gian -->
                                                    <div
                                                        style="display: flex; justify-content: space-between; width: 100%;">
                                                        <span>{{ formatTime(chi_tiet_tour.gio_di) }}</span>
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
                                                    <span><b>Ngày về:</b> {{ formatDate(chi_tiet_tour.ngay_ve) }}</span>
                                                    <div style="margin-left: 70px;" class="text-primary">
                                                        <i class="fa-solid fa-car-rear"></i>
                                                        {{ chi_tiet_tour.phuong_tiens.map(p => p.ten_phuong_tien).join(', ') }}
                                                    </div>
                                                </div>
                                                <div
                                                    style="display: flex; flex-direction: column; align-items: center;">
                                                    <!-- Mốc thời gian -->
                                                    <div
                                                        style="display: flex; justify-content: space-between; width: 100%;">
                                                        <span>{{ formatTime(chi_tiet_tour.gio_ve) }}</span>
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
                                                <div style="color: red; font-size: 22px; font-weight: bold;">{{
                                                    formatVND(chi_tiet_tour.gia_nguoi_lon) }}
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
                                                <div style="color: red; font-size: 22px; font-weight: bold;">{{
                                                    formatVND(chi_tiet_tour.gia_tre_em) }}
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
                                {{ chi_tiet_tour.mo_ta }}
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
                                <div v-for="(ngay, index) in lich_trinh" :key="ngay.id"
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

                                            <div>
                                                <div style="font-size: 18px; font-weight: bold;">
                                                    {{ ngay.thu_tu }}. {{ ngay.tieu_de }}
                                                </div>
                                            </div>
                                        </button>
                                    </h2>

                                    <div :id="'collapse' + index" class="accordion-collapse collapse"
                                        :class="{ show: ngay.expanded }" :aria-labelledby="'heading' + index"
                                        data-bs-parent="#accordionExample">

                                        <div class="accordion-body" style="font-size: 16px;">
                                            <p v-html="ngay.noi_dung"></p>
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

                    <!-- ĐÁNH GIÁ & BÌNH LUẬN -->
                    <div class="card mt-4 shadow-sm">
                        <div class="card-body">

                            <!-- TIÊU ĐỀ -->
                            <h4 id="scrollspyHeading6" class="fw-bold mb-4" style="color:#0066CC;">
                                Đánh giá từ khách hàng về Tour {{ chi_tiet_tour.ten_tour }}
                            </h4>

                            <div class="row g-4">

                                <!-- KHỐI ĐÁNH GIÁ TỔNG -->
                                <div class="col-lg-12">
                                    <div class="bg-white rounded p-4 shadow-sm">

                                        <!-- ĐIỂM TỔNG -->
                                        <div class="d-flex align-items-center gap-4 mb-3">
                                            <div class="text-center">
                                                <h2 class="fw-bold text-success mb-0">{{ diemTrungBinh }}</h2>
                                                <p class="text-muted small mb-0">/ 5 điểm</p>

                                            </div>

                                            <div class="flex-grow-1">
                                                <div class="progress" style="height:10px;">
                                                    <div class="progress-bar bg-success" style="width:84%"></div>
                                                </div>
                                                <p class="text-muted small mt-1 mb-0">Dựa trên {{ soLuongDanhGia }} đánh
                                                    giá</p>
                                            </div>
                                        </div>

                                        <!-- FORM ĐÁNH GIÁ -->
                                        <div class="mt-4">
                                            <div class="row g-3">

                                                <!-- điểm số -->
                                                <div class="col-md-2">
                                                    <select v-model="diem" class="form-select"
                                                        aria-label="Default select example">
                                                        <option selected>Điểm số</option>
                                                        <option value="1">1 ⭐</option>
                                                        <option value="2">2 ⭐⭐</option>
                                                        <option value="3">3 ⭐⭐⭐</option>
                                                        <option value="4">4 ⭐⭐⭐⭐</option>
                                                        <option value="5">5 ⭐⭐⭐⭐⭐</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-10">
                                                    <div class="d-flex align-items-start gap-3">
                                                        <img src="https://i.pinimg.com/736x/4b/64/88/4b64889d358844f4dc024d2ecd1ed609.jpg"
                                                            class="rounded-circle" width="48" height="48">

                                                        <textarea v-model="noi_dung_binh_luan" class="form-control"
                                                            placeholder="Viết đánh giá của bạn..." rows="2"></textarea>

                                                        <!-- Upload hình ảnh -->
                                                        <div class="mt-2">
                                                            <input type="file" multiple accept="image/*"
                                                                @change="chonAnh">
                                                        </div>

                                                        <!-- Preview ảnh có nút xóa -->
                                                        <div class="d-flex gap-2 mt-2 flex-wrap">
                                                            <div v-for="(img, index) in previewAnh" :key="index"
                                                                style="position: relative;">
                                                                <img :src="img"
                                                                    style="width:80px;height:80px;object-fit:cover;border-radius:5px;border:1px solid #ddd;">
                                                                <span @click="xoaAnh(index)"
                                                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                                    style="cursor:pointer;">×</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-end mt-3">
                                                <button @click="binhLuan()" class="btn btn-success fw-semibold px-4">Gửi
                                                    đánh giá</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- DANH SÁCH BÌNH LUẬN -->
                                <div class="col-lg-12">
                                    <div class="bg-white rounded p-4 shadow-sm">

                                        <h5 class="fw-bold mb-3 border-bottom pb-2">Bình luận khách hàng</h5>

                                        <template v-for="(value, index) in list_binh_luan" :key="index">

                                            <div class="comment-item mb-3 p-3 rounded border bg-light">
                                                <div class="d-flex align-items-start gap-3">

                                                    <img :src="value.avatar || defaultAvatar" class="rounded-circle"
                                                        width="48" height="48">

                                                    <div class="flex-grow-1">

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h6 class="fw-bold mb-0">{{ value.ho_ten }}
                                                                <span class="ms-3" style="color: orange;">{{ value.diem
                                                                    }}<i class="fa-solid fa-star ms-1"></i></span>
                                                            </h6>
                                                            <small class="text-muted">{{ formatDate(value.created_at)
                                                                }}</small>
                                                        </div>

                                                        <p class="mt-2 mb-1 text-secondary">{{ value.binh_luan }}</p>

                                                        <!-- Ảnh đính kèm -->
                                                        <div v-if="Array.isArray(value.hinh_anh) && value.hinh_anh.length > 0"
                                                            class="mt-2">
                                                            <div class="d-flex flex-wrap gap-2">
                                                                <img v-for="(img, i) in value.hinh_anh" :key="i"
                                                                    :src="img" @click="zoomImage = img"
                                                                    style="width:90px;height:90px;object-fit:cover;border:1px solid #ddd;">
                                                            </div>
                                                        </div>

                                                        <!-- ADMIN PHẢN HỒI -->
                                                        <div v-if="value.phan_hoi"
                                                            class="bg-white border rounded p-2 mt-2"
                                                            style="margin-left:10px; border-left: 3px solid #0d6efd;">
                                                            <small class="text-primary fw-bold">Phản hồi từ
                                                                NHTravel:</small>
                                                            <div class="text-dark">{{ value.phan_hoi }}</div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </template>

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
                            <i class="fa-solid fa-ticket me-2"></i>Mã tour: <b>{{ chi_tiet_tour.ma_tour }}</b>
                            <br>
                            <div class="mt-2"><i class="fa-solid fa-calendar-days me-2"></i>Ngày khởi hành:
                                <a href="#scrollspyHeading1">
                                    <!-- Nút chọn ngày -->
                                    <button class="btn btn-outline-primary ms-2"
                                        style="border-radius: 100px; font-size: smaller;"><b>{{
                                            formatDate(chi_tiet_tour.ngay_di)
                                            }}</b></button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card" v-if="showSchedule">
                        <div class="card-body">
                            <h5 class="card-title"><b>Giá từ:</b></h5>
                            <h2 class="text-danger"><b>{{ formatVND(chi_tiet_tour.gia_nguoi_lon) }}</b><span
                                    class="text-black" style="font-size: 22px;"> /
                                    Khách</span></h2>
                            <i class="fa-solid fa-ticket me-2"></i>Mã tour: <b class="text-primary">{{
                                chi_tiet_tour.ma_tour }}</b>
                            <br>
                            <i class="fa-solid fa-map-pin ms-1"
                                style="margin-right: 13px; margin-top: 10px; margin-block-end: 10px;"></i>Khởi hành: <b
                                class="text-primary">{{ chi_tiet_tour.dia_diem }}</b>
                            <br>
                            <i class="fa-solid fa-calendar-days"
                                style="margin-right: 13px; margin-block-end: 10px;"></i>Ngày khởi
                            hành: <b class="text-primary">{{ selectedDate }}</b>
                            <br>
                            <img src="../../../assets/images/homecustomer/car-seat.png" style="margin-right: 5px;">Số
                            chỗ
                            còn: <b class="text-primary">{{ chi_tiet_tour.so_cho_con }}</b>
                            <router-link :to="`/dat-tour/${id_tour}`" class="btn mt-3 w-100 text-white"
                                style="background-color: crimson;">
                                <b>Đặt ngay</b>
                            </router-link>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end" v-if="showSchedule">
                        <router-link :to="`/lien-he`">
                            <button class="btn btn-outline-primary mb-3"><i
                                    class="fa-solid fa-envelope-open me-2"></i>Liên
                                hệ tư
                                vấn</button>
                        </router-link>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal xem ảnh lớn -->
    <div v-if="zoomImage" class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);"
        @click="zoomImage = ''">
        <div class="modal-dialog modal-dialog-centered" @click.stop>
            <img :src="zoomImage" class="img-fluid rounded" style="max-height: 80vh; object-fit: contain;">
        </div>
    </div>

</template>
<script>
import axios from 'axios';
export default {
    props: ["id_tour"],
    data() {
        return {

            id_tour: this.$route.params.id_tour,
            chi_tiet_tour: {},
            lich_trinh: [],

            noi_dung_binh_luan: "",
            diem: null,
            list_binh_luan: [],
            anh_upload: [],
            previewAnh: [],
            zoomImage: "",
            diemTrungBinh: 0,
            soLuongDanhGia: 0,
            anh_carousel: [],

            showSchedule: false, // ẩn mặc định
            selectedDate: '',
            allExpanded: false,
        };
    },
    mounted() {
        this.loadChiTietTour();
        this.dataBinhLuan();
        this.getDiemTrungBinh();

        window.scrollTo({ top: 0, behavior: "smooth" });
    },
    methods: {
        formatTime(time) {
            return time.slice(0, 5);
        },
        formatDate(date) {
            const d = new Date(date);
            return `${d.getDate()}/${d.getMonth() + 1}/${d.getFullYear()}`;
        },
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number);
        },
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
            this.lich_trinh[index].expanded = !this.lich_trinh[index].expanded;
        },
        toggleAll() {
            this.allExpanded = !this.allExpanded;
            this.lich_trinh.forEach(item => {
                item.expanded = this.allExpanded;
            });
        },
        loadChiTietTour() {
            var payload = {
                id: this.id_tour
            }
            axios.post('http://127.0.0.1:8000/api/customer/chi-tiet-tour/get-data', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.chi_tiet_tour = res.data.data_tour;
                        this.anh_carousel = res.data.data_tour.anh || [];
                        this.lich_trinh = res.data.data_lich_trinh.map(item => ({
                            ...item,
                            expanded: false
                        }));
                        this.selectedDate = this.formatDate(this.chi_tiet_tour.ngay_di);
                        this.showSchedule = true;



                    } else {
                        this.$toast.error(res.data.message);
                    }
                });
        },
        binhLuan() {

            if (!localStorage.getItem("auth_token")) {
                this.$toast.error("Bạn chưa đăng nhập!");
                return;
            }

            if (!this.diem || !this.noi_dung_binh_luan) {
                this.$toast.error("Vui lòng nhập điểm & bình luận!");
                return;
            }

            let form = new FormData();
            form.append("id_tour", this.id_tour);
            form.append("binh_luan", this.noi_dung_binh_luan);
            form.append("diem", this.diem);

            // Thêm nhiều ảnh
            this.anh_upload.forEach((file, index) => {
                form.append("hinh_anh[" + index + "]", file);
            });



            axios.post("http://127.0.0.1:8000/api/customer/chi-tiet-tour/binh-luan",
                form,
                {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem('auth_token'),
                        "Content-Type": "multipart/form-data"
                    }
                }
            ).then((res) => {
                if (res.data.status) {
                    this.$toast.success("Đã gửi đánh giá!");

                    this.noi_dung_binh_luan = "";
                    this.diem = null;
                    this.previewAnh = [];
                    this.anh_upload = [];

                    this.dataBinhLuan();
                } else {
                    this.$toast.error(res.data.message);
                }
            });
        },
        dataBinhLuan() {
            axios
                .get("http://127.0.0.1:8000/api/customer/chi-tiet-tour/binh-luan/get-data/" + this.id_tour)
                .then((res) => {
                    this.list_binh_luan = res.data.data;
                });
        },
        chonAnh(event) {
            const files = Array.from(event.target.files);

            if (files.length > 5) {
                this.$toast.error("Chỉ được chọn tối đa 5 ảnh!");
                return;
            }

            this.anh_upload = files;
            this.previewAnh = files.map(file => URL.createObjectURL(file));
        },
        xoaAnh(index) {
            this.previewAnh.splice(index, 1);
            this.anh_upload.splice(index, 1);
        },
        getDiemTrungBinh() {
            axios
                .get("http://127.0.0.1:8000/api/customer/chi-tiet-tour/diem-trung-binh/" + this.id_tour)
                .then((res) => {
                    if (res.data.status) {
                        this.diemTrungBinh = res.data.diem_tb;
                        this.soLuongDanhGia = res.data.so_luong;
                    }
                });
        }

    }
};
</script>


<style></style>