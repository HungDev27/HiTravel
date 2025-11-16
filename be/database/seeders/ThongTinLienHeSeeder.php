<?php

namespace Database\Seeders;

use App\Models\ThongTinLienHe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThongTinLienHeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ThongTinLienHe::insert([
            ['ten' => 'Nguyễn Văn A', 'email' => 'a@test.com', 'so_dien_thoai' => '0123456789', 'noi_dung' => 'Tôi muốn hỏi tour'],
        ]);
    }
}
