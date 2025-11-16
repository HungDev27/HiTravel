<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatTour extends Model
{
    protected $table = 'dat_tours';
    protected $fillable = ['id_khach_hang', 'id_tour', 'ngay_dat', 'so_nguoi_lon', 'so_tre_em', 'tong_tien', 'id_ma_giam_gia', 'trang_thai'];

    public function khachHang()
    {
        return $this->belongsTo(NguoiDung::class, 'id_khach_hang');
    }

    public function tour()
    {
        return $this->belongsTo(TourDuLich::class, 'id_tour');
    }

    public function thanhToans()
    {
        return $this->hasMany(ThanhToan::class, 'id_dat_tour');
    }

    public function danhGias()
    {
        return $this->hasMany(DanhGia::class, 'id_dat_tour');
    }
}
