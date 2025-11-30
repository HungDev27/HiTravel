<?php

namespace App\Http\Controllers;

use App\Models\DatTour;
use App\Models\NguoiDung;
use App\Models\ThanhToan;
use App\Models\TourDuLich;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TrangChuController extends Controller
{
    public function tongDuLieu(Request $request)
    {

        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Token không hợp lệ hoặc đã hết hạn!'
            ], 401);
        }




        // Tổng doanh thu
        //$tongDoanhThu = ThanhToan::where('trang_thai', 'success')->sum('so_tien');
        // Tổng lượt booking
        $tongBooking = DatTour::count();
        // Tổng tour đang hoạt động
        $tongTour = TourDuLich::where('trang_thai', 'hoat_dong')->count();
        // Tổng người đăng ký
        $tongNguoiDung = NguoiDung::count();
        return response()->json([
            'status' => true,
            //'tong_doanh_thu' => $tongDoanhThu,
            'tong_booking' => $tongBooking,
            'tong_tour_hoat_dong' => $tongTour,
            'tong_nguoi_dung' => $tongNguoiDung,
        ]);
    }

    public function doanhThuTheoNgay(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Token không hợp lệ!'
            ], 401);
        }

        // Ngày hôm nay
        $ngayHienTai = now()->format('Y-m-d');

        // Ngày hôm qua
        $ngayHomQua = now()->subDay()->format('Y-m-d');

        // Doanh thu hôm nay (dựa vào thoi_gian_thanh_toan)
        $doanhThuHomNay = ThanhToan::where('trang_thai', 'success')
            ->whereDate('thoi_gian_thanh_toan', $ngayHienTai)
            ->sum('so_tien');

        // Doanh thu hôm qua
        $doanhThuHomQua = ThanhToan::where('trang_thai', 'success')
            ->whereDate('thoi_gian_thanh_toan', $ngayHomQua)
            ->sum('so_tien');

        // Tính phần trăm
        if ($doanhThuHomQua > 0) {
            $phanTram = (($doanhThuHomNay - $doanhThuHomQua) / $doanhThuHomQua) * 100;
        } else {
            // Nếu hôm qua = 0
            if ($doanhThuHomNay > 0) {
                $phanTram = 100; // tăng mạnh
            } else {
                $phanTram = 0; // không doanh thu cả 2 ngày
            }
        }

        return response()->json([
            'status' => true,
            'doanh_thu_hom_nay' => $doanhThuHomNay,
            'doanh_thu_hom_qua' => $doanhThuHomQua,
            'phan_tram' => round($phanTram, 2),
            'ngay_hom_qua' => $ngayHomQua,
            'ngay_hom_nay' => $ngayHienTai
        ]);
    }

    public function thongKeDoanhThuTheoThang(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Token không hợp lệ!'
            ], 401);
        }

        $year = $request->input('year', date('Y'));

        // Lấy doanh thu theo tháng, chỉ những thanh toán thành công
        $raw = ThanhToan::selectRaw('MONTH(thoi_gian_thanh_toan) as thang, SUM(so_tien) as doanh_thu')
            ->whereYear('thoi_gian_thanh_toan', $year)
            ->where(function ($q) {
                $q->where('trang_thai', 'thanh_cong')
                    ->orWhere('trang_thai', 'success');
            })
            ->groupBy('thang')
            ->orderBy('thang')
            ->get();

        // Khởi tạo mảng 12 tháng, default = 0
        $doanhThu = array_fill(1, 12, 0);
        foreach ($raw as $r) {
            $m = (int) $r->thang;
            $doanhThu[$m] = (float) $r->doanh_thu;
        }

        // Tạo labels tháng đẹp
        $labels = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = 'Tháng ' . $i;
        }

        // Tạo màu ngẫu nhiên cho mỗi tháng
        $colors = [];
        for ($i = 1; $i <= 12; $i++) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
        }

        return response()->json([
            'status' => true,
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Doanh Thu (VND)',
                    'data' => array_values($doanhThu),
                    'backgroundColor' => $colors
                ]
            ]
        ]);
    }
    public function topTourTheoThang(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Token không hợp lệ!'
            ], 401);
        }

        $year = date('Y');
        $month = date('m');

        $raw = DatTour::selectRaw('id_tour, COUNT(*) as so_luot')
            ->whereYear('ngay_dat', $year)
            ->whereMonth('ngay_dat', $month)
            ->whereHas('thanhToan', function ($q) {
                $q->where(function ($t) {
                    $t->where('trang_thai', 'success')
                        ->orWhere('trang_thai', 'thanh_cong');
                });
            })
            ->groupBy('id_tour')
            ->orderByDesc('so_luot')
            ->with('tour:id,ten_tour')
            ->limit(5)
            ->get();

        // labels & data cho chart
        $labels = [];
        $data = [];

        foreach ($raw as $item) {
            $labels[] = $item->tour->ten_tour;
            $data[] = $item->so_luot;
        }

        // màu random
        $colors = [];
        foreach ($labels as $i) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
        }

        return response()->json([
            'status' => true,
            'labels' => $labels,
            'data' => $data,
            'backgroundColor' => $colors,
        ]);
    }
}
