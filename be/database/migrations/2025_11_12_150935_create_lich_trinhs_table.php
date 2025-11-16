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
        Schema::create('lich_trinhs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tour');
            $table->string('tieu_de');
            $table->text('noi_dung');
            $table->integer('ngay_lich_trinh');
            $table->integer('thu_tu');
            $table->timestamps();

            $table->foreign('id_tour')->references('id')->on('tour_du_liches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_trinhs');
    }
};
