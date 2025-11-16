<?php

namespace Database\Seeders;

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
        TourPhuongTien::insert([
            ['id_tour' => 1, 'id_phuong_tien' => 1],
            ['id_tour' => 2, 'id_phuong_tien' => 2],
        ]);
    }
}
