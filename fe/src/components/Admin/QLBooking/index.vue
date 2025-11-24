<template>
    <div class="container">
        <div class="card border-0 shadow-sm" style="background: bisque;">
            <div class="card-body">

                <div class="row g-3 mb-4 align-items-end">
                    <div class="col-12 col-lg-4">
                        <h4 class="fw-bold mb-1" style="border-radius: 100px;">Danh sách Booking</h4>
                        <span class="text-secondary small">Quản lý và theo dõi các đơn hàng</span>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="row g-2 justify-content-lg-end align-items-end">
                            <div class="col-6 col-md-4 col-lg-3">
                                <label class="text-secondary fw-bold mb-1" style="font-size: 0.85rem;">Từ ngày</label>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <label class="text-secondary fw-bold mb-1" style="font-size: 0.85rem;">Đến ngày</label>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                            <div class="col-6 col-md-2 col-lg-auto">
                                <button class="btn btn-primary btn-sm w-100 text-white">
                                    <i class="fa-solid fa-magnifying-glass me-1"></i>Lọc
                                </button>
                            </div>
                            <div class="col-6 col-md-1 col-lg-auto">
                                <button class="btn btn-light btn-sm w-100 border text-secondary" title="Tải lại">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0" style="min-width: 1000px;">
                        <thead class="bg-light">
                            <tr style="font-size: 0.85rem;">
                                <th class="text-secondary text-uppercase py-3 ps-3">Mã đơn</th>
                                <th class="text-secondary text-uppercase py-3">Khách hàng</th>
                                <th class="text-secondary text-uppercase py-3">Thông tin Tour</th>
                                <th class="text-secondary text-uppercase py-3">Số khách</th>
                                <th class="text-secondary text-uppercase py-3">Ngày đặt</th>
                                <th class="text-secondary text-uppercase py-3 text-end">Tổng tiền</th>
                                <th class="text-secondary text-uppercase py-3 text-center">Trạng thái</th>
                                <th class="text-secondary text-uppercase py-3 text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary">#1234</span>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://i.pinimg.com/736x/cf/14/2f/cf142fd32c8e885a962f91cb42d79c87.jpg"
                                            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;"
                                            class="border shadow-sm me-2">

                                        <div class="d-flex flex-column lh-sm">
                                            <span class="fw-bold text-dark" style="font-size: 0.95rem;">Ngô Thị Thuý
                                                Nhi</span>
                                            <small class="text-muted" style="font-size: 0.8rem;">
                                                <i class="fa-solid fa-address-card me-1"></i>KH001
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold text-dark mb-1">Hạ Long Bay Cruise</span>
                                        <div class="mb-2">
                                            <span
                                                class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">
                                                <i class="fa-solid fa-ticket me-1"></i>Voucher: 10%
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-inline-flex align-items-center bg-white border rounded-pill px-3 py-1 shadow-sm"
                                        style="width: fit-content;">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold text-dark small me-1">1</span>
                                            <i class="fas fa-user text-secondary" style="font-size: 0.75rem;"></i>
                                        </div>
                                        <div class="border-start mx-2" style="height: 14px;"></div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-muted small me-1">2</span>
                                            <i class="fas fa-child text-secondary" style="font-size: 0.75rem;"></i>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold text-dark" style="font-size: 0.9rem;">13/05/2025</span>
                                        <small class="text-muted">18:00</small>
                                    </div>
                                </td>

                                <td class="text-end">
                                    <span class="fw-bold text-danger fs-6">5.000.000đ</span>
                                </td>

                                <td class="text-center">
                                    <span class="badge" style="background: #d8fbd0; color: limegreen;"><i
                                            class="fa-solid fa-circle fa-xs me-2" style="color: limegreen;"></i>Đã thanh
                                        toán</span>
                                    <!-- <span class="badge" style="background: khaki; color: darkorange;"><i
                                        class="fa-solid fa-circle fa-xs me-2" style="color: darkorange;"></i>Chờ xử
                                    lý</span>
                                <span class="badge" style="background: lightpink; color: crimson;"><i
                                        class="fa-solid fa-circle fa-xs me-2" style="color: crimson;"></i>Đã huỷ</span> -->
                                </td>

                                <td class="text-center">
                                    <button class="btn btn-link p-0 text-danger border-0 bg-transparent"
                                        title="Hủy đơn">
                                        <i class="fa-solid fa-circle-minus" style="font-size: 30px;"></i>
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
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number,);
        },
    }
}
</script>