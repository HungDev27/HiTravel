<template>
    <div id="heroCarousel" class="carousel slide carousel-fade hero" data-bs-ride="carousel" data-bs-interval="5000"
        data-bs-pause="false" data-bs-touch="true" data-bs-keyboard="true">
        <div class="carousel-inner">
            <div v-for="(src, i) in gifs" :key="i" class="carousel-item" :class="{ active: i === 0 }">
                <img :src="src" class="d-block w-100 hero-img" :alt="'gif-' + (i + 1)" />
            </div>
        </div>

        <!-- Overlay chữ đặt trong hero -->
        <div class="hero-overlay">
            <h1 class="hero-title">Biến ước mơ thành lịch trình</h1>
            <p class="hero-sub">
                Chạm tới những trải nghiệm chỉ người bản địa biết
            </p>

            <div class="hero-cta">
                <span class="hand">Book tour ngay</span>
                <span class="cta-divider" aria-hidden="true"></span>
                <span class="hand">Săn Voucher</span>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Prev</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</template>

<script setup>
import gif1 from "../../assets/images/homecustomer/gif3.gif";
import gif2 from "../../assets/images/homecustomer/gif1.gif";
import gif3 from "../../assets/images/homecustomer/gif2.gif";
const gifs = [gif1, gif2, gif3];
// Or use /public: const gifs = ['/gifs/hero1.gif','/gifs/hero2.gif','/gifs/hero3.gif']
</script>

<style scoped>
.hero {
    position: relative;
    height: 80vh;
    overflow: hidden;
}

/* Đảm bảo slide cao bằng hero */
.hero .carousel-inner,
.hero .carousel-item {
    height: 100%;
}

/* GIF trong slide */
.hero-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Lớp tối giúp đọc chữ */
.hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top,
            rgba(0, 0, 0, 0.45),
            rgba(0, 0, 0, 0.15) 50%,
            transparent);
    pointer-events: none;
    z-index: 1;
}

/* Chữ luôn trên cùng */
.hero-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0 24px;
    color: #fff;
    pointer-events: none;
}

.hero-title {
    font-family: "Playfair Display", serif;
    font-weight: 700;
    font-size: clamp(28px, 4.2vw, 68px);
    line-height: 1.05;
    margin: 0 0 12px;
    text-shadow: 0 6px 18px rgba(0, 0, 0, 0.45);
}

.hero-sub {
    font-size: clamp(14px, 1.6vw, 22px);
    margin: 0;
    opacity: 0.95;
}

/* Dòng chữ viết tay ở giữa hero */
.hero-cta{
  display: flex;
  align-items: center;
  gap: clamp(20px, 4vw, 60px);
  margin-top: clamp(12px, 2.5vw, 28px);
}

/* Font viết tay */
.hand{
  font-family: "Caveat", cursive;
  font-weight: 700;
  font-size: clamp(28px, 3.6vw, 56px);
  line-height: 1;
  color: #fff;
  letter-spacing: .5px;
  text-shadow: 0 6px 18px rgba(0,0,0,.35);
  white-space: nowrap;
}

/* Vạch chia vàng nhạt ở giữa */
.cta-divider{
  width: 2px;
  height: clamp(50px, 9vw, 120px);
  background: rgba(227, 199, 153, 0.9);
  box-shadow: 0 0 12px rgba(227,199,153,.35);
}

@media (max-width: 576px) {
    .hero {
        height: 56vh;
    }
}
</style>
