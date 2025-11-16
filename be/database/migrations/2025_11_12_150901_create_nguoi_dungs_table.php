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
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_dang_nhap');
            $table->string('mat_khau_hash');
            $table->string('email')->unique();
            $table->string('so_dien_thoai')->nullable();
            $table->string('ho_va_ten');
            $table->unsignedBigInteger('id_chuc_vu');
            $table->enum('trang_thai', ['active', 'inactive', 'banned'])->default('active');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_chuc_vu')->references('id')->on('chuc_vus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dungs');
    }
};
