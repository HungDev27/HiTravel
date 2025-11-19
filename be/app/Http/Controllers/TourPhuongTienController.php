<?php

namespace App\Http\Controllers;

use App\Models\TourPhuongTien;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TourPhuongTienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getData()
    {
        $data = TourPhuongTien::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $data
        ]);
    }


    public function addData(Request $request)
    {
        TourPhuongTien::create([
            'id_tour' => $request->id_tour,
            'id_phuong_tien' => $request->id_phuong_tien,
            'so_luong' => $request->so_luong,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'ghi_chu' => $request->ghi_chu,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm phương tiện thành công',
        ]);
    }


    public function upDate(Request $request)
    {
        TourPhuongTien::where('id', $request->id)->update([
            'id_tour' => $request->id_tour,
            'id_phuong_tien' => $request->id_phuong_tien,
            'so_luong' => $request->so_luong,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'ghi_chu' => $request->ghi_chu,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật phương tiện thành công',
        ]);
    }


    public function destroy(TourPhuongTien $request)
    {
        TourPhuongTien::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa phương tiện thành công',
        ]);
    }
}
