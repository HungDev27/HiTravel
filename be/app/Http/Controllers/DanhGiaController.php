<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DanhGiaController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DanhGia $danhGia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DanhGia $danhGia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DanhGia $danhGia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhGia $danhGia)
    {
        //
    }

    public function getDataCustomerBinhLuan($id)
    {
        $data = DanhGia::where('id_tour', $id)
            ->join('nguoi_dungs', 'nguoi_dungs.id', 'danh_gias.id_nguoi_dung')
            ->where('danh_gias.trang_thai', 'hien_thi')
            ->select('danh_gias.*', 'nguoi_dungs.ho_ten', 'nguoi_dungs.avatar')
            ->get();
        return response()->json([
            'data'   =>  $data
        ]);
    }

    public function binhLuantour(Request $request)
    {
        // Lấy user đúng cách
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn chưa đăng nhập!'
            ], 401);
        }

        // Tạo trước bình luận
        $danhGia = DanhGia::create([
            'id_nguoi_dung' => $user->id,
            'id_tour'       => $request->id_tour,
            'binh_luan'     => $request->binh_luan,   // FE gửi binh_luan
            'diem'          => $request->diem,
            'trang_thai'    => 'cho_duyet',
        ]);

        // Xử lý ảnh upload
        if ($request->hasFile('hinh_anh')) {

            $arr = [];

            foreach ($request->file('hinh_anh') as $img) {
                $name = time() . '_' . $img->getClientOriginalName();
                $img->move('uploads/binhluan', $name);

                $arr[] = asset('uploads/binhluan/' . $name);
            }

            $danhGia->hinh_anh = json_encode($arr);
            $danhGia->save();
        }

        return response()->json([
            'status' => 1,
            'message' => 'Bạn đã gửi đánh giá thành công!'
        ]);
    }
}
