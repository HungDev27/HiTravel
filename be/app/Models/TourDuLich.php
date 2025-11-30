<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourDuLich extends Model
{
    protected $table = 'tour_du_liches';
    protected $fillable = [
        'ma_tour',
        'ten_tour',
        'mo_ta',
        'id_danh_muc',
        'gia_nguoi_lon',
        'gia_tre_em',
        'ngay_di',
        'ngay_ve',
        'gio_di',
        'gio_ve',
        'dia_diem',
        'tao_boi',
        'so_cho',
        'so_cho_con',
        'trang_thai',
    ];



    public function lichTrinhs()
    {
        return $this->hasMany(LichTrinh::class, 'id_tour');
    }

    public function datTours()
    {
        return $this->hasMany(DatTour::class, 'id_tour');
    }

    public function phuongTiens()
    {
        return $this->belongsToMany(PhuongTien::class, 'tour_phuong_tiens', 'id_tour', 'id_phuong_tien');
    }

    // === 3 quan hệ BE đang gọi trong API ===

    // Quan hệ tới bảng danh mục tour
    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'id_danh_muc');
    }

    // Quan hệ người tạo (user)
    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'tao_boi');
    }

    public function anh()
    {
        return $this->hasMany(TourAnh::class, 'id_tour')->orderBy('id');
    }
}
