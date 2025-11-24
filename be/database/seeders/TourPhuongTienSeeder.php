<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\TourPhuongTien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourPhuongTienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tour_phuong_tiens')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        TourPhuongTien::insert([
            [
                'id_tour' => 1,
                'id_phuong_tien' => 1,
                'so_luong' => 2,
                'ngay_bat_dau' => '2025-02-01',
                'ngay_ket_thuc' => '2025-02-05',
                'ghi_chu' => 'Phục vụ tour Đà Nẵng 4N3Đ',
            ],
            [
                'id_tour' => 1,
                'id_phuong_tien' => 2,
                'so_luong' => 1,
                'ngay_bat_dau' => '2025-02-01',
                'ngay_ket_thuc' => '2025-02-05',
                'ghi_chu' => 'Xe giường nằm hỗ trợ di chuyển đêm',
            ],
            [
                'id_tour' => 2,
                'id_phuong_tien' => 3,
                'so_luong' => 3,
                'ngay_bat_dau' => '2025-03-10',
                'ngay_ket_thuc' => '2025-03-15',
                'ghi_chu' => 'Limousine VIP cho tour Sapa',
            ],
            [
                'id_tour' => 2,
                'id_phuong_tien' => 1,
                'so_luong' => 2,
                'ngay_bat_dau' => '2025-04-20',
                'ngay_ket_thuc' => '2025-04-25',
                'ghi_chu' => 'Phục vụ tour Nha Trang 5N4Đ',
            ],
            

        ]);
    }
}
