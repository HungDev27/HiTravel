<?php

use App\Http\Controllers\DanhMucController;

use App\Http\Controllers\DatTourController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\PhuongTienController;
use App\Http\Controllers\TourDuLichController;
use App\Http\Controllers\TourPhuongTienController;
use App\Http\Controllers\TrangChuController;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//admin danh mục
Route::get('admin/danh-muc-tour/get-data', [DanhMucController::class, 'getData']);
Route::post('admin/danh-muc-tour/add-data', [DanhMucController::class, 'addData']);
Route::post('admin/danh-muc-tour/update', [DanhMucController::class, 'update']);
Route::post('admin/danh-muc-tour/delete', [DanhMucController::class, 'destroy']);
Route::post('admin/danh-muc-tour/tim-kiem', [DanhMucController::class, 'search']);





// // Logout
// Route::middleware('auth:sanctum')->post('/logout', [NguoiDungController::class, 'logout']);
//Phuong Tien
Route::get('/admin/phuong-tien/get-data', [PhuongTienController::class, 'getData']);
Route::post('/admin/phuong-tien/add-data', [PhuongTienController::class, 'addData']);
Route::post('/admin/phuong-tien/update', [PhuongTienController::class, 'upDate']);
Route::post('/admin/phuong-tien/delete', [PhuongTienController::class, 'destroy']);
Route::post('/admin/phuong-tien/chang-status', [PhuongTienController::class, 'changeStatus']);
//Tour Phuong Tien
Route::get('/admin/tour-pt/get-data', [TourPhuongTienController::class, 'getData']);
Route::post('/admin/tour-pt/add-data', [TourPhuongTienController::class, 'addData']);
Route::post('/admin/tour-pt/update', [TourPhuongTienController::class, 'upDate']);
Route::post('/admin/tour-pt/delete', [TourPhuongTienController::class, 'destroy']);
Route::get('/admin/tour-pt/get-by-pt/{id}', [TourPhuongTienController::class, 'getByPhuongTien']);


//Voucher
Route::get('/admin/ma-giam-gia/get-data', [MaGiamGiaController::class, 'getData']);
Route::post('/admin/ma-giam-gia/add-data', [MaGiamGiaController::class, 'addData']);
Route::post('/admin/ma-giam-gia/update', [MaGiamGiaController::class, 'update']);
Route::post('/admin/ma-giam-gia/delete', [MaGiamGiaController::class, 'destroy']);
Route::post('/admin/ma-giam-gia/change-status', [MaGiamGiaController::class, 'changeStatus']);
Route::post('/admin/ma-giam-gia/tim-kiem', [MaGiamGiaController::class, 'findmaGiamGia']);

//Tour Du Lich
Route::get('/admin/tour/get-data', [TourDuLichController::class, 'getData']);



//QL Booking Tour
Route::get('/admin/dat-tour/get-data', [DatTourController::class, 'getData']);
Route::post('/admin/dat-tour/delete', [DatTourController::class, 'destroy']);
Route::post('/admin/dat-tour/change-status', [DatTourController::class, 'changeStatus']);
Route::post('/admin/dat-tour/loc-thong-tin', [DatTourController::class, 'locThongTin']);


// Tài khoản người dùng

// Check token (cần auth:sanctum)
Route::middleware('auth:sanctum')->get('/check-token', [NguoiDungController::class, 'checkToken']);
// Login chung cho tất cả role
Route::post('/dang-nhap', [NguoiDungController::class, 'dangNhap']);
Route::post('/dang-ky', [NguoiDungController::class, 'danhKy']);
Route::post('/kich-hoat', [NguoiDungController::class, 'kichHoat']);
Route::get('/thong-tin', [NguoiDungController::class, 'thongTinNguoiDung']);
//Route::post('/dang-xuat', [NguoiDungController::class, 'dangXuat']);
Route::middleware('auth:sanctum')->post('/dang-xuat', [NguoiDungController::class, 'dangXuat']);

//thêm tour
Route::middleware('auth:sanctum')->post('/admin/them-tour', [TourDuLichController::class, 'themTour']);
Route::middleware('auth:sanctum')->get('/admin/tour/get-data', [TourDuLichController::class, 'danhSachTour']);
Route::middleware('auth:sanctum')->get('/admin/tour/{id}', [TourDuLichController::class, 'chiTietTour']);
Route::middleware('auth:sanctum')->post('/admin/tour/update/{id}', [TourDuLichController::class, 'capNhatTour']);
Route::middleware('auth:sanctum')->delete('/admin/tour/delete/{id}', [TourDuLichController::class, 'xoaTour']);



//trang chủ admin
Route::middleware('auth:sanctum')->get('/admin/dashboard', [TrangChuController::class, 'tongDuLieu']);
Route::middleware('auth:sanctum')->get('/admin/doanh-thu-ngay', [TrangChuController::class, 'doanhThuTheoNgay']);
Route::middleware('auth:sanctum')->get('/admin/thong-ke-doanh-thu', [TrangChuController::class, 'thongKeDoanhThuTheoThang']);
