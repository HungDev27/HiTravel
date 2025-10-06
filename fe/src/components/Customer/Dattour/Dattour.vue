<template>
    <div class="container">
        <h1 class="text-primary text-center mt-3 mb-5">Đặt tour</h1>
        <div class="row">
            <div class="col-lg-7">
                <h5 class="mb-3"><b>Thông tin liên lạc</b></h5>
                <div class="alert alert-primary" role="alert">
                    <i class="fa-solid fa-circle-user me-2 fa-xl"></i><a href="#" class="text-primary"><b>Đăng
                            nhập</b></a> để nhận ưu đãi, tích điểm và quản lý đơn hàng dễ dàng hơn!
                </div>

                <!-- Nhập thông tin liên hệ -->
                <div class="row">
                    <div class="col-lg-6">
                        <label><b>Họ tên <strong class="text-danger">*</strong></b></label>
                        <input type="text" placeholder="Liên hệ" class="form-control mt-1"
                            style="border: none; border-radius: 0; box-shadow: none; padding-left: 0;">
                    </div>
                    <div class="col-lg-6 border-start">
                        <label><b>Điện thoại <strong class="text-danger">*</strong></b></label>
                        <input class="form-control mt-1" type="phone" placeholder="Nhập số điện thoại"
                            style="border: none; border-radius: 0; box-shadow: none; padding-left: 0;">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-6">
                        <label><b>Email <strong class="text-danger">*</strong></b></label>
                        <input type="text" placeholder="Nhập email" class="form-control mt-1"
                            style="border: none; border-radius: 0; box-shadow: none; padding-left: 0;">
                    </div>
                    <div class="col-lg-6 border-start">
                        <label><b>Địa chỉ</b></label>
                        <input class="form-control mt-1" type="phone" placeholder="Nhập địa chỉ"
                            style="border: none; border-radius: 0; box-shadow: none; padding-left: 0;">
                    </div>
                </div>

                <!-- Nhập số lượng người -->
                <h5 class="mt-4 mb-3"><b>Hành khách</b></h5>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Người lớn -->
                        <div class="card" style="background-color: transparent; border: none;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <!-- Thông tin người lớn -->
                                    <div>
                                        <div><b>Người lớn</b></div>
                                        <small class="text-muted">
                                            Từ 12 trở lên
                                            <i class="fa-solid fa-circle-info ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Sinh trước năm 2013"></i>
                                        </small>
                                    </div>

                                    <!-- Bộ đếm: Căn giữa theo chiều dọc -->
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn btn-outline-dark btn-sm" @click="changeCount(-1)">–</button>
                                        <span style="min-width: 20px; text-align: center;">{{ count }}</span>
                                        <button class="btn btn-outline-dark btn-sm" @click="changeCount(1)">+</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Trẻ em -->
                        <div class="card" style="background-color: transparent; border: none;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <!-- Thông tin Trẻ em -->
                                    <div>
                                        <div><b>Trẻ em</b></div>
                                        <small class="text-muted">
                                            Dưới 11 tuổi trở xuống
                                            <i class="fa-solid fa-circle-info ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Sinh trước năm 2023"></i>
                                        </small>
                                    </div>

                                    <!-- Bộ đếm: Căn giữa theo chiều dọc -->
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn btn-outline-dark btn-sm" @click="changeCount(-1)">–</button>
                                        <span style="min-width: 20px; text-align: center;">{{ count }}</span>
                                        <button class="btn btn-outline-dark btn-sm" @click="changeCount(1)">+</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Ghi chú -->
                <h5 class="mt-4 mb-3"><b>Ghi chú</b></h5>
                <span>Quý khách có ghi chú lưu ý gì, hãy nói với chúng tôi</span>
                <textarea class="form-control mt-2" placeholder="Vui lòng nhập nội dung lời nhắn bằng Tiếng Anh hoặc Tiếng Việt" style="background-color: #FAFAFA;"></textarea>

            </div>

            <!-- Card bên phải -->
            <div class="col-lg-5">
                <h5 class="mb-3"><b>Tóm tắt chuyến đi</b></h5>
                <div class="card" style="background-color: #FAFAFA;">
                    <div class="card-body">

                        <!-- Hình ảnh và tiêu đề -->
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2">
                                <img src="https://i.pinimg.com/736x/b9/9f/a5/b99fa5e3c5a558f6a4c19ce4f518a5ff.jpg"
                                    style="border-radius: 10px; height: 130px; width: 160px;">
                            </div>
                            <div class="p-2">
                                <b>Siêu Sale 🔥 Hàn Quốc: Seoul - Đảo Nami - Công viên Everland - Panda World - Phố
                                    Insa-dong - Công viên Hồ Cheongna (3 đêm khách sạn)</b>
                                <p class="mt-2"><i class="fa-solid fa-ticket me-2"></i>Mã tour: <b>NT122</b></p>
                            </div>
                        </div>
                        <hr>

                        <!-- Thông tin bay -->
                        <img src="../../../assets/images/homecustomer/plane1.png" class="me-2"><b
                            style="font-size: 18px;">Thông tin chuyến bay</b>
                        <!-- Nội dung -->
                        <div class="d-flex mt-3">
                            <div class="pe-3" style="margin-right: 10px;">
                                <b>Ngày đi - 10/10/2025</b>
                                <div class="mt-2" style="display: flex; flex-direction: column; align-items: center;">
                                    <!-- Mốc thời gian -->
                                    <div
                                        style="display: flex; justify-content: space-between; width: 100%; font-weight: bold;">
                                        <span>11:35</span>
                                        <span>20:40</span>
                                    </div>

                                    <!-- Thanh ngang -->
                                    <div style="position: relative; width: 220px; height: 10px; margin-top: 5px;">
                                        <div
                                            style="height: 2px; width: 100%; background: #bbb; position: absolute; top: 4px; left: 0;">
                                        </div>
                                        <div
                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; left: 0; top: 0; border-radius: 2px;">
                                        </div>
                                        <div
                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; right: -1px; top: 0; border-radius: 2px;">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="ps-3 border-start mb-3">
                                <b>Ngày về - 10/10/2025</b>
                                <div class="mt-2" style="display: flex; flex-direction: column; align-items: center;">
                                    <!-- Mốc thời gian -->
                                    <div
                                        style="display: flex; justify-content: space-between; width: 100%; font-weight: bold;">
                                        <span>11:35</span>
                                        <span>20:40</span>
                                    </div>

                                    <!-- Thanh ngang -->
                                    <div style="position: relative; width: 220px; height: 10px; margin-top: 5px;">
                                        <div
                                            style="height: 2px; width: 100%; background: #bbb; position: absolute; top: 4px; left: 0;">
                                        </div>
                                        <div
                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; left: 0; top: 0; border-radius: 2px;">
                                        </div>
                                        <div
                                            style="width: 9px; height: 9px; background: #aaa; position: absolute; right: -1px; top: 0; border-radius: 2px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <!-- Khách hàng + Phụ thu -->
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <img src="../../../assets/images/homecustomer/people.png" class="me-2"><b
                                    style="font-size: 18px;">Khách hàng + Phụ thu: </b>
                            </div>
                            <b class="text-danger" style="font-size: 18px;">140000000</b>
                        </div>
                        <!-- Người lớn -->
                        <div style="display: flex; justify-content: space-between;">
                            <span style="font-size: 15px; margin-top: 10px;">Người lớn: </span>
                            <b style="font-size: 16px;">1 x 140000000</b>
                        </div>
                        <!-- Trẻ em -->
                        <div style="display: flex; justify-content: space-between;">
                            <span style="font-size: 15px; margin-top: 10px;">Trẻ em: </span>
                            <b style="font-size: 16px;">1 x 130000000</b>
                        </div>
                        <!-- Phụ thu phòng đơn -->
                        <div style="display: flex; justify-content: space-between;">
                            <span style="font-size: 15px; margin-top: 10px;">Phụ thu phòng đơn: </span>
                            <b style="font-size: 16px;">0</b>
                        </div>
                        <hr>
                        <!-- Voucher -->
                        <div class="mt-3 mb-3" style="display: flex; justify-content: space-between;">
                            <div>
                                <img alt="alt" title="voucher" loading="lazy" width="25" height="25" decoding="async"
                                    data-nimg="1" src="../../../assets/images/homecustomer/voucher.gif"
                                    style="color: transparent; max-width: 100%; margin-right: 10px;">
                                <b style="font-size: 18px;">Mã giảm giá: </b>
                            </div>
                            <div data-bs-toggle="modal" data-bs-target="#voucher">
                                <i class="fa-solid fa-circle-plus me-2 text-danger"></i>
                                <b class="text-danger" style="font-size: 18px;">Thêm mã giảm giá: </b>
                            </div>
                        </div>
                        <hr>
                        <!-- Chính sách bảo mật và điều khoản -->
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="agreePolicy">
                            <label class="form-check-label" for="agreePolicy">
                                Tôi đồng ý với
                                <a href="#" class="text-primary fw-semibold">Chính sách</a>
                                bảo vệ dữ liệu cá nhân và
                                <a href="#" class="text-primary fw-semibold">các điều khoản</a>.
                            </label>
                        </div>
                        <!-- Tổng tiền -->
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h3><b>Tổng tiền</b></h3>
                            <h3><b class="text-danger">200000000</b></h3>
                        </div>
                        <!-- Nút đặt ngay -->
                        <button class="btn btn-danger w-100 mt-3" style="font-size: 18px;"><b>Đặt ngay</b></button>
                    </div>
                </div>

                <!-- Liên hệ -->
                <div class="text-end"><button class="btn btn-outline-primary mb-3"><i
                            class="fa-solid fa-envelope-open me-2"></i>Liên hệ tư
                        vấn</button></div>

            </div>
        </div>
    </div>

    <!-- Modal mã giảm giá -->
    <div class="modal fade" id="voucher" tabindex="-1" aria-labelledby="voucherLabel" aria-hidden="true"
        style="top: 200px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="voucherLabel"><i class="fa-solid fa-ticket me-2"
                            style="color: #ff3300;"></i>Sử dụng mã giảm giá</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="d-flex">
                        <input class="form-control me-2" placeholder="Thêm mã giảm giá" />
                        <button class="btn btn-outline-success text-nowrap" type="submit">Sử dụng</button>
                    </form>
                </div>
                <div class="modal-footer">
                    * Đã hiển thị hết mã ưu đãi bạn có thể sử dụng
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Tooltip } from 'bootstrap';
export default {
    mounted() {
        // Kích hoạt tất cả tooltip có data-bs-toggle="tooltip"
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltipTriggerList.forEach((el) => new Tooltip(el));
    },
    data() {
        return {
            count: 1 // số lượng người lớn mặc định
        };
    },
    methods: {
        changeCount(delta) {
            this.count = Math.max(1, this.count + delta);
        }
    }
};
</script>
<style></style>