<?php

namespace Database\Seeders;

use App\Models\DanhGia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    public function run()
    {
        // Xóa sạch dữ liệu cũ để tránh trùng lặp id hoặc lỗi khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('danh_gias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $now = now();

        DanhGia::insert([
            // --- ID DAT TOUR = 1 (Nhóm đánh giá tốt) ---
            [
                'id_dat_tour' => 1,
                'diem'        => 5,
                'binh_luan'   => 'Chuyến đi tuyệt vời, hướng dẫn viên nhiệt tình, am hiểu kiến thức lịch sử. Xe đưa đón đời mới rất êm.',
                'hinh_anh'    => json_encode([
                    'https://images.unsplash.com/photo-1507525428034-b723cf961d3e',
                    'https://images.unsplash.com/photo-1540206351-d6465b3ac5c1'
                ]),
                'phan_hoi'    => 'Cảm ơn bạn đã tin tưởng NH Travel. Rất mong được phục vụ bạn trong những chuyến đi tiếp theo!',
                'trang_thai'  => 'hien_thi',
                'created_at'  => $now, 'updated_at' => $now,
            ],
            [
                'id_dat_tour' => 1,
                'diem'        => 5,
                'binh_luan'   => 'Đồ ăn ngon, khách sạn sạch sẽ view biển xịn sò. Vote 5 sao!',
                'hinh_anh'    => json_encode(['https://images.unsplash.com/photo-1520250497591-112f2f40a3f4']),
                'phan_hoi'    => 'Dạ NH Travel cảm ơn quý khách nhiều ạ ❤️',
                'trang_thai'  => 'hien_thi',
                'created_at'  => $now->subHours(2), 'updated_at' => $now->subHours(1),
            ],
            [
                'id_dat_tour' => 1,
                'diem'        => 4,
                'binh_luan'   => 'Mọi thứ đều ổn, trừ việc chuyến bay bị delay mất 1 tiếng làm cả đoàn phải chờ hơi lâu.',
                'hinh_anh'    => null,
                'phan_hoi'    => 'Thành thật xin lỗi quý khách về sự cố hàng không này. Chúng tôi sẽ cố gắng sắp xếp lịch trình linh hoạt hơn lần sau.',
                'trang_thai'  => 'hien_thi',
                'created_at'  => $now->subDays(1), 'updated_at' => $now->subDays(1),
            ],
            [
                'id_dat_tour' => 1,
                'diem'        => 5,
                'binh_luan'   => 'Gia đình mình đi có trẻ nhỏ nhưng các bạn support rất tốt.',
                'hinh_anh'    => null,
                'phan_hoi'    => null, // Chưa trả lời
                'trang_thai'  => 'hien_thi',
                'created_at'  => $now->subDays(2), 'updated_at' => $now->subDays(2),
            ],

            // --- ID DAT TOUR = 2 (Nhóm đánh giá trung bình/kém) ---
            [
                'id_dat_tour' => 2,
                'diem'        => 4,
                'binh_luan'   => 'Tốt nhưng hơi mệt do lịch trình dày quá, đi bộ nhiều người già hơi đuối.',
                'hinh_anh'    => json_encode(['https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1']),
                'phan_hoi'    => null,
                'trang_thai'  => 'hien_thi',
                'created_at'  => $now->subDays(3), 'updated_at' => $now->subDays(3),
            ],
            [
                'id_dat_tour' => 2,
                'diem'        => 3,
                'binh_luan'   => 'Khách sạn hơi cũ, máy lạnh kêu to cả đêm không ngủ được.',
                'hinh_anh'    => null,
                'phan_hoi'    => 'Xin chào quý khách, NH Travel đã ghi nhận phản ánh và sẽ làm việc lại với đối tác khách sạn ngay lập tức.',
                'trang_thai'  => 'hien_thi',
                'created_at'  => $now->subDays(4), 'updated_at' => $now->subDays(4),
            ],
            [
                'id_dat_tour' => 2,
                'diem'        => 1,
                'binh_luan'   => 'Dịch vụ quá tệ! Xe hỏng điều hòa giữa trưa nắng, gọi hotline không ai nghe máy!',
                'hinh_anh'    => null,
                'phan_hoi'    => null,
                'trang_thai'  => 'cho_duyet', // Đang chờ duyệt (chưa hiện public)
                'created_at'  => $now->subHours(5), 'updated_at' => $now->subHours(5),
            ],
            [
                'id_dat_tour' => 2,
                'diem'        => 2,
                'binh_luan'   => 'Bữa ăn không giống quảng cáo, toàn rau ít thịt.',
                'hinh_anh'    => json_encode(['https://images.unsplash.com/photo-1546069901-ba9599a7e63c']),
                'phan_hoi'    => null,
                'trang_thai'  => 'hien_thi',
                'created_at'  => $now->subDays(5), 'updated_at' => $now->subDays(5),
            ],
            [
                'id_dat_tour' => 2,
                'diem'        => 5,
                'binh_luan'   => 'Tuyệt vời! Sẽ giới thiệu bạn bè.',
                'hinh_anh'    => null,
                'phan_hoi'    => null,
                'trang_thai'  => 'hien_thi',
                'created_at'  => $now->subDays(6), 'updated_at' => $now->subDays(6),
            ],
            // Một comment spam (Ví dụ để test chức năng Ẩn)
            [
                'id_dat_tour' => 2,
                'diem'        => 1,
                'binh_luan'   => 'Click vào link này để nhận thưởng: http://spam.com',
                'hinh_anh'    => null,
                'phan_hoi'    => null,
                'trang_thai'  => 'an', // Đã bị Admin ẩn
                'created_at'  => $now->subDays(10), 'updated_at' => $now->subDays(10),
            ],
        ]);
    }
}