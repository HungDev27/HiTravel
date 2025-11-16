<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoi_dungs';
    protected $fillable = [
        'ten_dang_nhap',
        'mat_khau_hash',
        'email',
        'so_dien_thoai',
        'ho_va_ten',
        'id_chuc_vu',
        'trang_thai',
        'remember_token'
    ];

    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'id_chuc_vu');
    }

    public function thongTinLienHes()
    {
        return $this->hasMany(ThongTinLienHe::class, 'id_nguoi_dung');
    }

    public function datTours()
    {
        return $this->hasMany(DatTour::class, 'id_khach_hang');
    }

    public function baiViets()
    {
        return $this->hasMany(BaiViet::class, 'id_tac_gia');
    }
}
