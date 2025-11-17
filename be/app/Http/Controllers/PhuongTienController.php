<?php

namespace App\Http\Controllers;

use App\Models\PhuongTien;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhuongTienController extends Controller
{

    public function getData()
    {
        $data = PhuongTien::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $data
        ]);
    }


    public function addData(Request $request)
    {
        PhuongTien::create([
            'ten_phuong_tien' => $request->ten_phuong_tien,
            'mo_ta' => $request->mo_ta,
            'bien_so' => $request->bien_so,
            'suc_chua' => $request->suc_chua,
            'trang_thai' => $request->trang_thai,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm phương tiện thành công',
        ]);
    }


    public function upDate(Request $request)
    {
        PhuongTien::where('id', $request->id)->update([
            'ten_phuong_tien' => $request->ten_phuong_tien,
            'mo_ta' => $request->mo_ta,
            'bien_so' => $request->bien_so,
            'suc_chua' => $request->suc_chua,
            'trang_thai' => $request->trang_thai,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật phương tiện thành công',
        ]);
    }


    public function destroy(PhuongTien $request)
    {
        PhuongTien::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa phương tiện thành công',
        ]);
    }
    
    public function changeStatus(Request $request)
    {
        $phuongtien = PhuongTien::where('id', $request->id)->first();
        $phuongtien->trang_thai = !$request->trang_thai;
        $phuongtien->save();
        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái phương tiện thành công',
        ]);
    }
}
