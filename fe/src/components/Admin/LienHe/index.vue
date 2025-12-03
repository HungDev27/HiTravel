<template>
    <div class="admin-contact-container"
        style="background-color: #f8f9fa; padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">

        <header
            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 2px solid #e9ecef; padding-bottom: 10px;">
            <h1 style="color: #343a40; font-size: 26px; font-weight: 600;">Quản lý Liên hệ 📞</h1>
            <button
                style="background-color: #007bff; color: white; border: none; padding: 12px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; transition: background-color 0.3s ease; box-shadow: 0 2px 5px rgba(0, 123, 255, 0.5);">
                <i class="fas fa-plus"></i> Export Dữ Liệu
            </button>
        </header>

        <div style="display: flex; gap: 15px; margin-bottom: 20px;">
            <input v-model="timkiem" @input="Search" type="text" placeholder="🔍 Tìm kiếm theo Tên, Email, SĐT..."
                style="padding: 10px; border: 1px solid #ced4da; border-radius: 5px; flex-grow: 1; transition: border-color 0.3s;"
                onfocus="this.style.borderColor='#007bff'" onblur="this.style.borderColor='#ced4da'">
            <select v-model="locTrangThai" @change="loc"
                style="padding: 10px; border: 1px solid #ced4da; border-radius: 5px; background-color: white;">
                <option value="">-- Lọc theo Trạng thái --</option>
                <option value="chua_xem">Chưa Xem</option>
                <option value="da_xem">Đã Xem</option>
                <option value="da_tra_loi">Đã Trả Lời</option>
            </select>
        </div>

        <div
            style="overflow-x: auto; background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                <thead style="background-color: #e9ecef;">
                    <tr>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">#ID</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Khách hàng</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Tên</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Email</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">SĐT</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Tin nhắn</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Trạng thái</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Ngày tạo</th>
                        <th style="padding: 15px; border-bottom: 2px solid #dee2e6;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in chiaTrang" :key="item.id"
                        :style="{ backgroundColor: item.trang_thai === 'da_tra_loi' ? '#e2f0d9' : 'white', borderBottom: '1px solid #f1f1f1' }">
                        <td style="padding: 15px; color: #6c757d;">{{ index + 1 }}</td>
                        <td style="padding: 15px;">{{ item.khach_hang }}</td>
                        <td style="padding: 15px; font-weight: 500;">{{ item.ten }}</td>
                        <td style="padding: 15px;">{{ item.email }}</td>
                        <td style="padding: 15px;">{{ item.so_dien_thoai }}</td>
                        <td
                            style="padding: 15px; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            {{ item.tin_nhan }}
                        </td>
                        <td style="padding: 15px;">
                            <span :style="getTrangThaiStyle(item.trang_thai)">
                                {{ getTrangThaiText(item.trang_thai) }}
                            </span>
                        </td>
                        <td style="padding: 15px; color: #6c757d;">{{ item.created_at }}</td>
                        <td style="padding: 15px;">
                            <button data-bs-toggle="modal" data-bs-target="#xemModal" @click="xemChiTiet(item)"
                                style="background-color: #17a2b8; color: white; border: none; padding: 6px 10px; border-radius: 4px; margin-right: 5px; cursor: pointer;">
                                Xem
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#xulyModal" @click="ModalXuLy(item)"
                                :disabled="item.trang_thai === 'da_tra_loi'" :style="{
                                    backgroundColor: item.trang_thai === 'da_tra_loi' ? '#6c757d' : '#28a745',
                                    color: 'white',
                                    border: 'none',
                                    padding: '6px 10px',
                                    borderRadius: '4px',
                                    marginRight: '5px',
                                    cursor: item.trang_thai === 'da_tra_loi' ? 'not-allowed' : 'pointer',
                                    opacity: item.trang_thai === 'da_tra_loi' ? '0.6' : '1'
                                }">
                                {{ item.trang_thai === 'da_tra_loi' ? 'Đã Xử Lý' : 'Xử lý' }}
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#xoaModal" @click="chonLienHeXoa(item)"
                                style="background-color: #dc3545; color: white; border: none; padding: 6px 10px; border-radius: 4px; cursor: pointer;">
                                Xóa
                            </button>

                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <p style="color: #6c757d; font-size: 14px;">Hiển thị 1-10 trên 100 kết quả</p>
            <div style="display:flex; justify-content:center; margin-top:20px; gap:8px;">
                <!-- Trước -->
                <button @click="trangHienTai--" :disabled="trangHienTai === 1"
                    style="padding:8px 12px; border:1px solid #ddd; border-radius:5px;">
                    « Trước
                </button>

                <!-- Số trang -->
                <button v-for="page in totalPages" :key="page" @click="trangHienTai = page" :style="{
                    padding: '8px 12px',
                    borderRadius: '5px',
                    cursor: 'pointer',
                    border: '1px solid #007bff',
                    backgroundColor: trangHienTai === page ? '#007bff' : 'white',
                    color: trangHienTai === page ? 'white' : '#007bff'
                }">
                    {{ page }}
                </button>

                <!-- Sau -->
                <button @click="trangHienTai++" :disabled="trangHienTai === totalPages"
                    style="padding:8px 12px; border:1px solid #ddd; border-radius:5px;">
                    Sau »
                </button>
            </div>

        </div>

    </div>
    <!-- Modal Xem -->
    <div class="modal fade" id="xemModal" tabindex="-1" aria-labelledby="xemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="xemModalLabel">Chi Tiết Liên Hệ #{{ chiTiet?.id }}<span
                            id="contactIdXem"></span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Khách hàng (ID):</strong> <span id="khachHangIdXem">{{ chiTiet?.khach_hang
                                || 'Ẩn danh' }}</span>
                        </div>
                        <div class="col-md-6">
                            <strong>Tên người gửi:</strong> <span id="tenNguoiGuiXem">{{ chiTiet?.ten }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Email:</strong> <span id="emailXem">{{ chiTiet?.email }}</span>
                        </div>
                        <div class="col-md-6">
                            <strong>Số điện thoại:</strong> {{ chiTiet?.so_dien_thoai }}<span id="sdtXem"></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Ngày tạo:</strong> <span id="createdAtXem">{{ chiTiet?.created_at }}</span>
                        </div>
                        <div class="col-md-6">
                            <strong>Trạng thái:</strong> <span class="badge" id="trangThaiXem">{{
                                getTrangThaiText(chiTiet?.trang_thai) }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Nội dung Tin nhắn:</strong>
                        <p class="border p-3 rounded bg-light" id="tinNhanXem"
                            style="max-height: 250px; overflow-y: auto; white-space: pre-wrap;">{{ chiTiet?.tin_nhan }}
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#xulyModal">Chuyển sang Xử lý</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xử lý-->
    <div class="modal fade" id="xulyModal" tabindex="-1" aria-labelledby="xulyModalLabel" aria-hidden="true"
        style="backdrop-filter: blur(3px);">
        <div class="modal-dialog">
            <div class="modal-content"
                style="border-radius: 12px; border: none; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">

                <div class="modal-header"
                    style="background-color: #ffc107; color: #343a40; padding: 15px 20px; border-bottom: none;">
                    <h5 class="modal-title" id="xulyModalLabel" style="font-weight: 700; font-size: 1.25rem;">📝 Cập
                        Nhật Trạng Thái Liên Hệ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="filter: invert(0.5);"></button>
                </div>

                <div class="modal-body" style="padding: 20px;">
                    <p style="color: #6c757d; margin-bottom: 15px;">Chọn trạng thái phù hợp cho liên hệ của **<span
                            id="tenNguoiGuiXyLy" style="font-weight: bold; color: #007bff;">[Tên Người Gửi]</span>**.
                    </p>

                    <div class="form-group mb-3">
                        <label for="newTrangThai" class="form-label"
                            style="font-weight: 600; color: #343a40; margin-bottom: 8px;">Trạng Thái Mới:</label>
                        <select class="form-select" id="newTrangThai" name="newTrangThai" v-model="trangThai"
                            style="padding: 10px; border-radius: 8px; border: 1px solid #ced4da; width: 100%;">
                            <option value="chua_xem">Chưa xem (Mới)</option>
                            <option value="da_xem">Đã xem (Đang xử lý)</option>
                            <option value="da_tra_loi">Đã trả lời (Hoàn thành)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ghiChuXyLy" class="form-label"
                            style="font-weight: 600; color: #343a40; margin-bottom: 8px;">Ghi chú nội bộ (Tùy
                            chọn):</label>
                        <textarea class="form-control" id="ghiChuXyLy" rows="3"
                            placeholder="Lý do thay đổi, hoặc ghi chú về hành động đã thực hiện..."
                            style="padding: 10px; border-radius: 8px; border: 1px solid #ced4da; width: 100%; resize: vertical;"></textarea>
                    </div>
                </div>

                <div class="modal-footer" style="padding: 15px 20px; border-top: 1px solid #e9ecef;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="background-color: #6c757d; border: none; color: white; padding: 8px 15px; border-radius: 6px; transition: background-color 0.3s ease;">Hủy</button>
                    <button type="button" class="btn btn-warning" @click="xuLy"
                        style="background-color: #ffc107; border: none; color: #343a40; padding: 8px 15px; border-radius: 6px; font-weight: 600; transition: background-color 0.3s ease;">Lưu
                        Thay Đổi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xoá -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="xoaModalLabel">Xác Nhận Xóa</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn **XÓA VĨNH VIỄN** liên hệ này của **<span id="tenNguoiGuiXoa"></span>**
                        (ID: <span id="contactIdXoa"></span>) không?</p>
                    <div class="alert alert-danger mt-3" role="alert">
                        Hành động này không thể hoàn tác.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" @click="xoa">Xác Nhận Xóa</button>

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
            contacts: [],
            chiTiet: null,
            delete_lien_he: {},
            trangThai: '',
            id_xu_ly: null,
            locTrangThai: '',
            allContacts: [],
            timkiem: '',
            trangHienTai: 1,
            perPage: 10,
        }
    },
    computed: {
        chiaTrang() {
            const start = (this.trangHienTai - 1) * this.perPage;
            const end = start + this.perPage;
            return this.contacts.slice(start, end);
        },
        totalPages() {
            return Math.ceil(this.contacts.length / this.perPage);
        }
    },
    methods: {
        getData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/lien-he/get-data')
                .then((res) => {
                    this.contacts = res.data.data.map(item => {
                        return {
                            id: item.id,
                            khach_hang: item.ten_khach_hang || 'Ẩn danh',
                            ten: item.ten,
                            email: item.email,
                            so_dien_thoai: item.so_dien_thoai,
                            tin_nhan: item.tin_nhan,
                            trang_thai: item.trang_thai,
                            created_at: this.formatDate(item.created_at),
                        }
                    });
                    this.allContacts = [...this.contacts];
                    this.trangHienTai = 1;
                })
                .catch(error => {
                    console.error("Lỗi khi lấy danh sách liên hệ:", error);
                });
        },
        xemChiTiet(item) {
            this.chiTiet = item;
        },
        xoa() {
            axios.post('http://127.0.0.1:8000/api/admin/lien-he/delete', this.delete_lien_he)
                .then(res => {
                    if (res.data.status) {
                        this.getData(); // làm mới danh sách
                        this.$toast.success(res.data.message);
                        // Đóng modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('xoaModal'));
                        modal.hide();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(err => {
                    this.$toast.error("Lỗi khi xoá!");
                });
        },
        xuLy() {
            axios.post('http://127.0.0.1:8000/api/admin/lien-he/change-status', {
                id: this.id_xu_ly,
                trang_thai: this.trangThai,
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getData();
                        // const modal = bootstrap.Modal.getInstance(document.getElementById('xulyModal'));
                        // modal.hide();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(() => {
                    this.$toast.error("Lỗi khi cập nhật trạng thái!");
                });
        },
        loc() {
            if (this.locTrangThai === "") {
                // Không lọc → load tất cả
                this.contacts = [...this.allContacts]
            } else {
                // Lọc theo trạng thái
                this.contacts = this.allContacts.filter(
                    item => item.trang_thai === this.locTrangThai

                );
            }
        },
        Search() {
            let text = this.timkiem.toLowerCase();

            // Reset lại danh sách gốc trước khi áp bộ lọc
            let list = [...this.allContacts];

            // Nếu có lọc trạng thái → áp vào trước
            if (this.locTrangThai !== "") {
                list = list.filter(item => item.trang_thai === this.locTrangThai);
            }

            // Nếu ô tìm kiếm có chữ
            if (text !== "") {
                list = list.filter(item =>
                    item.ten.toLowerCase().includes(text) ||
                    item.email.toLowerCase().includes(text) ||
                    item.so_dien_thoai.toLowerCase().includes(text)
                );
            }

            this.contacts = list;
        },





        formatDate(dateStr) {
            const date = new Date(dateStr);
            return date.toLocaleString("vi-VN", {
                day: "2-digit",
                month: "2-digit",
                year: "numeric",
                hour: "2-digit",
                minute: "2-digit"
            });
        },
        getTrangThaiText(status) {
            switch (status) {
                case 'chua_xem':
                    return 'Chưa Xem';
                case 'da_xem':
                    return 'Đã Xem';
                case 'da_tra_loi':
                    return 'Đã Trả Lời';
                default:
                    return 'Không rõ';
            }
        },
        getTrangThaiStyle(status) {
            let style = {
                padding: '5px 10px',
                borderRadius: '15px',
                fontSize: '12px',
                fontWeight: 'bold',
                display: 'inline-block'
            };

            if (status === 'chua_xem') {
                style.backgroundColor = '#ffc107';
                style.color = '#343a40';
            } else if (status === 'da_xem') {
                style.backgroundColor = '#17a2b8';
                style.color = '#fff';
            } else if (status === 'da_tra_loi') {
                style.backgroundColor = '#28a745';
                style.color = '#fff';
            }

            return style;
        },
        chonLienHeXoa(item) {
            this.delete_lien_he = { id: item.id };

            document.getElementById("tenNguoiGuiXoa").innerText = item.ten || 'Ẩn danh';
            document.getElementById("contactIdXoa").innerText = item.id;
        },
        ModalXuLy(item) {
            this.id_xu_ly = item.id;
            this.trangThai = item.trang_thai;

            // Hiện tên người gửi trên modal
            document.getElementById("tenNguoiGuiXyLy").innerText = item.ten || "Ẩn danh";
        }


    },
    mounted() {
        this.getData();
    }
}
</script>

<style></style>