<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class NguoiDungController
{
    // Đăng ký người dùng
    public function register(Request $request)
    {
       

        $nguoiDung = NguoiDung::create([
            'ten_dang_nhap' => $request->ten_dang_nhap,
            'email' => $request->email,
            'mat_khau_hash' => Hash::make($request->mat_khau),
            'ho_va_ten' => $request->ho_va_ten,
            'so_dien_thoai' => $request->so_dien_thoai,
            'id_chuc_vu' => $request->id_chuc_vu,
            'trang_thai' => 'active'
        ]);

        $token = $nguoiDung->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $nguoiDung
        ], 201);
    }

    // Đăng nhập người dùng
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mat_khau' => 'required|string',
        ]);

        $nguoiDung = NguoiDung::where('email', $request->email)->first();

        if (!$nguoiDung || !Hash::check($request->mat_khau, $nguoiDung->mat_khau_hash)) {
            throw ValidationException::withMessages([
                'email' => ['Thông tin đăng nhập không chính xác.'],
            ]);
        }

        $token = $nguoiDung->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $nguoiDung
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
