<template>
    <div class="container">
        <div class="row">

            <!-- Thêm mới -->
            <div class="col-lg-3">
                <div
                    style="font-family: Arial, sans-serif; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 20px;">
                    <div
                        style="background: #1976d2; color: #fff; margin: -20px -20px 20px -20px; padding: 12px; border-top-left-radius: 8px; border-top-right-radius: 8px; font-size: 16px; text-align: center;">
                        THÊM PHƯƠNG TIỆN MỚI
                    </div>

                    <input type="text" placeholder="Tên phương tiện"
                        style="width: 100%; padding: 8px; margin-bottom: 10px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <input type="text" placeholder="Biển số xe"
                        style="width: 100%; padding: 8px; margin-bottom: 10px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <input type="number" placeholder="Sức chứa"
                        style="width: 100%; padding: 8px; margin-bottom: 10px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <input type="number" placeholder="Số lượng xe lưu thông"
                        style="width: 100%; padding: 8px; margin-bottom: 20px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <label><b>Ngày đi</b></label>
                    <input type="date"
                        style="width: 100%; padding: 8px; margin-bottom: 20px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <label><b>Ngày về</b></label>
                    <input type="date"
                        style="width: 100%; padding: 8px; margin-bottom: 20px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected disabled>Chọn trạng thái của xe</option>
                        <option value="0">Sẵn sàng</option>
                        <option value="1">Đang sử dụng</option>
                        <option value="2">Bảo trì</option>
                    </select>

                    <textarea placeholder="Ghi chú..." rows="4" class="form-control mb-3"
                        style="width: 100%; height: 80px;;padding: 8px; font-size: 14px; box-sizing: border-box;"></textarea>

                    <button
                        style="width: 100%; background-color: #1976d2; color: white; padding: 10px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer;">
                        LƯU THÔNG TIN
                    </button>
                </div>

            </div>
            <div class="col-lg-9">
                <!-- card của phương tiện -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card-group" role="group">
                            <img src="https://cmu-cdn.vinfast.vn/2023/11/42712f26-busvf.jpg"
                                style="height: 170px; width: 200px;" class="img-fluid rounded-start">
                            <div class="card" style="height: 170px;">
                                <div class="card-body" style="width: 270px;">
                                    <div class="row">
                                        <div class="d-flex justify-content-between">

                                            <!-- Thông tin trong card -->
                                            <div>
                                                <h5>Xe buýt</h5>
                                                <p class="card-text">
                                                    <!-- Thuộc tính của phương tiện -->
                                                    <span><b>Biển số: </b>36B-12345</span>
                                                    <br>
                                                    <span><b>Sức chứa: </b>30</span>
                                                    <br>

                                                    <!-- Tình trạng của phương tiện -->
                                                    <span class="badge text-bg-danger mt-3">Bảo trì</span>
                                                    <!-- <span class="badge text-bg-warning">Đang sử dụng</span>
                                                    <span class="badge text-bg-success">Sẵn sàng</span> -->
                                                </p>
                                            </div>
                                            <div class="text-end">
                                                <!-- Các nút button -->
                                                <button
                                                    style="border-radius: 100px; width: 85px; height: 30px; line-height: 0px;"
                                                    class="mt-2 btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#chitietModal">Chi tiết</button>
                                                <br>
                                                <button
                                                    style="border-radius: 100px; width: 80px; height: 30px; line-height: 0px;"
                                                    class="mt-2 btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#suaModal">Sửa</button>
                                                <br>
                                                <button
                                                    style="border-radius: 100px; width: 80px; height: 30px; line-height: 0px;"
                                                    class="mt-2 btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#xoaModal">Xóa</button>
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

    <!-- Modal Chi tiết phương tiện -->
    <div class="modal fade" id="chitietModal" tabindex="-1" aria-labelledby="chitietModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="chitietModalLabel">Chi Tiết Xe Buýt</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <p><strong>Tên phương tiện:</strong> Xe buýt</p>
                    <p><strong>Biển số:</strong> 51B-123.45</p>
                    <p><strong>Sức chứa:</strong> 30 chỗ</p>
                    <p><strong>Số lượng xe lưu thông:</strong> 10</p>
                    <p><strong>Ngày đi:</strong> 12/11/2025</p>
                    <p><strong>Ngày về:</strong> 12/12/2025</p>
                    <p><strong>Trạng thái:</strong> <span class="badge text-bg-danger">Bảo trì</span></p>
                    <p><strong>Ghi chú:</strong></p>
                    <textarea rows="4" class="form-control mb-3"
                        style="width: 100%; height: 80px;;padding: 8px; font-size: 14px; box-sizing: border-box;">Chuyến xe phục vụ tuyến số 8, khởi hành mỗi 15 phút từ 6:00 đến 18:00 hàng ngày.</textarea>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal sửa -->
    <div class="modal fade" id="suaModal" tabindex="-1" aria-labelledby="suaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="suaModalLabel">Sửa Thông Tin Xe Buýt</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <form id="formSuaXe">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Tên phương tiện" name="ten_xe">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Biển số xe" name="bien_so">
                        </div>

                        <div class="mb-3">
                            <input type="number" class="form-control" placeholder="Sức chứa" name="suc_chua">
                        </div>

                        <div class="mb-3">
                            <input type="number" class="form-control" placeholder="Số lượng xe lưu thông"
                                name="so_luong">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày đi</label>
                            <input type="date" class="form-control" name="ngay_di">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày về</label>
                            <input type="date" class="form-control" name="ngay_ve">
                        </div>

                        <div class="mb-3">
                            <select class="form-select mb-3" aria-label="Default select example">
                                <option selected disabled>Chọn trạng thái của xe</option>
                                <option value="0">Sẵn sàng</option>
                                <option value="1">Đang sử dụng</option>
                                <option value="2">Bảo trì</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" name="ghi_chu" rows="3" placeholder="Ghi chú..."></textarea>
                        </div>

                    </form>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" form="formSuaXe" class="btn btn-primary">Sửa thông tin</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Xác Nhận Xoá Đẹp Mắt -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">

                <!-- Header đỏ đậm -->
                <div class="modal-header bg-danger text-white border-0">
                    <h5 class="modal-title" id="xoaModalLabel">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Xác nhận xoá
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Đóng"></button>
                </div>

                <!-- Body có biểu tượng cảnh báo -->
                <div class="modal-body text-center p-4">

                    <div style="font-size: 48px; color: #dc3545;">
                        <i class="bi bi-trash-fill"></i>
                    </div>

                    <p class="mt-3 fs-5 fw-semibold text-dark">Bạn có chắc chắn muốn xoá xe buýt này?</p>
                    <p class="text-secondary" id="thongTinXeCanXoa">Biển số: <span class="fw-bold">12G12345</span></p>

                </div>

                <!-- Footer hành động -->
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger px-4" id="btnXacNhanXoa">Xoá</button>
                </div>

            </div>
        </div>
    </div>




</template>

<script>
export default {

};
</script>
