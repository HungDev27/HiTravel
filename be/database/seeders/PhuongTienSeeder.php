<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhuongTien;
use Carbon\Carbon;

class PhuongTienSeeder extends Seeder
{
    public function run(): void
    {
        PhuongTien::truncate();

        PhuongTien::insert([
            [
                'ten_phuong_tien' => 'Xe ô tô 7 chỗ',
                'mo_ta'           => 'Xe phục vụ tour gia đình',
                'bien_so'         => '43A-12345',
                'suc_chua'        => 7,
                'trang_thai'      => 1,
            ],
            [
                'ten_phuong_tien' => 'Xe giường nằm',
                'mo_ta'           => 'Xe giường nằm cao cấp chạy xuyên tỉnh',
                'bien_so'         => '43B-56789',
                'suc_chua'        => 40,
                'trang_thai'      => 1,
            ],
            [
                'ten_phuong_tien' => 'Xe limousine',
                'mo_ta'           => 'Xe limousine VIP 9 chỗ',
                'bien_so'         => '43A-88888',
                'suc_chua'        => 9,
                'trang_thai'      => 1,
            ],
            [
                'ten_phuong_tien' => 'Xe máy',
                'mo_ta'           => 'Dùng cho tour phượt',
                'bien_so'         => '43N1-12345',
                'suc_chua'        => 2,
                'trang_thai'      => 1,
            ],
            [
                'ten_phuong_tien' => 'Máy bay',
                'mo_ta'           => 'Phương tiện dành cho tour quốc tế',
                'bien_so'         => 'VN-2345',
                'suc_chua'        => 180,
                'trang_thai'      => 1,
            ],
            [
                'ten_phuong_tien' => 'Du thuyền mini',
                'mo_ta'           => 'Thuyền tham quan vịnh',
                'bien_so'         => 'DT-1122',
                'suc_chua'        => 20,
                'trang_thai'      => 0,
            ],
            [
                'ten_phuong_tien' => 'Xe buýt 29 chỗ',
                'mo_ta'           => 'Xe phục vụ tour đoàn vừa',
                'bien_so'         => '43B-99887',
                'suc_chua'        => 29,
                'trang_thai'      => 1,
            ],
            [
                'ten_phuong_tien' => 'Tàu cao tốc',
                'mo_ta'           => 'Di chuyển biển đảo nhanh',
                'bien_so'         => 'TC-5566',
                'suc_chua'        => 60,
                'trang_thai'      => 1,
            ],
            [
                'ten_phuong_tien' => 'Xe bán tải',
                'mo_ta'           => 'Xe chở hàng tour trekking',
                'bien_so'         => '43C-66778',
                'suc_chua'        => 5,
                'trang_thai'      => 0,
            ],
            [
                'ten_phuong_tien' => 'Xe điện',
                'mo_ta'           => 'Xe chạy nội khu thân thiện môi trường',
                'bien_so'         => 'XD-7766',
                'suc_chua'        => 8,
                'trang_thai'      => 1,
            ],
        ]);
    }
}
