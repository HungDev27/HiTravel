<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'chuc_vus';
    protected $fillable = ['ten_chuc_vu', 'mo_ta'];

    public function nguoiDungs()
    {
        return $this->hasMany(NguoiDung::class, 'id_chuc_vu');
    }
}
