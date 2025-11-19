<?php

namespace Database\Seeders;

use App\Models\LichTrinh;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LichTrinhSeeder extends Seeder
{
    public function run()
    {
        LichTrinh::insert([
            [
                'id_tour' => 1,
                'tieu_de' => 'Ngày 1: Khởi hành',
                'noi_dung' => 'Khởi hành từ Đà Nẵng',
                'ngay_lich_trinh' => 1,
                'thu_tu' => 1,
            ],
            [
                'id_tour' => 1,
                'tieu_de' => 'Ngày 2: Tham quan',
                'noi_dung' => 'Tham quan Bà Nà Hills',
                'ngay_lich_trinh' => 2,
                'thu_tu' => 2,
            ],
            [
                'id_tour' => 2,
                'tieu_de' => 'Ngày 1: Khởi hành',
                'noi_dung' => 'Khởi hành từ Sapa',
                'ngay_lich_trinh' => 1,
                'thu_tu' => 1,
            ],
        ]);
    }
}
