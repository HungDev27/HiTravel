<template>
    <div class="container">
        <div class="rbac-container row g-0 rounded-4 overflow-hidden shadow-lg" style="min-height: 80vh;">

            <!-- CHỨC VỤ -->
            <div class="col-lg-4 text-white d-flex flex-column border-end border-secondary h-100"
                style="background: #3A3E44; min-height: 100vh;">

                <!-- Tiêu đề -->
                <div class="px-3 pt-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-user-shield fa-lg text-primary"></i>
                        <span class="ms-3 fa-lg text-primary fw-bold">VAI TRÒ</span>
                    </div>
                    <span class="fa-xs text-secondary">Quản lý các nhóm quyền truy cập</span>
                    <hr>
                </div>

                <!-- Tìm kiếm -->
                <div class="px-3 mb-3">
                    <div class="input-group input-group-sm w-100"> <span
                            class="input-group-text bg-secondary border-0 text-white">
                            <i class="fa-solid fa-search"></i>
                        </span>
                        <input type="text" class="form-control bg-secondary border-0 text-white placeholder-gray"
                            v-model="tim_kiem.noi_dung" @keyup="timKiem()" placeholder="Tìm chức vụ...">
                    </div>
                </div>

                <!-- Danh sách chức vụ -->
                <div class="flex-grow-1 overflow-auto px-3" style="scrollbar-width: thin;">

                    <div class="card border-0 mb-3 w-100 toggle-card" v-for="(value, index) in list_chuc_vu"
                        :key="index" @click="phanQuyen(value)"
                        onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.3)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                        style="background: #212529; transition: all 0.3s; cursor: pointer;">

                        <div class="card-body p-2 d-flex align-items-center">

                            <!-- Chữ cái đầu tiên -->
                            <div class="text-white flex-shrink-0 d-flex justify-content-center align-items-center rounded-circle bg-secondary"
                                style="width: 40px; height: 40px;">
                                {{ value.ten_chuc_vu.charAt(0).toUpperCase() }}
                            </div>

                            <!-- Tên chức vụ -->
                            <div class="d-flex flex-column ms-3 flex-grow-1" style="min-width: 0;">
                                <div class="d-flex align-items-center">
                                    <span class="text-white fw-bold text-truncate">{{ value.ten_chuc_vu }}</span>
                                </div>

                                <div class="d-flex align-items-center mt-1" @click.stop="doiTrangThai(value)">
                                    <i class="fa-solid fa-circle"
                                        :style="{ color: value.tinh_trang == 1 ? '#00ff33' : 'orange', fontSize: '7px' }"></i>

                                    <span class="ms-1"
                                        :style="{ color: value.tinh_trang == 1 ? '#00ff33' : 'orange', fontSize: '12px' }">
                                        {{ value.tinh_trang == 1 ? "Hoạt động" : "Tạm dừng" }}
                                    </span>
                                </div>

                            </div>

                            <!-- Nút Sửa xoá -->
                            <div class="d-flex flex-column ms-2 align-items-end">
                                <i class="fa-solid fa-pen mb-2" style="color: #ffc800; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#updateModal"
                                    @click.stop="Object.assign(update_chuc_vu, value)">
                                </i>

                                <i class="fa-regular fa-trash-can" style="color: #ffc800; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#delModal"
                                    @click.stop="Object.assign(delete_chuc_vu, value)">
                                </i>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nút thêm mới -->
                <div class="p-3 mt-auto border-top border-secondary">
                    <button data-bs-toggle="modal" data-bs-target="#themmoiModal" class="btn btn-outline-primary w-100">
                        <i class="fa-solid fa-plus me-2"></i>
                        Thêm mới chức vụ
                    </button>
                </div>

            </div>
            <div class="col-lg-8 bg-light d-flex flex-column">

                <!-- Tiêu đề Phân Quyền cho và tính tổng -->
                <div class="d-flex justify-content-between">
                    <h5 class="mb-0 ms-3 mt-3"><b>Phân Quyền:</b><span class="text-danger ms-2">{{
                        chon_chuc_vu.ten_chuc_vu }}</span></h5>
                    <div class="d-flex align-items-center mt-3 me-5"
                        style="gap: 8px; font-size: 13px; margin-bottom: 6px;">
                        <div class="d-flex flex-column align-items-center">
                            <div style="color: limegreen;"><b>3</b></div>
                            <div class="text-secondary">Đã cấp</div>
                        </div>
                        <span style="border-left: 1px solid #ccc; height: 40px;"></span>
                        <div class="d-flex flex-column align-items-center">
                            <div class="text-secondary"><b>13</b></div>
                            <div class="text-secondary">Hệ thống</div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">

                    <!-- CHỨC NĂNG -->
                    <div class="col-lg-6">
                        <span class="text-secondary fw-bold ms-3">Kho chức năng</span>

                        <div class="d-flex flex-column align-items-center mt-3">

                            <div class="card shadow-sm border-0" v-for="(cn, i) in list_chuc_nang" :key="i"
                                @click="capQuyen(cn.id)"
                                style="height: 60px; width: 300px; transition: all 0.3s ease; cursor: pointer; border-radius: 8px;"
                                onmouseover="this.style.transform='translateY(-3px)'; this.style.backgroundColor='#f8f9fa'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.backgroundColor='white'">

                                <div class="d-flex align-items-center justify-content-between h-100 px-4">

                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-layer-group text-primary me-3"></i>
                                        <span class="fw-bold text-dark" style="font-size: 1.1rem;">{{ cn.ten_chuc_nang
                                            }}</span>
                                    </div>

                                    <i class="fa-solid fa-circle-arrow-right text-primary fa-xl arrow-icon"></i>
                                </div>
                            </div>

                            <div class="mb-3"></div>

                        </div>
                    </div>


                    <!-- Đang Phân Quyền -->
                    <div class="col-lg-6 col-12">
                        <div class="mb-3 fw-bold" style="color: limegreen;">
                            QUYỀN ĐANG KÍCH HOẠT
                        </div>

                        <div v-for="(item, i) in list_phan_quyen" :key="i" class="card border-0 mb-2" style="border-top: 4px solid limegreen !important; border-radius: 8px; width: 95%;
               box-shadow: 0 0 10px rgba(0,0,0,0.05);">

                            <div class="card-body p-3 d-flex align-items-center justify-content-between">

                                <div class="d-flex align-items-center text-truncate me-3">
                                    <i class="fa-solid fa-circle-check me-2 flex-shrink-0"
                                        style="color: limegreen;"></i>
                                    <b class="text-truncate">{{ item.ten_chuc_nang }}</b>
                                </div>

                                <i class="fa-solid fa-trash-arrow-up fa-lg flex-shrink-0"
                                    style="color: #ff1f35; cursor: pointer;" @click="xoaQuyen(item)">
                                </i>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm mới-->
    <div class="modal fade" id="themmoiModal" tabindex="-1" aria-labelledby="themmoiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; overflow: hidden;">

                <div class="modal-header text-white"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h5 class="modal-title fw-bold" id="themmoiModalLabel">
                        <i class="fa-solid fa-user-plus me-2"></i>Thêm Chức Vụ
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">

                            <!-- Tên chức vụ -->
                            <label for="tenChucVu" class="form-label fw-bold text-secondary">
                                Tên chức vụ <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-secondary border-end-0">
                                    <i class="fa-solid fa-id-badge"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" id="tenChucVu"
                                    placeholder="VD: Trưởng phòng Marketing" required oninput="
                                    let val = this.value.toLowerCase()
                                        .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                                        .replace(/[^a-z0-9\s-]/g, '')
                                        .trim().replace(/\s+/g, '-').replace(/-+/g, '-');
                                    document.getElementById('slugChucVu').value = val;
                                ">
                            </div>
                        </div>

                        <div class="mb-3">

                            <!-- slug -->
                            <label for="slugChucVu" class="form-label fw-bold text-secondary">
                                Slug (Mã đường dẫn)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0">
                                    <i class="fa-solid fa-link"></i>
                                </span>
                                <input type="text" class="form-control bg-light border-start-0 ps-0 text-muted"
                                    id="slugChucVu" placeholder="Tu-dong-tao-khi-nhap-ten" readonly>
                            </div>
                            <div class="form-text small fst-italic">Hệ thống sẽ tự động tạo slug từ tên chức vụ.</div>
                        </div>

                        <div class="mb-2">

                            <!-- Trạng thái -->
                            <label class="form-label fw-bold text-secondary">Trạng thái</label>
                            <div class="d-flex gap-2">
                                <input type="radio" class="btn-check" name="tinhTrang" id="statusActive"
                                    autocomplete="off" checked>
                                <label class="btn btn-outline-success flex-fill fw-bold" for="statusActive">
                                    <i class="fa-solid fa-circle-check me-1"></i> Hoạt động
                                </label>

                                <input type="radio" class="btn-check" name="tinhTrang" id="statusInactive"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary flex-fill fw-bold" for="statusInactive">
                                    <i class="fa-solid fa-circle-pause me-1"></i> Tạm dừng
                                </label>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer bg-light border-top-0">
                    <!-- Nút -->
                    <button type="button" class="btn btn-light text-secondary fw-bold"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn text-white px-4 fw-bold shadow-sm" data-bs-dismiss="modal"
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                        <i class="fa-solid fa-floppy-disk me-2"></i>Lưu dữ liệu
                    </button>
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
            list_chuc_nang: [],
            list_chuc_vu: [],
            create_chuc_vu: {
                'tinh_trang': 1,
            },
            update_chuc_vu: {},
            delete_chuc_vu: {},
            delete_quyen: {},
            create_phan_quyen: {
                chuc_nang_id: null,
            },
            list_phan_quyen: [],
            tim_kiem: {
                noi_dung: ''
            },
            chon_chuc_vu: {},
        }
    },
    mounted() {
        this.layDataChucVu();
        this.layDataChucNang();
    },
    methods: {
        timKiem() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/tim-kiem', this.tim_kiem, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    this.list_chuc_vu = res.data.data;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        layDataChucVu() {
            axios.get('http://127.0.0.1:8000/api/admin/chuc-vu/get-data', {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then(response => {
                    this.list_chuc_vu = response.data.data;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        layDataChucNang() {
            axios.get('http://127.0.0.1:8000/api/admin/phan-quyen/chuc-nang/get-data', {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then(response => {
                    this.list_chuc_nang = response.data.data;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        taoChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/add-data', this.create_chuc_vu, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.create_chuc_vu = {};
                        this.layDataChucVu();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        capNhatChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/update', this.update_chuc_vu, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDataChucVu();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        xoaChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/delete', this.delete_chuc_vu, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDataChucVu();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        doiTrangThai(payload) {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/change-status', payload, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDataChucVu();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        capQuyen(id_chuc_nang) {
            axios.post('http://127.0.0.1:8000/api/admin/phan-quyen/chi-tiet-phan-quyen/add-data', {
                id_chuc_vu: this.chon_chuc_vu.id,
                id_chuc_nang: id_chuc_nang
            }, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then(res => {
                    this.$toast.success(res.data.message);
                    this.phanQuyen(this.chon_chuc_vu);
                });
        },

        phanQuyen(value) {
            this.chon_chuc_vu = value;

            axios.post('http://127.0.0.1:8000/api/admin/phan-quyen/chi-tiet-phan-quyen/get-data', {
                id_chuc_vu: value.id
            }, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then((res) => {
                    this.list_phan_quyen = res.data.data;
                });
        },


        xoaQuyen(item) {
            axios.post('http://127.0.0.1:8000/api/admin/phan-quyen/chi-tiet-phan-quyen/delete', {
                id: item.id
            }, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem("auth_token")
                }
            })
                .then(res => {
                    this.$toast.success(res.data.message);
                    this.phanQuyen(this.chon_chuc_vu);
                });
        }

    }

}
</script>