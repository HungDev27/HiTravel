<?php

namespace Database\Seeders;

use App\Models\ChatbotLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatbotLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ChatbotLog::insert([
            ['id_nguoi_dung' => 2, 'cau_hoi' => 'Tôi muốn đặt tour Đà Nẵng', 'tra_loi' => 'Bạn muốn đặt ngày nào?'],
        ]);
    }
}
