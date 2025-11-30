<?php

namespace App\Http\Controllers;

use App\Models\DatTour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DatTourController extends Controller
{
    public function getData()
    {
        $data = DatTour::join('nguoi_dungs', 'dat_tours.id_khach_hang', '=', 'nguoi_dungs.id')
            ->join('tour_du_liches', 'dat_tours.id_tour', '=', 'tour_du_liches.id')
            ->leftJoin('ma_giam_gias', 'dat_tours.id_ma_giam_gia', '=', 'ma_giam_gias.id')
            ->select(
                'dat_tours.*',
                'nguoi_dungs.ho_ten as ten_khach_hang',
                'nguoi_dungs.avatar',
                'nguoi_dungs.cccd as cccd',
                'tour_du_liches.ten_tour as ten_tour',
                'ma_giam_gias.phan_tram_giam as phan_tram_giam'
            )
            ->orderBy('dat_tours.id', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }



    public function destroy(Request $request)
    {
        $booking = DatTour::find($request->id);

        if (!$booking) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy đơn đặt tour'
            ], 404);
        }

        $booking->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa dữ liệu thành công'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $booking = DatTour::find($request->id);

        if (!$booking) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy đơn đặt tour'
            ], 404);
        }

        $booking->trang_thai = $request->trang_thai;
        $booking->save();

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật trạng thái thành công'
        ]);
    }

    public function locThongTin(Request $request)
{
    $query = DatTour::join('nguoi_dungs', 'dat_tours.id_khach_hang', '=', 'nguoi_dungs.id')
        ->join('tour_du_liches', 'dat_tours.id_tour', '=', 'tour_du_liches.id')
        ->leftJoin('ma_giam_gias', 'dat_tours.id_ma_giam_gia', '=', 'ma_giam_gias.id')
        ->select(
            'dat_tours.*',
            'nguoi_dungs.ho_ten as ten_khach_hang',
            'nguoi_dungs.avatar',
            'nguoi_dungs.cccd',
            'tour_du_liches.ten_tour',
            'ma_giam_gias.phan_tram_giam'
        );

    if ($request->from_date) {
        $query->whereDate('ngay_dat', '>=', $request->from_date);
    }

    if ($request->to_date) {
        $query->whereDate('ngay_dat', '<=', $request->to_date);
    }

    $data = $query->orderBy('dat_tours.id', 'desc')->get();

    return response()->json([
        'status' => true,
        'data' => $data
    ]);
}

}