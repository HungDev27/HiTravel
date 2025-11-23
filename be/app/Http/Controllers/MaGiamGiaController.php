<?php

namespace App\Http\Controllers;

use App\Models\MaGiamGia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MaGiamGiaController
{
    /**
     * Display a listing of the resource.
     */
    public function getData()
    {
        $data = MaGiamGia::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $data
        ]);
    }
    public function addData(Request $request)
    {
        $mg = MaGiamGia::create([
            'ma'  => $request->ma,
            'mo_ta' => $request->mo_ta,
            'phan_tram_giam' => $request->phan_tram_giam,
            'so_luong' => $request->so_luong,
            'hieu_luc_tu' => $request->hieu_luc_tu,
            'hieu_luc_den' => $request->hieu_luc_den,
            'tao_boi' => $request->tao_boi,
            'trang_thai' => $request->trang_thai,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm mã giảm giá thành công',

        ]);
    }
    public function update(Request $request)
    {
        MaGiamGia::where('id', $request->id)->update([
            'ma' => $request->ma,
            'mo_ta' => $request->mo_ta,
            'phan_tram_giam' => $request->phan_tram_giam,
            'so_luong' => $request->so_luong,
            'hieu_luc_tu' => $request->hieu_luc_tu,
            'hieu_luc_den' => $request->hieu_luc_den,
            'tao_boi' => $request->tao_boi,
            'trang_thai' => $request->trang_thai,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật mã giảm giá thành công',
        ]);
    }
    public function destroy(Request $request)
    {
        MaGiamGia::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa mã giảm giá thành công',
        ]);
    }
    public function changeStatus(Request $request)
    {
        $maGiamGia = MaGiamGia::where('id',$request->id)->first();
        $maGiamGia->trang_thai = !$request->trang_thai;
        $maGiamGia->save();
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật trạng thái mã giảm giá thành công',
        ]);
    }
    public function findmaGiamGia(Request $request)
    {
        $now= Carbon::now();
        $data = MaGiamGia::where('ma', $request->ma)
            ->where('trang_thai', 1)
            ->where('so_luong', '>', 0)
            ->whereDate('hieu_luc_tu', '<=', $now)
            ->whereDate('hieu_luc_den', '>=', $now)
            ->first();
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Áp dụng mã giảm giá thành công',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn',
            ]);
        }
    }
}
