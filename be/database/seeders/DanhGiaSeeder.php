<?php

namespace Database\Seeders;

use App\Models\DanhGia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    public function run()
    {
        // Xóa dữ liệu cũ (nếu muốn làm sạch bảng trước khi seed)
        // DB::table('danh_gias')->truncate();

        DanhGia::insert([
            [
                'id_dat_tour' => 1,
                'diem' => 5,
                'binh_luan' => 'Chuyến đi tuyệt vời, hướng dẫn viên nhiệt tình!',
                'hinh_anh' => null, 
                'phan_hoi' => 'Cảm ơn bạn đã tin tưởng NH Travel. Hẹn gặp lại bạn!', // Admin đã trả lời
                'trang_thai' => 'hien_thi', // Đã được duyệt hiện lên web
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dat_tour' => 2,
                'diem' => 4,
                'binh_luan' => 'Tốt nhưng hơi mệt do lịch trình dày quá.',
                'hinh_anh' => null,
                'phan_hoi' => null, 
                'trang_thai' => 'hien_thi', 
                'created_at' => now()->subDays(1), // Giả lập đánh giá hôm qua
                'updated_at' => now()->subDays(1),
            ],
            [
                'id_dat_tour' => 2, // Giả sử khách này đi 2 lần hoặc người khác cùng tour
                'diem' => 1,
                'binh_luan' => 'Dịch vụ kém, xe hỏng điều hòa!',
                'hinh_anh' => null,
                'phan_hoi' => null,
                'trang_thai' => 'cho_duyet', // Đang chờ duyệt (chưa hiện lên web)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}