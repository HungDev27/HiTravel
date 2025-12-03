<template>
    <div class="container py-5 text-center">

        <h2 class="fw-bold mb-4">
            <i class="fa-solid fa-credit-card"></i> Kết quả thanh toán VNPay
        </h2>

        <!-- LOADING -->
        <div v-if="loading">
            <div class="spinner-border text-primary"></div>
            <p class="text-muted mt-2">Đang xác minh thanh toán...</p>
        </div>

        <!-- THÀNH CÔNG -->
        <div v-else-if="success" class="alert alert-success p-4 rounded-3 shadow">
            <h3 class="fw-bold mb-2">🎉 Thanh toán thành công!</h3>

            <p>Mã giao dịch: <b>{{ result.vnp_TxnRef }}</b></p>
            <p>Số tiền: 
                <span class="text-danger fw-bold">{{ formatVND(result.vnp_Amount / 100) }}</span>
            </p>

            <router-link to="/lich-su-dat-tour" class="btn btn-success mt-3">
                Xem lịch sử đơn hàng
            </router-link>
        </div>

        <!-- THẤT BẠI -->
        <div v-else class="alert alert-danger p-4 rounded-3 shadow">
            <h3 class="fw-bold mb-2">🚫 Thanh toán thất bại!</h3>
            <p>{{ result.message || "Giao dịch không hợp lệ" }}</p>

            <router-link to="/lich-su-dat-tour" class="btn btn-danger mt-3">
                Quay về lịch sử đơn hàng
            </router-link>
        </div>

    </div>
</template>

<script>
import axios from "axios"

export default {
    data() {
        return {
            loading: true,
            success: false,
            result: {},
        }
    },

    mounted() {
        this.checkPayment()
    },

    methods: {
        formatVND(value) {
            return new Intl.NumberFormat("vi-VN", {
                style: "currency",
                currency: "VND",
            }).format(value)
        },

        async checkPayment() {
            const params = new URLSearchParams(window.location.search);
            const query = Object.fromEntries(params.entries());

            try {
                const res = await axios.get(
                    "http://127.0.0.1:8000/api/payment/vnpay/return",
                    { params: query }
                );

                this.result = { ...query, ...res.data };

                this.success = res.data.status === true;

            } catch (e) {
                this.success = false;
                this.result.message = "Không thể xác minh giao dịch!";
            }

            this.loading = false;
        }
    }
}
</script>

<style>
.container {
    max-width: 600px;
}
</style>
