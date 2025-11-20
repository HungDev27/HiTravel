<?php

namespace Database\Seeders;

use App\Models\ThongTinLienHe;
use Illuminate\Database\Seeder;

class ThongTinLienHeSeeder extends Seeder
{
    public function run()
    {
        ThongTinLienHe::insert([
            [
                'id_khach_hang' => null,  // hoặc 1 nếu người dùng tồn tại
                'ten' => 'Nguyễn Văn A',
                'email' => 'a@test.com',
                'so_dien_thoai' => '0123456789',
                'tin_nhan' => 'Tôi muốn hỏi tour',
                'trang_thai' => 'chua_xem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
