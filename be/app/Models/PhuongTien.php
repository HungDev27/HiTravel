<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhuongTien extends Model
{
    protected $table = 'phuong_tiens';
    protected $fillable = ['ten_phuong_tien', 'mo_ta', 'bien_so', 'suc_chua', 'trang_thai'];

    public function tourPhuongTiens()
    {
        return $this->belongsToMany(TourDuLich::class, 'tour_phuong_tiens', 'id_phuong_tien', 'id_tour');
    }
}
