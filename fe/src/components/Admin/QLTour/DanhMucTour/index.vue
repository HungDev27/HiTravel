<template>
    <div class="container mt-4">

        <!-- Card -->
        <div class="card radius-10 border-top border-0 border-3 border-primary">

            <div class="card-header mt-3">
                <div class="d-flex justify-content-between">
                    <h3>Quản Lý Danh Mục Tour</h3>

                    <!-- BUTTON THÊM -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fa-solid fa-plus"></i> <b>Thêm Danh Mục Mới</b>
                    </button>
                </div>

                <!-- Search -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group mb-3 mt-3">
                            <input v-model="tim_kiem.ten_danh_muc" type="text" class="form-control"
                                placeholder="Tìm kiếm ?" v-on:keyup="timKiem()">
                            <button @click="timKiem()" class="btn btn-primary input-group-text">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="text-center align-middle">
                        <tr class="bg-primary text-light">
                            <th class="text-nowrap">ID</th>
                            <th class="text-nowrap">Tên Danh Mục Tour</th>
                            <th class="text-nowrap">Mô Tả</th>
                            <th class="text-nowrap">Hành Động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(item, index) in list_danh_muc" :key="index">
                            <td class="text-center align-middle">{{ item.id }}</td>
                            <td class="align-middle">{{ item.ten_danh_muc }}</td>
                            <td class="align-middle">{{ item.mo_ta }}</td>

                            <td class="text-center text-nowrap">

                                <!-- BUTTON SỬA -->
                                <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                                    data-bs-target="#editModal" v-on:click="Object.assign(update_danh_muc, item)">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <!-- BUTTON XOÁ -->
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" v-on:click="Object.assign(delete_danh_muc, item)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>


        <!-- ========================================================= -->
        <!--                     MODAL THÊM DANH MỤC                  -->
        <!-- ========================================================= -->
        <div class="modal fade" id="addModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Thêm Danh Mục Mới</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Tên Danh Mục</label>
                            <input v-model="them_danh_muc_tour.ten_danh_muc" type="text" class="form-control"
                                placeholder="Nhập tên danh mục">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô Tả</label>
                            <textarea v-model="them_danh_muc_tour.mo_ta" class="form-control"
                                placeholder="Nhập mô tả"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button class="btn btn-primary" data-bs-dismiss="modal" @click="themDanhMuc()">Thêm</button>
                    </div>

                </div>
            </div>
        </div>



        <!-- ========================================================= -->
        <!--                     MODAL SỬA DANH MỤC                   -->
        <!-- ========================================================= -->
        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Chỉnh Sửa Danh Mục</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Tên Danh Mục</label>
                            <input v-model="update_danh_muc.ten_danh_muc" type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô Tả</label>
                            <textarea v-model="update_danh_muc.mo_ta" class="form-control"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button class="btn btn-primary" data-bs-dismiss="modal" @click="updateDanhMuc()">Cập
                            nhật</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- ========================================================= -->
        <!--                     MODAL XÓA DANH MỤC                   -->
        <!-- ========================================================= -->
        <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Xác Nhận Xóa</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa danh mục tour <b class="text-center text-danger">
                                {{ delete_danh_muc.ten_danh_muc }}
                            </b> này?</p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" v-on:click="xoaDanhMuc()">Xóa</button>
                    </div>

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
            list_danh_muc: [],
            them_danh_muc_tour: {
                "ten_danh_muc": "",
                "mo_ta": ""
            },
            update_danh_muc: {},
            delete_danh_muc: {},
            tim_kiem: {
                ten_danh_muc: ''
            },
        }
    },
    mounted() {
        this.getListDanhMuc();
    },
    methods: {
        getListDanhMuc() {
            axios.get('http://127.0.0.1:8000/api/admin/danh-muc-tour/get-data')
                .then(res => {
                    this.list_danh_muc = res.data.data;
                });
        },
        themDanhMuc() {
            axios.post('http://127.0.0.1:8000/api/admin/danh-muc-tour/add-data', this.them_danh_muc_tour, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.them_danh_muc_tour = {};
                        this.getListDanhMuc();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                });
        },
        updateDanhMuc() {
            axios.post('http://127.0.0.1:8000/api/admin/danh-muc-tour/update', this.update_danh_muc, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getListDanhMuc();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                });
        },
        xoaDanhMuc() {
            axios.post('http://127.0.0.1:8000/api/admin/danh-muc-tour/delete', this.delete_danh_muc, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getListDanhMuc();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                });
        },
        timKiem() {
            axios.post('http://127.0.0.1:8000/api/admin/danh-muc-tour/tim-kiem', this.tim_kiem)
                .then((res) => {
                    this.list_danh_muc = res.data.data;
                });
        },
    },
}
</script>

<style>
/* Thêm CSS nếu cần */
</style>   