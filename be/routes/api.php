<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\PhuongTienController;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/admin/danh-muc-tour/get-data', [DanhMucController::class, 'getData']);
Route::post('admin/danh-muc-tour/add-data', [DanhMucController::class, 'addData']);
Route::post('admin/danh-muc-tour/update', [DanhMucController::class, 'update']);
Route::post('admin/danh-muc-tour/delete', [DanhMucController::class, 'destroy']);
Route::post('admin/danh-muc-tour/tim-kiem', [DanhMucController::class, 'search']);



// Login chung cho tất cả role
Route::post('/dang-nhap', [NguoiDungController::class, 'dangNhap']);
// Check token (cần auth:sanctum)
Route::middleware('auth:sanctum')->get('/check-token', [NguoiDungController::class, 'checkToken']);
// Logout
Route::middleware('auth:sanctum')->post('/logout', [NguoiDungController::class, 'logout']);
//Phuong Tien
Route::get('/admin/phuong-tien/get-data', [PhuongTienController::class, 'getData']);
Route::post('/admin/phuong-tien/add-data', [PhuongTienController::class, 'addData']);
Route::post('/admin/phuong-tien/update', [PhuongTienController::class, 'upDate']);
Route::post('/admin/phuong-tien/delete', [PhuongTienController::class, 'destroy']);
Route::post('/admin/phuong-tien/chang-status', [PhuongTienController::class, 'changeStatus']);

Route::post('/dang-ky', [NguoiDungController::class, 'register']);
