<?php

namespace Database\Seeders;

use App\Models\TourAnh;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourAnhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TourAnh::insert([
        //     ['id_tour' => 1, 'ten_anh' => 'da_nang1.jpg'],
        //     ['id_tour' => 1, 'ten_anh' => 'da_nang2.jpg'],
        //     ['id_tour' => 2, 'ten_anh' => 'sapa1.jpg'],
        // ]);

        DB::table('tour_anhs')->truncate();

        DB::table('tour_anhs')->insert([
            [
                'id_tour' => 1,
                'url' => 'https://tiimtravel.vn/uploads/files/2023/01/15/du_lich_hoi_an_1_mh1667378385098-1-.jpg',
                'mo_ta' => 'Ảnh tour Bà Rịa Vũng Tàu',
            ],
            [
                'id_tour' => 1,
                'url' => 'https://bcp.cdnchinhphu.vn/Uploaded/dangdinhnam/2016_08_14/hinh-anh-tuong-lai-nao-cho-nganh-du-lich-tinh-quang-ninh-1.jpg',
                'mo_ta' => 'Ảnh tour vịnh Hạ Long',
            ],
            [
                'id_tour' => 2,
                'url' => 'https://media.vneconomy.vn/images/upload/2021/04/20/sapa-mapjpg-1512441006817-18-18-895-1580-crop-1512441018734.jpg',
                'mo_ta' => 'Ảnh tour Sapa',
            ],
            [
                'id_tour' => 2,
                'url' => 'https://image.tinnhanhchungkhoan.vn/1200x630/Uploaded/2025/bpikpjik/2023_06_14/da-nang-5-8014.jpg',
                'mo_ta' => 'Ảnh tour Đà Nẵng',
            ],
        ]);
    }
}
