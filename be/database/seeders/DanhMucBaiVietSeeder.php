<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanhMucBaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DanhMuc::insert([
            ['ten_danh_muc' => 'Du lịch biển', 'mo_ta' => 'Tour du lịch biển hấp dẫn'],
            ['ten_danh_muc' => 'Du lịch núi', 'mo_ta' => 'Tour leo núi, trekking'],
        ]);
    }
}
