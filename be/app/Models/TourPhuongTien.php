<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TourPhuongTien extends Pivot
{
    protected $table = 'tour_phuong_tiens';
    protected $fillable = ['id_tour', 'id_phuong_tien'];
}
