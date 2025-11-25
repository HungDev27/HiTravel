<template>
  <div class="position-relative">

    <!-- Ảnh -->
    <img src="../../../assets/images/homecustomer/Poster2.png" style="max-width: 100%; height: auto; display: block;">
    <div class="position-absolute top-50 start-0 translate-middle-y">
      <div class="card" style="width: 500px;;border-radius: 15px; margin-bottom: 400px; margin-left: 250px;">
        <div class="card-body">
          <h2 class="text-center"><b>Đăng nhập</b></h2>

          <!-- Thông tin nhập vào -->
          <label style="font-size: 17px;" class="mb-2 ms-3 mt-3">Nhập email</label>
          <input v-model="thong_tin_dang_nhap.email" type="text" class="form-control mt-1"
            style="border-radius: 90px; width: 465px;">
          <label style="font-size: 17px;" class="mb-2 ms-3 mt-3">Nhập mật khẩu</label>
          <input v-model="thong_tin_dang_nhap.password" @keydown.enter="dangNhap()" type="password"
            class="form-control mt-1" style="border-radius: 90px; width: 465px;">

          <!-- Quan trang đăng ký -->
          <div class="text-center mt-3">
            <i>Chưa là thành viên?
              <a href="/dang-ky" style="color: cornflowerblue; text-decoration: underline;"><b><u>Đăng ký
                    ngay</u></b></a>
            </i>
          </div>

          <!-- Nút -->
          <div class="d-grid gap-2 mt-4 mb-4">
            <button @click="dangNhap()" class="btn btn-lg" type="button"
              style="background-color: #3b5998; border-radius: 100px; color: #ffffff;"
              onmouseover="this.style.backgroundColor='#5c76ab'" onmouseout="this.style.backgroundColor='#3b5998'">
              <b>Đăng Nhập</b>
            </button>
          </div>

          <div class="text-center">───────────
            <span class="ms-3 me-3">Đăng nhập với</span>
            ───────────
          </div>

          <!-- Đăng nhậP với -->
          <div class="d-flex flex-row mb-3 text-center justify-content-center mt-3">
            <div class="p-2"><button class="btn" style="background-color: cornflowerblue; border-radius: 100px;"><i
                  class="fa-brands fa-google" style="color: #ffffff;"></i><b class="text-white ms-2">Google</b></button>
            </div>
            <div class="p-2"><button class="btn text-center btn-outline-white" style="border-radius: 100px;"><i
                  class="fa-brands fa-facebook-f" style="color: cornflowerblue;"></i></button></div>
            <div class="p-2"><button class="btn text-center btn-outline-white" style="border-radius: 100px;"><i
                  class="fa-brands fa-twitter" style="color: cornflowerblue;"></i></button></div>
          </div>

          <div class="text-center">
            <a href="/quen-mat-khau" style="color: cornflowerblue; text-decoration: underline;"><b><u>Quên mật
                  khẩu?</u></b></a>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      thong_tin_dang_nhap: {}
    }
  },
  mounted() {
    // Nếu đã có token thì redirect luôn
    const token = localStorage.getItem('auth_token');
    if (token) {
      //const user = JSON.parse(localStorage.getItem("auth_user") || "{}");
      const role = user.id_chuc_vu;
      if (role == 1) this.$router.replace("/admin");
      else if (role == 2) this.$router.replace("/staff");
      else this.$router.replace("/");
    }
  },
  methods: {

    dangNhap() {
      axios
        .post("http://127.0.0.1:8000/api/dang-nhap", this.thong_tin_dang_nhap)
        .then((res) => {
          // Đăng nhập sai
          if (!res.data.status) {
            this.$toast.error(res.data.message);
            //this.thong_tin_dang_nhap = {};

            return;
          }
          // Trường hợp backend trả status false (sai thông tin hoặc inactive)
          if (!res.data.status) {
            this.$toast.error(res.data.message); // Hiển thị message từ backend
            return; // dừng hàm, không redirect
          }

          // LƯU TOKEN VÀ USER
          localStorage.setItem("auth_token", res.data.token);
          //localStorage.setItem("auth_user", JSON.stringify(res.data.user));

          this.$toast.success("Đăng nhập thành công");

          // PHÂN QUYỀN THEO id_chuc_vu
          const role = res.data.user.id_chuc_vu;

          // Redirect theo role
          if (role == 1) {
            this.$router.replace("/admin");
          } else if (role == 2) {
            this.$router.replace("/staff");
          } else {
            this.$router.replace("/");
          }
        })
        .catch((err) => {
          if (err.response && err.response.data && err.response.data.message) {
            this.$toast.error(err.response.data.message); // hiển thị message từ backend
          } else {
            this.$toast.error("Lỗi kết nối tới server API");
          }
        });
    }
  },
}
</script>
