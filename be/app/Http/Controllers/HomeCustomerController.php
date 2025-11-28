<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\TourDuLich;
use Illuminate\Http\Request;

class HomeCustomerController
{
    public function homepageData()
    {
        $data_tour = TourDuLich::where('trang_thai', 'hoat_dong')
            ->with('anh') // lấy kèm ảnh
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $data_bv = BaiViet::where('tinh_trang', 'xuat_ban')   // chỉ lấy bài đã xuất bản
            ->orderBy('created_at', 'desc')       // bài mới nhất
            ->take(6)                             // chỉ lấy 6 bài
            ->get();
        return response()->json([
            'data_tour' => $data_tour,
            'data_bv' => $data_bv
        ]);
    }
}
