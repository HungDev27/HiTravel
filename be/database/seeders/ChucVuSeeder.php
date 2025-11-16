<?php

namespace Database\Seeders;

use App\Models\ChucVu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ChucVu::insert([
            ['ten_chuc_vu' => 'Admin', 'mo_ta' => 'Quản trị hệ thống'],
            ['ten_chuc_vu' => 'Nhân viên', 'mo_ta' => 'Nhân viên bán tour'],
            ['ten_chuc_vu' => 'Khách hàng', 'mo_ta' => 'Người dùng đặt tour'],
        ]);
    }
}
