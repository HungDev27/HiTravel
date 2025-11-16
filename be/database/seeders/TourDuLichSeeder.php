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
                'ten_tour' => 'Tour Đà Nẵng',
                'id_loai_tour' => 1,
                'mo_ta' => 'Khám phá thành phố biển Đà Nẵng',
                'id_danh_muc' => 1,
                'gia_nguoi_lon' => 2000000,
                'gia_tre_em' => 1000000,
                'ngay_di' => now()->addDays(10),
                'ngay_ve' => now()->addDays(15),
                'gio_di' => '08:00:00',
                'gio_ve' => '18:00:00',
                'dia_diem' => 'Đà Nẵng',
                'tao_boi' => 1,
                'so_cho' => 20,
                'so_cho_con' => 20,
                'trang_thai' => 'mo_ban',
            ],
            [
                'ten_tour' => 'Tour Sapa',
                'id_loai_tour' => 2,
                'mo_ta' => 'Khám phá núi rừng Sapa',
                'id_danh_muc' => 2,
                'gia_nguoi_lon' => 1500000,
                'gia_tre_em' => 800000,
                'ngay_di' => now()->addDays(20),
                'ngay_ve' => now()->addDays(25),
                'gio_di' => '07:00:00',
                'gio_ve' => '19:00:00',
                'dia_diem' => 'Sapa',
                'tao_boi' => 1,
                'so_cho' => 15,
                'so_cho_con' => 15,
                'trang_thai' => 'mo_ban',
            ],
        ]);
    }
}
