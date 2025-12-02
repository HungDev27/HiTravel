<?php

namespace Database\Seeders;

use App\Models\DatTour;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatTourSeeder extends Seeder
{
    public function run()
    {
        $donHangs = [];
        $ma = 1;
        $now = Carbon::now();

        // 4 người dùng (id: 1 → 4), 20 tour (id: 1 → 20)
        for ($i = 1; $i <= 30; $i++) {
            $id_khach_hang = rand(1, 4);
            $id_tour = rand(1, 20);
            $so_nguoi_lon = rand(1, 5);
            $so_tre_em = rand(0, 3);
            $gia = 1000000 + rand(0, 9) * 100000; // từ 1 triệu → 2 triệu
            $tong_tien = ($so_nguoi_lon * $gia) + ($so_tre_em * ($gia * 0.7));

            $co_giam_gia = rand(0, 1);
            $giam_gia = $co_giam_gia ? rand(50000, 200000) : 0;
            $tien_thuc_nhan = $tong_tien - $giam_gia;

            $donHangs[] = [
                'id_khach_hang'   => $id_khach_hang,
                'id_tour'         => $id_tour,
                'ngay_dat'        => $now->copy()->addDays($i),

                'so_nguoi_lon'    => $so_nguoi_lon,
                'so_tre_em'       => $so_tre_em,
                'tong_tien'       => $tong_tien,
                'giam_gia'        => $giam_gia,
                'tien_thuc_nhan'  => $tien_thuc_nhan,

                'id_ma_giam_gia'  => $co_giam_gia ? rand(1, 3) : null,
                'trang_thai'      => collect(['cho_xu_ly', 'da_thanh_toan', 'da_huy'])->random(),

                'ten_lien_lac'            => 'Khách hàng ' . $id_khach_hang,
                'email_lien_lac'          => 'khach' . $id_khach_hang . '@gmail.com',
                'so_dien_thoai_lien_lac'  => '09' . rand(10000000, 99999999),
                'dia_chi_lien_lac'        => 'Địa chỉ demo',

                'ma_don_hang'     => 'DT' . str_pad($ma++, 6, '0', STR_PAD_LEFT),
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
        }

        DatTour::insert($donHangs);
    }
}
