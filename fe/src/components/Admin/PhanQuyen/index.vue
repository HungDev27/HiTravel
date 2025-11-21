<template>
    <!-- Thêm mới -->
    <div class="d-flex justify-content-between">
        <span class="text-secondary">Quyền lý quyền hạn truy cập cho từng nhóm tài khoản</span>
        <button data-bs-toggle="modal" data-bs-target="#themmoiModal" class="btn text-white"
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"><i
                class="fa-regular fa-square-plus me-2"></i>Thêm chức vụ
            mới</button>
    </div>

    <div class="row mt-3">

        <!-- DANH SÁCH CHỨC VỤ -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 8px; overflow: hidden;">

                <div class="card-header bg-white border-bottom-0">
                    <h6 class="text-secondary"
                        style="font-size: 15px; text-transform: uppercase; letter-spacing: 0.5px;">
                        DANH SÁCH VAI TRÒ
                    </h6>
                </div>

                <div class="list-group list-group-flush">

                    <a href="#" class="list-group-item list-group-item-action py-3 border-0" aria-current="true"
                        style="background-color: #f3f0ff; border-left: 4px solid #764ba2 !important;">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 fw-bold" style="color: #764ba2;">Quản trị viên (Admin)</h6>
                                <small style="color: #9ca3af;">Toàn quyền hệ thống</small>
                            </div>
                            <span class="badge bg-success rounded-pill" style="font-size: 10px; padding: 6px 10px;">Hoạt
                                động</span>
                        </div>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action py-3 border-0 bg-light"
                        style="opacity: 0.7;">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 fw-bold text-secondary">Cộng tác viên</h6>
                                <small class="text-muted">Quyền hạn bị hạn chế</small>
                            </div>
                            <span class="badge bg-secondary rounded-pill"
                                style="font-size: 10px; padding: 6px 10px;">Tạm dừng</span>
                        </div>
                    </a>

                    <div class="list-group-item border-0 flex-grow-1"
                        style="min-height: 200px; background: transparent;"></div>

                </div>
            </div>
        </div>

        <!-- CHI TIẾT PHÂN QUYỀN -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 style="color: #764ba2;">Phân Quyền Cho: Admin</h4>
                            <span class="text-secondary" style="font-size: 13px;">Chọn các chức năng mà vai trò này được
                                cho phép truy cập</span>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"  id="allCheck"
                            onclick="document.querySelectorAll('.permission').forEach(x => x.checked = this.checked)">
                            <label class="form-check-label" for="allCheck">Chọn tất cả</label>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <!-- QL Người Dùng -->
                    <div class="form-check form-switch">
                        <input class="form-check-input permission" type="checkbox" id="nguoidung">
                        <label class="form-check-label text-secondary" for="nguoidung"><b>QUẢN LÝ NGƯỜI
                                DÙNG</b></label>
                    </div>
                    <hr>

                    <!-- QL Tour -->
                    <span class="text-secondary"><b>QUẢN LÝ TOUR</b></span>
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <div class="card shadow-sm"
                                style="border: 1px solid lavender; height: 40px; width: fit-content;">
                                <div class="card-body d-flex align-items-center px-3 py-0 h-100">
                                    <div class="form-check form-switch m-0">

                                        <!-- Thêm tour -->
                                        <input class="form-check-input permission" type="checkbox" id="themtour"
                                            style="cursor: pointer;">
                                        <label class="form-check-label ms-2 user-select-none" for="themtour"
                                            style="cursor: pointer;">
                                            <b>Thêm tour</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card shadow-sm"
                                style="border: 1px solid lavender; height: 40px; width: fit-content;">
                                <div class="card-body d-flex align-items-center px-3 py-0 h-100">
                                    <div class="form-check form-switch m-0">

                                        <!-- Danh sách tour -->
                                        <input class="form-check-input permission" type="checkbox" id="dstour"
                                            style="cursor: pointer;">
                                        <label class="form-check-label ms-2 user-select-none" for="dstour"
                                            style="cursor: pointer;">
                                            <b>Danh sách tour</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card shadow-sm"
                                style="border: 1px solid lavender; height: 40px; width: fit-content;">
                                <div class="card-body d-flex align-items-center px-3 py-0 h-100">
                                    <div class="form-check form-switch m-0">

                                        <!-- Danh mục tour -->
                                        <input class="form-check-input permission" type="checkbox" id="dmtour"
                                            style="cursor: pointer;">
                                        <label class="form-check-label ms-2 user-select-none" for="dmtour"
                                            style="cursor: pointer;">
                                            <b>Danh mục tour</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- QL Booking -->
                    <div class="form-check form-switch">
                        <input class="form-check-input permission" type="checkbox" id="booking">
                        <label class="form-check-label text-secondary" for="booking"><b>QUẢN LÝ BOOKING</b></label>
                    </div>
                    <hr>

                    <!-- QL Tour -->
                    <span class="text-secondary"><b>QUẢN LÝ TOUR</b></span>
                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <div class="card shadow-sm"
                                style="border: 1px solid lavender; height: 40px; width: fit-content;">
                                <div class="card-body d-flex align-items-center px-3 py-0 h-100">
                                    <div class="form-check form-switch m-0">

                                        <!-- Voucher -->
                                        <input class="form-check-input permission" type="checkbox" id="voucher"
                                            style="cursor: pointer;">
                                        <label class="form-check-label ms-2 user-select-none" for="voucher"
                                            style="cursor: pointer;">
                                            <b>Voucher</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm"
                                style="border: 1px solid lavender; height: 40px; width: fit-content;">
                                <div class="card-body d-flex align-items-center px-3 py-0 h-100">
                                    <div class="form-check form-switch m-0">

                                        <!-- Phương Tiện -->
                                        <input class="form-check-input permission" type="checkbox" id="phuongtien"
                                            style="cursor: pointer;">
                                        <label class="form-check-label ms-2 user-select-none" for="phuongtien"
                                            style="cursor: pointer;">
                                            <b>Phương Tiện</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- Đánh giá -->
                    <span class="text-secondary"><b>ĐÁNH GIÁ</b></span>
                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <div class="card shadow-sm"
                                style="border: 1px solid lavender; height: 40px; width: fit-content;">
                                <div class="card-body d-flex align-items-center px-3 py-0 h-100">
                                    <div class="form-check form-switch m-0">

                                        <!-- Bình luận -->
                                        <input class="form-check-input permission" type="checkbox" id="binhluan"
                                            style="cursor: pointer;">
                                        <label class="form-check-label ms-2 user-select-none" for="binhluan"
                                            style="cursor: pointer;">
                                            <b>Bình luận</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm"
                                style="border: 1px solid lavender; height: 40px; width: fit-content;">
                                <div class="card-body d-flex align-items-center px-3 py-0 h-100">
                                    <div class="form-check form-switch m-0">

                                        <!-- Bài Viết -->
                                        <input class="form-check-input permission" type="checkbox" id="baiviet"
                                            style="cursor: pointer;">
                                        <label class="form-check-label ms-2 user-select-none" for="baiviet"
                                            style="cursor: pointer;">
                                            <b>Bài Viết</b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- Thống kê -->
                    <div class="form-check form-switch">
                        <input class="form-check-input permission" type="checkbox" id="thongke">
                        <label class="form-check-label text-secondary" for="thongke"><b>THỐNG KÊ</b></label>
                    </div>
                    <hr>

                    <!-- QL Liên hệ -->
                    <div class="form-check form-switch">
                        <input class="form-check-input permission" type="checkbox" id="lienhe">
                        <label class="form-check-label text-secondary" for="lienhe"><b>QUẢN LÝ LIÊN HỆ</b></label>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-light fw-bold flex-fill py-2" data-bs-dismiss="modal"
                            style="color: #555;">
                            Hủy bỏ
                        </button>

                        <button type="button" class="btn text-white fw-bold flex-fill py-2 shadow-sm"
                            data-bs-dismiss="modal"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                            <i class="fa-solid fa-bookmark me-2"></i>Lưu Phân Quyền
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm mới-->
    <div class="modal fade" id="themmoiModal" tabindex="-1" aria-labelledby="themmoiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; overflow: hidden;">

                <div class="modal-header text-white"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h5 class="modal-title fw-bold" id="themmoiModalLabel">
                        <i class="fa-solid fa-user-plus me-2"></i>Thêm Chức Vụ
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="tenChucVu" class="form-label fw-bold text-secondary">
                                Tên chức vụ <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-secondary border-end-0">
                                    <i class="fa-solid fa-id-badge"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" id="tenChucVu"
                                    placeholder="VD: Trưởng phòng Marketing" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="slugChucVu" class="form-label fw-bold text-secondary">
                                Slug (Mã đường dẫn)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0">
                                    <i class="fa-solid fa-link"></i>
                                </span>
                                <input type="text" class="form-control bg-light border-start-0 ps-0 text-muted"
                                    id="slugChucVu" placeholder="Tu-dong-tao-khi-nhap-ten" readonly>
                            </div>
                            <div class="form-text small fst-italic">Hệ thống sẽ tự động tạo slug từ tên chức vụ.</div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-bold text-secondary">Trạng thái</label>
                            <div class="d-flex gap-2">
                                <input type="radio" class="btn-check" name="tinhTrang" id="statusActive"
                                    autocomplete="off" checked>
                                <label class="btn btn-outline-success flex-fill fw-bold" for="statusActive">
                                    <i class="fa-solid fa-circle-check me-1"></i> Hoạt động
                                </label>

                                <input type="radio" class="btn-check" name="tinhTrang" id="statusInactive"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary flex-fill fw-bold" for="statusInactive">
                                    <i class="fa-solid fa-circle-pause me-1"></i> Tạm dừng
                                </label>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-light text-secondary fw-bold"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn text-white px-4 fw-bold shadow-sm"
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                        <i class="fa-solid fa-floppy-disk me-2"></i>Lưu dữ liệu
                    </button>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
export default {

}
</script>
<style></style>