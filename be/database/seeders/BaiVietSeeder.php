<?php

namespace Database\Seeders;

use App\Models\BaiViet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        BaiViet::insert([
            ['tieu_de' => 'Khuyến mãi tour Đà Nẵng', 'mo_ta_ngan' => 'Ưu đãi tháng 11', 'noi_dung' => 'Giảm 10% tour Đà Nẵng', 'id_tac_gia' => 1, 'id_danh_muc' => 2, 'trang_thai' => 'xuat_ban'],
        ]);
    }
}
