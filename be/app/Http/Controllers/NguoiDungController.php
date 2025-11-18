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


        // Tìm user theo email và password
        $user = NguoiDung::where('email', $request->email)
            ->where('password', $request->password)
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
                'ho_ten' => $user->ho_ten,
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
                'ho_ten' => $user->ho_va_ten,
                'id_chuc_vu' => $user->id_chuc_vu,
                'email' => $user->email
            ]
        ]);
    }



   // Đăng ký người dùng
    public function register(Request $request)
    {


        $user = NguoiDung::create([
            'ho_ten' => $request->ho_ten,
            'email'    => $request->email,
            'password' => $request->password,
            'cccd' => $request->cccd,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh' => $request->ngay_sinh,
            'id_chuc_vu' => 3
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công!',
            'data' => $user
        ]);
    }


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
