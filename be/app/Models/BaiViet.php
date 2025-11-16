<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table = 'bai_viets';
    protected $fillable = [
        'tieu_de',
        'mo_ta_ngan',
        'noi_dung',
        'hinh_anh',
        'tag',
        'id_tac_gia',
        'id_danh_muc',
        'tinh_trang'
    ];

    public function tacGia()
    {
        return $this->belongsTo(NguoiDung::class, 'id_tac_gia');
    }

    public function danhMuc()
    {
        return $this->belongsTo(DanhMucBaiViet::class, 'id_danh_muc');
    }
}
