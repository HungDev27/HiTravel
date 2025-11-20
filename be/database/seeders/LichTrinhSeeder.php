<?php

namespace Database\Seeders;

use App\Models\LichTrinh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LichTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        LichTrinh::insert([
            [
                'id_tour' => 1,
                'ngay_lich_trinh' => 1,
                'thu_tu' => 1,
                'tieu_de' => 'Hà Nội – Sapa',
                'noi_dung' => 'Di chuyển từ Hà Nội lên Sapa, nhận phòng nghỉ ngơi.',
            ],
            [
                'id_tour' => 1,
                'ngay_lich_trinh' => 2,
                'thu_tu' => 2,
                'tieu_de' => 'Tham quan Fansipan',
                'noi_dung' => 'Chinh phục đỉnh Fansipan bằng cáp treo.',
            ],
            [
                'id_tour' => 2,
                'ngay_lich_trinh' => 1,
                'thu_tu' => 1,
                'tieu_de' => 'Đà Nẵng – Bà Nà Hills',
                'noi_dung' => 'Tham quan cầu Vàng, vui chơi Fantasy Park.',
            ],
            [
                'id_tour' => 2,
                'ngay_lich_trinh' => 2,
                'thu_tu' => 2,
                'tieu_de' => 'Hội An Phố Cổ',
                'noi_dung' => 'Khám phá phố cổ Hội An về đêm.',
            ],
        ]);
    }
}
