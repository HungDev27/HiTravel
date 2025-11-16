<?php

namespace Database\Seeders;

use App\Models\TourAnh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourAnhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourAnh::insert([
            ['id_tour' => 1, 'ten_anh' => 'da_nang1.jpg'],
            ['id_tour' => 1, 'ten_anh' => 'da_nang2.jpg'],
            ['id_tour' => 2, 'ten_anh' => 'sapa1.jpg'],
        ]);
    }
}
