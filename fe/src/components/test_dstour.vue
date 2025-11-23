<template>
    <div class="container">

        <!-- Thanh tìm kiếm -->
        <div
            style="display: flex; align-items: center; border: 1px solid #ccc; border-radius: 8px; padding: 6px 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); background: white; width: 500px; margin-top: 15px;">
            <i class="fa fa-search" style="color: #aaa; font-size: 16px;"></i>
            <input type="text" placeholder="Tìm kiếm tour..."
                style="border: none; outline: none; margin-left: 8px; font-size: 14px; flex: 1;" />
        </div>

        <!-- Thiết kế thanh tab -->
        <div class="row mt-4">

            <div class="col-lg-6">
                <!-- Nút trạng thái -->
                <div class="d-flex align-items-center">
                    <span class="me-3 text-secondary fw-bold" style="font-size: 14px;">Trạng thái:</span>

                    <div class="d-flex p-1 rounded-pill border"
                        style="width: 240px; background-color: #e9ecef; border-color: #d8e0e7 !important;">

                        <button type="button" @click="locTrangThai = 'hoat_dong'"
                            class="btn btn-sm rounded-pill w-50 fw-bold border-0 text-nowrap me-2"
                            :class="locTrangThai === 'hoat_dong' ? 'bg-white shadow-lg text-success' : 'text-muted'"
                            style="transition: all 0.3s ease-in-out; border: 1.5px solid transparent; height: 40px;">
                            <i class="fa-solid fa-circle-check"></i>Hoạt động
                        </button>

                        <button type="button" @click="locTrangThai = 'tam_dung'"
                            class="btn btn-sm rounded-pill w-50 fw-bold border-0 text-nowrap"
                            :class="locTrangThai === 'tam_dung' ? 'bg-white shadow-lg text-danger' : 'text-muted'"
                            style="transition: all 0.3s ease-in-out; border: 1.5px solid transparent; height: 40px;">
                            <i class="fa-solid fa-pause me-1"></i> Tạm dừng
                        </button>

                    </div>
                </div>
            </div>

            <!-- Lọc nội dung -->
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-end mb-3">
                    <span class="text-secondary me-2" style="font-size: 14px;">Sắp xếp theo:</span>

                    <select class="form-select form-select-sm me-2" style="width: auto; cursor: pointer;">
                        <option selected>Ngày tạo</option>
                        <option>Tên phương tiện</option>
                        <option>Biển số</option>
                    </select>

                    <select class="form-select form-select-sm" style="width: auto; cursor: pointer;">
                        <option selected>Tăng dần</option>
                        <option>Giảm dần</option>
                    </select>

                    <button class="btn btn-warning ms-2 text-dark" style="font-size: 13px;"><b>Lọc</b></button>


                </div>
            </div>
        </div>

        <!-- Danh sách tour -->
        <div class="row">
            <template v-for="(value, index) in filteredTours" :key="index">
                <div class="col-lg-9 col-md-12 mt-3 mb-3">

                    <div class="card border-0 shadow h-100"
                        style="border-radius: 12px; overflow: hidden; transition: transform 0.2s;">

                        <div class="row g-0 h-100">

                            <div class="col-md-5 position-relative">
                                <img :src="value.anh ?? default_img" class="w-100 h-100"
                                    style="object-fit: cover; min-height: 190px;">
                                <div class="position-absolute top-0 start-0 m-2">
                                    <span class="badge bg-dark text-white shadow-sm px-2 py-1" style="font-size: 12px;">
                                        {{ value.ma_tour }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="card-body d-flex flex-column p-3 h-100">

                                    <div class="mb-2">
                                        <h6 class="card-title fw-bold text-dark mb-1 text-truncate"
                                            style="font-size: 1.3rem;">
                                            {{ value.ten_tour }}
                                        </h6>
                                        <div class="d-flex align-items-center text-primary fw-medium"
                                            style="font-size: 0.95rem;">
                                            <i class="fa-regular fa-calendar-days me-1"></i>
                                            {{ value.ngay_di }} → {{ value.ngay_ve }}
                                        </div>
                                    </div>

                                    <div class="p-2 rounded-3 border"
                                        style="background-color: #e9ecef; border-color: #dee2e6 !important; font-size: 14px;">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="text-secondary"><i class="fa-solid fa-users me-1"></i>Sức
                                                chứa</span>
                                            <span class="fw-bold text-dark">{{ value.so_cho }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-secondary"><i class="fa-solid fa-ticket me-1"></i>Còn
                                                trống</span>
                                            <span class="badge bg-danger text-white px-2">{{ value.so_cho_con }}</span>
                                        </div>
                                    </div>

                                    <div class="mt-auto"></div>
                                    <hr class="text-muted opacity-25 my-2">

                                    <div class="d-flex align-items-center justify-content-between">

                                        <div class="d-flex flex-column lh-1" style="font-size: 0.85rem;">
                                            <span class="text-muted mb-1">
                                                <i class="fa-solid fa-user-pen me-1"></i> {{ value.nguoi_tao ?? '---' }}
                                            </span>
                                            <span class="text-muted mt-2">
                                                <i class="fa-solid fa-map-pin me-1"></i> {{ value.dia_diem }}
                                            </span>
                                        </div>

                                        <div class="d-flex gap-2">
                                            <button data-bs-toggle="modal" data-bs-target="#suaModal"
                                                class="btn btn-warning fw-bold shadow-sm"
                                                style="font-size: 14px; padding: 6px 12px; border-radius: 8px;">
                                                <i class="fa-solid fa-pen me-1"></i> Cập nhật
                                            </button>

                                            <button data-bs-toggle="modal" data-bs-target="#xoaModal"
                                                class="btn btn-danger fw-bold shadow-sm"
                                                style="font-size: 14px; padding: 6px 12px; border-radius: 8px;">
                                                <i class="fa-solid fa-trash me-1"></i> Xoá
                                            </button>

                                            <button @click="openDetail(value.id)" data-bs-toggle="modal"
                                                data-bs-target="#xemModal" class="btn btn-primary fw-bold shadow-sm"
                                                style="font-size: 14px; padding: 6px 16px; border-radius: 8px;">
                                                Xem Chi tiết
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </template>
        </div>

        <!-- Modal Chỉnh sửa -->
        <div class="modal fade" id="suaModal" tabindex="-1" aria-labelledby="suaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">

                    <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-pen-to-square fs-4"></i>
                            </div>
                            <div>
                                <h5 class="modal-title fw-bold text-dark" id="suaModalLabel">Cập nhật Tour</h5>
                                <p class="text-muted small mb-0">Chỉnh sửa thông tin tour ID: <strong>#12345</strong>
                                </p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-4 bg-light">
                        <form>
                            <div class="row g-4">

                                <div class="col-lg-8">

                                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                                        <div class="card-body p-4">
                                            <h6
                                                class="fw-bold text-primary mb-3 text-uppercase small border-bottom pb-2">
                                                <i class="fa-solid fa-circle-info me-2"></i>Thông tin chung
                                            </h6>

                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label fw-medium small text-secondary">Tên
                                                        Tour</label>
                                                    <input type="text" class="form-control fw-bold">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-medium small text-secondary">Mã
                                                        Tour</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white text-muted"><i
                                                                class="fa-solid fa-barcode"></i></span>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-medium small text-secondary">Danh
                                                        mục</label>
                                                    <select class="form-select">
                                                        <option selected>Du lịch Biển</option>
                                                        <option>Du lịch Núi</option>
                                                        <option>Nghỉ dưỡng</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-medium small text-secondary">Địa
                                                        điểm</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white text-muted"><i
                                                                class="fa-solid fa-location-dot"></i></span>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                                        <div class="card-body p-4">
                                            <h6
                                                class="fw-bold text-primary mb-3 text-uppercase small border-bottom pb-2">
                                                <i class="fa-solid fa-calendar-days me-2"></i>Lịch trình
                                            </h6>

                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="p-3 bg-light rounded-3 border border-light">
                                                        <label class="form-label fw-bold text-dark small mb-2">Ngày đi
                                                            (Khởi
                                                            hành)</label>
                                                        <div class="d-flex gap-2">
                                                            <input type="date" class="form-control">
                                                            <input type="time" class="form-control w-50">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="p-3 bg-light rounded-3 border border-light">
                                                        <label class="form-label fw-bold text-dark small mb-2">Ngày về
                                                            (Kết
                                                            thúc)</label>
                                                        <div class="d-flex gap-2">
                                                            <input type="date" class="form-control">
                                                            <input type="time" class="form-control w-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-4">
                                            <h6
                                                class="fw-bold text-primary mb-3 text-uppercase small border-bottom pb-2">
                                                <i class="fa-solid fa-align-left me-2"></i>Mô tả chi tiết
                                            </h6>
                                            <textarea class="form-control text-secondary" rows="5">Hành trình khám phá di sản
                                        thiên nhiên thế giới...</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">

                                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                                        <div class="card-body p-4">
                                            <h6 class="fw-bold text-secondary mb-3 text-uppercase small">Hình ảnh</h6>
                                            <div class="position-relative rounded-3 overflow-hidden border mb-3"
                                                style="height: 180px;">
                                                <img src="https://i.pinimg.com/736x/3e/d5/5b/3ed55b7a8edad9e811900cd55ca50f05.jpg"
                                                    class="w-100 h-100" style="object-fit: cover;">
                                                <div
                                                    class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white text-center py-1 small">
                                                    Ảnh bìa hiện tại
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-primary w-100 btn-sm border-dashed">
                                                <i class="fa-solid fa-upload me-1"></i> Tải ảnh mới
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                                        <div class="card-body p-4">
                                            <h6 class="fw-bold text-secondary mb-3 text-uppercase small">Thiết lập</h6>

                                            <div
                                                class="form-check form-switch mb-3 ps-0 d-flex align-items-center justify-content-between border p-2 rounded-3">
                                                <label class="form-check-label small ms-2" for="statusSwitch">Trạng thái
                                                    hoạt động</label>
                                                <input class="form-check-input ms-0" type="checkbox" id="statusSwitch"
                                                    checked style="width: 40px; height: 20px;">
                                            </div>

                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <label class="form-label small text-muted">Tổng chỗ</label>
                                                    <input type="number" class="form-control text-center fw-bold">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label small text-muted">Còn lại</label>
                                                    <input type="number"
                                                        class="form-control text-center fw-bold text-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-4">
                                            <h6 class="fw-bold text-secondary mb-3 text-uppercase small">Định giá vé
                                            </h6>

                                            <div class="mb-3">
                                                <label class="form-label small text-muted"><i
                                                        class="fa-solid fa-user me-1"></i>Người lớn</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control fw-bold">
                                                    <span class="input-group-text small">VNĐ</span>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="form-label small text-muted"><i
                                                        class="fa-solid fa-child me-1"></i>Trẻ em</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control fw-bold">
                                                    <span class="input-group-text small">VNĐ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer border-top-0 bg-white px-4 pb-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary"
                            data-bs-dismiss="modal">Hủy bỏ</button>
                        <button data-bs-dismiss="modal" type="button"
                            class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                            <i class="fa-solid fa-floppy-disk me-2"></i> Lưu thay đổi
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Xoá-->
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">

                <div class="modal-content border-0 shadow-lg" style="border-radius: 24px; overflow: hidden;">

                    <div class="modal-body p-4 text-center">

                        <div class="mb-4 d-inline-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10"
                            style="width: 80px; height: 80px;">
                            <i class="fa-solid fa-trash-can text-danger" style="font-size: 40px;"></i>
                        </div>

                        <h4 class="fw-bold text-dark mb-2">Xác nhận xoá?</h4>
                        <p class="text-muted mb-4">
                            Hành động này không thể hoàn tác. Bạn có chắc chắn muốn xoá dữ liệu này không?
                        </p>

                        <div class="bg-light rounded-4 p-3 mb-2 border border-secondary border-opacity-10">
                            <div class="d-flex align-items-center text-start">
                                <div class="bg-white p-2 rounded-3 shadow-sm me-3 text-danger">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div class="lh-1 overflow-hidden">
                                    <div class="small text-muted mb-1">Đang chọn xoá:</div>
                                    <div class="fw-bold text-dark text-truncate">
                                        Tour vinh hạ long 3 ngày 2 đêm
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer border-0 p-3 pt-0 row g-2 mx-0">

                        <div class="col-6">
                            <button type="button" class="btn btn-light w-100 fw-bold py-2 rounded-pill"
                                data-bs-dismiss="modal" style="background-color: #f1f3f5;">
                                Huỷ bỏ
                            </button>
                        </div>

                        <div class="col-6">
                            <button type="button" class="btn btn-danger w-100 fw-bold py-2 rounded-pill shadow-sm"
                                data-bs-dismiss="modal">
                                Đồng ý xoá
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>



        <!-- Modal Xem chi tiết -->
        <div v-if="chiTietTour" class="modal fade" id="xemModal" tabindex="-1" aria-labelledby="xemModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

                <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">

                    <!-- ẢNH BÌA -->
                    <div class="position-relative p-0" style="height: 240px;">
                        <img :src="chiTietTour?.anh?.[0]?.url || default_img" class=" w-100 h-100"
                            style="object-fit: cover;">

                        <div class="position-absolute top-0 start-0 w-100 h-100"
                            style="background: linear-gradient(to bottom, rgba(0,0,0,0) 40%, rgba(0,0,0,0.8) 100%);">
                        </div>

                        <!-- Nút đóng -->
                        <button type="button"
                            class="btn-close btn-close-white position-absolute top-0 end-0 m-3 bg-dark bg-opacity-50 rounded-circle p-2"
                            data-bs-dismiss="modal" aria-label="Close"></button>

                        <!-- trạng thái -->
                        <div class="position-absolute top-0 start-0 m-3">
                            <span
                                class="badge bg-success px-3 py-2 rounded-pill shadow-sm text-uppercase border border-white border-opacity-25">
                                <i class="fa-solid fa-circle-check me-1"></i> {{ chiTietTour.trang_thai }}
                            </span>
                        </div>

                        <!-- Tiêu đề -->
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <span class="badge bg-warning text-dark fw-bold mb-2 shadow-sm">{{ chiTietTour.ma_tour
                            }}</span>

                            <h3 class="text-white fw-bold mb-0 text-shadow">{{ chiTietTour.ten_tour }}</h3>

                            <div class="text-white-50 small mt-1">
                                <i class="fa-solid fa-layer-group me-1"></i>
                                Danh mục: {{ chiTietTour.danh_muc }}
                            </div>
                        </div>
                    </div>

                    <!-- THÂN MODAL -->
                    <div class="modal-body p-4 bg-light">

                        <!-- LỊCH TRÌNH -->
                        <div class="card border-0 shadow-sm rounded-4 mb-3">
                            <div class="card-body p-3">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="col-3 d-flex align-items-start">
                                        <h2 class="fw-bold text-primary m-0 text-uppercase small">
                                            <i class="fa-solid fa-calendar-days me-2"></i>Lịch trình
                                        </h2>
                                    </div>
                                    <div class="col-9 mt-2">
                                        <div v-for="lt in chiTietTour.lich_trinh" :key="lt.id" class="mb-3">
                                            <div class="fw-bold text-dark">
                                                📅 Ngày {{ lt.ngay_lich_trinh }}: {{ lt.tieu_de }}
                                            </div>
                                            <div class="text-muted">
                                                {{ lt.noi_dung }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between px-2 text-center">
                                    <div>
                                        <div class="fw-bold fs-5 text-dark">{{ chiTietTour.ngay_di }}</div>
                                        <div class="text-muted small">Ngày đi</div>
                                    </div>

                                    <div class="flex-grow-1 px-3 position-relative">
                                        <hr class="border-secondary opacity-25">
                                        <div
                                            class="position-absolute top-0 start-50 translate-middle bg-white px-2 text-primary">
                                            <i class="fa-solid fa-plane-departure"></i>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="fw-bold fs-5 text-dark">{{ chiTietTour.ngay_ve }}</div>
                                        <div class="text-muted small">Ngày về</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- GIÁ + CHỖ TRỐNG -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-7">
                                <div class="card border-0 shadow-sm rounded-4 h-100">
                                    <div class="card-body p-3">
                                        <h6 class="fw-bold text-secondary mb-3 text-uppercase small">
                                            <i class="fa-solid fa-tag me-2"></i>Bảng giá
                                        </h6>

                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="text-muted small">
                                                <i class="fa-solid fa-user me-2"></i>Người lớn
                                            </span>
                                            <span class="fw-bold text-primary">{{ chiTietTour.gia_nguoi_lon }} ₫</span>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted small">
                                                <i class="fa-solid fa-child me-2"></i>Trẻ em
                                            </span>
                                            <span class="fw-bold text-warning">{{ chiTietTour.gia_tre_em }} ₫</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CHỖ TRỐNG -->
                            <div class="col-md-5">
                                <div class="card border-0 shadow-sm rounded-4 h-100">
                                    <div class="card-body p-3 text-center d-flex flex-column justify-content-center">
                                        <h6 class="fw-bold text-secondary mb-2 text-uppercase small">
                                            <i class="fa-solid fa-chair me-2"></i>Chỗ còn
                                        </h6>

                                        <div class="d-flex align-items-baseline justify-content-center gap-1">
                                            <span class="fw-bold fs-2 text-success lh-1">
                                                {{ chiTietTour.so_cho_con }}
                                            </span>
                                            <span class="text-muted small">/ {{ chiTietTour.so_cho }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MÔ TẢ -->
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-3">
                                <h6 class="fw-bold text-secondary mb-2 text-uppercase small">
                                    <i class="fa-solid fa-align-left me-2"></i>Mô tả
                                </h6>

                                <p class="text-secondary mb-0 small text-justify" style="line-height: 1.6;">
                                    {{ chiTietTour.mo_ta }}
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer border-top-0 bg-white justify-content-between px-4 py-3">
                        <div class="d-flex align-items-center small text-muted">
                            <div class="bg-light rounded-circle p-2 me-2">
                                <i class="fa-solid fa-user-pen"></i>
                            </div>

                            <div>Tạo bởi:
                                <strong class="text-dark">
                                    {{ chiTietTour.nguoi_dung.ho_ten }} ({{ chiTietTour.nguoi_dung.email }})
                                </strong>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold"
                            data-bs-dismiss="modal">
                            Đóng
                        </button>
                    </div>

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
            list_tour: [],
            search_key: "",
            locTrangThai: "hoat_dong",
            default_img: "https://i.pinimg.com/736x/3e/d5/5b/3ed55b7a8edad9e811900cd55ca50f05.jpg",
            chiTietTour: null,     // Tour đang xem chi tiết
           // showDetailModal: false // bật/tắt modal
        }
    },




    methods: {
        getDanhSachTour() {
            const token = localStorage.getItem("auth_token");


            axios
                .get("http://127.0.0.1:8000/api/admin/tour/get-data", {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("auth_token")
                    }
                })
                .then(res => {
                    this.list_tour = res.data.data;
                })
                .catch(err => {
                    //console.error("Lỗi API:", err);

                    if (err.response?.status === 401) {
                        alert("Token hết hạn hoặc không hợp lệ. Vui lòng đăng nhập lại!");
                    }
                });
        },
        openDetail(id) {
            //console.log("ID gửi đi:", id);
           // this.showDetailModal = true;
            this.getTourDetail(id);
        },

        getTourDetail(id) {
            axios.get(`http://127.0.0.1:8000/api/admin/tour/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("auth_token")
                }
            })
                .then(res => {
                    this.chiTietTour = res.data.data;   // Gán dữ liệu cho modal
                })
                .catch(err => {
                    console.error(err);
                    this.$toast.error("Không lấy được chi tiết tour!");
                });
        }
    },



    computed: {
        filteredTours() {
            return this.list_tour.filter(tour => {
                const matchStatus = this.locTrangThai === "" || tour.trang_thai === this.locTrangThai;
                const matchSearch =
                    tour.ten_tour.toLowerCase().includes(this.search_key.toLowerCase()) ||
                    tour.ma_tour.toLowerCase().includes(this.search_key.toLowerCase());

                return matchStatus && matchSearch;
            });
        }
    },

    mounted() {
        this.getDanhSachTour();
    },

}
</script>


<style>
/* Có thể thêm custom CSS nếu cần */
</style>