<?php

namespace Database\Seeders;

use App\Models\MaGiamGia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaGiamGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaGiamGia::insert([
            ['ma' => 'DISCOUNT10', 'gia_tri' => 10, 'ngay_het_han' => now()->addDays(30)],
            ['ma' => 'DISCOUNT20', 'gia_tri' => 20, 'ngay_het_han' => now()->addDays(60)],
        ]);
    }
}
