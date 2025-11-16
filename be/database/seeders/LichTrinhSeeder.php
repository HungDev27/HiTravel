<?php

namespace Database\Seeders;

use App\Models\LichTrinh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LichTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        LichTrinh::insert([
            ['id_tour' => 1, 'ngay' => now()->addDays(1), 'noi_dung' => 'Khởi hành từ Đà Nẵng'],
            ['id_tour' => 1, 'ngay' => now()->addDays(2), 'noi_dung' => 'Tham quan Bà Nà Hills'],
            ['id_tour' => 2, 'ngay' => now()->addDays(21), 'noi_dung' => 'Khởi hành từ Sapa'],
        ]);
    }
}
