<template>
    <div class="container mt-2">
        <div class="card p-4">

            <h2 class="text-center mb-3"><b>Thêm Tour Du Lịch</b></h2>
            <hr />

            <!-- ============ BƯỚC 1: THÔNG TIN TOUR ============ -->
            <h5>Bước 1: Nhập thông tin tour</h5>
            <div class="row mt-2">

                <div class="col-md-6 mb-3">
                    <label>Tên tour *</label>
                    <input class="form-control" v-model="form.ten_tour" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Danh mục tour *</label>
                    <select class="form-select" v-model="form.id_danh_muc">
                        <option disabled value="">-- Chọn danh mục --</option>
                        <option v-for="(value, index) in danhMuc" :key="index" :value="value.id">
                            {{ value.ten_danh_muc }}
                        </option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Giá người lớn *</label>
                    <input type="number" class="form-control" v-model="form.gia_nguoi_lon" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Giá trẻ em *</label>
                    <input type="number" class="form-control" v-model="form.gia_tre_em" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Ngày đi *</label>
                    <input type="date" class="form-control" v-model="form.ngay_di" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Ngày về *</label>
                    <input type="date" class="form-control" v-model="form.ngay_ve" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Giờ đi *</label>
                    <input type="time" class="form-control" v-model="form.gio_di" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Giờ về *</label>
                    <input type="time" class="form-control" v-model="form.gio_ve" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Điểm xuất phát *</label>
                    <input class="form-control" v-model="form.dia_diem" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Số chỗ *</label>
                    <input type="number" class="form-control" v-model="form.so_cho" />
                </div>

                <div class="col-md-6 mb-3">
                    <label>Trạng thái *</label>
                    <select class="form-select" v-model="form.trang_thai">
                        <option value="hoat_dong">Hoạt động</option>
                        <option value="tam_dung">Tạm đóng</option>
                    </select>
                </div>
                

                <div class="col-12 mb-3">
                    <label>Mô tả *</label>
                    <textarea class="form-control" rows="4" v-model="form.mo_ta"></textarea>
                </div>
            </div>

            <hr />

            <!-- ============ BƯỚC 2: URL ẢNH TOUR ============ -->
            <h5>Bước 2: Thêm URL hình ảnh</h5>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nhập URL ảnh" v-model="newAnhUrl" />
                <button class="btn btn-primary" @click="themAnhUrl">Thêm ảnh</button>
            </div>

            <div class="row g-2">
                <div class="col-3" v-for="(img, index) in form.anh" :key="index">
                    <div class="border p-1 position-relative">
                        <img :src="img" class="w-100" style="height:120px;object-fit:cover" />
                        <button class="btn btn-danger btn-sm position-absolute top-0 end-0"
                            @click="xoaAnh(index)">X</button>
                    </div>
                </div>
            </div>

            <hr />

            <!-- ============ BƯỚC 3: LỊCH TRÌNH ============ -->
            <h5>Bước 3: Nhập lịch trình tour</h5>
            <button class="btn btn-primary btn-sm mb-3" @click="themNgayLichTrinh">
                + Thêm ngày
            </button>

            <div class="border rounded p-3 mb-3" v-for="(value, index) in form.lich_trinh" :key="index">
                <label>Ngày {{ index + 1 }}</label>
                <input class="form-control mb-2" placeholder="Tiêu đề ngày" v-model="value.tieu_de" />
                <textarea class="form-control mb-2" rows="3" placeholder="Nội dung chi tiết..."
                    v-model="value.noi_dung"></textarea>
                <button class="btn btn-danger btn-sm" @click="xoaNgayLichTrinh(index)">Xóa ngày</button>
            </div>

            <hr />

            <!-- SUBMIT -->
            <button class="btn btn-success" @click="themTour()">Thêm Tour</button>

        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            form: {
                ten_tour: "",
                id_danh_muc: "",
                mo_ta: "",
                gia_nguoi_lon: "",
                gia_tre_em: "",
                ngay_di: "",
                ngay_ve: "",
                gio_di: "",
                gio_ve: "",
                dia_diem: "",
                so_cho: "",
                trang_thai: "Hoạt động",
                anh: [], // array URL ảnh
                lich_trinh: []
            },
            newAnhUrl: "", // input thêm URL ảnh
            danhMuc: []
        };
    },
    mounted() {
        this.getListDanhMuc();
    },
    methods: {
        getListDanhMuc() {
            axios.get("http://127.0.0.1:8000/api/admin/danh-muc-tour/get-data")
                .then(res => {
                    this.danhMuc = res.data.data;
                });
        },

        themAnhUrl() {
            if (this.newAnhUrl.trim() !== "") {
                this.form.anh.push(this.newAnhUrl.trim());
                this.newAnhUrl = "";
            }
        },

        xoaAnh(index) {
            this.form.anh.splice(index, 1);
        },

        themNgayLichTrinh() {
            this.form.lich_trinh.push({ tieu_de: "", noi_dung: "" });
        },

        xoaNgayLichTrinh(index) {
            this.form.lich_trinh.splice(index, 1);
        },

        themTour() {
            // Tạo payload JSON
            const user = JSON.parse(localStorage.getItem("auth_user"));
            console.log("User đang login:", user);
            if (!user || user.id_chuc_vu !== 1) {
                this.$toast.error("Bạn không có quyền thêm tour");
                return;
            }
            const payload = {
                ...this.form
            };

            axios.post("http://127.0.0.1:8000/api/admin/them-tour", payload, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("auth_token")
                }
            })
                .then(res => {
                    this.$toast.success("Thêm tour thành công!");
                    // Reset form
                    this.form = {
                        ten_tour: "",
                        id_danh_muc: "",
                        mo_ta: "",
                        gia_nguoi_lon: "",
                        gia_tre_em: "",
                        ngay_di: "",
                        ngay_ve: "",
                        gio_di: "",
                        gio_ve: "",
                        dia_diem: "",
                        so_cho: "",
                        trang_thai: "Hoạt động",
                        anh: [],
                        lich_trinh: []
                    };
                })
                .catch(err => {
                    console.error(err.response?.data || err);
                    this.$toast.error("Có lỗi xảy ra!");
                });
        }
    }
};
</script>

<style scoped>
/* Bạn có thể thêm style nếu muốn */
</style>
