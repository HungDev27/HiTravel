<template>
  <div class="d-flex justify-content-between">

    <!-- Tổng voucher -->
    <div>Hiển thị <b style="color: #ff6a00;">{{ list_voucher.length }}</b> mã giảm trong hệ thống</div>

    <!-- Tìm kiếm -->
    <div class="d-flex gap-3">
      <div class="shadow-sm d-flex align-items-center px-3"
        style="border: 2px dashed #ff6a00 ; border-radius: 50px; height: 45px; width: 300px;">
        <i class="bi bi-search text-muted me-2"></i>
        <input type="text" v-model="tim_kiem.noi_dung" v-on:keyup.enter="timKiem()" placeholder="Tìm mã giảm giá..."
          style="border: none; outline: none; width: 100%; font-size: 14px;">
      </div>

      <!-- Nút tìm mã -->
      <button class="btn shadow" @click="timKiem()"
        style="background-color: #ff6a00; color: white; border-radius: 50px; padding: 0 25px; font-weight: 600; height: 45px;">
        <i class="bi bi-plus-lg me-2"></i>Tìm Mã
      </button>
    </div>

    <!-- Thêm Voucher -->
    <button data-bs-toggle="modal" data-bs-target="#themmoiModal" style="border-radius: 50px; background-color: #007bff; color: white; padding: 10px 20px; font-weight: bold; font-size: 14px; 
            border: none; display: inline-flex; align-items: center; gap: 8px; cursor: pointer; box-shadow: 0 4px 12px rgba(0, 123, 255, 0.4);
            transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'"
      onmouseout="this.style.transform='scale(1)'">
      <i class="fa-solid fa-plus text-white"></i> Thêm mới
    </button>

  </div>

  <!-- Tăng giảm -->
  <div class="d-flex align-items-center justify-content-start mb-3 mt-3">
    <span class="text-secondary me-2" style="font-size: 14px;">Sắp xếp theo:</span>


    <select v-model="sortFieldTemp" class="d-flex align-items-center justify-content-start mb-3 mt-3 me-3">
      <option value="phan_tram_giam">Phần trăm giảm</option>
      <option value="so_luong">Số lượng</option>
    </select>

    <select v-model="sortOrderTemp" class="d-flex align-items-center justify-content-start mb-3 mt-3">
      <option value="asc">Tăng dần</option>
      <option value="desc">Giảm dần</option>
    </select>


    <button class="btn btn-warning ms-2 text-dark" @click="locVoucher">
      <b>Lọc</b>
    </button>
  </div>

  <!-- DANH SÁCH VOUCHER -->
  <div class="row">
    <div class="col-lg-4" v-for="(value, index) in sortedVoucher" :key="index">
      <div class="card position-relative overflow-hidden" style="border: none;">

        <!-- Số lượng -->
        <div
          style="position:absolute; top:0; right:15px; background:#ffe9e9; color:#ee4d2d; padding:2px 8px; font-weight:bold; font-size:12px;">
          x {{ value.so_luong }}
        </div>

        <div class="row">

          <div class="col-lg-4 text-center" style="background-color: firebrick;">
            <!-- phần trăm giảm -->
            <div class="mx-auto mt-3 d-flex align-items-center justify-content-center"
              style="width:60px; height:60px; border-radius:50%; background:beige; color:crimson; font-weight:800;">
              {{ value.phan_tram_giam }}%
            </div>

            <!-- mã -->
            <div class="mx-auto mb-3 mt-2" style="font-weight:700; color:beige; letter-spacing:1px; font-size:12px;">
              {{ value.ma }}
            </div>
          </div>

          <div class="col-lg-8 mt-2">
            <div class="card-body">
              <div class="d-flex justify-content-between">

                <div>
                  <!-- mô tả -->
                  <div style="font-size:14px; font-weight:600;">
                    {{ value.mo_ta }}
                  </div>

                  <!-- ngày hết hạn -->
                  <div class="d-flex flex-row">
                    <div class="p-2" style="font-size:13px; color:#777;">
                      <i class="fa-regular fa-clock me-1"></i>
                      HSD: {{ value.hieu_luc_den }}
                    </div>

                    <div class="p-2 text-primary fa-xs" style="margin-top:9px;" data-bs-toggle="modal"
                      data-bs-target="#chitietModal" @click="openDetail(value)">
                      <u>Chi tiết</u>
                    </div>
                  </div>
                </div>

                <!-- nút xóa & sửa -->
                <div class="ms-1 mt-3">
                  <i class="fa-solid fa-trash-can text-danger" data-bs-toggle="modal" data-bs-target="#xoaModal"
                    @click="xacNhanXoa(value)">
                  </i>
                  <i class="fa-solid fa-pencil text-primary" data-bs-toggle="modal" data-bs-target="#suaModal"
                    @click="openEdit(value)">
                  </i>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



  <!-- Modal Thêm Mới -->
  <div class="modal fade" id="themmoiModal" tabindex="-1" aria-labelledby="themmoiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
          <h1 class="modal-title fs-5">Thêm mới Voucher</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <div class="row ms-2 me-2 mb-3">

            <!-- Mã Voucher -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Mã Voucher <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="VD: SUMMER2025" v-model="create_voucher.ma"
                style="text-transform: uppercase;">
              <div class="form-text text-muted small">Mã code duy nhất để khách hàng nhập.</div>
            </div>

            <!-- Phần trăm giảm -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Phần trăm giảm (%) <span
                  class="text-danger">*</span></label>
              <div class="input-group">
                <input type="number" class="form-control" min="1" max="100" placeholder="VD: 10"
                  v-model="create_voucher.phan_tram_giam">
                <span class="input-group-text bg-light">%</span>
              </div>
            </div>
          </div>

          <div class="row ms-2 me-2 mb-3">

            <!-- Số lượng -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Số lượng phát hành <span
                  class="text-danger">*</span></label>
              <input type="number" class="form-control" min="1" placeholder="VD: 100" v-model="create_voucher.so_luong">
            </div>

            <!-- Trạng thái -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Trạng thái</label>
              <select class="form-select" v-model="create_voucher.trang_thai">
                <option value="1" selected>Còn hiệu lực</option>
                <option value="0">Hết hiệu lực</option>
              </select>
            </div>
          </div>

          <div class="row ms-2 me-2 mb-3">

            <!-- Ngày bắt đầu -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Hiệu lực từ ngày <span
                  class="text-danger">*</span></label>
              <input type="date" class="form-control" v-model="create_voucher.hieu_luc_tu">
            </div>

            <!-- Ngày kết thúc -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Hiệu lực đến ngày <span
                  class="text-danger">*</span></label>
              <input type="date" class="form-control" v-model="create_voucher.hieu_luc_den">
            </div>
          </div>

          <div class="row ms-2 me-2">

            <!-- Mô tả -->
            <label class="form-label fw-bold text-secondary">Mô tả chi tiết</label>
            <textarea class="form-control" placeholder="Mô tả voucher..." v-model="create_voucher.mo_ta"></textarea>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" @click="themVoucher"
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            Lưu
          </button>
        </div>

      </div>
    </div>
  </div>


  <!-- Modal Xoá-->
  <div class="modal fade" id="xoaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">

        <div class="modal-body p-4 text-center">

          <div class="mx-auto mb-4 d-flex align-items-center justify-content-center"
            style="width: 80px; height: 80px; background-color: #fee2e2; border-radius: 50%; color: #dc2626;">
            <i class="fa-regular fa-trash-can fa-2x fa-shake"></i>
          </div>

          <!-- Tin nhắn xác nhân -->
          <h4 class="fw-bold mb-2" style="color: #333;">Xác nhận xóa Voucher?</h4>
          <p class="text-muted mb-4">
            Bạn có chắc chắn muốn xóa mã giảm giá

            <!-- Đổi tên vch -->
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

  <!-- Modal Sửa -->
  <div class="modal fade" id="suaModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h1 class="modal-title fs-5">Cập nhật Voucher</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="row ms-2 me-2 mb-3">

            <!-- Mã voucher -->
            <div class="col-lg-6">
              <label class="form-label fw-bold text-secondary">Mã Voucher *</label>
              <input type="text" class="form-control" v-model="edit_voucher.ma" style="text-transform: uppercase;">
            </div>

            <!-- % giảm -->
            <div class="col-lg-6">
              <label class="form-label fw-bold text-secondary">Phần trăm giảm *</label>
              <div class="input-group">
                <input type="number" class="form-control" v-model="edit_voucher.phan_tram_giam">
                <span class="input-group-text">%</span>
              </div>
            </div>
          </div>

          <div class="row ms-2 me-2 mb-3">

            <!-- Số lượng -->
            <div class="col-lg-6">
              <label class="form-label fw-bold text-secondary">Số lượng *</label>
              <input type="number" class="form-control" v-model="edit_voucher.so_luong">
            </div>

            <!-- Trạng thái -->
            <!-- chưa xong -->
            <div class="col-lg-6">
              <label class="form-label fw-bold text-secondary">Trạng thái</label>
              <select class="form-select" v-model="edit_voucher.trang_thai">
                <option value="con_hieu_luc">Còn hiệu lực</option>
                <option value="het_hieu_luc">Hết hiệu lực</option>
              </select>
            </div>
          </div>

          <div class="row ms-2 me-2 mb-3">

            <!-- Ngày bắt đầu -->
            <div class="col-lg-6">
              <label class="form-label fw-bold text-secondary">Ngày bắt đầu *</label>
              <input type="date" class="form-control" v-model="edit_voucher.hieu_luc_tu">
            </div>

            <!-- Ngày kết thúc -->
            <div class="col-lg-6">
              <label class="form-label fw-bold text-secondary">Ngày kết thúc *</label>
              <input type="date" class="form-control" v-model="edit_voucher.hieu_luc_den">
            </div>
          </div>

          <!-- Mô tả -->
          <div class="row ms-2 me-2">
            <label class="form-label fw-bold text-secondary">Mô tả</label>
            <textarea class="form-control" v-model="edit_voucher.mo_ta"></textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="capNhatVoucher">Lưu</button>
        </div>

      </div>
    </div>
  </div>


  <!-- Modal Xem-->
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

          <!-- Khúc ni copy lại voucher -->
          <div class="bg-light p-4 d-flex justify-content-center align-items-center border-bottom">
            <div class="card position-relative overflow-hidden"
              style="border: none; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));">

              <!-- Số lượng -->
              <div
                style="position: absolute; top: 0; right: 15px; background: #ffe9e9; color: #ee4d2d; padding: 2px 8px; font-weight: bold; font-size: 12px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; z-index: 10; border: 1px solid #fcc; border-top: none;">
                {{ current_voucher.so_luong }}
              </div>

              <div class="row">

                <div class="col-lg-4 text-center" style="background-color: firebrick;">
                  <!-- phần trăm giảm -->
                  <div class="mx-auto mt-3 d-flex align-items-center justify-content-center"
                    style="width: 60px; height: 60px; border-radius: 50%; background: beige; color: crimson; font-weight: 800; font-size: 18px;">
                    {{ current_voucher.phan_tram_giam }}
                  </div>
                  <!-- mã -->
                  <div class="mx-auto mb-3 mt-2"
                    style="font-weight: 700; color: beige; letter-spacing: 1px; margin-bottom: 5px; font-size: 12px;">
                    {{ current_voucher.ma }}<i class="fa-regular fa-copy ms-2"></i></div>
                </div>

                <div class="col-lg-8 mt-2">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">

                      <div>
                        <!-- mô tả -->
                        <div style="font-size: 14px; font-weight: 600;">{{ current_voucher.mo_ta }}</div>
                        <!-- ngày hết hạn -->
                        <div class="d-flex flex-row">
                          <div class="p-2" style="font-size: 13px; color: #777;"><i
                              class="fa-regular fa-clock me-1"></i>HSD:
                            {{ current_voucher.hieu_luc_den }}</div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Mô tả chi tiết hơn -->
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
                  <div class="fw-bold text-dark">{{ current_voucher.hieu_luc_tu }} <span
                      class="mx-2 text-muted">➔</span> {{
                        current_voucher.hieu_luc_den }} </div>
                </div>
              </div>
              <div class="col-12">
                <div class="p-3 bg-light rounded border">
                  <div class="text-muted small mb-1"><i class="fa-solid fa-align-left me-1"></i>Mô tả / Điều kiện</div>
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
        .get('http://127.0.0.1:8000/api/admin/ma-giam-gia/get-data')
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
        .post('http://127.0.0.1:8000/api/admin/ma-giam-gia/add-data', this.create_voucher)
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
        .post("http://127.0.0.1:8000/api/admin/ma-giam-gia/update", this.edit_voucher)
        .then((res) => {
          if (res.data.status) {
            this.$toast.success("Cập nhật voucher thành công!");
            this.getVoucher();
          } else {
            this.$toast.error("Cập nhật thất bại!");
          }
        })
        .catch(() => this.$toast.error("API lỗi khi cập nhật!"));
    },




    xacNhanXoa(voucher) {
      this.del_voucher = voucher;
    },

    xoaVoucher() {
      axios
        .post("http://127.0.0.1:8000/api/admin/ma-giam-gia/delete", { id: this.del_voucher.id })
        .then((res) => {
          if (res.data.status) {
            this.$toast.success("Xóa thành công!");
            this.getVoucher();
          } else {
            this.$toast.error("Xóa thất bại!");
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
