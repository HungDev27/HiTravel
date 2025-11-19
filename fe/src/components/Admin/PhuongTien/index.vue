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

                    <input v-model="create_phuongtien.ten_phuong_tien" type="text" placeholder="Tên phương tiện"
                        style="width: 100%; padding: 8px; margin-bottom: 10px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <input v-model="create_phuongtien.bien_so" type="text" placeholder="Biển số xe"
                        style="width: 100%; padding: 8px; margin-bottom: 10px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <input v-model="create_phuongtien.suc_chua" type="number" placeholder="Sức chứa"
                        style="width: 100%; padding: 8px; margin-bottom: 10px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <input v-model="create_phuongtien.so_luong" type="number" placeholder="Số lượng xe lưu thông"
                        style="width: 100%; padding: 8px; margin-bottom: 20px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <label><b>Ngày đi</b></label>
                    <input type="date" v-model="create_phuongtien.ngay_di"
                        style="width: 100%; padding: 8px; margin-bottom: 20px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <label><b>Ngày về</b></label>
                    <input type="date" v-model="create_phuongtien.ngay_ve"
                        style="width: 100%; padding: 8px; margin-bottom: 20px; border: none; border-bottom: 1px solid #ccc; outline: none; font-size: 14px; box-sizing: border-box;" />

                    <select class="form-select mb-3" aria-label="Default select example"
                        v-model="create_phuongtien.trang_thai">
                        <option selected disabled>Chọn trạng thái của xe</option>
                        <option value="0">Sẵn sàng</option>
                        <option value="1">Đang sử dụng</option>
                        <option value="2">Bảo trì</option>
                    </select>

                    <textarea placeholder="Ghi chú..." rows="4" class="form-control mb-3"
                        style="width: 100%; height: 80px;;padding: 8px; font-size: 14px; box-sizing: border-box;"></textarea>

                    <button v-on:click="themPhuongTien()"
                        style="width: 100%; background-color: #1976d2; color: white; padding: 10px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer;">
                        LƯU THÔNG TIN
                    </button>
                </div>

            </div>
            <div class="col-lg-9">
                <!-- card của phương tiện -->
                <div class="row">
                    <template v-for="(value, index) in phuongTiens" :key="index">
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card h-100"
                                style="border: none; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden;">
                                <div class="row g-0 h-100">

                                    <img src="../../../assets/images/homecustomer/bus.png" alt="Hình ảnh xe"
                                        style="width: auto; height: 130px; object-fit: cover; background-color: #f1f3f5;">

                                    <div class="col-md-8">
                                        <div class="card-body d-flex flex-column" style="padding: 16px; height: 100%;">

                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h5 style="font-weight: 700; color: #0d6efd; margin: 0;">Xe buýt công
                                                    cộng</h5>
                                                <span class="badge"
                                                    style="background-color: #ffe5e5; color: #dc3545; border: 1px solid rgba(220, 53, 69, 0.25); border-radius: 50px; padding: 6px 12px;">
                                                    <i class="bi bi-wrench-adjustable me-1"></i> Bảo trì
                                                </span>
                                            </div>

                                            <div class="row g-2 mt-1">
                                                <div class="col-4">
                                                    <div
                                                        style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 8px; display: flex; align-items: center;">
                                                        <i class="bi bi-postcard text-secondary"
                                                            style="font-size: 1.2rem; margin-right: 8px;"></i>
                                                        <div>
                                                            <small style="display: block; font-size: 0.7rem; color: #6c757d; line-height: 1;">Biển
                                                                số</small>
                                                            <span style="font-weight: 600; font-size: 0.9rem; color: #212529;">36B-12345</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div
                                                        style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 8px; display: flex; align-items: center;">
                                                        <i class="bi bi-people text-secondary"
                                                            style="font-size: 1.2rem; margin-right: 8px;"></i>
                                                        <div>
                                                            <small
                                                                style="display: block; font-size: 0.7rem; color: #6c757d; line-height: 1;">Sức
                                                                chứa</small>
                                                            <span
                                                                style="font-weight: 600; font-size: 0.9rem; color: #212529;">30
                                                                chỗ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div
                                                        style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 8px; display: flex; align-items: center;">
                                                        <i class="bi bi-people text-secondary"
                                                            style="font-size: 1.2rem; margin-right: 8px;"></i>
                                                        <div>
                                                            <small
                                                                style="display: block; font-size: 0.7rem; color: #6c757d; line-height: 1;">Số lượng lưu thông</small>
                                                            <span
                                                                style="font-weight: 600; font-size: 0.9rem; color: #212529;">30</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-auto d-flex justify-content-end"
                                                style="border-top: 1px solid #f0f0f0; padding-top: 12px; gap: 8px;">

                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#chitietModal"
                                                    style="background-color: #e7f1ff; color: #0d6efd; border: none; border-radius: 50px; padding: 6px 16px; font-weight: 500;">
                                                    <i class="bi bi-info-circle me-1"></i> Chi tiết
                                                </button>

                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#suaModal"
                                                    style="background-color: #fff3cd; color: #856404; border: none; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </button>

                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#xoaModal"
                                                    style="background-color: #f8d7da; color: #842029; border: none; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fa-regular fa-square-minus"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
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
                        style="width: 100%; height: 80px;;padding: 8px; font-size: 14px; box-sizing: border-box;">Chuyến xe
                    phục vụ tuyến số 8, khởi hành mỗi 15 phút từ 6:00 đến 18:00 hàng ngày.</textarea>
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
import axios from 'axios';
export default {
    data() {
        return {
            phuongTiens: [],
            list_phuongtiens: [],
            create_phuongtien: {
                trang_thai: 1,
            },
            edit_phuongtien: {},
            delete_phuongtien: {},
        };
    },
    mounted() {
        this.getPhuongTien();
        this.getTourPhuongTien();
        this.getTPTedit();
    },
    methods: {
        getPhuongTien() {
            axios.get('http://127.0.0.1:8000/api/admin/phuong-tien/get-data')
                .then((res) => {
                    this.phuongTiens = res.data.data;
                })
                .catch(error => {
                    console.error('Lỗi khi lấy dữ liệu phương tiện:', error);
                });
        },
        themPhuongTien() {
            axios.post('http://127.0.0.1:8000/api/admin/phuong-tien/add-data', this.create_phuongtien)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success('Thêm phương tiện thành công!');
                        this.create_phuongtien = {};
                        this.getPhuongTien();

                    } else {
                        this.$toast.error('Thêm phương tiện thất bại!');
                    }
                })

        },
        capNhatPhuongTien() {
            axios.post('http://127.0.0.1:8000/api/admin/phuong-tien/update', this.edit_phuongtien)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success('Cập nhật phương tiện thành công!');
                        this.edit_phuongtien = {};
                        this.getPhuongTien();

                    } else {
                        this.$toast.error('Cập nhật phương tiện thất bại!');
                    }
                })
        },
        xoaPhuongTien() {
            axios.post('http://127.0.0.1:8000/api/admin/phuong-tien/delete', this.delete_phuongtien)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success('Xoá phương tiện thành công!');
                        this.delete_phuongtien = {};
                        this.getPhuongTien();

                    } else {
                        this.$toast.error('Xoá phương tiện thất bại!');
                    }
                })
        },
        doiTrangThai(trangthai) {
            axios.post('http://127.0.0.1:8000/api/admin/phuong-tien/chang-status', trangthai)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getPhuongTien();
                    } else {
                        this.$toast.error('Đổi trạng thái thất bại!');
                    }
                })

        }
    },
    getTourPhuongTien() {
        if (this.create_phuongtien.id_phuong_tien) {
            axios.get('http://127.0.0.1:8000/api/admin/tour-pt/get-data/' + this.create_phuongtien.id_phuong_tien)
                .then((res) => {
                    this.list_phuongtiens = res.data.data;
                })
        }

    },
    getTPTedit() {
        if (this.edit_phuongtien.id_phuong_tien) {
            axios.get('http://127.0.0.1:8000/api/admin/tour-pt/get-data/' + this.edit_phuongtien.id_phuong_tien)
                .then((res) => {
                    this.list_phuongtiens = res.data.data;
                })
        }

    }

};
</script>
