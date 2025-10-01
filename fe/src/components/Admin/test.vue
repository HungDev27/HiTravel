<template>
    <div class="container mt-2">
        <div class="card">
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

                <!-- Steps -->
                <div class="d-flex justify-content-center mb-4">
                    <div v-for="(step, index) in steps" :key="index" class="d-flex align-items-center">
                        <div class="step-circle" :class="currentStep === index + 1 ? 'step-active' : 'step-inactive'">
                            {{ index + 1 }}
                        </div>
                        <span class="mx-2">{{ step }}</span>
                        <div v-if="index < steps.length - 1" class="mx-3 border-top flex-grow-1"></div>
                    </div>
                </div>

                <!-- Step 1 -->
                <div v-if="currentStep === 1">
                    <h5>Bước 1: Nhập thông tin</h5>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Điểm đến *</label>
                            <input type="text" class="form-control" v-model="form.diemDen" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Khu vực *</label>
                            <select class="form-select" v-model="form.khuVuc">
                                <option value="Miền Bắc">Miền Bắc</option>
                                <option value="Miền Trung">Miền Trung</option>
                                <option value="Miền Nam">Miền Nam</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Số lượng *</label>
                                <input type="number" class="form-control" v-model="form.soLuong" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Giá *</label>
                                <input type="number" class="form-control" v-model="form.gia" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ngày khởi hành *</label>
                                <input type="date" class="form-control" v-model="form.ngayKhoiHanh" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ngày kết thúc *</label>
                                <input type="date" class="form-control" v-model="form.ngayKetThuc" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả *</label>
                            <textarea class="form-control" rows="5" v-model="form.moTa"></textarea>
                        </div>
                    </form>
                </div>

                <!-- Step 2 -->
                <div v-if="currentStep === 2">
                    <h5>Bước 2: Thêm hình ảnh</h5>
                    <input type="file" class="form-control mb-3" multiple accept="image/*" @change="handleFileUpload" />
                    <div class="row g-3" id="previewContainer">
                        <div v-for="(img, index) in previewImages" :key="index" class="col-6 col-md-2">
                            <div class="card">
                                <img :src="img" class="preview-img" />
                                <div class="card-body p-2 text-center">
                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                        @click="removeImage(index)">
                                        Remove file
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div v-if="currentStep === 3">
                    <h5>Bước 3: Nhập lộ trình</h5>
                    <div class="mb-3">
                        <button class="btn btn-success btn-sm mb-2" @click.prevent="addTimeline">
                            Thêm Timeline
                        </button>
                        <div v-for="(tl, index) in form.timeline" :key="index" class="mb-3">
                            <label class="form-label">Ngày {{ index + 1 }}</label>
                            <input type="text" class="form-control mb-2" placeholder="Tên hành trình"
                                v-model="tl.title" />
                            <textarea class="form-control" rows="4" placeholder="Chi tiết lịch trình..."
                                v-model="tl.content"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Nút điều hướng -->
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-secondary me-2" v-if="currentStep > 1" @click="prevStep">
                        Quay lại
                    </button>
                    <button class="btn btn-primary" v-if="currentStep < steps.length" @click="nextStep">
                        Tiếp theo
                    </button>
                    <button class="btn btn-success" v-if="currentStep === steps.length">
                        Hoàn thành
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentStep: 1,
            steps:
            


            
            form: {
                diemDen: "",
                khuVuc: "",
                soLuong: "",
                gia: "",          // gộp thành 1 giá
                ngayKhoiHanh: "",
                ngayKetThuc: "",
                moTa: "",
                timeline: [],
                images: []        // giữ file ảnh
            },
            previewImages: [],
        };
    },
    methods: {
        nextStep() {
            if (this.currentStep < this.steps.length) this.currentStep++;
        },
        prevStep() {
            if (this.currentStep > 1) this.currentStep--;
        },
        handleFileUpload(event) {
            const files = event.target.files;
            this.form.images = Array.from(files);  // lưu file thực tế để gửi API
            this.previewImages = [];

            this.form.images.forEach((file) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.previewImages.push(e.target.result);
                };
                reader.readAsDataURL(file);
            });
        },
        removeImage(index) {
            this.previewImages.splice(index, 1);
            this.form.images.splice(index, 1);
        },
        addTimeline() {
            this.form.timeline.push({ title: "", content: "" });
        },
    },
};
</script>

<style>
.step-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
}

.step-active {
    background-color: #0d6efd;
}

.step-inactive {
    background-color: #6c757d;
}

.preview-img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
}
</style>
