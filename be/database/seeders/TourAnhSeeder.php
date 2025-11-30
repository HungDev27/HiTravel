<?php

namespace Database\Seeders;

use App\Models\TourAnh;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourAnhSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Xóa dữ liệu cũ để tránh trùng lặp khi seed lại
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tour_anhs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $data = [];

        // --- 1. Tour Sapa (ID: 1) ---
        $data[] = ['id_tour' => 1, 'url' => 'https://dulichviet.com.vn/images/bandidau/ruong-bac-thang-sapa-mua-vang(1).jpg', 'mo_ta' => 'Ruộng bậc thang Sapa'];
        $data[] = ['id_tour' => 1, 'url' => 'https://www.vietourist.com.vn/public/frontend/uploads/kceditor/images/06ba27cafdbc28e271ad.jpg', 'mo_ta' => 'Đỉnh Fansipan'];
        $data[] = ['id_tour' => 1, 'url' => 'https://motogo.vn/wp-content/uploads/2020/02/sapa-cat-cat.jpg', 'mo_ta' => 'Bản Cát Cát'];

        // --- 2. Tour Hạ Long (ID: 2) ---
        $data[] = ['id_tour' => 2, 'url' => 'https://tructhang.vn/wp-content/uploads/2022/06/Truc-thang-Vinh-Ha-Long.jpg', 'mo_ta' => 'Toàn cảnh Vịnh Hạ Long'];
        $data[] = ['id_tour' => 2, 'url' => 'https://cdn3.ivivu.com/2020/02/tour-singapore-ivivu-9.jpg', 'mo_ta' => 'Du thuyền 5 sao'];
        $data[] = ['id_tour' => 2, 'url' => 'https://www.vietnambooking.com/wp-content/uploads/2023/12/hang-sung-sot-4.jpg', 'mo_ta' => 'Hang Sửng Sốt'];

        // --- 3. Tour Ninh Bình (ID: 3) ---
        $data[] = ['id_tour' => 3, 'url' => 'https://hiddencharmresort.com/static/upload/images/banner/service-a.jpg', 'mo_ta' => 'Bến thuyền Tràng An'];
        $data[] = ['id_tour' => 3, 'url' => 'https://nld.mediacdn.vn/291774122806476800/2025/8/11/dji202305271839200167d-1754880862074799106427.jpg', 'mo_ta' => 'Chùa Bái Đính'];
        $data[] = ['id_tour' => 3, 'url' => 'https://thungnham.com/wp-content/uploads/2022/10/Tuyet-Tinh-Coc-Thung-Nham-2.png', 'mo_ta' => 'Tuyệt Tình Cốc'];

        // --- 4. Tour Hà Giang (ID: 4) ---
        $data[] = ['id_tour' => 4, 'url' => 'https://vietluxtour.com/Upload/images/2024/khamphatrongnuoc/5%20%C4%91i%E1%BB%83m%20ng%E1%BA%AFm%20hoa%20HG/thoi-diem-ngam-hoa-tam-giac-mach.jpg', 'mo_ta' => 'Hoa Tam Giác Mạch'];
        $data[] = ['id_tour' => 4, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/chinh-phuc-deo-ma-pi-leng-tu-dai-dinh-deo-cua-vung-nui-dat-bac-1642065331.jpg', 'mo_ta' => 'Đèo Mã Pí Lèng'];
        $data[] = ['id_tour' => 4, 'url' => 'https://image.vietgoing.com/destination/large/vietgoing_uqr2101131289.webp', 'mo_ta' => 'Cột cờ Lũng Cú'];

        // --- 5. Tour Đà Lạt (ID: 5 - MỚI) ---
        $data[] = ['id_tour' => 5, 'url' => 'https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2018/05/canh-dep-tai-quangtruong-lamvien-vntrip-e1525679072972.png', 'mo_ta' => 'Quảng trường Lâm Viên'];
        $data[] = ['id_tour' => 5, 'url' => 'https://www.vietnamairlines.com/~/media/SEO-images/2025%20SEO/Traffic%20TV/thung-lung-tinh-yeu/thumb-thung-lung-tinh-yeu.jpg', 'mo_ta' => 'Thung lũng Tình Yêu'];
        $data[] = ['id_tour' => 5, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/kham-pha-dinh-langbiang-noc-nha-cua-da-lat-2-1634525379.jpg', 'mo_ta' => 'Đỉnh Langbiang'];

        // --- 6. Tour Quảng Bình (ID: 6 - MỚI) ---
        $data[] = ['id_tour' => 6, 'url' => 'https://api.sovaba.travel/uploads/he_thong_song_ngam_ben_trong_hang_dongpng_38168de2dd.png', 'mo_ta' => 'Hang Sơn Đoòng'];
        $data[] = ['id_tour' => 6, 'url' => 'https://cdn.tgdd.vn/Files/2021/07/05/1365760/kinh-nghiem-du-lich-kham-pha-dong-phong-nha-ke-bang-quang-binh-202202171110513103.jpg', 'mo_ta' => 'Động Phong Nha'];
        $data[] = ['id_tour' => 6, 'url' => 'https://ik.imagekit.io/tvlk/blog/2024/03/bien-nhat-le-2-1024x654.jpg?tr=q-70,c-at_max,w-1000,h-600', 'mo_ta' => 'Biển Nhật Lệ'];

        // --- 7. Tour Phan Thiết - Mũi Né (ID: 7 - MỚI) ---
        $data[] = ['id_tour' => 7, 'url' => 'https://media.loveitopcdn.com/41316/kcfinder/upload/images/101666553.jpg', 'mo_ta' => 'Đồi cát trắng Bàu Trắng'];
        $data[] = ['id_tour' => 7, 'url' => 'https://images2.thanhnien.vn/528068263637045248/2025/4/20/dsc05915-1745139002176745685664.jpg', 'mo_ta' => 'Suối Tiên'];
        $data[] = ['id_tour' => 7, 'url' => 'https://muinejeeptour.com/wp-content/uploads/2020/04/nhung-chiec-xe-leo-doi-cat-mui-ne-2.jpg', 'mo_ta' => 'Xe Jeep Đồi Cát'];

        // --- 8. Tour Đà Nẵng (ID: 8) ---
        $data[] = ['id_tour' => 8, 'url' => 'https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2022/10/10/1103073/2.jpg', 'mo_ta' => 'Cầu Vàng Bà Nà Hills'];
        $data[] = ['id_tour' => 8, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/pho-co-hoi-an-di-san-kien-truc-an-tuong-cua-the-gioi-15-1617438211.jpg', 'mo_ta' => 'Phố cổ Hội An'];
        $data[] = ['id_tour' => 8, 'url' => 'https://queenbus.com.vn/wp-content/uploads/2025/08/Cau-Rong-Da-Nang-phun-lua-Anh-Suu-tam.jpg', 'mo_ta' => 'Cầu Rồng phun lửa'];

        // --- 9. Tour Huế (ID: 9) ---
        $data[] = ['id_tour' => 9, 'url' => 'https://queenbus.com.vn/wp-content/uploads/2025/07/Dai-Noi-Hue-khi-hoang-hon-buong-xuong-1.jpg', 'mo_ta' => 'Đại Nội Huế'];
        $data[] = ['id_tour' => 9, 'url' => 'https://www.vietourist.com.vn/public/frontend/uploads/kceditor/images/M_20220805_KHAIDINH.jpg', 'mo_ta' => 'Lăng Khải Định'];
        $data[] = ['id_tour' => 9, 'url' => 'https://bizweb.dktcdn.net/100/101/075/articles/hue-3e48ae39-6292-4cdd-a5e8-ccf34b9e05e2.jpg?v=1558343103230', 'mo_ta' => 'Ca Huế sông Hương'];

        // --- 10. Tour Nha Trang (ID: 10) ---
        $data[] = ['id_tour' => 10, 'url' => 'https://cdn3.ivivu.com/2023/02/vin-wonders-nha-trang-ivivu-2.jpg', 'mo_ta' => 'VinWonders Nha Trang'];
        $data[] = ['id_tour' => 10, 'url' => 'https://vietmytravel.com/wp-content/uploads/2017/07/AAEAAQAAAAAAAAmlAAAAJGIzNjU0NGIwLTQ1ZWItNDQ0My1hMDUzLTYwYzExOGNhYzAzZg.jpg', 'mo_ta' => 'Lặn biển Hòn Mun'];
        $data[] = ['id_tour' => 10, 'url' => 'https://upload.wikimedia.org/wikipedia/commons/1/12/Th%C3%A1p_B%C3%A0_PONAGAR_-_panoramio.jpg', 'mo_ta' => 'Tháp Bà Ponagar'];

        // --- 11. Tour Quy Nhơn (ID: 11) ---
        $data[] = ['id_tour' => 11, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/ky-co-quy-nhon-eo-gio-1721960275.jpg', 'mo_ta' => 'Biển Kỳ Co'];
        $data[] = ['id_tour' => 11, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/ky-co-eo-gio-4-1751644636.jpg', 'mo_ta' => 'Eo Gió'];
        $data[] = ['id_tour' => 11, 'url' => 'https://statics.vinpearl.com/ganh-da-dia-phu-yen_1751078702.jpg', 'mo_ta' => 'Ghềnh Đá Đĩa'];

        // --- 12. Tour Tây Nguyên (ID: 12 - MỚI) ---
        $data[] = ['id_tour' => 12, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/thac-dray-nur-01-1695793450.jpg', 'mo_ta' => 'Thác Dray Nur'];
        $data[] = ['id_tour' => 12, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/chiem-nguong-bien-ho-pleiku-bien-ho-tnung-tuyet-dep-01-1659458379.jpg', 'mo_ta' => 'Biển Hồ Pleiku'];
        $data[] = ['id_tour' => 12, 'url' => 'https://cdn.xanhsm.com/2024/12/b400b825-buon-don-dak-lak-01.jpg', 'mo_ta' => 'Khu du lịch Buôn Đôn'];

        // --- 13. Tour Cần Thơ (ID: 13 - MỚI) ---
        $data[] = ['id_tour' => 13, 'url' => 'https://statics.vinpearl.com/cho-noi-cai-rang-2_1624262882.jpg', 'mo_ta' => 'Chợ nổi Cái Răng'];
        $data[] = ['id_tour' => 13, 'url' => 'https://vietnamtouristvn.com/thumbs/1500x1000x2/upload/news/hbtet-nguyen-dan-my-tho-can-tho-tour-ben-ninh-kieu-can-tho-2-4850.jpg', 'mo_ta' => 'Bến Ninh Kiều'];
        $data[] = ['id_tour' => 13, 'url' => 'https://ik.imagekit.io/tvlk/blog/2023/07/CFYcWDnl-vuon-co-bang-lang-3.jpg', 'mo_ta' => 'Vườn cò Bằng Lăng'];

        // --- 14. Tour Phú Quốc (ID: 14) ---
        $data[] = ['id_tour' => 14, 'url' => 'https://cdn3.ivivu.com/2022/08/sunset-sanato-phu-quoc.jpg', 'mo_ta' => 'Sunset Sanato'];
        $data[] = ['id_tour' => 14, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/grand-world-1-1710640341.jpg', 'mo_ta' => 'Grand World'];
        $data[] = ['id_tour' => 14, 'url' => 'https://ik.imagekit.io/tvlk/blog/2022/07/dHj0gcod-bai-sao-8.jpg', 'mo_ta' => 'Bãi Sao'];

        // --- 15. Tour Miền Tây (ID: 15) ---
        $data[] = ['id_tour' => 15, 'url' => 'https://hoidisanvanhoa.vn/wp-content/uploads/2025/06/260724a2.jpg', 'mo_ta' => 'Chợ nổi Ngã Bảy'];
        $data[] = ['id_tour' => 15, 'url' => 'https://thamhiemmekong.com/wp-content/uploads/2020/04/nhacongtubaclieu-01-1.jpg', 'mo_ta' => 'Nhà công tử Bạc Liêu'];
        $data[] = ['id_tour' => 15, 'url' => 'https://media-cdn-v2.laodong.vn/storage/newsportal/2024/9/1/1387950/Chua-Doi-6.jpg', 'mo_ta' => 'Chùa Dơi Sóc Trăng'];

        // --- 16. Tour Côn Đảo (ID: 16) ---
        $data[] = ['id_tour' => 16, 'url' => 'https://hnm.1cdn.vn/2024/02/03/hd45.jpg', 'mo_ta' => 'Nghĩa trang Hàng Dương'];
        $data[] = ['id_tour' => 16, 'url' => 'https://cdn3.ivivu.com/2023/03/b%C3%A3i-%C4%90%E1%BA%A7m-Tr%E1%BA%A7u-ivivu-3.jpg', 'mo_ta' => 'Bãi Đầm Trầu'];
        $data[] = ['id_tour' => 16, 'url' => 'https://dsvh.gov.vn/ckfinder/userfiles/images/Thong%20tin%20ds/DTQGDB_Trai%20Phu%20Son.jpg', 'mo_ta' => 'Nhà tù Côn Đảo'];

        // --- 17. Tour Vũng Tàu (ID: 17) ---
        $data[] = ['id_tour' => 17, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/tuong-chua-kito-vung-tau-tuong-chua-jesus-lon-nhat-chau-a-1633941577.jpg', 'mo_ta' => 'Tượng Chúa Kito'];
        $data[] = ['id_tour' => 17, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/hai-dang-vung-tau-dia-diem-tham-quan-khong-the-bo-lo-khi-den-voi-thanh-pho-bien-than-yeu-01-1633607444.jpg', 'mo_ta' => 'Hải đăng Vũng Tàu'];
        $data[] = ['id_tour' => 17, 'url' => 'https://cdn.xanhsm.com/2025/03/742139dd-bai-sau-vung-tau-2.jpg', 'mo_ta' => 'Bãi Sau'];

        // --- 18. Tour Sài Gòn (ID: 18 - MỚI) ---
        $data[] = ['id_tour' => 18, 'url' => 'https://motogo.vn/wp-content/uploads/2018/08/the-landmark-81-1.jpeg', 'mo_ta' => 'Landmark 81'];
        $data[] = ['id_tour' => 18, 'url' => 'https://thanhnien.mediacdn.vn/Uploaded/dongns/2022_04_07/tru-so-ubnd-tp-hcm-29-3-1178.jpg', 'mo_ta' => 'UBND Thành phố'];
        $data[] = ['id_tour' => 18, 'url' => 'https://cdn.xanhsm.com/2024/11/78626cf9-cho-ben-thanh-6.jpg', 'mo_ta' => 'Chợ Bến Thành'];

        // --- 19. Tour Cát Bà - Hải Phòng (ID: 19 - MỚI) ---
        $data[] = ['id_tour' => 19, 'url' => 'https://catbaexpress.com/upload/images/toan-canh-flamingo-cat-ba-beach-resort.jpg', 'mo_ta' => 'Toàn cảnh Đảo Cát Bà'];
        $data[] = ['id_tour' => 19, 'url' => 'https://dreamtravel.com.vn/Uploads/images/Uy%C3%AAn%202020/Ha%20Long/lang-chai-Viet-hai1.jpg', 'mo_ta' => 'Vịnh Lan Hạ'];
        $data[] = ['id_tour' => 19, 'url' => 'https://bizweb.dktcdn.net/thumb/grande/100/410/190/products/tour-dao-khi-suoi-hoa-lan-12.jpg?v=1668660744563', 'mo_ta' => 'Đảo Khỉ'];

        // --- 20. Tour Cao Bằng - Thác Bản Giốc (ID: 20 - MỚI) ---
        $data[] = ['id_tour' => 20, 'url' => 'https://dulichviet.com.vn/images/bandidau/TIN-TUC/du-lich-cao-bang/thac-ban-gioc-cao-bang-du-lich-viet.jpg', 'mo_ta' => 'Thác Bản Giốc hùng vĩ'];
        $data[] = ['id_tour' => 20, 'url' => 'https://media.vietravel.com/images/Content/du-lich-dong-nguom-ngao-1.jpg', 'mo_ta' => 'Động Ngườm Ngao'];
        $data[] = ['id_tour' => 20, 'url' => 'https://liontrip.vn/wp-content/uploads/2022/07/15-13.png', 'mo_ta' => 'Suối Lê-nin - Pác Bó'];

        TourAnh::insert($data);
    }
}
