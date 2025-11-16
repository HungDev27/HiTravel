<?php

namespace Database\Seeders;

use App\Models\ThanhToan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ThanhToan::insert([
            ['id_dat_tour' => 1, 'hinh_thuc' => 'Tiền mặt', 'so_tien' => 5000000],
            ['id_dat_tour' => 2, 'hinh_thuc' => 'Chuyển khoản', 'so_tien' => 1500000],
        ]);
    }
}
