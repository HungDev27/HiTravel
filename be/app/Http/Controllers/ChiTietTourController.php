<?php

namespace App\Http\Controllers;

use App\Models\TourDuLich;
use Illuminate\Http\Request;

class ChiTietTourController
{
    /**
     * GET /api/tour/{id}
     * Trả chi tiết tour, ảnh, lịch trình ... cho FE.
     */
    public function getDataTour($id)
    {
        $tour = TourDuLich::with([
            'danhMuc:id,ten_danh_muc',
            'nguoiDung:id,ho_ten,email',
            'anh:id,id_tour,url,mo_ta',
            'lichTrinhs:id,id_tour,tieu_de,noi_dung,ngay_lich_trinh,thu_tu',
            'phuongTiens:id,ten_phuong_tien'
        ])->find($id);

        if (!$tour) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy tour!'
            ], 404);
        }

        return response()->json([
            'status'        => true,
            'data'          => $tour,
        ]);
    }
}
