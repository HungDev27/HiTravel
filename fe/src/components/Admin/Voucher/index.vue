<template>
  <div class="container-fluid p-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

      <!-- Tính tổng -->
      <div class="text-nowrap">Hiển thị <b style="color: #ff6a00;">{{ list_voucher.length }}</b> mã giảm trong hệ thống
      </div>

      <!-- Tìm kiếm -->
      <div class="d-flex flex-wrap gap-2 flex-grow-1 justify-content-end align-items-center">
        <div class="shadow-sm d-flex align-items-center px-3 bg-white"
          style="border: 2px dashed #ff6a00; border-radius: 50px; height: 45px; flex-basis: 300px; flex-grow: 1; max-width: 400px;">
          <i class="bi bi-search text-muted me-2"></i>
          <input type="text" v-model="tim_kiem.noi_dung" v-on:keyup.enter="timKiem()" placeholder="Tìm mã giảm giá..."
            style="border: none; outline: none; box-shadow: none; width: 100%; font-size: 14px;">
        </div>

        <!-- Nút tìm kiếm -->
        <button class="btn shadow text-white fw-bold text-nowrap" @click="timKiem()"
          style="background-color: #ff6a00; border-radius: 50px; padding: 0 25px; height: 45px;">
          <i class="bi bi-plus-lg me-2"></i>Tìm Mã
        </button>

        <!-- Nút thêm mới -->
        <button data-bs-toggle="modal" data-bs-target="#themmoiModal" style="border-radius: 50px; background-color: #007bff; color: white; padding: 10px 20px; font-weight: bold; font-size: 14px; 
            border: none; display: inline-flex; align-items: center; gap: 8px; cursor: pointer; box-shadow: 0 4px 12px rgba(0, 123, 255, 0.4);
            transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'"
          onmouseout="this.style.transform='scale(1)'">
          <i class="fa-solid fa-plus text-white"></i> Thêm mới
        </button>
      </div>

    </div>

    <!-- Sắp xếp và lọc -->
    <div class="d-flex flex-wrap align-items-center justify-content-start mb-3 mt-3 gap-2">
      <span class="text-secondary me-2" style="font-size: 14px;">Sắp xếp theo:</span>

      <select v-model="sortFieldTemp" class="form-select w-auto shadow-sm" style="border-radius: 20px;">
        <option value="phan_tram_giam">Phần trăm giảm</option>
        <option value="so_luong">Số lượng</option>
      </select>

      <select v-model="sortOrderTemp" class="form-select w-auto shadow-sm" style="border-radius: 20px;">
        <option value="asc">Tăng dần</option>
        <option value="desc">Giảm dần</option>
      </select>

      <!-- Nút lọc -->
      <button class="btn btn-warning text-dark fw-bold shadow-sm" @click="locVoucher" style="border-radius: 20px;">
        <b>Lọc</b>
      </button>
    </div>

    <div class="row g-3">
      <div class="col-12 col-md-6 col-lg-4" v-for="(value, index) in sortedVoucher" :key="index">

        <div class="card border-0 shadow-sm h-100 overflow-hidden" style="transition: transform 0.2s;"
          onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">

          <div class="d-flex h-100">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center text-white p-2 flex-shrink-0"
              style="background-color: firebrick; width: 110px;">

              <!-- Phần trăm giảm -->
              <div
                class="d-flex align-items-center justify-content-center bg-white text-danger fw-bold rounded-circle mb-2"
                style="width: 50px; height: 50px; font-size: 14px; color: crimson;">
                {{ value.phan_tram_giam }}%
              </div>

              <!-- Mã voucher -->
              <div class="fw-bold text-break w-100 px-1" style="font-size: 12px; letter-spacing: 1px; color: beige;">
                {{ value.ma }}
              </div>
            </div>

            <div class="flex-grow-1 position-relative d-flex flex-column bg-white">

              <!-- Số lượng -->
              <div class="position-absolute top-0 end-0 px-2 py-1 fw-bold"
                style="background: #fc8181; color: #dc2626; font-size: 11px; border-bottom-left-radius: 8px;">
                x {{ value.so_luong }}
              </div>

              <!-- Mô tả -->
              <div class="card-body p-2 d-flex flex-column h-100">
                <div class="fw-bold text-dark mb-2 mt-3 pe-4"
                  style="font-size: 14px; line-height: 1.4; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                  {{ value.mo_ta }}
                </div>

                <!-- Hạn sử dụng -->
                <div class="mt-auto">
                  <div class="d-flex justify-content-between align-items-end">
                    <div class="text-muted small" style="font-size: 13px;">
                      <i class="fa-regular fa-clock me-1"></i>HSD: {{ value.hieu_luc_den }}
                    </div>

                    <!-- Chi tiết -->
                    <div class="text-primary small fw-bold" style="cursor: pointer;" data-bs-toggle="modal"
                      data-bs-target="#chitietModal" @click="openDetail(value)">
                      <u>Chi tiết</u>
                    </div>
                  </div>

                  <!-- Nút xóa và sửa -->
                  <div class="d-flex justify-content-end gap-3 mt-3">
                    <i class="fa-solid fa-trash-can text-danger" style="cursor: pointer; transition: opacity 0.2s;"
                      onmouseover="this.style.opacity='0.6'" onmouseout="this.style.opacity='1'" data-bs-toggle="modal"
                      data-bs-target="#xoaModal" @click="xacNhanXoa(value)">
                    </i>
                    <i class="fa-solid fa-pencil text-primary" style="cursor: pointer; transition: opacity 0.2s;"
                      onmouseover="this.style.opacity='0.6'" onmouseout="this.style.opacity='1'" data-bs-toggle="modal"
                      data-bs-target="#suaModal" @click="openEdit(value)">
                    </i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Thêm mới Voucher -->
    <div class="modal fade" id="themmoiModal" tabindex="-1" aria-labelledby="themmoiModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <h1 class="modal-title fs-5">Thêm mới Voucher</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="row g-3 mb-3 ms-1 me-1">

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Mã Voucher <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="VD: SUMMER2025" v-model="create_voucher.ma"
                  style="text-transform: uppercase;">
                <div class="form-text text-muted small">Mã code duy nhất để khách hàng nhập.</div>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Phần trăm giảm (%) <span
                    class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" min="1" max="100" placeholder="VD: 10"
                    v-model="create_voucher.phan_tram_giam">
                  <span class="input-group-text bg-light">%</span>
                </div>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Số lượng phát hành <span
                    class="text-danger">*</span></label>
                <input type="number" class="form-control" min="1" placeholder="VD: 100"
                  v-model="create_voucher.so_luong">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Trạng thái</label>
                <select class="form-select" v-model="create_voucher.trang_thai">
                  <option value="1" selected>Còn hiệu lực</option>
                  <option value="0">Hết hiệu lực</option>
                </select>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Hiệu lực từ ngày <span
                    class="text-danger">*</span></label>
                <input type="date" class="form-control" v-model="create_voucher.hieu_luc_tu">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Hiệu lực đến ngày <span
                    class="text-danger">*</span></label>
                <input type="date" class="form-control" v-model="create_voucher.hieu_luc_den">
              </div>

              <div class="col-12">
                <label class="form-label fw-bold text-secondary">Mô tả chi tiết</label>
                <textarea class="form-control" placeholder="Mô tả voucher..." v-model="create_voucher.mo_ta"></textarea>
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" @click="themVoucher" data-bs-dismiss="modal"
              style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
              Lưu
            </button>
          </div>

        </div>
      </div>
    </div>

    <!-- Modal Xóa Voucher -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">

          <div class="modal-body p-4 text-center">

            <div class="mx-auto mb-4 d-flex align-items-center justify-content-center"
              style="width: 80px; height: 80px; background-color: #fee2e2; border-radius: 50%; color: #dc2626;">
              <i class="fa-regular fa-trash-can fa-2x fa-shake"></i>
            </div>

            <h4 class="fw-bold mb-2" style="color: #333;">Xác nhận xóa Voucher?</h4>
            <p class="text-muted mb-4">
              Bạn có chắc chắn muốn xóa mã giảm giá

              <span class="fw-bold text-danger px-2 py-1 rounded"
                style="background-color: #fff5f5; border: 1px dashed #fc8181;">{{ del_voucher.ma }}</span>
              không?<br>

              <span class="small">Hành động này không thể hoàn tác.</span>
            </p>

            <div class="d-flex gap-2 justify-content-center">
              <button type="button" class="btn btn-light fw-bold flex-fill py-2" data-bs-dismiss="modal"
                style="color: #555;">
                Hủy bỏ
              </button>

              <button type="button" class="btn text-white fw-bold flex-fill py-2 shadow-sm"
                style="background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%); border: none;" @click="xoaVoucher"
                data-bs-dismiss="modal">

                <i class="fa-solid fa-trash me-2"></i>Xóa ngay
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Modal Sửa Voucher -->
    <div class="modal fade" id="suaModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h1 class="modal-title fs-5">Cập nhật Voucher</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body">

            <div class="row g-3 mb-3 ms-1 me-1">

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Mã Voucher *</label>
                <input type="text" class="form-control" v-model="edit_voucher.ma" style="text-transform: uppercase;">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Phần trăm giảm *</label>
                <div class="input-group">
                  <input type="number" class="form-control" v-model="edit_voucher.phan_tram_giam">
                  <span class="input-group-text">%</span>
                </div>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Số lượng *</label>
                <input type="number" class="form-control" v-model="edit_voucher.so_luong">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Trạng thái</label>
                <select class="form-select" v-model="edit_voucher.trang_thai">
                  <option value="con_hieu_luc">Còn hiệu lực</option>
                  <option value="het_hieu_luc">Hết hiệu lực</option>
                </select>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Ngày bắt đầu *</label>
                <input type="date" class="form-control" v-model="edit_voucher.hieu_luc_tu">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label fw-bold text-secondary">Ngày kết thúc *</label>
                <input type="date" class="form-control" v-model="edit_voucher.hieu_luc_den">
              </div>

              <div class="col-12">
                <label class="form-label fw-bold text-secondary">Mô tả</label>
                <textarea class="form-control" v-model="edit_voucher.mo_ta"></textarea>
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" @click="capNhatVoucher">Lưu</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Modal Chi tiết Voucher -->
    <div class="modal fade" id="chitietModal" tabindex="-1" aria-labelledby="chitietModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">

          <div class="modal-header text-white border-0"
            style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
            <h5 class="modal-title fw-bold" id="chitietModalLabel">
              <i class="fa-solid fa-circle-info me-2"></i>Chi tiết Voucher
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body p-0">

            <div class="bg-light p-4 d-flex justify-content-center align-items-center border-bottom">

              <div class="card position-relative overflow-hidden w-100"
                style="border: none; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1)); max-width: 400px;">
                <div class="d-flex">
                  <div
                    class="d-flex flex-column align-items-center justify-content-center text-center text-white p-2 flex-shrink-0"
                    style="background-color: firebrick; width: 110px;">
                    <div
                      class="d-flex align-items-center justify-content-center bg-white text-danger fw-bold rounded-circle mb-2"
                      style="width: 60px; height: 60px; font-size: 18px;">
                      {{ current_voucher.phan_tram_giam }}%
                    </div>
                    <div class="fw-bold text-break w-100 px-1" style="font-size: 12px; color: beige;">
                      {{ current_voucher.ma }} <i class="fa-regular fa-copy ms-1"></i>
                    </div>
                  </div>
                  <div class="flex-grow-1 bg-white position-relative">
                    <div class="position-absolute top-0 end-0 px-2 py-1 fw-bold"
                      style="background: #fc8181; color: #dc2626; font-size: 11px; border-bottom-left-radius: 8px;">
                      x{{ current_voucher.so_luong }}
                    </div>
                    <div class="card-body p-3">
                      <div style="font-size: 14px; font-weight: 600; margin-top: 10px;">{{ current_voucher.mo_ta }}
                      </div>
                      <div class="text-muted small mt-2">
                        <i class="fa-regular fa-clock me-1"></i>HSD: {{ current_voucher.hieu_luc_den }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="p-4">

              <div class="row g-3">
                <div class="col-12 text-center">
                  <div class="p-3 bg-light rounded border h-100">
                    <div class="text-muted small mb-1"><i class="fa-solid fa-toggle-on me-1"></i>Trạng thái</div>
                    <div class="fw-bold text-success">
                      <span v-if="current_voucher.trang_thai === 'het_hieu_luc'"
                        class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1 rounded-pill">
                        Hết hiệu lực
                      </span>
                      <span v-if="current_voucher.trang_thai === 'con_hieu_luc'"
                        class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1 rounded-pill">
                        Còn hiệu lực
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 text-center">
                  <div class="p-3 bg-light rounded border">
                    <div class="text-muted small mb-1"><i class="fa-regular fa-clock me-1"></i>Thời gian hiệu lực</div>
                    <div class="fw-bold text-primary">{{ current_voucher.hieu_luc_tu }} <span
                        class="mx-2 text-muted">➔</span> {{
                          current_voucher.hieu_luc_den }} </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="p-3 bg-light rounded border">
                    <div class="text-muted small mb-1"><i class="fa-solid fa-align-left me-1"></i>Mô tả / Điều kiện
                    </div>
                    <textarea class="form-control">{{ current_voucher.mo_ta }}</textarea>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <button type="button" class="btn text-white fw-bold flex-grow-1 shadow-sm"
            style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); border: none;" data-bs-dismiss="modal"
            data-bs-toggle="modal" data-bs-target="#suaModal" @click="openEdit(current_voucher)">
            <i class="fa-solid fa-pen-to-square me-2"></i>Chỉnh sửa
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
      list_voucher: [],
      sortFieldTemp: "phan_tram_giam",
      sortOrderTemp: "asc",
      sortField: null,
      sortOrder: null,
      tim_kiem: {
        noi_dung: "",
      },
      applySorting: false,
      create_voucher: {
        ma: "",
        phan_tram_giam: null,
        so_luong: null,
        trang_thai: 1,
        hieu_luc_tu: "",
        hieu_luc_den: "",
        mo_ta: "",
        tao_boi: 1,
      },

      edit_voucher: {
        id: null,
        ma: "",
        phan_tram_giam: null,
        so_luong: null,
        trang_thai: 1,
        hieu_luc_tu: "",
        hieu_luc_den: "",
        mo_ta: "",
        tao_boi: 1,
      },
      del_voucher: {},
      current_voucher: {},
    };
  },

  mounted() {
    this.getVoucher();
  },
  computed: {
    sortedVoucher() {
      let result = [...this.list_voucher];

      // Tìm kiếm HIỂN THỊ theo API
      if (this.tim_kiem.noi_dung.trim() !== "") {
        const keyword = this.tim_kiem.noi_dung.toLowerCase();
        result = result.filter(v =>
          v.ma.toLowerCase().includes(keyword) ||
          v.mo_ta.toLowerCase().includes(keyword)
        );
      }

      // Chỉ sắp xếp khi nhấn Lọc
      if (this.applySorting && this.sortField && this.sortOrder) {
        result.sort((a, b) => {
          const f = this.sortField;
          if (this.sortOrder === "asc") return a[f] > b[f] ? 1 : -1;
          return a[f] < b[f] ? 1 : -1;
        });
      }
      return result;
    }

  },

  methods: {

    timKiem() {
      axios.post('http://127.0.0.1:8000/api/admin/ma-giam-gia/tim-kiem', this.tim_kiem)
        .then((res) => {
          this.list_voucher = res.data.data;
        });
    },

    formatVND(number) {
      return new Intl.NumberFormat("vi-VN", { style: "currency", currency: "VND" }).format(number);
    },

    getVoucher() {
      axios
        .get('http://127.0.0.1:8000/api/admin/ma-giam-gia/get-data', {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem("auth_token")
          }
        })
        .then((res) => {
          this.list_voucher = res.data.data;
        })
        .catch(() => this.$toast.error("Lỗi tải dữ liệu voucher!"));
    },

    validateVoucher(voucher) {
      const today = new Date().toISOString().split("T")[0];

      // KIỂM TRA MÃ VOUCHER
      if (!voucher.ma || !voucher.ma.trim()) {
        this.$toast.error("Mã voucher không được để trống!");
        return false;
      }

      voucher.ma = voucher.ma.toUpperCase().trim();

      // PHẦN TRĂM
      if (!voucher.phan_tram_giam || voucher.phan_tram_giam < 1 || voucher.phan_tram_giam > 100) {
        this.$toast.error("Phần trăm giảm phải từ 1 đến 100");
        return false;
      }

      // SỐ LƯỢNG
      if (!voucher.so_luong || voucher.so_luong <= 0) {
        this.$toast.error("Số lượng phải lớn hơn 0");
        return false;
      }

      // NGÀY BẮT ĐẦU
      if (!voucher.hieu_luc_tu) {
        this.$toast.error("Vui lòng chọn ngày bắt đầu");
        return false;
      }

      if (voucher.hieu_luc_tu < today) {
        this.$toast.error("Ngày bắt đầu không được nhỏ hơn hôm nay");
        return false;
      }

      // NGÀY KẾT THÚC
      if (!voucher.hieu_luc_den) {
        this.$toast.error("Vui lòng chọn ngày kết thúc");
        return false;
      }

      if (voucher.hieu_luc_den < voucher.hieu_luc_tu) {
        this.$toast.error("Ngày kết thúc không được nhỏ hơn ngày bắt đầu");
        return false;
      }

      return true;
    },

    themVoucher() {
      if (!this.validateVoucher(this.create_voucher)) return;

      axios
        .post('http://127.0.0.1:8000/api/admin/ma-giam-gia/add-data', this.create_voucher, {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem("auth_token")
          }
        })
        .then((res) => {
          if (res.data.status) {
            this.$toast.success("Thêm voucher thành công!");


            this.create_voucher = {
              ma: "",
              phan_tram_giam: null,
              so_luong: null,
              trang_thai: 1,
              hieu_luc_tu: "",
              hieu_luc_den: "",
              mo_ta: "",
              tao_boi: 1,
            };

            this.getVoucher();
          } else {
            this.$toast.error("Thêm voucher thất bại!");
          }
        })
        .catch(() => this.$toast.error("API lỗi khi thêm voucher!"));
    },

    openEdit(voucher) {
      this.edit_voucher = { ...voucher };
    },

    capNhatVoucher() {
      if (!this.validateVoucher(this.edit_voucher)) return;

      axios
        .post("http://127.0.0.1:8000/api/admin/ma-giam-gia/update", this.edit_voucher, {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem("auth_token")
          }
        })
        .then((res) => {
          if (res.data.status) {
            this.$toast.success(res.data.message);
            this.getVoucher();
          } else {
            this.$toast.error(res.data.message);
          }
        })
        .catch(() => this.$toast.error("API lỗi khi cập nhật!"));
    },

    xacNhanXoa(voucher) {
      this.del_voucher = voucher;
    },

    xoaVoucher() {
      axios
        .post("http://127.0.0.1:8000/api/admin/ma-giam-gia/delete", { id: this.del_voucher.id }, {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem("auth_token")
          }
        })
        .then((res) => {
          if (res.data.status) {
            this.$toast.success(res.data.message);
            this.getVoucher();
          } else {
            this.$toast.error(res.data.message);
          }
        })
        .catch(() => this.$toast.error("API lỗi khi xóa!"));
    },

    openDetail(voucher) {
      this.current_voucher = { ...voucher };
    },

    locVoucher() {
      this.sortField = this.sortFieldTemp;
      this.sortOrder = this.sortOrderTemp;
      this.applySorting = true;
    }
  },

};
</script>
