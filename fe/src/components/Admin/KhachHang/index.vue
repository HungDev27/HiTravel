<template>
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <img src="../../../assets/images/homecustomer/user.png" style="height: 40px; width: auto;" class="me-3">
                <h3 style="font-family: Verdana, sans-serif; font-size: 25px; margin-top: 5px;">Quản Lý Người Dùng</h3>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#themmoiModal" style="border-radius: 50px; background-color: #007bff; color: white; padding: 10px 20px; font-weight: bold; font-size: 14px; 
            border: none; display: inline-flex; align-items: center; gap: 8px; cursor: pointer; box-shadow: 0 4px 12px rgba(0, 123, 255, 0.4);
            transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'"
                onmouseout="this.style.transform='scale(1)'">
                <i class="fa-solid fa-plus text-white"></i> Thêm mới
            </button>

        </div>
        <div class="row mt-3">
            <div class="col-lg-5">
                <a href="/admin" class="text-secondary">Dashboard</a>
                > Người dùng
            </div>
            <div class="col-lg-2">
                <b>Chức vụ ></b>
            </div>
            <div class="col-lg-2">
                <b>Trạng thái ></b>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-5">
                <div
                    style="display: flex; align-items: center; border: 1px solid #ccc; border-radius: 8px; padding: 6px 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); background: white; width: 500px; margin-top: 15px;">
                    <i class="fa fa-search" style="color: #aaa; font-size: 16px;"></i>
                    <input type="text" placeholder="Search by Name, Email..."
                        style="border: none; outline: none; margin-left: 8px; font-size: 14px; flex: 1;" />
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card">
                    <div class="d-flex justify-content-start mt-2" style="align-items: center;">
                        <i class="fa-solid fa-circle text-danger me-2 ms-3 fa-xs"></i><span class="text-secondary">Nhân
                            viên</span>
                    </div>
                    <div class="d-flex justify-content-start mt-1 mb-2" style="align-items: center;">
                        <i class="fa-solid fa-circle text-info me-2 ms-3 fa-xs"></i><span class="text-secondary">Khách
                            hàng</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card">
                    <div class="d-flex justify-content-start mt-2" style="align-items: center;">
                        <i class="fa-solid fa-chart-simple text-success me-2 ms-3 fa-xs"></i><span
                            class="text-secondary">Hoạt động</span>
                    </div>
                    <div class="d-flex justify-content-start mt-1" style="align-items: center;">
                        <i class="fa-solid fa-chart-simple text-warning me-2 ms-3 fa-xs"></i><span
                            class="text-secondary">Không hoạt động</span>
                    </div>
                    <div class="d-flex justify-content-start mt-1 mb-2" style="align-items: center;">
                        <i class="fa-solid fa-chart-simple text-danger me-2 ms-3 fa-xs"></i><span
                            class="text-secondary">Bị khoá</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <table class="table">
                <thead class="table-info">
                    <tr>
                        <th>Thông tin người dùng</th>
                        <th>Số điện thoại</th>
                        <th>Chức vụ</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle" style="display: flex; align-items: center; gap: 10px;">
                            <img src="https://i.pravatar.cc/40?img=1"
                                style="width: 40px; height: 40px; border-radius: 50%;" />
                            <div>
                                <div><strong>Nhi Xinh</strong></div>
                                <div style="font-size: 13px; color: gray;">anna.nguyen@example.com</div>
                            </div>
                        </td>
                        <td class="align-middle">0369636310</td>
                        <td class="align-middle"><span class="badge" style="background: #dc3545; color: white;">Nhân
                                viên</span></td>
                        <td class="align-middle">
                            <!-- Hoạt động -->
                            <div class="d-flex justify-content-start" style="align-items: center;">
                                <i class="fa-solid fa-chart-simple text-success me-2 fa-xs"></i><span
                                    class="text-success">Hoạt động</span>
                            </div>
                            <!-- <div class="d-flex justify-content-start" style="align-items: center;">
                                <i class="fa-solid fa-chart-simple text-warning me-2 fa-xs"></i><span
                                    style="color: darkorange;">Không hoạt động</span>
                            </div>
                            <div class="d-flex justify-content-start" style="align-items: center;">
                                <i class="fa-solid fa-chart-simple text-danger me-2 fa-xs"></i><span class="text-danger">Bị khoá</span>
                            </div> -->

                        </td>
                        <td class="align-middle">
                            <button data-bs-toggle="modal" data-bs-target="#capnhatModal" class="btn me-2"
                                style="background-color: #ccc; border-radius: 100px;"><i class="fa-solid fa-pencil ms-1"
                                    style="cursor: pointer; color: #666;"></i></button>
                            <button data-bs-toggle="modal" data-bs-target="#xoaModal" class="btn me-2"
                                style="background-color: #ccc; border-radius: 100px;"><i
                                    class="fa-regular fa-trash-can ms-1"
                                    style="cursor: pointer; color: #666;"></i></button>
                            <button data-bs-toggle="modal" data-bs-target="#chitietModal" class="btn"
                                style="background-color: #ccc; border-radius: 100px;"><i class="fa fa-ellipsis-v ms-1"
                                    style="cursor: pointer; color: #666;"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Thêm mới -->
    <div class="modal fade" id="themmoiModal" tabindex="-1" aria-labelledby="themmoiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="themmoiModalLabel">Thêm mới người dùng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #ccc;">Thông tin tài khoản</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="vidu@email.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Mật khẩu <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <small class="text-muted"><i>Email này sẽ dùng để đăng nhập.</i></small>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3">
                                    <label for="id_chuc_vu" class="form-label">Chức vụ <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="id_chuc_vu" name="id_chuc_vu" required>
                                        <option value="" selected disabled>-- Chọn chức vụ --</option>
                                        <option value="1">Nhân Viên</option>
                                        <option value="2">Khách hàng</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Trạng thái</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="active"
                                                value="active" checked>
                                            <label class="form-check-label" for="active">Hoạt động</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="inactive"
                                                value="inactive">
                                            <label class="form-check-label" for="inactive">Không hoạt động</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="banned"
                                                value="banned">
                                            <label class="form-check-label" for="banned">Bị khoá</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #ccc;">Thông tin cá nhân</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ho_ten" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="ho_ten" name="ho_ten"
                                        placeholder="Nguyễn Văn A">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cccd" class="form-label">Căn cước công dân (CCCD)</label>
                                    <input type="text" class="form-control" id="cccd" name="cccd">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Tạo mới</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cập nhật -->
    <div class="modal fade" id="capnhatModal" tabindex="-1" aria-labelledby="capnhatModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="capnhatModalLabel">Cập nhật người dùng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #ccc;">Thông tin tài khoản</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="vidu@email.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Mật khẩu <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <small class="text-muted"><i>Email này sẽ dùng để đăng nhập.</i></small>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3">
                                    <label for="id_chuc_vu" class="form-label">Chức vụ <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="id_chuc_vu" name="id_chuc_vu" required>
                                        <option value="" selected disabled>-- Chọn chức vụ --</option>
                                        <option value="1">Nhân Viên</option>
                                        <option value="2">Khách hàng</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Trạng thái</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="active"
                                                value="active" checked>
                                            <label class="form-check-label" for="active">Hoạt động</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="inactive"
                                                value="inactive">
                                            <label class="form-check-label" for="inactive">Không hoạt động</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="banned"
                                                value="banned">
                                            <label class="form-check-label" for="banned">Bị khoá</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #ccc;">Thông tin cá nhân</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ho_ten" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="ho_ten" name="ho_ten"
                                        placeholder="Nguyễn Văn A">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cccd" class="form-label">Căn cước công dân (CCCD)</label>
                                    <input type="text" class="form-control" id="cccd" name="cccd">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xoá -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center pb-4">
                    <div class="mb-3 mx-auto d-flex align-items-center justify-content-center bg-danger bg-opacity-10 rounded-circle"
                        style="width: 80px; height: 80px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-trash3 text-danger" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>
                    </div>

                    <h4 class="fw-bold text-dark mb-2">Xác nhận xóa?</h4>

                    <p class="text-muted mb-0">
                        Bạn có chắc chắn muốn xóa người dùng <strong id="deleteUserName" class="text-dark">...</strong>
                        không?
                        <br>
                        <span class="small">Hành động này không thể hoàn tác.</span>
                    </p>
                </div>

                <div class="modal-footer justify-content-center border-top-0 pt-0 pb-4">
                    <button type="button" class="btn btn-light px-4 me-2" data-bs-dismiss="modal">Hủy bỏ</button>
                    <button type="button" class="btn btn-danger px-4" id="confirmDeleteBtn">Xóa bỏ</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Chi tiết-->
    <div class="modal fade" id="chitietModal" tabindex="-1" aria-labelledby="chitietModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-bottom-0 position-relative" style="z-index: 2;">
                    <h5 class="modal-title fw-bold text-primary" id="chitietModalLabel">Hồ sơ người dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-0">
                    <div class="position-relative mb-5">
                        <div
                            style="height: 120px; background: linear-gradient(135deg, #0d6efd, #0dcaf0); border-top-left-radius: 0.3rem; border-top-right-radius: 0.3rem;">
                        </div>

                        <div class="position-absolute top-100 start-50 translate-middle">
                            <div class="rounded-circle border border-4 border-white shadow bg-white d-flex justify-content-center align-items-center overflow-hidden"
                                style="width: 110px; height: 110px;">
                                <img src="https://i.pinimg.com/736x/5d/93/74/5d9374bab4c5bdd28b5216043f3a0570.jpg"
                                    alt="Ảnh đại diện người dùng" class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-4 px-4" style="margin-top: 60px;">
                        <h3 class="fw-bold mb-1" id="detail_ho_ten">Nguyễn Văn A</h3>

                        <div class="mt-2">
                            <span class="badge bg-success rounded-pill" id="detail_trang_thai">
                                <i class="bi bi-check-circle-fill me-1"></i> Hoạt động
                            </span>
                            <!-- <span class="badge bg-warning rounded-pill" id="detail_trang_thai">
                                <i class="bi bi-check-circle-fill me-1"></i> Không hoạt động
                            </span>
                            <span class="badge bg-danger rounded-pill" id="detail_trang_thai">
                                <i class="bi bi-check-circle-fill me-1"></i> Bị khoá
                            </span> -->
                        </div>
                    </div>

                    <div class="row g-0 border-top">
                        <div class="col-md-6 border-end p-4 bg-light bg-opacity-25">
                            <h6 class="text-uppercase text-muted fw-bold mb-3 small">Thông tin tài khoản</h6>

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-white p-2 rounded shadow-sm text-primary me-3">
                                    <i class="bi bi-envelope-fill fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Email</small>
                                    <span class="fw-semibold text-dark" id="detail_email">email@example.com</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="bg-white p-2 rounded shadow-sm text-primary me-3">
                                    <i class="bi bi-key-fill fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Chức vụ</small>
                                    <span
                                        class="mt-2 badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill"
                                        id="detail_chuc_vu">
                                        Nhân viên
                                    </span>
                                    <!-- <span
                                            class="mt-2 badge bg-primary bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill"
                                            id="detail_chuc_vu">
                                            Khách hàng
                                        </span> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 p-4">
                            <h6 class="text-uppercase text-muted fw-bold mb-3 small">Thông tin cá nhân</h6>

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light p-2 rounded text-secondary me-3">
                                    <i class="bi bi-telephone-fill fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Số điện thoại</small>
                                    <span class="fw-semibold" id="detail_sdt">0905 123 456</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light p-2 rounded text-secondary me-3">
                                    <i class="bi bi-calendar-event-fill fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Ngày sinh</small>
                                    <span class="fw-semibold" id="detail_ngay_sinh">01/01/1990</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="bg-light p-2 rounded text-secondary me-3">
                                    <i class="bi bi-person-vcard-fill fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Số CCCD</small>
                                    <span class="fw-semibold" id="detail_cccd">044123456789</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-top-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

};
</script>

<style></style>
