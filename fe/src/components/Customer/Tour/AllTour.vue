<template>
    <div class="breadcrumb-image"
        style="background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(0, 128, 255, 0.8) 100%), url(https://timestravel.vn/themes/times-travel/images/banner/breadcrumb.png) no-repeat center/cover; height: 300px;">
        <div class="container">
            <h3 class="text-white" style="padding-top: 200px;">Tour</h3>
            <router-link :to="'/'">
                <p class="text-white">Trang chủ<i class="ms-2 fa-solid fa-angles-right me-2"></i>Tour</p>
            </router-link>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">

            <!-- Bảng lọc tìm kiếm -->
            <div class="col-lg-3">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5><b>Lọc Tour</b></h5>
                            <i class="fa-solid fa-filter" style="font-size: 20px;"></i>
                        </div>

                        <!-- Mức giá -->
                        <label class="text-secondary mt-3 mb-1" style="font-size: 17px;">Mức giá</label>
                        <input type="range" class="form-range" min="0" max="50000000" v-model="rangeValue" id="range4">
                        <output class="text-primary"><b>{{ formatVND(rangeValue) }}</b></output>

                        <!-- Điểm đến -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Điểm đến</label></div>
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected>-- Chọn nơi bạn muốn đến --</option>
                            <option>Phú Quốc</option>
                            <option>Huế</option>
                            <option>Hà Nội</option>
                            <option>Hồ Chí Minh</option>
                            <option>Đà Nẵng</option>
                            <option>Hải Phòng</option>
                        </select>

                        <!-- Ngày khởi hành -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Ngày khởi hành</label></div>
                        <input type="date" class="form-control mt-1">

                        <!-- Loại Tour -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;">Loại Tour</label></div>
                        <div class="mt-1"
                            style="border: 1px solid #ccc; border-radius: 8px; padding: 10px; width: 275px; height: 100px; overflow-y: auto;">
                            <div>
                                <input type="checkbox" id="sunworld" name="loai_tour" value="Sunworld">
                                <label for="sunworld">Sunworld</label>
                            </div>

                            <div>
                                <input type="checkbox" id="hanoi" name="loai_tour" value="Hà Nội">
                                <label for="hanoi">Du Lịch Hà Nội</label>
                            </div>

                            <div>
                                <input type="checkbox" id="dalat" name="loai_tour" value="Đà Lạt">
                                <label for="dalat">Du Lịch Đà Lạt</label>
                            </div>

                            <div>
                                <input type="checkbox" id="phuquoc" name="loai_tour" value="Phú Quốc">
                                <label for="phuquoc">Du Lịch Phú Quốc</label>
                            </div>

                            <div>
                                <input type="checkbox" id="mien-tay" name="loai_tour" value="Miền Tây">
                                <label for="mien-tay">Du Lịch Miền Tây</label>
                            </div>

                            <div>
                                <input type="checkbox" id="mien-bac" name="loai_tour" value="Miền Bắc">
                                <label for="mien-bac">Du Lịch Miền Bắc</label>
                            </div>

                            <div>
                                <input type="checkbox" id="mien-trung" name="loai_tour" value="Miền Trung">
                                <label for="mien-trung">Du Lịch Miền Trung</label>
                            </div>

                            <div>
                                <input type="checkbox" id="mien-nam" name="loai_tour" value="Miền Nam">
                                <label for="mien-nam">Du Lịch Miền Nam</label>
                            </div>
                        </div>

                        <!-- Số lượng hành khách -->
                        <div><label class="text-secondary mt-4" style="font-size: 17px;"><i
                                    class="fa-solid fa-users me-2"></i>Số lượng hành khách</label></div>
                        <div class="mt-2"
                            style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 6px; width: 275px; height: 40px; justify-content: space-between;">
                            <label class="ms-2" for="nguoiLon" style="color: gray;">Người lớn:</label>
                            <input id="nguoiLon" type="number" value="0" min="1"
                                style="color: dodgerblue;border: none; width: 50px; text-align: center; font-weight: bold; font-size: 16px; outline: none;" />
                        </div>
                        <div class="mt-2"
                            style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 6px; width: 275px; height: 40px; justify-content: space-between;">
                            <label class="ms-2" for="nguoiLon" style="color: gray;">Trẻ em:</label>
                            <input id="nguoiLon" type="number" value="0" min="1"
                                style="color: dodgerblue;border: none; width: 50px; text-align: center; font-weight: bold; font-size: 16px; outline: none;" />
                        </div>

                        <!-- button -->
                         <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-primary me-5" style="border-radius: 100px;">Chọn lại</button>
                            <button class="btn btn-primary" style="border-radius: 100px;">Lọc ngay</button>
                         </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Danh sách tour -->

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            rangeValue: 50000000
        };
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VN').format(number) + ' VNĐ';
        },
        formatDate(date) {
            return new Date(date).toLocaleDateString('vi-VI');
        }
    }
}
</script>

<style></style>