<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-warning">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">DANH SÁCH VOUCHER</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themMoiModal">
                        Thêm mới
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center align-middle">
                                <tr class="bg-primary text-light">
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center text-nowrap">
                                        Mã Voucher
                                    </th>
                                    <th class="align-middle text-center">Thời gian bắt đầu</th>
                                    <th class="align-middle text-center">Thời gian kết thúc</th>
                                    <th class="align-middle text-center">Số giảm giá</th>
                                    <th class="align-middle text-center">Số tiền tối đa</th>
                                    <th class="align-middle text-center">Số tiền giảm giá</th>
                                    <th class="align-middle text-center">Tình trạng</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center"></td>
                                    <td class="align-middle "></td>
                                    <td class="align-middle text-center"></td>
                                    <td class="align-middle text-center"></td>
                                    <td class="text-center align-middle"></td>
                                    <td class="text-center align-middle"></td>
                                    <td class="text-center align-middle"></td>
                                    <td class="text-center align-middle" style="width: 100px;">
                                        <button type="button" class="btn btn-sm btn-success">
                                            Hoạt Động
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning">
                                            Tạm Dừng
                                        </button>
                                    </td>
                                    <td class="text-nowrap align-middle text-center" style="width: 150px;">
                                        <button type="button" class="btn btn-sm btn-info text-light"
                                            data-bs-toggle="modal" data-bs-target="#capNhatModal">
                                            Cập Nhật
                                        </button>
                                        <button type="button" class="ms-2 btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#xoaModal">
                                            Xóa
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="mt-2">Mã Voucher</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian bắt đầu</label>
                            <input class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian kết thúc</label>
                            <input class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số giảm giá</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số tiền tối đa</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Số tiền giảm giá</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Tình trạng</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">Hiển thị</option>
                                <option value="0">Tạm tắt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Thêm Mới</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal thêm mới -->
    <!-- <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm mới voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="mt-2">Mã Voucher</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian bắt đầu</label>
                            <input class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian kết thúc</label>
                            <input class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số giảm giá</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số tiền tối đa</label>
                            <input " class=" form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Số tiền giảm giá</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Tình trạng</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">Hiển thị</option>
                                <option value="0">Tạm tắt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Thêm
                        Mới</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal cap nhat -->
    <!-- <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="mt-2">Mã Voucher</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian bắt đầu</label>
                            <input class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian kết thúc</label>
                            <input class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số giảm giá</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số tiền tối đa</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Số tiền giảm giá</label>
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Tình trạng</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">Hiển thị</option>
                                <option value="0">Tạm tắt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal xóa -->
    <!-- <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">Bạn có chắc chắn muốn xóa voucher
                                    <b>  </b>
                                    này không?
                                </h6>
                                <div class="text-dark"><b>Lưu ý: </b>Điều này không thể hoàn tác khi nhấn xác nhận</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy Bỏ</button>
                    <button  type="button" class="btn btn-danger" data-bs-dismiss="modal">Xác
                        Nhận</button>
                </div>
            </div>
        </div>
    </div> -->
</template>
<script>

export default {

} 
</script>
<style></style>