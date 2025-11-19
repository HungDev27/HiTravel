<?php

namespace Database\Seeders;

use App\Models\MaGiamGia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MaGiamGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    MaGiamGia::insert([
        [
            'ma' => 'DISCOUNT10',
            'mo_ta' => 'Giảm 10% cho đơn hàng đầu tiên',
            'phan_tram_giam' => 10,
            'hieu_luc_tu' => Carbon::now()->toDateString(),
            'hieu_luc_den' => Carbon::now()->addDays(30)->toDateString(),
            'so_luong' => 100,
            'tao_boi' => 1,
            'trang_thai' => 'con_hieu_luc',
        ],
        [
            'ma' => 'DISCOUNT20',
            'mo_ta' => 'Giảm 20% cho khách hàng VIP',
            'phan_tram_giam' => 20,
            'hieu_luc_tu' => Carbon::now()->toDateString(),
            'hieu_luc_den' => Carbon::now()->addDays(60)->toDateString(),
            'so_luong' => 50,
            'tao_boi' => 1,
            'trang_thai' => 'het_hieu_luc',
        ],
    ]);
}
}
