<?php

namespace Database\Seeders;

use App\Models\DanhGia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DanhGia::insert([
            ['id_tour' => 1, 'id_khach_hang' => 2, 'sao' => 5, 'noi_dung' => 'Rất hài lòng'],
            ['id_tour' => 2, 'id_khach_hang' => 2, 'sao' => 4, 'noi_dung' => 'Tốt nhưng hơi mệt'],
        ]);
    }
}
