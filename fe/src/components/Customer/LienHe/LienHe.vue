<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Liên hệ với chúng tôi</h4>
                    </div>
                    <div class="card-body">
                        <input v-model="list_lien_he.ten" type="text" class="form-control mt-2 mb-3"
                            placeholder="Họ và tên">
                        <input v-model="list_lien_he.email" type="text" class="form-control mt-2 mb-3"
                            placeholder="Email">
                        <input v-model="list_lien_he.so_dien_thoai" type="text" class="form-control mt-2 mb-3"
                            placeholder="Điện Thoại">
                        <textarea v-model="list_lien_he.tin_nhan" class="form-control mt-2 mb-3" placeholder="Nội dung"
                            rows="3"></textarea>

                        <button @click="guiThongTinLienHe()" class="btn btn-primary mt-3">Gửi thông tin</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>Công ty cổ phần dịch vụ HiTravel</h4>
                        <div class="d-flex ">
                            <div class="me-auto p-2 mt-2 ms-2"><i class="fa-solid fa-location-dot fa-2x"></i></div>
                            <div class="p-2">
                                <h6><b>Địa chỉ:</b></h6>
                                <p class="mt-0">Tầng 6, Tòa HaHa, Điện Biên Phủ, Quận Thanh Khê, TP Đà Nẵng</p>
                            </div>
                        </div>
                        <div class="d-flex ">
                            <div class="p-2 mt-2 ms-2"><i class="fa-solid fa-envelope fa-2x"></i></div>
                            <div class="p-2">
                                <h6><b>Email:</b></h6>
                                <p class="mt-0">hitreavel2025.@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex ">
                            <div class="p-2 mt-2 ms-2"><i class="fa-solid fa-phone fa-2x"></i></div>
                            <div class="p-2">
                                <h6><b>Hotline:</b></h6>
                                <p class="mt-0">01900 1900</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="text-center mt-5">
                    <img src="../../../assets/images/anh/lien-he.webp" alt="">
                </div>
                <p class="text-center mt-3"><b>Để được hỗ trợ nhanh hơn, vui lòng gửi yêu cầu của bạn qua biểu mẫu</b>
                </p>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Câu hỏi & Giải Pháp</h5>
                        <hr>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Xác nhận và xác thực thanh toán
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body"> Thông báo sẽ được gửi tới sms và email của quý khách
                                        ngay khi xử lý xong</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body"> <strong>This is the second item's accordion
                                            body.</strong> It is hidden by default, until the collapse plugin adds the
                                        appropriate classes that we use to style each element. These classes control the
                                        overall appearance, as well as the showing and hiding via CSS transitions. You
                                        can modify any of this with custom CSS or overriding our default variables. It's
                                        also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body"> <strong>This is the third item's accordion
                                            body.</strong> It is hidden by default, until the collapse plugin adds the
                                        appropriate classes that we use to style each element. These classes control the
                                        overall appearance, as well as the showing and hiding via CSS transitions. You
                                        can modify any of this with custom CSS or overriding our default variables. It's
                                        also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Accordion Item #4
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body"> <strong>This is the third item's accordion
                                            body.</strong> It is hidden by default, until the collapse plugin adds the
                                        appropriate classes that we use to style each element. These classes control the
                                        overall appearance, as well as the showing and hiding via CSS transitions. You
                                        can modify any of this with custom CSS or overriding our default variables. It's
                                        also worth noting that just about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-5 rounded-4 mb-3">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85173.5212069165!2d108.1317669179169!3d16.055763435616438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219aafa4f3439%3A0xcfe6be4cbf03eda1!2zxJBp4buHbiBCacOqbiBQaOG7pywgVGhhbmggS2jDqiwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1756047160853!5m2!1svi!2s"
                style="border:25px; height: 400px; width: 100%; border-radius: 1rem;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list_lien_he: {
                ten: '',
                email: '',
                so_dien_thoai: '',
                tin_nhan: '',
                trang_thai: 'chua_xem',
            }
        }
    },
    methods: {
        validateLienHe(data) {
            if (!data.ten || !data.email || !data.so_dien_thoai || !data.tin_nhan) {
                this.$toast.error("Vui lòng nhập đầy đủ thông tin!");
                return false;
            }
            return true;
        },
        guiThongTinLienHe() {
            if (!this.validateLienHe(this.list_lien_he)) return;

            axios
                .post("http://127.0.0.1:8000/api/admin/lien-he/guiThongTin", this.list_lien_he)

                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.list_lien_he = {
                            ten: '',
                            email: '',
                            so_dien_thoai: '',
                            tin_nhan: ''
                        };
                    } else {
                        this.$toast.error(res.data.message || "Gửi thất bại!");
                    }
                })
                .catch(() => this.$toast.error("API lỗi khi gửi thông tin!"));
        }



    }
}
</script>
<style></style>