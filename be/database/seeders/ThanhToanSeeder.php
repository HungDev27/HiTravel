<?php

namespace Database\Seeders;

use App\Models\ThanhToan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThanhToanSeeder extends Seeder
{
    public function run()
    {
        // ThanhToan::insert([
        //     [
        //         'id_dat_tour' => 1,
        //         'phuong_thuc' => '',
        //         'thoi_gian_thanh_toan' => Carbon::now(),
        //         'so_tien' => 5000000,
        //         'trang_thai' => 'success',
        //     ],

        // ]);
        $phuongThucList = ['Tiền mặt', 'Chuyển khoản', 'Ví điện tử'];
        $startDate = Carbon::create(2025, 1, 1, 8, 0, 0); // bắt đầu từ 08:00 ngày 01/01
        $endDate = Carbon::create(2025, 11, 25, 20, 0, 0); // kết thúc ngày 25/11

        $data = [];
        $currentDateTime = $startDate->copy();

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            // Mỗi ngày tạo 2-5 đơn
            $numPayments = rand(2, 5);

            for ($i = 0; $i < $numPayments; $i++) {
                $data[] = [
                    'id_dat_tour' => 1,
                    'phuong_thuc' => $phuongThucList[array_rand($phuongThucList)],
                    'thoi_gian_thanh_toan' => $currentDateTime->copy(),
                    'so_tien' => rand(1000000, 10000000),
                    'trang_thai' => 'success',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // Tăng thời gian cho thanh toán tiếp theo (cách nhau 1–3 giờ)
                $currentDateTime->addHours(rand(1, 3))->addMinutes(rand(0, 59));
                // Nếu vượt quá 20h trong ngày, tăng sang ngày tiếp theo 8h
                if ($currentDateTime->hour > 20) {
                    $currentDateTime->addDay()->setHour(8)->setMinute(0);
                }
            }
        }

        // Insert toàn bộ dữ liệu
        ThanhToan::insert($data);
    }
}
