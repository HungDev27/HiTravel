<!-- <template>
  <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
        <div class="col mx-auto">
          <div class="card radius-10">
            <div class="card-body">
              <div class="border p-4 rounded">
                <div class="text-center mb-4">
                  <img src="https://dzfullstack.com/assets/images/logo-1.png" width="150" alt="" />
                  <h4 class="mt-3 font-weight-bold text-uppercase text-nowrap">
                    ĐĂNG NHẬP ADMIN <span class="text-primary">DZCinema</span>
                  </h4>
                </div>
                <div class="form-body">
                  <div class="row g-3">
                    <div class="col-12">
                      <label class="form-label">Email</label>
                      <div class="input-group">
                        <span class="input-group-text bg-transparent">
                          <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input v-model="form.email" type="email" class="form-control border-start-0" placeholder="Email" />
                      </div>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Mật khẩu</label>
                      <div class="input-group">
                        <span class="input-group-text bg-transparent">
                          <i class="fa-solid fa-lock"></i>
                        </span>
                        <input v-model="form.password" @keydown.enter="dangNhap" type="password" class="form-control border-start-0" placeholder="Mật khẩu" />
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="d-grid">
                        <button @click="dangNhap" class="btn btn-primary">
                          <i class="fa-solid fa-right-to-bracket me-2"></i>
                          Đăng Nhập
                        </button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
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
      form: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    async dangNhap() {
      try {
        const payload = {
          email: this.form.email,
          mat_khau: this.form.password  // theo BE bạn dùng mat_khau
        }
        const res = await axios.post('http://127.0.0.1:8000/api/login', payload)

        // token có thể nằm trong access_token hoặc token tùy API
        const token = res.data.access_token || res.data.token || res.data.data?.token
        if (!token) {
          this.$toast.error('Không nhận được token từ server')
          return
        }

        // lưu token và user name
        localStorage.setItem('key_admin', token)
        // res.data.user hoặc res.data.user có thể trả về user object
        const user = res.data.user || res.data.data || res.data
        if (user && user.ho_va_ten) localStorage.setItem('ho_va_ten', user.ho_va_ten)

        // set header mặc định cho axios
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token

        this.$toast.success('Đăng nhập thành công')
        this.$router.push('/admin')
      } catch (err) {
        const msg = err.response?.data?.message || err.response?.data?.error || 'Đăng nhập thất bại'
        this.$toast.error(msg)
      }
    }
  },
  mounted() {
    const token = localStorage.getItem('key_admin')
    if (token) axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
  }
}
</script>

<style scoped>
/* thêm nếu cần chỉnh style */
</style> -->