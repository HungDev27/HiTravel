<?php

namespace Database\Seeders;

use App\Models\BaiViet;
use Illuminate\Database\Seeder;

class BaiVietSeeder extends Seeder
{
    public function run()
    {
        BaiViet::insert([
            [
                'tieu_de' => 'Khuyến mãi tour Đà Nẵng',
                'mo_ta_ngan' => 'Ưu đãi tháng 11',
                'noi_dung' => 'Giảm 10% tour Đà Nẵng',
                'hinh_anh' => null,
                'tag' => 'khuyen-mai,tour-da-nang',
                'id_danh_muc' => 1,
                'tinh_trang' => 'xuat_ban',
            ],
        ]);
    }
}
