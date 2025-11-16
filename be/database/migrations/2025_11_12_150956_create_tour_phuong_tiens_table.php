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
        Schema::create('tour_phuong_tiens', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tour');
            $table->unsignedBigInteger('id_phuong_tien');
            $table->timestamps();

            $table->primary(['id_tour', 'id_phuong_tien']);
            $table->foreign('id_tour')->references('id')->on('tour_du_liches')->onDelete('cascade');
            $table->foreign('id_phuong_tien')->references('id')->on('phuong_tiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_phuong_tiens');
    }
};
