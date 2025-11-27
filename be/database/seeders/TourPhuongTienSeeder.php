<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\TourPhuongTien;
use Illuminate\Database\Seeder;

class TourPhuongTienSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tour_phuong_tiens')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // Giả sử:
        // Tour 1 (Đà Nẵng): Dùng 1 xe 7 chỗ (ID 1) và 1 xe Giường nằm (ID 2)
        // Tour 2 (Sapa): Dùng 1 xe Limousine (ID 3)
        // Tour 3 (Nha Trang): Dùng lại xe 7 chỗ (ID 1) - (Xe 1 chạy xong tour 1 rồi chạy tour 3)

        TourPhuongTien::insert([
            [
                'id_tour' => 1,
                'id_phuong_tien' => 1, // Xe 43A-123.45
                'ghi_chu' => 'Xe dẫn đoàn, chở hướng dẫn viên',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tour' => 1,
                'id_phuong_tien' => 2, // Xe 43B-567.89
                'ghi_chu' => 'Xe chở khách chính',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tour' => 2,
                'id_phuong_tien' => 3, // Xe Limousine
                'ghi_chu' => 'Phục vụ khách VIP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tour' => 2, // Tour 2 dùng thêm 1 xe 16 chỗ
                'id_phuong_tien' => 4, // Xe 16 chỗ
                'ghi_chu' => 'Xe chở hành lý và staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ví dụ về việc tái sử dụng xe cho tour khác (khác thời gian)
            [
                'id_tour' => 1, // Giả sử có tour ID 1
                'id_phuong_tien' => 5, // Xe 43A-123.45 quay lại phục vụ tour này
                'ghi_chu' => 'Xe đón tiễn sân bay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}