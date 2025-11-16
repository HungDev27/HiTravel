<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danh_gias';
    protected $fillable = ['id_dat_tour', 'hinh_anh', 'diem', 'binh_luan'];

    public function datTour()
    {
        return $this->belongsTo(DatTour::class, 'id_dat_tour');
    }
}
