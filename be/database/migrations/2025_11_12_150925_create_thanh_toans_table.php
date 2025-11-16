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
        Schema::create('thanh_toans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dat_tour');
            $table->string('phuong_thuc');
            $table->dateTime('thoi_gian_thanh_toan');
            $table->decimal('so_tien', 12, 2);
            $table->enum('trang_thai', ['pending', 'success', 'failed']);
            $table->timestamps();

            $table->foreign('id_dat_tour')->references('id')->on('dat_tours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_toans');
    }
};
