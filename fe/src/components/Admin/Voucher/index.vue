<template>
  <div class="d-flex justify-content-between">

    <!-- Tổng voucher -->
    <div>Hiển thị <b style="color: #ff6a00;">1,234</b> mã giảm trong hệ thống</div>

    <!-- Tìm kiếm -->
    <div class="d-flex gap-3">
      <div class="shadow-sm d-flex align-items-center px-3"
        style="border: 2px dashed #ff6a00 ; border-radius: 50px; height: 45px; width: 300px;">
        <i class="bi bi-search text-muted me-2"></i>
        <input type="text" placeholder="Tìm mã (VD: SALE12)..."
          style="border: none; outline: none; width: 100%; font-size: 14px;">
      </div>

      <!-- Nút tìm mã -->
      <button class="btn shadow"
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

    <select class="form-select form-select-sm me-2" style="width: auto; cursor: pointer;">
      <option selected>Phần trăm giảm</option>
      <option>Số lượng</option>
    </select>

    <select class="form-select form-select-sm" style="width: auto; cursor: pointer;">
      <option selected>Tăng dần</option>
      <option>Giảm dần</option>
    </select>

    <button class="btn btn-warning ms-2 text-dark" style="font-size: 13px;"><b>Lọc</b></button>
  </div>

  <!-- DANH SÁCH VOUCHER -->
  <div class="row">

    <!-- Bỏ v-for và col-lg-4 luôn <div class="col-lg-4" v-for=""> kiểu vậy-->
    <div class="col-lg-4">
      <div class="card position-relative overflow-hidden"
        style="border: none; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));">

        <!-- Số lượng -->
        <div
          style="position: absolute; top: 0; right: 15px; background: #ffe9e9; color: #ee4d2d; padding: 2px 8px; font-weight: bold; font-size: 12px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; z-index: 10; border: 1px solid #fcc; border-top: none;">
          x 2
        </div>

        <div class="row">

          <div class="col-lg-4 text-center" style="background-color: firebrick;">
            <!-- phần trăm giảm -->
            <div class="mx-auto mt-3 d-flex align-items-center justify-content-center"
              style="width: 60px; height: 60px; border-radius: 50%; background: beige; color: crimson; font-weight: 800; font-size: 18px;">
              10%
            </div>
            <!-- mã -->
            <div class="mx-auto mb-3 mt-2"
              style="font-weight: 700; color: beige; letter-spacing: 1px; margin-bottom: 5px; font-size: 12px;">
              SUMMER2025</div>
          </div>

          <div class="col-lg-8 mt-2">
            <div class="card-body">
              <div class="d-flex justify-content-between">

                <div>
                  <!-- mô tả -->
                  <div style="font-size: 14px; font-weight: 600;">Giảm giá sốc cho tất cả các tour mùa hè
                    2025.</div>
                  <!-- ngày hết hạn -->
                  <div class="d-flex flex-row">
                    <div class="p-2" style="font-size: 13px; color: #777;"><i class="fa-regular fa-clock me-1"></i>HSD:
                      31/08/2025</div>
                    <!-- Xem chi tiết -->
                    <div class="p-2 text-primary fa-xs" style="margin-top: 9px;" data-bs-toggle="modal"
                      data-bs-target="#chitietModal"><u>Chi tiết</u></div>
                  </div>
                </div>

                <!-- nút xóa -->
                <div class="ms-1 mt-3">
                  <i class="fa-solid fa-trash-can me-1 text-danger" data-bs-toggle="modal"
                    data-bs-target="#xoaModal"></i>
                  <i class="fa-solid fa-pencil text-primary" data-bs-toggle="modal" data-bs-target="#suaModal"></i>
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
          <h1 class="modal-title fs-5" id="themmoiModalLabel">Thêm mới Voucher</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row ms-2 me-2 mb-3">
            <!-- Mã voucher -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Mã Voucher <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="VD: SUMMER2025" required
                style="text-transform: uppercase; border-color: #ced4da;">
              <div class="form-text text-muted small">Mã code duy nhất để khách hàng nhập.</div>
            </div>

            <!-- Phần trăm giảm -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Phần trăm giảm (%) <span
                  class="text-danger">*</span></label>
              <div class="input-group">
                <input type="number" class="form-control" min="1" max="100" placeholder="VD: 10" required>
                <span class="input-group-text bg-light">%</span>
              </div>
            </div>
          </div>

          <div class="row ms-2 me-2 mb-3">
            <!-- Số lượng -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Số lượng phát hành <span
                  class="text-danger">*</span></label>
              <input type="number" class="form-control" min="1" placeholder="VD: 100" required>
            </div>

            <!-- Trạng thái -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Trạng thái</label>
              <select class="form-select">
                <option value="con_hieu_luc" selected>Còn hiệu lực</option>
                <option value="het_hieu_luc">Hết hiệu lực</option>
              </select>
            </div>
          </div>

          <div class="row ms-2 me-2 mb-3">
            <!-- Số lượng -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Hiệu lực từ ngày <span
                  class="text-danger">*</span></label>
              <input type="date" class="form-control" required>
            </div>

            <!-- Trạng thái -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Hiệu lực đến ngày <span
                  class="text-danger">*</span></label>
              <input type="date" class="form-control" required>
            </div>
          </div>

          <div class="row ms-2 me-2">
            <label class="form-label fw-bold text-secondary">Mô tả chi tiết</label>
            <textarea class="form-control" placeholder="Mô tả voucher này không quá 50 ký tự"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary"
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" data-bs-dismiss="modal">Lưu</button>
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
              style="background-color: #fff5f5; border: 1px dashed #fc8181;">SUMMER2025</span>
            không?<br>

            <span class="small">Hành động này không thể hoàn tác.</span>
          </p>

          <div class="d-flex gap-2 justify-content-center">
            <button type="button" class="btn btn-light fw-bold flex-fill py-2" data-bs-dismiss="modal"
              style="color: #555;">
              Hủy bỏ
            </button>

            <button type="button" class="btn text-white fw-bold flex-fill py-2 shadow-sm" data-bs-dismiss="modal"
              style="background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%); border: none;">
              <i class="fa-solid fa-trash me-2"></i>Xóa ngay
            </button>

          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal Sửa -->
  <div class="modal fade" id="suaModal" tabindex="-1" aria-labelledby="suaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="suaModalLabel">Cập nhật thông tin Voucher</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row ms-2 me-2 mb-3">
            <!-- Mã voucher -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Mã Voucher <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="VD: SUMMER2025" required
                style="text-transform: uppercase; border-color: #ced4da;">
              <div class="form-text text-muted small">Mã code duy nhất để khách hàng nhập.</div>
            </div>

            <!-- Phần trăm giảm -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Phần trăm giảm (%) <span
                  class="text-danger">*</span></label>
              <div class="input-group">
                <input type="number" class="form-control" min="1" max="100" placeholder="VD: 10" required>
                <span class="input-group-text bg-light">%</span>
              </div>
            </div>
          </div>

          <div class="row ms-2 me-2 mb-3">
            <!-- Số lượng -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Số lượng phát hành <span
                  class="text-danger">*</span></label>
              <input type="number" class="form-control" min="1" placeholder="VD: 100" required>
            </div>

            <!-- Trạng thái -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Trạng thái</label>
              <select class="form-select">
                <option value="con_hieu_luc" selected>Còn hiệu lực</option>
                <option value="het_hieu_luc">Hết hiệu lực</option>
              </select>
            </div>
          </div>

          <div class="row ms-2 me-2 mb-3">
            <!-- Số lượng -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Hiệu lực từ ngày <span
                  class="text-danger">*</span></label>
              <input type="date" class="form-control" required>
            </div>

            <!-- Trạng thái -->
            <div class="col-lg-6 col-md-6">
              <label class="form-label fw-bold text-secondary">Hiệu lực đến ngày <span
                  class="text-danger">*</span></label>
              <input type="date" class="form-control" required>
            </div>
          </div>

          <div class="row ms-2 me-2">
            <label class="form-label fw-bold text-secondary">Mô tả chi tiết</label>
            <textarea class="form-control" placeholder="Mô tả voucher này không quá 50 ký tự"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu</button>
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
                x 2
              </div>

              <div class="row">

                <div class="col-lg-4 text-center" style="background-color: firebrick;">
                  <!-- phần trăm giảm -->
                  <div class="mx-auto mt-3 d-flex align-items-center justify-content-center"
                    style="width: 60px; height: 60px; border-radius: 50%; background: beige; color: crimson; font-weight: 800; font-size: 18px;">
                    10%
                  </div>
                  <!-- mã -->
                  <div class="mx-auto mb-3 mt-2"
                    style="font-weight: 700; color: beige; letter-spacing: 1px; margin-bottom: 5px; font-size: 12px;">
                    SUMMER2025<i class="fa-regular fa-copy ms-2"></i></div>
                </div>

                <div class="col-lg-8 mt-2">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">

                      <div>
                        <!-- mô tả -->
                        <div style="font-size: 14px; font-weight: 600;">Giảm giá sốc cho tất cả các tour mùa hè
                          2025.</div>
                        <!-- ngày hết hạn -->
                        <div class="d-flex flex-row">
                          <div class="p-2" style="font-size: 13px; color: #777;"><i
                              class="fa-regular fa-clock me-1"></i>HSD:
                            31/08/2025</div>
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
                    <span
                      class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1 rounded-pill">
                      ● Đang hoạt động
                    </span>
                    <!-- <span
                      class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1 rounded-pill">
                      ● Đang hoạt động
                    </span> -->
                  </div>
                </div>
              </div>
              <div class="col-12 text-center">
                <div class="p-3 bg-light rounded border">
                  <div class="text-muted small mb-1"><i class="fa-regular fa-clock me-1"></i>Thời gian hiệu lực</div>
                  <div class="fw-bold text-dark">01/06/2025 <span class="mx-2 text-muted">➔</span> 31/08/2025</div>
                </div>
              </div>
              <div class="col-12">
                <div class="p-3 bg-light rounded border">
                  <div class="text-muted small mb-1"><i class="fa-solid fa-align-left me-1"></i>Mô tả / Điều kiện</div>
                  <textarea class="form-control">Nhi xinh quá</textarea>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer border-top-0 pt-0 pb-4 px-4 bg-white">
          <button type="button" class="btn btn-light text-secondary fw-bold flex-grow-1"
            data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn text-white fw-bold flex-grow-1 shadow-sm"
            style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); border: none;">
            <i class="fa-solid fa-pen-to-square me-2"></i>Chỉnh sửa
          </button>
        </div>

      </div>
    </div>
  </div>
</template>

<script>


export default {

} 
</script>
<style></style>