<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\NguoiDungController;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('/admin/dang-nhap', [NguoiDungController::class, 'dangNhap']);
Route::get('/admin/check-token', [NguoiDungController::class, 'checkAdmin']);
Route::get('/admin/danh-muc-tour/get-data', [DanhMucController::class, 'getData']);
Route::post('admin/danh-muc-tour/add-data', [DanhMucController::class, 'addData']);
Route::post('admin/danh-muc-tour/update', [DanhMucController::class, 'update']);
Route::post('admin/danh-muc-tour/delete', [DanhMucController::class, 'destroy']);
Route::post('admin/danh-muc-tour/tim-kiem', [DanhMucController::class, 'search']);
