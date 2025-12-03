<template>
    <!-- Thêm màu nền nhẹ cho toàn bộ trang -->
    <div class="container py-4 py-md-5" style="background-color: #f7f9fc;">
        <div class="row g-4 justify-content-center">
            
            <!-- CỘT NỘI DUNG CHÍNH -->
            <div class="col-lg-12">
                <div style="background-color: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); padding: 1.5rem 3rem;">

                    <!-- 1. HEADER (TIÊU ĐỀ & THÔNG TIN) -->
                    <header style="padding-bottom: 1rem; margin-bottom: 1.5rem; border-bottom: 1px solid #e9ecef;">
                        
                        <!-- Danh mục (Category) -->
                        <span style="background-color: #e6f7ff; color: #007bff; font-weight: bold; padding: 0.6em 1em; border-radius: 50rem; text-transform: uppercase; display: inline-block; margin-bottom: 1rem;">
                            <i class="fa-solid fa-layer-group me-1"></i> {{ chi_tiet_bai_viet.danh_muc?.ten_danh_muc || 'Tin tức' }}
                        </span>

                        <!-- Tiêu đề -->
                        <h1 style="font-size: 2.5rem; font-weight: 800; color: #212529; margin-bottom: 1rem; line-height: 1.3;">
                            {{ chi_tiet_bai_viet.tieu_de || 'Đang tải tiêu đề bài viết...' }}
                        </h1>
                        
                        <!-- Meta data (Ngày và Chia sẻ) -->
                        <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 1rem; color: #6c757d; font-size: 0.875rem;">
                            <!-- Ngày đăng -->
                            <span><i class="fa-solid fa-calendar-alt me-1" style="color: #dc3545;"></i> {{ formatDate(chi_tiet_bai_viet.created_at) }}</span>
                            
                            <!-- Social Share -->
                            <div style="margin-left: auto; display: flex; align-items: center;">
                                <span style="margin-right: 0.5rem; font-weight: 600;">Chia sẻ:</span>
                                <!-- Facebook -->
                                <a href="#" title="Chia sẻ Facebook"
                                    style="display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background-color: #007bff; color: white; margin-right: 0.25rem; width: 30px; height: 30px; font-size: 1rem;">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <!-- Twitter -->
                                <a href="#" title="Chia sẻ Twitter"
                                    style="display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background-color: #17a2b8; color: white; margin-right: 0.25rem; width: 30px; height: 30px; font-size: 1rem;">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                                <!-- Email -->
                                <a href="#" title="Chia sẻ Email"
                                    style="display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background-color: #dc3545; color: white; width: 30px; height: 30px; font-size: 1rem;">
                                    <i class="fa-solid fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </header>

                    <!-- 2. HÌNH ẢNH ĐẠI DIỆN -->
                    <div style="margin-bottom: 3rem; border-radius: 0.5rem; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);">
                        <img :src="chi_tiet_bai_viet.hinh_anh || 'https://i.pinimg.com/736x/56/fc/fb/56fcfb804e829afd4070b093ff9c0f50.jpg'" 
                             alt="Hình ảnh bài viết" 
                             style="width: 100%; height: auto; max-height: 500px; object-fit: cover; display: block;" 
                             >
                    </div>

                    <!-- 3. MÔ TẢ NGẮN (PULLQUOTE) -->
                    <div style="background-color: #fff3cd; border-left: 4px solid #ffc107; border-radius: 0.25rem; padding: 1.5rem; margin-top: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">
                        <p style="font-weight: 600; font-style: italic; color: #c08401; margin-bottom: 0;">
                            <i class="fa-solid fa-quote-left me-2"></i> {{ chi_tiet_bai_viet.mo_ta_ngan || 'Đoạn tóm tắt ngắn về nội dung chính của bài viết...' }}
                        </p>
                    </div>

                    <!-- 4. NỘI DUNG CHI TIẾT -->
                    <div style="line-height: 1.75;">
                        <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: #212529;">Nội dung chi tiết:</h3>
                        <!-- Render nội dung HTML -->
                        <div v-html="chi_tiet_bai_viet.noi_dung"></div>
                        <div style="clear: both;"></div>
                    </div>
                    
                    <!-- 5. TAGS -->
                    <div style="margin-top: 3rem; padding-top: 1rem; border-top: 1px solid #e9ecef;">
                        <span style="font-weight: 700; color: #6c757d; margin-right: 0.5rem; font-size: 1rem;"><i class="fa-solid fa-tags me-1"></i> Thẻ (Tags):</span>
                        <template v-if="chi_tiet_bai_viet.tag" v-for="tag in chi_tiet_bai_viet.tag.split(',')" :key="tag">
                            <a href="#"
                                style="display: inline-block; border-radius: 50rem; background-color: #f8f9fa; color: #6c757d; text-decoration: none; margin-right: 0.25rem; margin-bottom: 0.5rem; padding: 0.5rem 1rem; font-size: 0.875rem; border: 1px solid #ddd; transition: background-color 0.2s, box-shadow 0.2s;"
                                onmouseover="this.style.backgroundColor='#e9ecef'; this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.15)'"
                                onmouseout="this.style.backgroundColor='#f8f9fa'; this.style.boxShadow='none'">
                                #{{ tag.trim() }}
                            </a>
                        </template>
                        <span v-else style="color: #6c757d; font-size: 0.875rem; font-style: italic;">Không có thẻ nào được gắn.</span>
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
    watch: {
    '$route.params.id'(newId) {
        this.layChiTietBaiViet(newId);
        this.layBaiVietLienQuan(newId);
    }
}

}
</script>


<style>
</style>