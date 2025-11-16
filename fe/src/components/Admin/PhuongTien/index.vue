<template>
  <div class="page">
    <!-- HEADER -->
    <div class="header">
      <h1>Quản Lý Phương Tiện</h1>
      <div class="header-line"></div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar">
      <button class="btn-add" @click="openAddModal">+ Thêm Phương Tiện</button>
      <input type="text" v-model="search" placeholder="🔍 Tìm kiếm phương tiện..." class="search-box">
    </div>

    <!-- TABLE -->
    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            <th>Ảnh</th>
            <th>Mã PT</th>
            <th>Tên Phương Tiện</th>
            <th>Biển Số</th>
            <th>Sức Chứa</th>
            <th>Loại PT</th>
            <th>Trạng Thái</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="pt in filteredVehicles" :key="pt.id" class="table-row">
            <td><img :src="pt.imageUrl || defaultImage" alt="Hình PT" class="vehicle-img"></td>
            <td>{{ pt.id }}</td>
            <td>{{ pt.ten_pt }}</td>
            <td>{{ pt.bien_so }}</td>
            <td>{{ pt.suc_chua }}</td>
            <td>{{ pt.loai_pt }}</td>
            <td>
              <span :class="statusClass(pt.trang_thai)">
                {{ statusIcon(pt.trang_thai) }} {{ pt.trang_thai }}
              </span>
            </td>
            <td class="action-btns">
              <button class="btn-view" @click="viewDetails(pt)">Xem</button>
              <button class="btn-edit" @click="editVehicle(pt)">Sửa</button>
              <button class="btn-delete" @click="deleteVehicle(pt.id)">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- MODAL THÊM/SỬA -->
    <div class="modal" v-if="showModal">
      <div class="modal-content modal-two-columns">
        <div class="modal-column">
          <label>Tên phương tiện</label>
          <input v-model="form.ten_pt" class="input" ref="firstInput">

          <label>Biển số</label>
          <input v-model="form.bien_so" class="input">

          <label>Sức chứa</label>
          <input v-model="form.suc_chua" type="number" class="input">

          <label>Loại phương tiện</label>
          <input v-model="form.loai_pt" class="input">

          <label>Hình ảnh URL</label>
          <input v-model="form.imageUrl" class="input" placeholder="Nhập link ảnh...">
        </div>

        <div class="modal-column">
          <label>Trạng thái</label>
          <select v-model="form.trang_thai" class="input">
            <option>Đang hoạt động</option>
            <option>Bảo trì</option>
            <option>Ngưng hoạt động</option>
          </select>

          <label>Mô tả</label>
          <textarea v-model="form.mo_ta" class="input" rows="6" placeholder="Nhập mô tả phương tiện..."></textarea>
        </div>

        <div class="modal-buttons">
          <button class="btn-save" @click="save">Lưu</button>
          <button class="btn-cancel" @click="closeModal">Hủy</button>
        </div>
      </div>
    </div>

    <!-- MODAL CHI TIẾT -->
    <div class="modal" v-if="showDetailModal">
      <div class="modal-content modal-two-columns">
        <div class="modal-column">
          <img :src="detailVehicle.imageUrl || defaultImage" alt="Hình PT" class="detail-img">
        </div>

        <div class="modal-column">
          <p><strong>Mã PT:</strong> {{ detailVehicle.id }}</p>
          <p><strong>Tên PT:</strong> {{ detailVehicle.ten_pt }}</p>
          <p><strong>Biển số:</strong> {{ detailVehicle.bien_so }}</p>
          <p><strong>Sức chứa:</strong> {{ detailVehicle.suc_chua }}</p>
          <p><strong>Loại PT:</strong> {{ detailVehicle.loai_pt }}</p>
          <p><strong>Trạng thái:</strong> {{ statusIcon(detailVehicle.trang_thai) }} {{ detailVehicle.trang_thai }}</p>
          <p><strong>Mô tả:</strong> {{ detailVehicle.mo_ta }}</p>
        </div>

        <div class="modal-buttons">
          <button class="btn-cancel" @click="closeDetailModal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      search: "",
      showModal: false,
      editMode: false,
      showDetailModal: false,
      detailVehicle: {},
      defaultImage: "https://i.ibb.co/Yc3PqKP/default-bus.png",
      form: { id: null, ten_pt: "", bien_so: "", suc_chua: "", loai_pt: "", trang_thai: "Đang hoạt động", mo_ta: "", imageUrl: "" },
      vehicles: [
        { id:1, ten_pt:"Xe 29 chỗ", bien_so:"51B-12345", suc_chua:29, loai_pt:"Xe khách", trang_thai:"Đang hoạt động", mo_ta:"Xe khách 29 chỗ, máy lạnh, ghế êm", imageUrl:"https://thacohcm.com/wp-content/uploads/2023/05/background2-scaled.jpg" },
        { id:2, ten_pt:"Xe 16 chỗ", bien_so:"72A-44522", suc_chua:16, loai_pt:"Mini Bus", trang_thai:"Bảo trì", mo_ta:"Xe 16 chỗ, thích hợp đưa đón công ty hoặc du lịch nhóm nhỏ", imageUrl:"https://fordtayninhauto.com/wp-content/uploads/2023/03/ford-transit-16-cho-mau-trang.jpg" },
        { id:3, ten_pt:"Xe 45 chỗ", bien_so:"60C-67890", suc_chua:45, loai_pt:"Xe khách lớn", trang_thai:"Đang hoạt động", mo_ta:"Xe 45 chỗ, máy lạnh, ghế xoay êm ái", imageUrl:"https://chothuexevip.vn/uploads/2021/04/Cho-thue-xe-45-cho-da-nang-02.jpg" },
        { id:4, ten_pt:"Xe 7 chỗ", bien_so:"29A-33445", suc_chua:7, loai_pt:"Xe nhỏ", trang_thai:"Ngưng hoạt động", mo_ta:"Xe 7 chỗ, thích hợp gia đình hoặc đưa đón cá nhân", imageUrl:"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmWZl0uEAf-_ERs5TJx5dL2uch06lAL1_NdQ&s" }
      ]
    };
  },
  computed: {
    filteredVehicles() {
      return this.vehicles.filter(v =>
        v.ten_pt.toLowerCase().includes(this.search.toLowerCase()) ||
        v.bien_so.toLowerCase().includes(this.search.toLowerCase()) ||
        v.loai_pt.toLowerCase().includes(this.search.toLowerCase()) ||
        v.trang_thai.toLowerCase().includes(this.search.toLowerCase())
      );
    }
  },
  methods: {
    statusClass(status) {
      switch(status){
        case 'Đang hoạt động': return 'status-active';
        case 'Bảo trì': return 'status-maintain';
        case 'Ngưng hoạt động': return 'status-stop';
        default: return '';
      }
    },
    statusIcon(status){
      switch(status){
        case 'Đang hoạt động': return '🟢';
        case 'Bảo trì': return '🟠';
        case 'Ngưng hoạt động': return '🔴';
        default: return '';
      }
    },
    openAddModal() { this.editMode=false; this.form={id:null, ten_pt:"", bien_so:"", suc_chua:"", loai_pt:"", trang_thai:"Đang hoạt động", mo_ta:"", imageUrl:""}; this.showModal=true; this.$nextTick(()=>this.$refs.firstInput.focus()); },
    editVehicle(pt){ this.editMode=true; this.form={...pt}; this.showModal=true; this.$nextTick(()=>this.$refs.firstInput.focus()); },
    deleteVehicle(id){ if(confirm("Bạn có chắc muốn xóa phương tiện này?")) this.vehicles=this.vehicles.filter(v=>v.id!==id); },
    save(){
      if(!this.form.ten_pt || !this.form.bien_so || !this.form.suc_chua || !this.form.loai_pt){ alert("Vui lòng điền đầy đủ thông tin!"); return; }
      if(this.editMode){ const idx=this.vehicles.findIndex(v=>v.id===this.form.id); this.vehicles.splice(idx,1,{...this.form}); }
      else{ this.form.id=Date.now(); this.vehicles.push({...this.form}); }
      this.closeModal();
    },
    closeModal(){ this.showModal=false; },
    viewDetails(pt){ this.detailVehicle=pt; this.showDetailModal=true; },
    closeDetailModal(){ this.showDetailModal=false; }
  }
};
</script>

