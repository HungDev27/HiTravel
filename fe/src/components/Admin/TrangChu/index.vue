<template>
    <div>
        <div class="container mt-0">

            <!-- ====== DOANH THU (FULL WIDTH) ====== -->
            <div class="card mb-3 text-white"
                style="background: linear-gradient(90deg,#5a2ad1,#7c4dff); border-radius:16px; padding:25px;">
                <h4 class="mb-1 mt-2" style="font-size:20px;"><b>Doanh thu (NET)</b></h4>

                <div class="d-flex align-items-center mb-3">
                    <h1 class="mb-0" style="font-size:38px; font-weight:700;">
                        {{ formatVND(doanh_thu_hom_nay) }}
                    </h1>

                    <span class="badge ms-3" :class="{
                        'bg-success text-white': phan_tram > 0,
                        'bg-danger text-white': phan_tram < 0,
                        'bg-secondary text-white': phan_tram === 0
                    }" style="font-size:14px;">
                        <span v-if="phan_tram > 0">⬆ Tăng {{ phan_tram }}%</span>
                        <span v-else-if="phan_tram < 0">⬇ Giảm {{ Math.abs(phan_tram) }}%</span>
                        <span v-else>Không đổi</span>
                    </span>

                    <span class="ms-2" style="font-size:15px;" v-if="hom_qua !== null">
                        <b>so với ngày {{ hom_qua }} ({{ formatVND(doanh_thu_hom_qua) }})</b>
                    </span>
                </div>
            </div>

            <!-- ====== 3 BOX THỐNG KÊ ====== -->
            <div class="row g-3">

                <!-- Tổng lượt booking -->
                <div class="col-md-6 col-lg-4">
                    <div class="card radius-10 border-top border-start border-0 border-5 border-info"
                        style="height: 85px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng số lượt booking</p>
                                    <h4 class="my-1 text-info">{{ tong_booking }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                    <i class="bx bxs-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tour đang hoạt động -->
                <div class="col-md-6 col-lg-4">
                    <div class="card radius-10 border-top border-start border-0 border-5 border-success"
                        style="height: 85px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng số tour đang hoạt động</p>
                                    <h4 class="my-1 text-success">{{ tong_tour_hoat_dong }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                    <i class="bx bxs-bar-chart-alt-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Người đăng ký -->
                <div class="col-md-6 col-lg-4">
                    <div class="card radius-10 border-top border-start border-0 border-5 border-warning"
                        style="height: 85px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Số người đăng ký</p>
                                    <h4 class="my-1 text-warning">{{ tong_nguoi_dung }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                                    <i class="bx bxs-group"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ====== Biểu đồ và table doanh thu ====== -->
            <div class="card radius-10 p-3 mb-3">
                <div class="row g-3">
                    <!-- Bên trái: table -->
                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">Thông tin Doanh thu</h5>
                            </div>
                            <div class="card-body p-2">
                                <table class="table table-sm table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Tháng</th>
                                            <th>Doanh Thu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in chartData.datasets[0]?.data ?? []" :key="index">
                                            <td>{{ chartData.labels[index] ?? '-' }}</td>
                                            <td>{{ formatVND(value) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Bên phải: chart -->
                    <div class="col-lg-8">
                        <div class="card h-100">
                            <div class="card-header" v-if="is_hien_thi">
                                <h5 class="mb-0">Thống Kê Doanh Thu Theo Tháng</h5>
                            </div>
                            <div class="card-body" style="height: 300px;">
                                <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Các bảng danh sách tour, booking, người dùng -->
            <!-- Có thể giữ nguyên các bảng hiện tại, chỉ thêm optional chaining nếu cần -->

        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { Bar } from 'vue-chartjs';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
} from 'chart.js';

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);

export default {
    components: { Bar },
    data() {
        return {
            list_don_dat_moi: [],
            list_tour_dat_nhieu: [],
            list_nguoi_dung: [],

            tong_booking: 0,
            tong_tour_hoat_dong: 0,
            tong_nguoi_dung: 0,

            doanh_thu_hom_nay: 0,
            doanh_thu_hom_qua: 0,
            phan_tram: 0,
            hom_qua: null,
            hom_nay: null,

            is_hien_thi: false,
            chartData: { labels: [], datasets: [] },
            chartOptions: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Biểu đồ thống kê doanh thu theo tháng' }
                }
            }
        };
    },
    mounted() {
        this.loadTongTourHoatDong();
        this.loadDoanhThuTheoNgay();
        this.thongKeDoanhThu();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number ?? 0);
        },

        loadDoanhThuTheoNgay() {
            axios.get("http://localhost:8000/api/admin/doanh-thu-ngay", {
                headers: { Authorization: "Bearer " + localStorage.getItem("auth_token") }
            })
                .then(res => {
                    if (res.data && res.data.status) {
                        this.doanh_thu_hom_nay = res.data.doanh_thu_hom_nay ?? 0;
                        this.doanh_thu_hom_qua = res.data.doanh_thu_hom_qua ?? 0;
                        this.phan_tram = res.data.phan_tram ?? 0;
                        this.hom_qua = res.data.ngay_hom_qua ?? null;
                        this.hom_nay = res.data.ngay_hom_nay ?? null;
                    }
                })
                .catch(err => console.error(err));
        },

        loadTongTourHoatDong() {
            axios.get("http://localhost:8000/api/admin/dashboard", {
                headers: { Authorization: "Bearer " + localStorage.getItem("auth_token") }
            })
                .then(res => {
                    if (res.data) {
                        this.tong_booking = res.data.tong_booking ?? 0;
                        this.tong_tour_hoat_dong = res.data.tong_tour_hoat_dong ?? 0;
                        this.tong_nguoi_dung = res.data.tong_nguoi_dung ?? 0;
                    }
                })
                .catch(err => console.error(err));
        },

        thongKeDoanhThu() {
            axios.get("http://localhost:8000/api/admin/thong-ke-doanh-thu", {
                headers: { Authorization: "Bearer " + localStorage.getItem("auth_token") }
            })
                .then(res => {
                    if (res.data && res.data.status) {
                        this.is_hien_thi = true;
                        this.chartData = {
                            labels: res.data.labels ?? [],
                            datasets: res.data.datasets ?? []
                        };
                    }
                })
                .catch(err => console.error(err));
        }
    }
};
</script>

<style>
/* Bạn có thể giữ nguyên style cũ */
</style>
