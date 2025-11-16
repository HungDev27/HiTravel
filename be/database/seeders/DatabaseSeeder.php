<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    $this->call([
        ChucVuSeeder::class,
        DanhMucSeeder::class,
        DanhMucBaiVietSeeder::class,
        PhuongTienSeeder::class,
        NguoiDungSeeder::class,
        TourDuLichSeeder::class,
        TourAnhSeeder::class,
        MaGiamGiaSeeder::class,
        DatTourSeeder::class,
        ThanhToanSeeder::class,
        LichSuKhuyenMaiSeeder::class,
        LichTrinhSeeder::class,
        DanhGiaSeeder::class,
        ChatbotLogSeeder::class,
        ThongTinLienHeSeeder::class,
        BaiVietSeeder::class,
        TourPhuongTienSeeder::class,
    ]);
}
}
