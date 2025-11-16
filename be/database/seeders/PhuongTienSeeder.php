<?php

namespace Database\Seeders;

use App\Models\PhuongTien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhuongTienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhuongTien::insert([
            ['ten_phuong_tien' => 'Xe ô tô', 'loai' => 'Xe khách', 'so_cho' => 45],
            ['ten_phuong_tien' => 'Máy bay', 'loai' => 'Chuyến bay thương mại', 'so_cho' => 180],
        ]);
    }
}
