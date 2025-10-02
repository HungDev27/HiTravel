<template>
  <div class="container mt-4">
    <img class="rounded-3"
      src="https://ik.imagekit.io/tvlk/image/imageResource/2025/09/23/1758612819110-c35e35694d981ca9e02d7a78a17db799.jpeg"
      style="height: 250px; width: 1300px;">
    <h4 style="font-family: 'Poppins', 'Segoe UI', Tahoma, sans-serif; letter-spacing: 0.5px; font-weight: 600;"
      class="mt-5 text-primary"><b>Đi chơi cuối tuần</b></h4>
    <h6 style="font-family: 'Poppins', 'Segoe UI', Tahoma, sans-serif; letter-spacing: 0.5px; font-weight: 600;"
      class="mt-2 text-secondary">Giảm đến 500K</h6>
    <img class="rounded-3 mt-3"
      src="https://ik.imagekit.io/tvlk/image/imageResource/2025/07/11/1752216646304-2d71c0cb391661eda813154aa4470617.jpeg?tr=dpr-2,q-75,w-1280"
      style="height: 250px; width: 1300px;">

    <!-- Khuyến mãi Xperience đang diễn ra -->
    <h4 style="font-family: 'Poppins', 'Segoe UI', Tahoma, sans-serif; letter-spacing: 0.5px; font-weight: 600;"
      class="mt-5 text-primary"><b>Khuyến mãi Xperience đang diễn ra</b></h4>
    <h6 style="font-family: 'Poppins', 'Segoe UI', Tahoma, sans-serif; letter-spacing: 0.5px; font-weight: 600;"
      class="mt-3 text-secondary">Tiết kiệm lớn với các ưu đãi đặc biệt có thời hạn</h6>

    <!-- Carousel -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner rounded-3 mt-4 mb-3" style="height: 250px; width: 1300px;">
        <div class="carousel-item active" data-bs-interval="10000">
          <img
            src="https://ik.imagekit.io/tvlk/image/imageResource/2025/09/04/1756970055334-e90a04ddaea16773792faa1b988fad56.jpeg?tr=q-75"
            class="d-block w-100" style="height: 250px; width: 1300px;">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img
            src="https://ik.imagekit.io/tvlk/image/imageResource/2025/05/15/1747317304547-6eedf1d2eed401f592708aaafcfec177.jpeg?tr=q-75"
            class="d-block w-100" style="height: 250px; width: 1300px;">
        </div>
        <div class="carousel-item">
          <img
            src="https://ik.imagekit.io/tvlk/image/imageResource/2025/09/08/1757328406463-74f63e17db330f420419d988783d6627.jpeg?tr=q-75"
            class="d-block w-100" style="height: 250px; width: 1300px;">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- DANH SÁCH BÀI VIẾT -->
    <h4 class="mt-5 text-primary"
      style="font-family:'Poppins','Segoe UI',Tahoma,sans-serif;letter-spacing:.5px;font-weight:600;">
      <b>Bài viết nổi bật</b>
    </h4>

    <div>
      <!-- Tabs danh mục bài viết -->
      <ul class="nav nav-pills" role="tablist">
        <li v-for="(value, index) in danhMucBV" :key="index" class="nav-item">
          <!-- Click tab => đổi activeDanhMuc; tab đang chọn có class active -->
          <a class="nav-link" :class="{ active: activeDanhMuc === value.id }" @click.prevent="activeDanhMuc = value.id">
            {{ value.ten_danh_muc }}
          </a>
        </li>
      </ul>
      <div class="d-flex justify-content-end">
        <router-link v-if="activeDanhMuc === 1" :to="activeDanhMuc === 1 ? '/tour-all' : '/bai-viet'">
          <div class="text-success text-end" style="font-size: 13px; border-radius: 1rem; transition:0.4s;"
            onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">
            <u>Xem thêm tour →</u>
          </div>
        </router-link>
      </div>

      <!-- Grid bài viết -->
      <div class="row mt-3">
        <div class="col-lg-3 mb-3" v-for="(value, index) in filteredPosts" :key="index">
          <router-link :to="activeDanhMuc === 1
            ? `/chi-tiet-tour/${value.id}`
            : `/chi-tiet-bai-viet/${value.id}`">
            <div class="card h-100 shadow-sm border-0" style="border-radius:12px;overflow:hidden;">
              <img :src="value.hinh_anh" class="card-img-top" style="height:180px;object-fit:cover;">
              <div class="card-body">
                <h6 class="mb-2" style="font-weight:700;line-height:1.3;">{{ value.tieu_de }}</h6>
                <p class="excerpt mb-0">{{ value.mo_ta_ngan }}</p>
              </div>
            </div>
          </router-link>
        </div>
      </div>


    </div>

  </div>