<style>
.page { width:95%; margin:30px auto; font-family:'Segoe UI', sans-serif; }
.header h1 { font-size:34px; color:#1e4da8; text-align:center; }
.header-line { width:200px; height:5px; background:linear-gradient(90deg,#1e88e5,#42a5f5); margin:8px auto 25px; border-radius:10px; }

.toolbar { display:flex; justify-content:space-between; margin-bottom:20px; }
.search-box { padding:10px 15px; width:280px; border-radius:12px; border:2px solid #d0d7e2; transition:0.3s; }
.search-box:focus { border-color:#1e88e5; box-shadow:0 0 6px rgba(33,150,243,0.4); }

.btn-add { padding:10px 18px; background:linear-gradient(135deg,#1e88e5,#42a5f5); color:white; border:none; border-radius:12px; font-weight:600; cursor:pointer; box-shadow:0 4px 10px rgba(33,150,243,0.3); transition:0.2s; }
.btn-add:hover { transform:translateY(-2px); box-shadow:0 6px 14px rgba(33,150,243,0.4); }

.table-wrapper { background:white; padding:15px; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.08); overflow-x:auto; }
.table { width:100%; border-collapse:collapse; }
.table th { background:#e3f2fd; padding:14px; font-weight:700; color:#1e4da8; border-bottom:2px solid #cfd8dc; }
.table td { padding:12px; text-align:center; border-bottom:1px solid #eee; }
.table-row:nth-child(even){background:#f9faff;}
.table-row:hover{background:#f1f7ff;transition:0.3s;}
.vehicle-img { width:60px; height:40px; object-fit:cover; border-radius:8px; border:1px solid #ccc; }

.status-active, .status-maintain, .status-stop { display:flex; align-items:center; justify-content:center; gap:6px; padding:4px 12px; border-radius:10px; font-weight:600; }
.status-active { color:#0b8b23; background:#d7f7dd; }
.status-maintain { color:#f57c00; background:#fff4e5; }
.status-stop { color:#b60000; background:#ffd7d7; }

.action-btns { display:flex; flex-direction:row; gap:6px; justify-content:center; align-items:center; }
.action-btns button { width:80px; padding:6px 0; border:none; border-radius:8px; cursor:pointer; color:white; font-size:14px; }
.btn-view { background:#42a5f5; } .btn-view:hover { background:#1e88e5; }
.btn-edit { background:#ffa726; } .btn-edit:hover { background:#fb8c00; }
.btn-delete { background:#e53935; } .btn-delete:hover { background:#c62828; }

.modal { position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45); display:flex; justify-content:center; align-items:center; }
.modal-content { background:white; border-radius:20px; box-shadow:0 8px 30px rgba(0,0,0,0.2); animation:fadeIn 0.25s ease-out; padding:25px; position:relative; }
.modal-two-columns { display:flex; gap:20px; width:600px; }
.modal-column { flex:1; display:flex; flex-direction:column; gap:12px; }
textarea.input { min-height:120px; resize:none; }
.modal-buttons { text-align:right; margin-top:10px; }
.btn-save { padding:8px 18px; background:#43a047; color:white; border-radius:12px; cursor:pointer; }
.btn-cancel { padding:8px 18px; margin-left:6px; background:#e0e0e0; color:#333; border-radius:12px; cursor:pointer; }
.btn-cancel:hover { background:#c0c0c0; }
.detail-img { width:100%; max-width:250px; border-radius:15px; border:1px solid #ccc; }

@media(max-width:700px){ .modal-two-columns{ flex-direction:column; width:90%; } }
@media(max-width:500px){ .action-btns button { width:60px; font-size:12px; } }
@keyframes fadeIn{ from{opacity:0;transform:translateY(-15px);} to{opacity:1;transform:translateY(0);} }
</style>
