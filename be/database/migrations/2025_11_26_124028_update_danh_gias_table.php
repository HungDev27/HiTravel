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
        Schema::table('danh_gias', function (Blueprint $table) {
            // 1. Nâng cấp cột hinh_anh từ string(500) lên text để chứa JSON nhiều ảnh
            // Lưu ý: Nếu Laravel < 10, bạn cần cài gói doctrine/dbal để dùng hàm ->change()
            $table->text('hinh_anh')->nullable()->change();

            // 2. Thêm cột phản hồi của Admin (Mới)
            $table->text('phan_hoi')
                  ->nullable()
                  ->after('binh_luan') // Đặt sau cột bình luận cho đẹp
                  ->comment('Nội dung Admin trả lời đánh giá');

            // 3. Thêm cột trạng thái kiểm duyệt (Mới)
            $table->enum('trang_thai', ['cho_duyet', 'hien_thi', 'an'])
                  ->default('cho_duyet')
                  ->after('phan_hoi')
                  ->comment('Trạng thái hiển thị đánh giá');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('danh_gias', function (Blueprint $table) {
            // Xóa các cột mới nếu rollback
            $table->dropColumn(['phan_hoi', 'trang_thai']);

            // Trả cột hinh_anh về trạng thái cũ (varchar 500)
            $table->string('hinh_anh', 500)->nullable()->change();
        });
    }
};