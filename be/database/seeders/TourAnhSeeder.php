<?php

namespace Database\Seeders;

use App\Models\TourAnh;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourAnhSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Xóa dữ liệu cũ
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tour_anhs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $data = [];

        // --- 1. Tour Hà Nội - Sapa (ID: 1) ---
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

        // --- 5. Tour Đà Nẵng (ID: 5) ---
        $data[] = ['id_tour' => 5, 'url' => 'https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2022/10/10/1103073/2.jpg', 'mo_ta' => 'Cầu Vàng Bà Nà Hills'];
        $data[] = ['id_tour' => 5, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/pho-co-hoi-an-di-san-kien-truc-an-tuong-cua-the-gioi-15-1617438211.jpg', 'mo_ta' => 'Phố cổ Hội An'];
        $data[] = ['id_tour' => 5, 'url' => 'https://queenbus.com.vn/wp-content/uploads/2025/08/Cau-Rong-Da-Nang-phun-lua-Anh-Suu-tam.jpg', 'mo_ta' => 'Cầu Rồng phun lửa'];

        // --- 6. Tour Huế (ID: 6) ---
        $data[] = ['id_tour' => 6, 'url' => 'https://queenbus.com.vn/wp-content/uploads/2025/07/Dai-Noi-Hue-khi-hoang-hon-buong-xuong-1.jpg', 'mo_ta' => 'Đại Nội Huế'];
        $data[] = ['id_tour' => 6, 'url' => 'https://www.vietourist.com.vn/public/frontend/uploads/kceditor/images/M_20220805_KHAIDINH.jpg', 'mo_ta' => 'Lăng Khải Định'];
        $data[] = ['id_tour' => 6, 'url' => 'https://bizweb.dktcdn.net/100/101/075/articles/hue-3e48ae39-6292-4cdd-a5e8-ccf34b9e05e2.jpg?v=1558343103230', 'mo_ta' => 'Ca Huế sông Hương'];

        // --- 7. Tour Nha Trang (ID: 7) ---
        $data[] = ['id_tour' => 7, 'url' => 'https://cdn3.ivivu.com/2023/02/vin-wonders-nha-trang-ivivu-2.jpg', 'mo_ta' => 'VinWonders Nha Trang'];
        $data[] = ['id_tour' => 7, 'url' => 'https://vietmytravel.com/wp-content/uploads/2017/07/AAEAAQAAAAAAAAmlAAAAJGIzNjU0NGIwLTQ1ZWItNDQ0My1hMDUzLTYwYzExOGNhYzAzZg.jpg', 'mo_ta' => 'Lặn biển Hòn Mun'];
        $data[] = ['id_tour' => 7, 'url' => 'https://upload.wikimedia.org/wikipedia/commons/1/12/Th%C3%A1p_B%C3%A0_PONAGAR_-_panoramio.jpg', 'mo_ta' => 'Tháp Bà Ponagar'];

        // --- 8. Tour Quy Nhơn (ID: 8) ---
        $data[] = ['id_tour' => 8, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/ky-co-quy-nhon-eo-gio-1721960275.jpg', 'mo_ta' => 'Biển Kỳ Co'];
        $data[] = ['id_tour' => 8, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/ky-co-eo-gio-4-1751644636.jpg', 'mo_ta' => 'Eo Gió'];
        $data[] = ['id_tour' => 8, 'url' => 'https://statics.vinpearl.com/ganh-da-dia-phu-yen_1751078702.jpg', 'mo_ta' => 'Ghềnh Đá Đĩa'];

        // --- 9. Tour Phú Quốc (ID: 9) ---
        $data[] = ['id_tour' => 9, 'url' => 'https://cdn3.ivivu.com/2022/08/sunset-sanato-phu-quoc.jpg', 'mo_ta' => 'Sunset Sanato'];
        $data[] = ['id_tour' => 9, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/grand-world-1-1710640341.jpg', 'mo_ta' => 'Grand World'];
        $data[] = ['id_tour' => 9, 'url' => 'https://ik.imagekit.io/tvlk/blog/2022/07/dHj0gcod-bai-sao-8.jpg', 'mo_ta' => 'Bãi Sao'];

        // --- 10. Tour Miền Tây (ID: 10) ---
        $data[] = ['id_tour' => 10, 'url' => 'https://hoidisanvanhoa.vn/wp-content/uploads/2025/06/260724a2.jpg', 'mo_ta' => 'Chợ nổi Cái Răng'];
        $data[] = ['id_tour' => 10, 'url' => 'https://thamhiemmekong.com/wp-content/uploads/2020/04/nhacongtubaclieu-01-1.jpg', 'mo_ta' => 'Nhà công tử Bạc Liêu'];
        $data[] = ['id_tour' => 10, 'url' => 'https://media-cdn-v2.laodong.vn/storage/newsportal/2024/9/1/1387950/Chua-Doi-6.jpg', 'mo_ta' => 'Chùa Dơi Sóc Trăng'];

        // --- 11. Tour Côn Đảo (ID: 11) ---
        $data[] = ['id_tour' => 11, 'url' => 'https://hnm.1cdn.vn/2024/02/03/hd45.jpg', 'mo_ta' => 'Nghĩa trang Hàng Dương'];
        $data[] = ['id_tour' => 11, 'url' => 'https://cdn3.ivivu.com/2023/03/b%C3%A3i-%C4%90%E1%BA%A7m-Tr%E1%BA%A7u-ivivu-3.jpg', 'mo_ta' => 'Bãi Đầm Trầu'];
        $data[] = ['id_tour' => 11, 'url' => 'https://dsvh.gov.vn/ckfinder/userfiles/images/Thong%20tin%20ds/DTQGDB_Trai%20Phu%20Son.jpg', 'mo_ta' => 'Nhà tù Côn Đảo'];

        // --- 12. Tour Vũng Tàu (ID: 12) ---
        $data[] = ['id_tour' => 12, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/tuong-chua-kito-vung-tau-tuong-chua-jesus-lon-nhat-chau-a-1633941577.jpg', 'mo_ta' => 'Tượng Chúa Kito'];
        $data[] = ['id_tour' => 12, 'url' => 'https://mia.vn/media/uploads/blog-du-lich/hai-dang-vung-tau-dia-diem-tham-quan-khong-the-bo-lo-khi-den-voi-thanh-pho-bien-than-yeu-01-1633607444.jpg', 'mo_ta' => 'Hải đăng Vũng Tàu'];
        $data[] = ['id_tour' => 12, 'url' => 'https://cdn.xanhsm.com/2025/03/742139dd-bai-sau-vung-tau-2.jpg', 'mo_ta' => 'Bãi Sau'];

        TourAnh::insert($data);
    }
}
