<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tour_phuong_tiens', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_tour');
            $table->unsignedBigInteger('id_phuong_tien');

            $table->integer('so_luong')->default(1);
            $table->date('ngay_bat_dau')->nullable();
            $table->date('ngay_ket_thuc')->nullable();
            $table->string('ghi_chu')->nullable();

            $table->timestamps();

            // Thêm ràng buộc khóa ngoại
            $table->foreign('id_tour')
                  ->references('id')
                  ->on('tour_du_liches')
                  ->onDelete('cascade');

            $table->foreign('id_phuong_tien')
                  ->references('id')
                  ->on('phuong_tiens')
                  ->onDelete('cascade');

            // Để tránh trùng cặp tour – phương tiện
            $table->unique(['id_tour', 'id_phuong_tien']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_phuong_tiens');
    }
};
