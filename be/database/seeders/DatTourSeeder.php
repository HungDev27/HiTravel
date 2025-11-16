<?php

namespace Database\Seeders;

use App\Models\DatTour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DatTour::insert([
            ['id_khach_hang' => 2, 'id_tour' => 1, 'so_nguoi_lon' => 2, 'so_tre_em' => 1, 'tong_tien' => 5000000, 'trang_thai' => 'dat_coc'],
            ['id_khach_hang' => 2, 'id_tour' => 2, 'so_nguoi_lon' => 1, 'so_tre_em' => 0, 'tong_tien' => 1500000, 'trang_thai' => 'dat_coc'],
        ]);
    }
}
