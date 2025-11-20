<?php

namespace Database\Seeders;

use App\Models\DatTour;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatTourSeeder extends Seeder
{
    public function run()
    {
        DatTour::insert([
            [
                'id_khach_hang' => 2,
                'id_tour' => 1,
                'ngay_dat' => Carbon::now(), // bắt buộc
                'so_nguoi_lon' => 2,
                'so_tre_em' => 1,
                'tong_tien' => 5000000,
                'id_ma_giam_gia' => null,
                'trang_thai' => 'cho_xu_ly',
            ],
            [
                'id_khach_hang' => 2,
                'id_tour' => 2,
                'ngay_dat' => Carbon::now()->addDays(1),
                'so_nguoi_lon' => 1,
                'so_tre_em' => 0,
                'tong_tien' => 1500000,
                'id_ma_giam_gia' => null,
                'trang_thai' => 'da_huy',
            ],
        ]);
    }
}