</template>
<script>
export default {
  data() {
    return {
      // Tab mặc định
      activeDanhMuc: 1,

      danhMucBV: [
        { id: 1, ten_danh_muc: "Điểm đến" },
        { id: 2, ten_danh_muc: "Kinh nghiệm du lịch" },
        { id: 3, ten_danh_muc: "Tin tức - Khuyến mãi" }
      ],
      baiViet: [
        {
          id: 1, tieu_de: "Hà Nội City Tour", mo_ta_ngan: "Khám phá thủ đô ngàn năm văn hiến",
          hinh_anh: "https://hoangthanhthanglong.vn/wp-content/uploads/2023/05/hanoi.jpg",
          id_danh_muc: 1, tag: "diem-den"
        },

        {
          id: 2, tieu_de: "Vịnh Hạ Long", mo_ta_ngan: "Di sản thiên nhiên thế giới",
          hinh_anh: "https://statics.vinpearl.com/ha-long-bay-in-vietnam-1_1689180838.jpg",
          id_danh_muc: 1, tag: "diem-den"
        },

        {
          id: 3, tieu_de: "Sa Pa - Fansipan", mo_ta_ngan: "Trải nghiệm nóc nhà Đông Dương",
          hinh_anh: "https://media.vietravel.com/images/Content/dia-diem-du-lich-sapa-1.png",
          id_danh_muc: 1, tag: "diem-den"
        },

        {
          id: 4, tieu_de: "Ninh Bình - Tràng An", mo_ta_ngan: "Vịnh Hạ Long trên cạn",
          hinh_anh: "https://trangandanhthang.vn/wp-content/uploads/2025/06/khu-du-lich-trang-an-1.png",
          id_danh_muc: 1, tag: "diem-den"
        },

        // Kinh nghiệm
        {
          id: 5, tieu_de: "5 Mẹo săn vé rẻ đi nội địa", mo_ta_ngan: "Đặt vé giờ vàng, canh flash sale…",
          hinh_anh: "https://vietjet.asia/assets/uploads/2017/06/san-ve-may-bay-03.png",
          id_danh_muc: 2, tag: "kinh-nghiem"
        },

        {
          id: 6, tieu_de: "Checklist du lịch Đà Nẵng 3N2Đ", mo_ta_ngan: "Ở đâu, ăn gì, chơi gì cho hợp lý?",
          hinh_anh: "https://images.baoangiang.com.vn/image/fckeditor/upload/2023/20230528/images/image001(1).jpg",
          id_danh_muc: 2, tag: "kinh-nghiem"
        },

        {
          id: 7, tieu_de: "Kinh nghiệm phượt Hà Giang", mo_ta_ngan: "Lịch trình 4N3Đ, chi phí và lưu ý",
          hinh_anh: "https://static.vinwonders.com/production/2025/08/duong-phuot-ha-giang-bang-xe-may.jpg",
          id_danh_muc: 2, tag: "kinh-nghiem"
        },

        {
          id: 8, tieu_de: "Chuẩn bị đồ cho chuyến đi biển", mo_ta_ngan: "Những món không thể thiếu",
          hinh_anh: "https://static.vinwonders.com/production/di-bien-can-chuan-bi-gi-3.jpg",
          id_danh_muc: 2, tag: "kinh-nghiem"
        },

        // Tin tức - Khuyến mãi
        {
          id: 9, tieu_de: "Siêu ưu đãi mùa thu", mo_ta_ngan: "Giảm đến 40% tour nội địa",
          hinh_anh: "https://datviettour.com.vn/uploads/images/tin-tuc/khuyen-mai/chum-tour-mua-thu-2022/du-lich-mua-thu-khuyen-mai.jpg",
          id_danh_muc: 3, tag: "tin-tuc"
        },

        {
          id: 10, tieu_de: "Mở tuyến tour mới Côn Đảo", mo_ta_ngan: "Lịch khởi hành hằng tuần",
          hinh_anh: "https://bcp.cdnchinhphu.vn/334894974524682240/2022/4/2/con-dao-1648858077344216792948.jpg",
          id_danh_muc: 3, tag: "tin-tuc"
        },

        {
          id: 11, tieu_de: "Combo Phú Quốc 3N2Đ", mo_ta_ngan: "Giá sốc, số lượng có hạn",
          hinh_anh: "https://www.vietnamvisa.org.vn/wp-content/uploads/2024/08/Phu-Quo-Island-Vietnam.jpg",
          id_danh_muc: 3, tag: "tin-tuc"
        },

        {
          id: 12, tieu_de: "Thông báo lịch nghỉ Tết", mo_ta_ngan: "Lịch hoạt động & hỗ trợ khách hàng",
          hinh_anh: "https://bizweb.dktcdn.net/100/094/983/files/ba-i-vie-t-zalo-3-2001-800.png?v=1706873354202",
          id_danh_muc: 3, tag: "tin-tuc"
        },
      ],
    };
  },

  computed: {
    filteredPosts() {
      return this.baiViet
        .filter(value => value.id_danh_muc === this.activeDanhMuc) // lọc theo danh mục
        .slice(0, 10); // chỉ lấy 10 bài viết đầu
    }
  },

  methods: {
  }
};

</script>

<style></style>