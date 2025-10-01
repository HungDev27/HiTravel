<template>
    <div class="contaner">


        <div class="card">
            <div class="card-header " style="background-color: #CCFFFF;">
                <div class="d-flex justify-content-between">
                    <h4>Quản lý người dùng</h4>
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tìm kiếm ?"
                                aria-describedby="basic-addon2">
                            <button class="btn btn-primary input-group-text" id="basic-addon2">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <template v-for="(value, index) in list_nguoi_dung" :key="index">
                        <div class="col-md-6 col-lg-4 mx">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <img v-bind:src="(value.avatar)" alt=""
                                                style="border-radius: 50%; width: 150px;height: 140px;">
                                        </div>
                                        <div>
                                            <h5 class="text-nowrap">{{ value.ho_ten }}</h5>
                                            <p class="text-nowrap">Email: {{ value.email }}</p>
                                            <p class="text-nowrap">SĐT: {{ value.sdt }}</p>
                                            <p class="text-nowrap" v-if="value.tinh_trang == 1">trạng thái: Hoạt Động
                                            </p>
                                            <p class="text-nowrap" v-else>trạng thái: Chưa Kích Hoạt</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            list_nguoi_dung: [
                { id: 1, ho_ten: "Nguyễn Thị B", email: "bkasdbasduh@gmail.com", sdt: "0963467238", tinh_trang: 1, avatar: "https://i.pravatar.cc/150?img=1" },
                { id: 2, ho_ten: "Trần Văn A", email: "tranvana@example.com", sdt: "0912345678", tinh_trang: 1, avatar: "https://i.pravatar.cc/150?img=2" },
                { id: 3, ho_ten: "Lê Thị C", email: "lethic@example.com", sdt: "0987654321", tinh_trang: 0, avatar: "https://i.pravatar.cc/150?img=3" },
                { id: 4, ho_ten: "Phạm Văn D", email: "phamvand@example.com", sdt: "0934567890", tinh_trang: 1, avatar: "https://i.pravatar.cc/150?img=4" },
                { id: 5, ho_ten: "Hoàng Thị E", email: "hoangthie@example.com", sdt: "0978123456", tinh_trang: 1, avatar: "https://i.pravatar.cc/150?img=5" },
                { id: 6, ho_ten: "Đỗ Văn F", email: "dovanf@example.com", sdt: "0956781234", tinh_trang: 0, avatar: "https://i.pravatar.cc/150?img=6" },
                { id: 7, ho_ten: "Vũ Thị G", email: "vuthig@example.com", sdt: "0945123789", tinh_trang: 1, avatar: "https://i.pravatar.cc/150?img=7" },
                { id: 8, ho_ten: "Ngô Văn H", email: "ngovanh@example.com", sdt: "0923456789", tinh_trang: 1, avatar: "https://i.pravatar.cc/150?img=8" },
                { id: 9, ho_ten: "Bùi Thị I", email: "buithii@example.com", sdt: "0998765432", tinh_trang: 0, avatar: "https://i.pravatar.cc/150?img=9" },
                { id: 10, ho_ten: "Mai Văn K", email: "maivank@example.com", sdt: "0901234987", tinh_trang: 1, avatar: "https://i.pravatar.cc/150?img=10" }
            ]

        }
    },
}
</script>
<style></style>