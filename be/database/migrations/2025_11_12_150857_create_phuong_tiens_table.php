<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phuong_tiens', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phuong_tien');
            $table->string('mo_ta')->nullable();
            $table->string('bien_so');
            $table->integer('suc_chua');
            $table->tinyInteger('trang_thai')->default(0); // 0: dang_dung, 1: san_sang, 2: bao_tri
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phuong_tiens');
    }
};
