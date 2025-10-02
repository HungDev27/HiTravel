<template>
    <div>
        <div class="container">
            <div class="card radius-10 border-top border-0 border-3 border-primary">
                <div class="card-header mt-3">
                    <div class="d-flex justify-content-between">
                        <h3>Danh Sách Tour</h3>
                        <!-- <button class="btn btn-success">Xuất Excel</button> -->
                        <div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tìm kiếm ?"
                                    aria-describedby="basic-addon2">
                                <button class="btn btn-primary input-group-text" id="basic-addon2">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="text-center align-middle">
                            <tr class="bg-primary text-light">
                                <th class="align-middle text-center text-nowrap">#</th>
                                <th class="align-middle text-center text-nowrap">Tên Tour</th>
                                <th class="align-middle text-center text-nowrap">Xuất Phát</th>
                                <th class="align-middle text-center text-nowrap">Mô Tả</th>
                                <th class="align-middle text-center text-nowrap">Số Lượng</th>
                                <th class="align-middle text-center text-nowrap">Giá</th>
                                <th class="align-middle text-center text-nowrap">Ngày Bắt Đầu </th>
                                <th class="align-middle text-center text-nowrap">Ngày Kết Thúc</th>
                                <th class="align-middle text-center text-nowrap">Tình Trạng</th>
                                <th class="align-middle text-center text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, index) in list_tour" :key="index">
                                <td class="align-middle text-center">{{ index + 1 }}</td>
                                <td class="align-middle ">{{ value.ten_tour }}</td>
                                <td class="align-middle ">{{ value.xuat_phat }}</td>
                                <td class="align-middle ">{{ value.mo_ta }}</td>
                                <td class="align-middle text-center">{{ value.so_luong }} vé</td>
                                <td class="align-middle text-center">{{ value.gia }}</td>
                                <td class="align-middle text-center">{{ value.ngay_bat_dau }}</td>
                                <td class="align-middle text-center">{{ value.ngay_ket_thuc }}</td>
                                <td class=" text-nowrap text-center align-middle " style="width: 100px;">
                                    <button v-if="value.tinh_trang == 1" class="btn btn-sm btn-success">
                                        Hoạt Động
                                    </button>
                                    <button v-else type="button" class="btn btn-sm btn-warning">
                                        Tạm Dừng
                                    </button>
                                </td>
                                <td class="text-nowrap align-middle text-center" style="width: 150px;">
                                    <button type="button" class="btn btn-sm btn-info text-light" data-bs-toggle="modal"
                                        data-bs-target="#capNhatModal">
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
</template>
<script>
export default {
    data() {
        return {
            list_tour: [
                {
                    id: 1, ten_tour: "Du lịch Đà Nẵng mùa Thu - Huế - Động Thiên Đường 5N4Đ từ Sài Gòn 2025",
                    xuat_phat: "9 AM, 234 Điện Biên Phủ",
                    mo_ta: "Du lịch Đà Nẵng mùa Thu - Huế - Động Thiên Đường 5N4Đ từ Sài Gòn 2025 sẽ đưa du khách vào hành trình khám phá miền Trung đầy thơ mộng.",
                    so_luong: 35, gia: "6.000.000đ",
                    ngay_bat_dau: "2025-12-12", ngay_ket_thuc: "2025-12-17", tinh_trang: 1
                },
                {
                    id: 2, ten_tour: "Tour Hà Nội - Hạ Long - Ninh Bình 4N3Đ",
                    xuat_phat: "7 AM, 12 Nguyễn Trãi, Hà Nội",
                    mo_ta: "Khám phá vịnh Hạ Long kỳ quan thiên nhiên, cố đô Hoa Lư và Tràng An thơ mộng.",
                    so_luong: 40, gia: "5.500.000đ",
                    ngay_bat_dau: "2025-11-20", ngay_ket_thuc: "2025-11-24", tinh_trang: 1
                },
                {
                    id: 3, ten_tour: "Tour Sài Gòn - Phú Quốc 3N2Đ",
                    xuat_phat: "6 AM, 45 Trường Sơn, Tân Bình",
                    mo_ta: "Tận hưởng biển xanh cát trắng, khám phá Vinpearl Safari và thưởng thức hải sản Phú Quốc.",
                    so_luong: 30, gia: "4.200.000đ",
                    ngay_bat_dau: "2025-10-10", ngay_ket_thuc: "2025-10-12", tinh_trang: 1
                },
                {
                    id: 4, ten_tour: "Tour Miền Tây 2N1Đ - Cần Thơ - Chợ Nổi Cái Răng",
                    xuat_phat: "5 AM, Bến xe Miền Tây",
                    mo_ta: "Khám phá chợ nổi Cái Răng, thưởng thức ẩm thực miệt vườn đặc trưng miền Tây.",
                    so_luong: 25, gia: "2.200.000đ",
                    ngay_bat_dau: "2025-09-15", ngay_ket_thuc: "2025-09-16", tinh_trang: 0
                },
                {
                    id: 5, ten_tour: "Tour Đà Lạt 3N2Đ - Thành phố ngàn hoa",
                    xuat_phat: "10 PM, Bến xe miền Đông",
                    mo_ta: "Trải nghiệm khí hậu mát mẻ, thăm quan thung lũng tình yêu, vườn hoa Đà Lạt.",
                    so_luong: 28, gia: "3.500.000đ",
                    ngay_bat_dau: "2025-08-05", ngay_ket_thuc: "2025-08-07", tinh_trang: 1
                },
                {
                    id: 6, ten_tour: "Tour Huế - Đà Nẵng - Hội An 4N3Đ",
                    xuat_phat: "8 AM, 60 Lê Duẩn, Đà Nẵng",
                    mo_ta: "Khám phá cố đô Huế, phố cổ Hội An và các bãi biển đẹp tại Đà Nẵng.",
                    so_luong: 32, gia: "5.000.000đ",
                    ngay_bat_dau: "2025-07-12", ngay_ket_thuc: "2025-07-15", tinh_trang: 1
                },
                {
                    id: 7, ten_tour: "Tour Tây Bắc - Sapa - Fansipan 5N4Đ",
                    xuat_phat: "6 AM, Ga Hà Nội",
                    mo_ta: "Chinh phục nóc nhà Đông Dương Fansipan, tham quan bản làng Sapa, trải nghiệm văn hóa Tây Bắc.",
                    so_luong: 20, gia: "6.800.000đ",
                    ngay_bat_dau: "2025-06-01", ngay_ket_thuc: "2025-06-05", tinh_trang: 1
                },
                {
                    id: 8, ten_tour: "Tour Nha Trang - Vinpearl Land 3N2Đ",
                    xuat_phat: "7 AM, Sân bay Cam Ranh",
                    mo_ta: "Trải nghiệm thiên đường biển đảo Nha Trang, vui chơi giải trí tại Vinpearl Land.",
                    so_luong: 36, gia: "4.800.000đ",
                    ngay_bat_dau: "2025-05-10", ngay_ket_thuc: "2025-05-12", tinh_trang: 0
                },
                {
                    id: 9, ten_tour: "Tour Campuchia - Phnom Penh - Siem Reap 4N3Đ",
                    xuat_phat: "5 AM, Cửa khẩu Mộc Bài",
                    mo_ta: "Tham quan Angkor Wat, cung điện Hoàng gia và thưởng thức ẩm thực Campuchia đặc sắc.",
                    so_luong: 45, gia: "7.200.000đ",
                    ngay_bat_dau: "2025-04-18", ngay_ket_thuc: "2025-04-21", tinh_trang: 1
                },
                {
                    id: 10, ten_tour: "Tour Singapore - Malaysia 6N5Đ",
                    xuat_phat: "9 AM, Sân bay Tân Sơn Nhất",
                    mo_ta: "Khám phá Marina Bay Sands, Sentosa, Kuala Lumpur và trải nghiệm mua sắm tuyệt vời.",
                    so_luong: 50, gia: "15.000.000đ",
                    ngay_bat_dau: "2025-03-05", ngay_ket_thuc: "2025-03-10", tinh_trang: 1
                }
            ]

        }
    },
}
</script>
<style></style>