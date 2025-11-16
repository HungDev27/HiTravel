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
        Schema::create('tour_du_liches', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tour');
            $table->unsignedBigInteger('id_loai_tour')->nullable();
            $table->text('mo_ta')->nullable();
            $table->unsignedBigInteger('id_danh_muc');
            $table->decimal('gia_nguoi_lon', 12, 2);
            $table->decimal('gia_tre_em', 12, 2);
            $table->date('ngay_di');
            $table->date('ngay_ve');
            $table->time('gio_di');
            $table->time('gio_ve');
            $table->string('dia_diem');
            $table->unsignedBigInteger('tao_boi');
            $table->integer('so_cho');
            $table->integer('so_cho_con');
            $table->enum('trang_thai', ['mo_ban', 'dong']);
            $table->timestamps();

            $table->foreign('id_danh_muc')->references('id')->on('danh_mucs')->onDelete('cascade');
            $table->foreign('tao_boi')->references('id')->on('nguoi_dungs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_du_liches');
    }
};
