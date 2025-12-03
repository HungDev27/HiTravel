<?php

namespace Database\Seeders;

use App\Models\ThanhToan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ThanhToanSeeder extends Seeder
{
    public function run()
    {
        $phuongThucList = ['momo', 'vnpay', 'bank', 'tien_mat', 'visa', 'mbbank'];

        // Lấy toàn bộ id đơn tour hợp lệ
        $datTourIds = DB::table('dat_tours')->pluck('id')->toArray();

        if (empty($datTourIds)) {
            return; // không có đơn thì không seed
        }

        $data = [];

        foreach ($datTourIds as $id) {

            // Mỗi đơn sẽ có 1 hoặc 0 thanh toán
            $hasPayment = rand(0, 1);

            if (!$hasPayment) continue;

            $trangThai = rand(0, 1) ? 'thanh_cong' : 'that_bai';

            $data[] = [
                'id_dat_tour' => $id,
                'phuong_thuc' => $phuongThucList[array_rand($phuongThucList)],
                'thoi_gian_thanh_toan' => Carbon::now()->subDays(rand(1, 60)),
                'so_tien' => rand(1000000, 10000000),
                'trang_thai' => $trangThai,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        ThanhToan::insert($data);
    }
}
