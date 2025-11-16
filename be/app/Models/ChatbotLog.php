<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatbotLog extends Model
{
    protected $table = 'chatbot_logs';
    protected $fillable = ['id_khach_hang', 'noi_dung'];

    public function khachHang()
    {
        return $this->belongsTo(NguoiDung::class, 'id_khach_hang');
    }
}
