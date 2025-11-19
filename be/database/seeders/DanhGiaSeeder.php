<?php

namespace Database\Seeders;

use App\Models\DanhGia;
use Illuminate\Database\Seeder;

class DanhGiaSeeder extends Seeder
{
    public function run()
    {
        DanhGia::insert([
            [
                'id_dat_tour' => 1,
                'diem' => 5,
                'binh_luan' => 'Rất hài lòng',
                'hinh_anh' => null,
            ],
            [
                'id_dat_tour' => 2,
                'diem' => 4,
                'binh_luan' => 'Tốt nhưng hơi mệt',
                'hinh_anh' => null,
            ],
        ]);
    }
}
