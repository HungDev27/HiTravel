<?php

namespace Database\Seeders;

use App\Models\LichSuKhuyenMai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LichSuKhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        LichSuKhuyenMai::insert([
            ['id_tour' => 1, 'id_ma_giam_gia' => 1, 'ngay_ap_dung' => now()],
            ['id_tour' => 2, 'id_ma_giam_gia' => 2, 'ngay_ap_dung' => now()],
        ]);
    }
}
