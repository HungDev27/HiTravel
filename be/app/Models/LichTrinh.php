<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichTrinh extends Model
{
    protected $table = 'lich_trinhs';
    protected $fillable = ['id_tour', 'tieu_de', 'noi_dung', 'ngay_lich_trinh', 'thu_tu'];

    public function tour()
    {
        return $this->belongsTo(TourDuLich::class, 'id_tour');
    }
}
