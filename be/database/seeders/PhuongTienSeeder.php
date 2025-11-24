<?php

namespace Database\Seeders;

use App\Models\PhuongTien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhuongTienSeeder extends Seeder
{
    public function run(): void
    {
        PhuongTien::insert([
            [
                'ten_phuong_tien' => 'Xe 7 chỗ',
                'mo_ta' => 'Dịch vụ xe 7 chỗ',
                'bien_so' => '43A-12345',
                'suc_chua' => 7,
                'trang_thai' => 1,
            ],
            [
                'ten_phuong_tien' => 'Xe giường nằm',
                'mo_ta' => 'Xe giường nằm cao cấp',
                'bien_so' => '43B-56789',
                'suc_chua' => 40,
                'trang_thai' => 0,
            ],
            [
                'ten_phuong_tien' => 'Limousine',
                'mo_ta' => 'Xe limousine 9 chỗ',
                'bien_so' => '43A-99999',
                'suc_chua' => 9,
                'trang_thai' => 2,
            ],
            [
                'ten_phuong_tien' => 'Xe buýt nhỏ',
                'mo_ta' => 'Xe buýt 16 chỗ mini',
                'bien_so' => '43C-11111',
                'suc_chua' => 16,
                'trang_thai' => 0,
            ],
            [
                'ten_phuong_tien' => 'Xe điện',
                'mo_ta' => 'Xe điện 4 chỗ phục vụ khu du lịch',
                'bien_so' => '43D-22222',
                'suc_chua' => 4,
                'trang_thai' => 1,
            ],
        ]);
    }
}
