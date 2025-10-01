<template>
    <div class="container mt-2">
        <div class="card radius-10 border-top border-0 border-3 border-primary">
            <div class="card-body">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Thêm Tour</h4>
                    <div class="input-group" style="max-width: 300px;">
                        <input type="text" class="form-control" placeholder="Tìm kiếm ?" />
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
                <hr />
                <p>Thêm thông tin chi tiết để tạo một tour mới và bắt đầu thu hút khách hàng!</p>

                <div class="d-flex justify-content-center ">
                    <div class="text-center me-5">
                        <span class="badge rounded-circle bg-primary p-3 fs-3"><b>1</b></span>
                        <p class="mt-2 mb-0">Bước 1:Nhập thông tin</p>
                    </div>

                    <div class="text-center ">
                        <span class="badge rounded-circle bg-primary p-3 fs-3">2</span>
                        <p class="mt-2 mb-0">Bước 2:Thêm hình ảnh</p>
                    </div>

                    <div class="text-center ms-5">
                        <span class="badge rounded-circle bg-primary p-3 fs-3">3</span>
                        <p class="mt-2 mb-0">Bước 3:Lộ trình</p>
                    </div>
                </div>


                <div class="mt-2">
                    <h5>Bước 1: Nhập thông tin</h5>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Tên Tour *</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Khu vực *</label>
                            <select class="form-select">
                                <option value=" Miền Bắc">Miền Bắc</option>
                                <option value="Miền Trung">Miền Trung</option>
                                <option value="Miền Nam">Miền Nam</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Xuất Phát *</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Số lượng *</label>
                                <input type="number" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Giá *</label>
                                <input type="number" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ngày khởi hành *</label>
                                <input type="date" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ngày kết thúc *</label>
                                <input type="date" class="form-control" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả *</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                    </form>
                </div>



                <hr>
                <div class="mt-4">
                    <h5>Bước 2: Thêm hình ảnh</h5>
                    <input type="file" class="form-control mb-3" />
                    <div class="row g-3">
                        <div class="col-6 col-md-2">
                            <div class="card">
                                <img src="" alt="">
                                <!-- <div class="card-body p-2 text-center">
                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                        Remove file
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>



                <hr>
                <div>
                    <h5>Bước 3: Nhập lộ trình</h5>
                    <div class="mb-3">
                        <!-- <button class="btn btn-success btn-sm mb-2" @click.prevent="addTimeline">
                            Thêm Timeline
                        </button> -->
                        <div class="mb-3">
                            <label class="form-label">Ngày 1</label>
                            <input type="text" class="form-control mb-2" placeholder="Tên hành trình" />
                            <textarea class="form-control" rows="4" placeholder="Chi tiết lịch trình..."></textarea>
                        </div>
                    </div>
                </div>


                <!-- Nút điều hướng -->
                <!-- <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-secondary me-2" v-if="currentStep > 1" @click="prevStep">
                        Quay lại
                    </button>
                    <button class="btn btn-primary" v-if="currentStep < steps.length" @click="nextStep">
                        Tiếp theo
                    </button>
                    <button class="btn btn-success" v-if="currentStep === steps.length">
                        Hoàn thành
                    </button>
                </div> -->
                <button class="btn btn-success me">
                    Hoàn thành
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        // return {
        //     currentStep: 1,
        //     steps: ["Bước 1: Nhập thông tin", "Bước 2: Thêm hình ảnh", "Bước 3: Lộ trình"],
        //     form: {
        //         diemDen: "",
        //         khuVuc: "",
        //         soLuong: "",
        //         gia: "",          // gộp thành 1 giá
        //         ngayKhoiHanh: "",
        //         ngayKetThuc: "",
        //         moTa: "",
        //         timeline: [],
        //         images: []        // giữ file ảnh
        //     },
        //     previewImages: [],
        // };
    },
    methods: {
        // nextStep() {
        //     if (this.currentStep < this.steps.length) this.currentStep++;
        // },
        // prevStep() {
        //     if (this.currentStep > 1) this.currentStep--;
        // },

        // removeImage(index) {
        //     this.previewImages.splice(index, 1);
        //     this.form.images.splice(index, 1);
        // },
        // addTimeline() {
        //     this.form.timeline.push({ title: "", content: "" });
        // },
    },
};
</script>

<style></style>
