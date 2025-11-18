<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhuongTien extends Model
{
    protected $table = 'phuong_tiens';

    protected $fillable = [
        'ten_phuong_tien',
        'mo_ta',
        'bien_so',
        'suc_chua',
        'trang_thai',
    ];

    // Quan hệ với tour_phuong_tien
    public function tours()
    {
        return $this->belongsToMany(
            TourDuLich::class,
            'tour_phuong_tiens',
            'id_phuong_tien',   // foreign key ở bảng pivot
            'id_tour'           // related key ở bảng pivot
        )
        ->withPivot([
            'so_luong',
            'ngay_bat_dau',
            'ngay_ket_thuc',
            'ghi_chu',
            'created_at',
            'updated_at'
        ]);
    }
}
