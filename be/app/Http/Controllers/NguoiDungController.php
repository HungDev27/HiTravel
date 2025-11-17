<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class NguoiDungController
{

    public function dangNhap(Request $request)
    {


        // Tìm user theo email và mat_khau_hash
        $user = NguoiDung::where('email', $request->email)
            ->where('mat_khau_hash', $request->mat_khau_hash)
            ->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Thông tin đăng nhập không chính xác.'
            ], 401);
        }


        // Tạo token Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Đăng nhập thành công',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'ho_va_ten' => $user->ho_va_ten,
                'id_chuc_vu' => $user->id_chuc_vu,
                'email' => $user->email
            ]
        ]);
    }

    // Kiểm tra token
    public function checkToken(Request $request)
    {
        //$user = Auth::guard('sanctum')->user();
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Token không hợp lệ'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'user' => [
                'id' => $user->id,
                'ho_va_ten' => $user->ho_va_ten,
                'id_chuc_vu' => $user->id_chuc_vu,
                'email' => $user->email
            ]
        ]);
    }



    // Đăng ký người dùng
    // public function register(Request $request)
    // {


    //     $nguoiDung = NguoiDung::create([
    //         'ten_dang_nhap' => $request->ten_dang_nhap,
    //         'email' => $request->email,
    //         'mat_khau_hash' => Hash::make($request->mat_khau),
    //         'ho_va_ten' => $request->ho_va_ten,
    //         'so_dien_thoai' => $request->so_dien_thoai,
    //         'id_chuc_vu' => $request->id_chuc_vu,
    //         'trang_thai' => 'active'
    //     ]);

    //     $token = $nguoiDung->createToken('auth_token')->plainTextToken;

    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'Bearer',
    //         'user' => $nguoiDung
    //     ], 201);
    // }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Đăng xuất thành công'
        ]);
    }

    // Lấy thông tin người dùng đang đăng nhập
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }
}
