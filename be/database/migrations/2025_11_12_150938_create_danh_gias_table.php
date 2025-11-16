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
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dat_tour');
            $table->string('hinh_anh', 500)->nullable();
            $table->integer('diem');
            $table->text('binh_luan')->nullable();
            $table->timestamps();

            $table->foreign('id_dat_tour')->references('id')->on('dat_tours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gias');
    }
};
