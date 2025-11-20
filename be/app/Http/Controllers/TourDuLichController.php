<?php

namespace App\Http\Controllers;

use App\Models\LichTrinh;
use App\Models\TourAnh;
use App\Models\TourDuLich;
use Illuminate\Http\Request;

class TourDuLichController
{
    public function themTour(Request $request)
    {
        // 1. Kiểm tra token admin
        $user = $request->user(); // Nếu dùng sanctum/passport
        if (!$user || $user->id_chuc_vu != 1) {
            return response()->json(['message' => 'Bạn không thể tạo tour'], 401);
        }

        // 2. Tạo ma_tour tự động tăng (NH001, NH002...)
        $lastTour = TourDuLich::latest('id')->first();
        $ma_tour = 'NH' . str_pad($lastTour?->id + 1 ?? 1, 3, '0', STR_PAD_LEFT);

        // 3. Lưu bản tour_du_lich
        $tour = TourDuLich::create([
            'ma_tour' => $ma_tour,
            'ten_tour' => $request->ten_tour,
            'mo_ta' => $request->mo_ta,
            'id_danh_muc' => $request->id_danh_muc,
            'gia_nguoi_lon' => $request->gia_nguoi_lon,
            'gia_tre_em' => $request->gia_tre_em,
            'ngay_di' => $request->ngay_di,
            'ngay_ve' => $request->ngay_ve,
            'gio_di' => $request->gio_di,
            'gio_ve' => $request->gio_ve,
            'dia_diem' => $request->dia_diem,
            'tao_boi' => $user->id,
            'so_cho' => $request->so_cho,
            'so_cho_con' => $request->so_cho,
            'trang_thai' => $request->trang_thai
        ]);

        // 4. Lưu ảnh tour từ URL
        $anhArr = $request->input('anh', []); // lấy array URL, mặc định rỗng
        if (is_array($anhArr)) {
            foreach ($anhArr as $url) {
                TourAnh::create([
                    'id_tour' => $tour->id,
                    'url' => $url,
                    'mo_ta' => null
                ]);
            }
        }

        // 5. Lưu lịch trình
        $lichTrinhArr = $request->input('lich_trinh', []); // lấy array lich_trinh từ JSON
        if (is_array($lichTrinhArr)) {
            foreach ($lichTrinhArr as $index => $lt) {
                LichTrinh::create([
                    'id_tour' => $tour->id,
                    'tieu_de' => $lt['tieu_de'] ?? '',
                    'noi_dung' => $lt['noi_dung'] ?? '',
                    'ngay_lich_trinh' => $index + 1,
                    'thu_tu' => $index + 1
                ]);
            }
        }

        return response()->json(['message' => 'Thêm tour ' . $request->ten_tour . ' thành công']);
    }
}
