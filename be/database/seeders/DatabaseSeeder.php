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
            // 1. Bảng độc lập
            ChucVuSeeder::class,
            DanhMucSeeder::class,
            DanhMucBaiVietSeeder::class,

            // 2. Bảng chính
            PhuongTienSeeder::class,
            NguoiDungSeeder::class,

            // 3. Bảng TOUR
            TourDuLichSeeder::class,
            TourAnhSeeder::class,
            TourPhuongTienSeeder::class,   // PHẢI ĐỂ Ở ĐÂY!!!

            // 4. Bảng giao dịch & phụ
            MaGiamGiaSeeder::class,
            LichTrinhSeeder::class,
            DatTourSeeder::class,
            ThanhToanSeeder::class,
            LichSuKhuyenMaiSeeder::class,
            DanhGiaSeeder::class,

            // 5. Thông tin thêm
            BaiVietSeeder::class,
            ChatbotLogSeeder::class,
            ThongTinLienHeSeeder::class,
        ]);
}
}
