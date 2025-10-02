<template>
    <div>
        <div class="contaner mt-0">
            <div class="row ">
                <div class="col-md-6 col-lg-3">
                    <div class="card radius-10 border-start border-0 border-3 border-danger" style="height: 85px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng Doanh Thu</p>
                                    <h4 class="my-1 text-danger">$84,245</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i
                                        class="bx bxs-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card radius-10 border-start border-0 border-3 border-info" style="height: 85px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng số lượt booking</p>
                                    <h4 class="my-1 text-info">4805</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                    <i class="bx bxs-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-6 col-lg-3">
                    <div class="card radius-10 border-start border-0 border-3 border-success" style="height: 85px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng số tour đang hoạt động</p>
                                    <h4 class="my-1 text-success">34.6%</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                    <i class="bx bxs-bar-chart-alt-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card radius-10 border-start border-0 border-3 border-warning" style="height: 85px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Số người đăng ký</p>
                                    <h4 class="my-1 text-warning">8.4K</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                                    <i class="bx bxs-group"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- biểu đồ cột thông kê theo tháng -->
            <div class="card radius-10">
                <div class="card-body">
                    <h4>Doanh Thu Theo Tháng</h4>
                    <hr>
                    <p>vẽ biểu đồ cột thông kê theo tháng</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi minima harum, ratione iure
                        necessitatibus quo a qui rerum sit, sapiente numquam labore. Animi suscipit, aut beatae eos est
                        ut earum?
                        Dolor ratione reiciendis voluptatibus fugit quasi molestias aperiam accusantium, voluptatum
                        autem facere natus eos odit quam, commodi itaque eum atque adipisci dicta! Impedit qui numquam
                        rerum doloribus reprehenderit voluptas nostrum!
                        Modi repellat dolorum facilis ad consequuntur tempora recusandae, dicta animi, accusamus beatae
                        necessitatibus. Natus, iste fuga. Facere maiores distinctio tempore dolorem dignissimos est
                        suscipit dicta, earum nesciunt labore exercitationem sunt!
                        Quibusdam, asperiores delect</p>
                </div>
            </div>
            <!-- chart thông kê danh sách tour & Dơm đặt mới -->
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card radius-10">
                        <div class="card-body">
                            <h4>Điểm điếm</h4>
                            <hr>
                            <p>Tổng hợp danh sách tour</p>

                            <p>chart</p>
                            <p>miền bắc</p>
                            <p>trung</p>
                            <p>nam</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card radius-10">
                        <div class="card-header">
                            <h4 class="mb-0">Đơn Đặt Mới</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>ID</th>
                                        <th>Họ và tên</th>
                                        <th>Tên Tours</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, index) in list_don_dat_moi.slice(0, 5)" :key="index">
                                        <td class="align-middle text-center">{{ index + 1 }}</td>
                                        <td class="align-middle ">{{ value.ho_ten }}</td>
                                        <td class="align-middle ">{{ value.ten_tour }}</td>
                                        <td class="align-middle ">{{ value.tong_tien }}</td>
                                        <td class="align-middle text-center">
                                            <span v-if="value.tinh_trang == 1"
                                                class="badge bg-primary rounded-pill">Hoàn Thành</span>
                                            <span v-else class="badge bg-danger rounded-pill">Chưa Thanh Toán</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary ">Xem Tất Cả</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Tour dặt nhiều & user -->
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card radius-10">
                        <div class="card-header">
                            <h4 class="mb-0">Tour được đặt nhiều nhất</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>ID</th>
                                        <th>Tên Tours</th>
                                        <th>Số chỗ đã đặt</th>
                                        <th>Số chỗ còn trống</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, index) in list_tour_dat_nhieu.slice(0, 5)" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ value.ten_tour }}</td>
                                        <td>{{ value.so_cho }}</td>
                                        <td>{{ value.so_cho_con }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary ">Xem Tất Cả</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card radius-10">
                        <div class="card-header">
                            <h4 class="mb-0">Danh Sách Người Dùng</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>ID</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Số Điện THoại</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, index) in list_nguoi_dung.slice(0, 5)" :key="index">
                                        <td class="align-middle text-center">{{ index + 1 }}</td>
                                        <td class="align-middle ">{{ value.ho_ten }}</td>
                                        <td class="align-middle ">{{ value.email }}</td>
                                        <td class="align-middle ">{{ value.sdt }}</td>
                                        <td class="align-middle text-center">
                                            <span v-if="value.tinh_trang == 1"
                                                class="badge bg-primary rounded-pill">Hoạt Động</span>
                                            <span v-else class="badge bg-warning rounded-pill">Chưa Kích Hoạt</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary ">Xem Tất Cả</button>
                        </div>
                    </div>
                </div>
            </div>






        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            list_don_dat_moi: [
                { id: 1, ho_ten: "Lê Văn A", ten_tour: "MIỀN TRUNG 4N2Đ | ĐÀ NẴNG - HỘI AN - HUẾ", tong_tien: "6.000.000", tinh_trang: 1 },
                { id: 2, ho_ten: "Nguyễn Thị B", ten_tour: "MIỀN BẮC 5N4Đ | HÀ NỘI - SAPA - HẠ LONG", tong_tien: "8.500.000", tinh_trang: 1 },
                { id: 3, ho_ten: "Trần Văn C", ten_tour: "MIỀN NAM 3N2Đ | SÀI GÒN - CẦN THƠ - CHÂU ĐỐC", tong_tien: "4.200.000", tinh_trang: 2 },
                { id: 4, ho_ten: "Phạm Thị D", ten_tour: "MIỀN TRUNG 6N5Đ | ĐÀ NẴNG - HUẾ - QUẢNG BÌNH", tong_tien: "9.000.000", tinh_trang: 1 },
                { id: 5, ho_ten: "Hoàng Văn E", ten_tour: "MIỀN BẮC 4N3Đ | HÀ NỘI - NINH BÌNH - HẠ LONG", tong_tien: "7.200.000", tinh_trang: 2 },
                { id: 6, ho_ten: "Đỗ Thị F", ten_tour: "MIỀN NAM 5N4Đ | SÀI GÒN - PHÚ QUỐC", tong_tien: "10.000.000", tinh_trang: 1 },
                { id: 7, ho_ten: "Ngô Văn G", ten_tour: "MIỀN TRUNG 3N2Đ | QUY NHƠN - PHÚ YÊN", tong_tien: "5.500.000", tinh_trang: 2 },
                { id: 8, ho_ten: "Bùi Thị H", ten_tour: "MIỀN BẮC 6N5Đ | HÀ GIANG - SAPA - HẠ LONG", tong_tien: "11.000.000", tinh_trang: 1 },
                { id: 9, ho_ten: "Vũ Văn I", ten_tour: "MIỀN NAM 4N3Đ | SÀI GÒN - VŨNG TÀU - MŨI NÉ", tong_tien: "6.800.000", tinh_trang: 2 },
                { id: 10, ho_ten: "Lý Thị K", ten_tour: "MIỀN TRUNG 5N4Đ | ĐÀ NẴNG - HỘI AN - QUẢNG NGÃI", tong_tien: "8.000.000", tinh_trang: 1 }
            ],
            list_tour_dat_nhieu: [
                { id: 1, ten_tour: "MIỀN TRUNG 4N2Đ | ĐÀ NẴNG - HỘI AN - HUẾ", so_cho: 40, so_cho_con: 3 },
                { id: 2, ten_tour: "HÀ NỘI - SAPA 3N2Đ | BẢN CÁT CÁT - FANSIPAN", so_cho: 35, so_cho_con: 5 },
                { id: 3, ten_tour: "PHÚ QUỐC 4N3Đ | VINWONDERS - SAFARI", so_cho: 50, so_cho_con: 12 },
                { id: 4, ten_tour: "NHA TRANG 3N2Đ | ĐẢO HÒN MUN - VINPEARL", so_cho: 45, so_cho_con: 8 },
                { id: 5, ten_tour: "MIỀN TÂY 2N1Đ | CHỢ NỔI CÁI RĂNG - CỒN PHỤNG", so_cho: 30, so_cho_con: 2 },
                { id: 6, ten_tour: "HUẾ - ĐÀ NẴNG - HỘI AN 5N4Đ", so_cho: 60, so_cho_con: 15 },
                { id: 7, ten_tour: "ĐÀ LẠT 3N2Đ | THÁC DATANLA - LÀNG CÙ LẦN", so_cho: 40, so_cho_con: 6 },
                { id: 8, ten_tour: "CÔN ĐẢO 4N3Đ | NGHĨA TRANG HÀNG DƯƠNG", so_cho: 25, so_cho_con: 1 }
            ],
            list_nguoi_dung: [
                { id: 1, ho_ten: "Nguyễn Thị B", email: "bkasdbasduh@gmail.com", sdt: "0963467238", tinh_trang: 1 },
                { id: 2, ho_ten: "Trần Văn A", email: "tranvana@example.com", sdt: "0912345678", tinh_trang: 1 },
                { id: 3, ho_ten: "Lê Thị C", email: "lethic@example.com", sdt: "0987654321", tinh_trang: 0 },
                { id: 4, ho_ten: "Phạm Văn D", email: "phamvand@example.com", sdt: "0934567890", tinh_trang: 1 },
                { id: 5, ho_ten: "Hoàng Thị E", email: "hoangthie@example.com", sdt: "0978123456", tinh_trang: 1 },
                { id: 6, ho_ten: "Đỗ Văn F", email: "dovanf@example.com", sdt: "0956781234", tinh_trang: 0 },
                { id: 7, ho_ten: "Vũ Thị G", email: "vuthig@example.com", sdt: "0945123789", tinh_trang: 1 },
                { id: 8, ho_ten: "Ngô Văn H", email: "ngovanh@example.com", sdt: "0923456789", tinh_trang: 1 },
                { id: 9, ho_ten: "Bùi Thị I", email: "buithii@example.com", sdt: "0998765432", tinh_trang: 0 },
                { id: 10, ho_ten: "Mai Văn K", email: "maivank@example.com", sdt: "0901234987", tinh_trang: 1 }
            ]



        }
    },
}
</script>
<style></style>