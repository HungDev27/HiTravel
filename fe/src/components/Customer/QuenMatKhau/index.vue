<template>
    <div class="position-relative">

        <!-- Ảnh -->
        <img src="../../../assets/images/homecustomer/Poster2.png"
            style="max-width: 100%; height: auto; display: block;">
        <div class="position-absolute top-50 start-0 translate-middle-y">
            <div class="card" style="width: 500px;;border-radius: 15px; margin-bottom: 400px; margin-left: 250px;">
                <div class="card-body">
                    <h2 class="text-center"><b>Quên mật khẩu</b></h2>

                    <!-- Thông tin nhập vào -->
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Nhập email lấy lại mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email"
                                placeholder="example@gmail.com" required>
                        </div>
                        <div class="form-text">
                            Chúng tôi sẽ gửi mã xác minh đến địa chỉ email này.
                        </div>
                    </div>

                    <!-- Nút -->
                    <div class="d-grid gap-2 mt-4 mb-4">
                        <button class="btn btn-lg" type="button"
                            style="background-color: #3b5998; border-radius: 100px; color: #ffffff;"
                            onmouseover="this.style.backgroundColor='#5c76ab'"
                            onmouseout="this.style.backgroundColor='#3b5998'">
                            <b>Gửi mã</b>
                        </button>
                    </div>

                    <div class="text-center">
                        <span class="me-2">Trở lại trang</span>
                        <a href="/dang-nhap" style="color: cornflowerblue; text-decoration: underline;"><b><u>Đăng nhập</u></b></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {

}
</script>
