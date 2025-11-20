<?php

namespace Database\Seeders;

use App\Models\TourDuLich;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourDuLichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourDuLich::insert([
            [
                'ma_tour' => 'MB001',
                'ten_tour' => 'Hà Nội – Sapa – Fansipan',
                'mo_ta' => 'Khám phá Sapa và đỉnh Fansipan hùng vĩ.',
                'id_danh_muc' => 1, // Tour miền Bắc
                'gia_nguoi_lon' => 3500000,
                'gia_tre_em' => 2500000,
                'ngay_di' => '2025-01-10',
                'ngay_ve' => '2025-01-14',
                'gio_di' => '08:00',
                'gio_ve' => '17:00',
                'dia_diem' => 'Hà Nội – Lào Cai',
                'tao_boi' => 1, // ID người dùng
                'so_cho' => 40,
                'so_cho_con' => 35,
                'trang_thai' => 'hoat_dong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_tour' => 'MT001',
                'ten_tour' => 'Đà Nẵng – Hội An – Bà Nà Hills',
                'mo_ta' => 'Tham quan Hội An và Bà Nà Hills nổi tiếng.',
                'id_danh_muc' => 2,
                'gia_nguoi_lon' => 4200000,
                'gia_tre_em' => 3000000,
                'ngay_di' => '2025-02-05',
                'ngay_ve' => '2025-02-08',
                'gio_di' => '07:30',
                'gio_ve' => '18:00',
                'dia_diem' => 'Đà Nẵng – Quảng Nam',
                'tao_boi' => 1,
                'so_cho' => 30,
                'so_cho_con' => 28,
                'trang_thai' => 'hoat_dong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
