<template>
    <div class="container py-5" style="background-color: #f7f9fc;">
        <div class="row g-4 justify-content-center">
            
            <div class="col-lg-10">
                <div style="background-color: white; border-radius: 1.5rem; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15); padding: 2rem 4rem;">

                    <header style="padding-bottom: 2rem; margin-bottom: 2rem; border-bottom: 1px solid #e0e0e0;">
                        
                        <span style="background-color: #007bff; color: white; font-weight: bold; padding: 0.6em 1.2em; border-radius: 50rem; text-transform: uppercase; font-size: 0.85rem; display: inline-block; margin-bottom: 1.5rem; box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);">
                            <i class="fa-solid fa-layer-group me-1"></i> {{ chi_tiet_bai_viet.danh_muc?.ten_danh_muc || 'Tin tức' }}
                        </span>

                        <h1 style="font-size: 3rem; font-weight: 900; color: #212529; margin-bottom: 1.5rem; line-height: 1.2;">
                            {{ chi_tiet_bai_viet.tieu_de || 'Đang tải tiêu đề bài viết...' }}
                        </h1>
                        
                        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; color: #6c757d; font-size: 0.95rem;">
                            <span><i class="fa-solid fa-calendar-alt me-1" style="color: #6c757d;"></i> Ngày đăng: **{{ formatDate(chi_tiet_bai_viet.created_at) }}**</span>
                            
                            <div style="display: flex; align-items: center;">
                                <span style="margin-right: 0.8rem; font-weight: 600; color: #333;">Chia sẻ bài viết:</span>
                                <a href="https://www.facebook.com/thuynhi.1205" title="Chia sẻ Facebook"
                                    style="display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background-color: #3b5998; color: white; margin-right: 0.5rem; width: 35px; height: 35px; font-size: 1.1rem; transition: transform 0.2s;"
                                    onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="https://x.com/HaynesVictoria0" title="Chia sẻ Twitter"
                                    style="display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background-color: #212529; color: white; margin-right: 0.5rem; width: 35px; height: 35px; font-size: 1.1rem; transition: transform 0.2s;"
                                    onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                                <a href="#" title="Chia sẻ Email"
                                    style="display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background-color: #dc3545; color: white; width: 35px; height: 35px; font-size: 1.1rem; transition: transform 0.2s;"
                                    onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                    <i class="fa-solid fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </header>

                    <div style="margin-bottom: 3rem; border-radius: 1rem; overflow: hidden; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                        <img :src="chi_tiet_bai_viet.hinh_anh || 'https://i.pinimg.com/736x/56/fc/fb/56fcfb804e829afd4070b093ff9c0f50.jpg'" 
                               alt="Hình ảnh bài viết" 
                               style="width: 100%; height: auto; max-height: 550px; object-fit: cover; display: block;" 
                               >
                    </div>

                    <div style="background-color: #fcfcfc; border-left: 5px solid #007bff; border-radius: 0.5rem; padding: 2rem; margin-top: 2rem; margin-bottom: 3rem; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);">
                        <p style="font-weight: 600; font-style: italic; color: #333; margin-bottom: 0; font-size: 1.15rem;">
                            <i class="fa-solid fa-quote-left me-3" style="color: #007bff;"></i> {{ chi_tiet_bai_viet.mo_ta_ngan || 'Đoạn tóm tắt ngắn về nội dung chính của bài viết...' }}
                        </p>
                    </div>

                    <div style="line-height: 1.8; font-size: 1.1rem; color: #343a40;">
                        <h3 style="font-size: 1.8rem; font-weight: 700; margin-bottom: 1.5rem; color: #212529;">Nội dung chi tiết:</h3>
                        <div v-html="chi_tiet_bai_viet.noi_dung"></div>
                        <div style="clear: both;"></div>
                    </div>
                    
                    <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #e0e0e0;">
                        <span style="font-weight: 700; color: #333; margin-right: 1rem; font-size: 1.1rem;"><i class="fa-solid fa-tags me-2" style="color: #ff9800;"></i> Thẻ (Tags):</span>
                        <template v-if="chi_tiet_bai_viet.tag" v-for="tag in chi_tiet_bai_viet.tag.split(',')" :key="tag">
                            <a href="#"
                                style="display: inline-block; border-radius: 50rem; background-color: #f0f8ff; color: #007bff; text-decoration: none; margin-right: 0.5rem; margin-bottom: 0.5rem; padding: 0.6rem 1.2rem; font-size: 0.95rem; border: 1px solid #cce5ff; transition: background-color 0.2s, color 0.2s, box-shadow 0.2s;"
                                onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white'; this.style.boxShadow='0 2px 10px rgba(0, 123, 255, 0.3)'"
                                onmouseout="this.style.backgroundColor='#f0f8ff'; this.style.color='#007bff'; this.style.boxShadow='none'">
                                #{{ tag.trim() }}
                            </a>
                        </template>
                        <span v-else style="color: #6c757d; font-size: 0.95rem; font-style: italic;">Không có thẻ nào được gắn.</span>
                    </div>

                </div>
                
                
                <div v-if="related_posts.length > 0" 
                     style="margin-top: 3rem; background-color: white; border-radius: 1.5rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); padding: 2rem;">
                    
                    <h2 style="font-size: 1.8rem; font-weight: 700; color: #dc3545; margin-bottom: 2rem; border-bottom: 2px solid #dc3545; padding-bottom: 0.5rem;">
                        <i class="fa-solid fa-fire-flame-curved me-2"></i> Bài viết liên quan
                    </h2>
                    
                    <div class="row g-4">
                        <div v-for="post in related_posts" :key="post.id" class="col-md-6 col-lg-4">
                            <router-link :to="`/chi-tiet-bai-viet/${post.id}`" style="text-decoration: none; color: inherit;" @click="layChiTietBaiViet(post.id)">
                                <div class="card h-100 shadow-sm"
                                    style="border: none; border-radius: 0.75rem; overflow: hidden; transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);"
                                    onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 15px 25px rgba(0, 0, 0, 0.15)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 5px rgba(0,0,0,0.08)'">
                                    
                                    <img :src="post.hinh_anh || 'https://i.pinimg.com/736x/56/fc/fb/56fcfb804e829afd4070b093ff9c0f50.jpg'" class="card-img-top" 
                                        style="height: 180px; object-fit: cover;">
                                    
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold truncate-2-lines" style="font-size: 1.1rem; color: #343a40;">
                                            {{ post.tieu_de }}
                                        </h5>
                                        <p class="card-text text-secondary mt-2 mb-3" style="font-size: 0.85rem;">
                                            <i class="fa-solid fa-calendar-day me-1"></i> {{ formatDate(post.created_at) }}
                                        </p>
                                        <span class="mt-auto fw-bold" style="font-size: 0.95rem; color: #007bff;">
                                            Đọc ngay →
                                        </span>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div v-if="related_posts.length === 0" class="col-12 text-center text-secondary py-3">
                            Không tìm thấy bài viết liên quan nào.
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
            
            chi_tiet_bai_viet: {},
            related_posts: []
        }
    },

    mounted() {
        this.layChiTietBaiViet(this.$route.params.id);
        this.layBaiVietLienQuan(this.$route.params.id);
    },

    methods: {
        // Hàm format ngày hiển thị
        formatDate(dateString) {
            if (!dateString) return '---';
            const date = new Date(dateString);
            return `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
        },

        layChiTietBaiViet(id) {
            axios.get(`http://127.0.0.1:8000/api/customer/bai-viet/${id}`)
                .then(res => {
                    this.chi_tiet_bai_viet = res.data.data;
                })
                .catch(err => {
                    console.error("Lỗi khi lấy chi tiết bài viết:", err);
                });
        },

        layBaiVietLienQuan(id) {
            axios.get(`http://127.0.0.1:8000/api/customer/bai-viet/${id}/related`)
                .then(res => {
                    this.related_posts = res.data.data;
                })
                .catch(err => {
                    console.error("Lỗi khi lấy bài viết liên quan:", err);
                });
        }

    },
    // Quan trọng: Sử dụng watch để tải dữ liệu mới khi URL ID thay đổi (ví dụ: click vào bài viết liên quan)
    watch: {
    '$route.params.id'(newId) {
        if (newId) {
            this.layChiTietBaiViet(newId);
            this.layBaiVietLienQuan(newId);
            window.scrollTo(0, 0); // Cuộn lên đầu trang khi chuyển bài
        }
    }
}

}
</script>