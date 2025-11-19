<?php

namespace Database\Seeders;

use App\Models\ThanhToan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThanhToanSeeder extends Seeder
{
    public function run()
    {
        ThanhToan::insert([
            [
                'id_dat_tour' => 1,
                'phuong_thuc' => 'Tiền mặt',
                'thoi_gian_thanh_toan' => Carbon::now(),
                'so_tien' => 5000000,
                'trang_thai' => 'success',
            ],
            [
                'id_dat_tour' => 2,
                'phuong_thuc' => 'Chuyển khoản',
                'thoi_gian_thanh_toan' => Carbon::now()->addMinutes(5),
                'so_tien' => 1500000,
                'trang_thai' => 'failed',
            ]
        ]);
    }
}
