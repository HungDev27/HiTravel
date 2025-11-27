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
                'id_ma_giam_gia' => 1,
                'trang_thai' => 'cho_xu_ly',
            ],
            [
                'id_khach_hang' => 2,
                'id_tour' => 2,
                'ngay_dat' => Carbon::now()->addDays(1),
                'so_nguoi_lon' => 1,
                'so_tre_em' => 0,
                'tong_tien' => 1500000,
                'id_ma_giam_gia' => 2,
                'trang_thai' => 'da_huy',
            ],
            [
                'id_khach_hang' => 1,
                'id_tour' => 1,
                'ngay_dat' => Carbon::now()->addDays(2),
                'so_nguoi_lon' => 2,
                'so_tre_em' => 2,
                'tong_tien' => 3500000,
                'id_ma_giam_gia' => 2,
                'trang_thai' => 'da_thanh_toan',
            ],
            [
                'id_khach_hang' => 2,
                'id_tour' => 2,
                'ngay_dat' => Carbon::now()->addDays(3),
                'so_nguoi_lon' => 4,
                'so_tre_em' => 0,
                'tong_tien' => 8200000,
                'id_ma_giam_gia' => 1,
                'trang_thai' => 'cho_xu_ly',
            ],
            [
                'id_khach_hang' => 1,
                'id_tour' => 2,
                'ngay_dat' => Carbon::now()->addDays(4),
                'so_nguoi_lon' => 1,
                'so_tre_em' => 1,
                'tong_tien' => 2000000,
                'id_ma_giam_gia' => null,
                'trang_thai' => 'da_huy',
            ],
            [
                'id_khach_hang' => 2,
                'id_tour' => 2,
                'ngay_dat' => Carbon::now()->addDays(5),
                'so_nguoi_lon' => 3,
                'so_tre_em' => 1,
                'tong_tien' => 5600000,
                'id_ma_giam_gia' => 2,
                'trang_thai' => 'da_thanh_toan',
            ],
            [
                'id_khach_hang' => 2,
                'id_tour' => 2,
                'ngay_dat' => Carbon::now()->addDays(6),
                'so_nguoi_lon' => 2,
                'so_tre_em' => 0,
                'tong_tien' => 3200000,
                'id_ma_giam_gia' => null,
                'trang_thai' => 'cho_xu_ly',
            ],

        ]);
    }
}
