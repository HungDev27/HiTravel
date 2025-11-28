<?php

namespace Database\Seeders;

use App\Models\TourDuLich;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourDuLichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Xóa dữ liệu cũ
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tour_du_liches')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $now = now();

        $data = [
            // ================================================================
            // MIỀN BẮC (ID_DANH_MUC = 1)
            // ================================================================
            [
                'ma_tour'       => 'MB001',
                'ten_tour'      => 'Hà Nội – Sapa – Chinh phục đỉnh Fansipan',
                'mo_ta'         => 'Hành trình săn mây trên đỉnh Fansipan, khám phá bản Cát Cát và thưởng thức đồ nướng Sapa giữa tiết trời se lạnh.',
                'id_danh_muc'   => 1,
                'gia_nguoi_lon' => 3500000,
                'gia_tre_em'    => 2500000,
                'ngay_di'       => '2025-03-10', 'ngay_ve' => '2025-03-13',
                'gio_di'        => '06:00', 'gio_ve' => '18:00',
                'dia_diem'      => 'Lào Cai',
                'tao_boi'       => 1,
                'so_cho'        => 40, 'so_cho_con' => 35,
                'trang_thai'    => 'hoat_dong', // Đã sửa: hoat_dong
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MB002',
                'ten_tour'      => 'Du thuyền Hạ Long 5 sao - Ngủ đêm trên vịnh',
                'mo_ta'         => 'Trải nghiệm đẳng cấp thượng lưu trên du thuyền Ambassador, thăm hang Sửng Sốt và đảo Ti Tốp.',
                'id_danh_muc'   => 1,
                'gia_nguoi_lon' => 2800000,
                'gia_tre_em'    => 1400000,
                'ngay_di'       => '2025-03-15', 'ngay_ve' => '2025-03-16',
                'gio_di'        => '08:00', 'gio_ve' => '11:00',
                'dia_diem'      => 'Quảng Ninh',
                'tao_boi'       => 1,
                'so_cho'        => 20, 'so_cho_con' => 18,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MB003',
                'ten_tour'      => 'Ninh Bình: Tràng An – Bái Đính – Tuyệt Tình Cốc',
                'mo_ta'         => 'Khám phá di sản thiên nhiên thế giới Tràng An và ngôi chùa lớn nhất Đông Nam Á.',
                'id_danh_muc'   => 1,
                'gia_nguoi_lon' => 1200000,
                'gia_tre_em'    => 600000,
                'ngay_di'       => '2025-03-20', 'ngay_ve' => '2025-03-20',
                'gio_di'        => '07:00', 'gio_ve' => '19:00',
                'dia_diem'      => 'Ninh Bình',
                'tao_boi'       => 1,
                'so_cho'        => 45, 'so_cho_con' => 40,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MB004',
                'ten_tour'      => 'Hà Giang mùa hoa Tam Giác Mạch',
                'mo_ta'         => 'Chinh phục đèo Mã Pí Lèng, sông Nho Quế và cột cờ Lũng Cú nơi địa đầu tổ quốc.',
                'id_danh_muc'   => 1,
                'gia_nguoi_lon' => 4500000,
                'gia_tre_em'    => 3000000,
                'ngay_di'       => '2025-10-15', 'ngay_ve' => '2025-10-18',
                'gio_di'        => '05:00', 'gio_ve' => '20:00',
                'dia_diem'      => 'Hà Giang',
                'tao_boi'       => 1,
                'so_cho'        => 25, 'so_cho_con' => 5,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],

            // ================================================================
            // MIỀN TRUNG (ID_DANH_MUC = 2)
            // ================================================================
            [
                'ma_tour'       => 'MT001',
                'ten_tour'      => 'Đà Nẵng – Hội An – Bà Nà Hills',
                'mo_ta'         => 'Tham quan phố cổ Hội An, Cầu Vàng Bà Nà Hills và tắm biển Mỹ Khê.',
                'id_danh_muc'   => 2,
                'gia_nguoi_lon' => 4200000,
                'gia_tre_em'    => 3000000,
                'ngay_di'       => '2025-04-05', 'ngay_ve' => '2025-04-08',
                'gio_di'        => '07:30', 'gio_ve' => '18:00',
                'dia_diem'      => 'Đà Nẵng',
                'tao_boi'       => 1,
                'so_cho'        => 30, 'so_cho_con' => 28,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MT002',
                'ten_tour'      => 'Huế mộng mơ - Cố đô trầm mặc',
                'mo_ta'         => 'Thăm Đại Nội, lăng tẩm các vua Nguyễn và thưởng thức ca Huế trên sông Hương.',
                'id_danh_muc'   => 2,
                'gia_nguoi_lon' => 3800000,
                'gia_tre_em'    => 2500000,
                'ngay_di'       => '2025-04-10', 'ngay_ve' => '2025-04-12',
                'gio_di'        => '08:00', 'gio_ve' => '17:00',
                'dia_diem'      => 'Thừa Thiên Huế',
                'tao_boi'       => 1,
                'so_cho'        => 35, 'so_cho_con' => 35,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MT003',
                'ten_tour'      => 'Nha Trang - Thiên đường biển đảo',
                'mo_ta'         => 'Lặn ngắm san hô tại Hòn Mun, vui chơi tại VinWonders.',
                'id_danh_muc'   => 2,
                'gia_nguoi_lon' => 5500000,
                'gia_tre_em'    => 4000000,
                'ngay_di'       => '2025-05-01', 'ngay_ve' => '2025-05-04',
                'gio_di'        => '06:00', 'gio_ve' => '15:00',
                'dia_diem'      => 'Khánh Hòa',
                'tao_boi'       => 1,
                'so_cho'        => 40, 'so_cho_con' => 0,
                'trang_thai'    => 'tam_dung', // Đã sửa: tam_dung (hết chỗ)
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MT004',
                'ten_tour'      => 'Quy Nhơn - Phú Yên: Xứ sở hoa vàng cỏ xanh',
                'mo_ta'         => 'Check-in Eo Gió, Kỳ Co và Ghềnh Đá Đĩa hùng vĩ.',
                'id_danh_muc'   => 2,
                'gia_nguoi_lon' => 4100000,
                'gia_tre_em'    => 2900000,
                'ngay_di'       => '2025-06-15', 'ngay_ve' => '2025-06-18',
                'gio_di'        => '07:00', 'gio_ve' => '16:00',
                'dia_diem'      => 'Bình Định',
                'tao_boi'       => 1,
                'so_cho'        => 30, 'so_cho_con' => 15,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],

            // ================================================================
            // MIỀN NAM (ID_DANH_MUC = 3)
            // ================================================================
            [
                'ma_tour'       => 'MN001',
                'ten_tour'      => 'Phú Quốc 3N2Đ - Đảo Ngọc thiên đường',
                'mo_ta'         => 'Nghỉ dưỡng resort 5 sao, ngắm hoàng hôn Sunset Sanato và tham quan Grand World.',
                'id_danh_muc'   => 3,
                'gia_nguoi_lon' => 6500000,
                'gia_tre_em'    => 4500000,
                'ngay_di'       => '2025-02-14', 'ngay_ve' => '2025-02-16',
                'gio_di'        => '09:00', 'gio_ve' => '12:00',
                'dia_diem'      => 'Kiên Giang',
                'tao_boi'       => 1,
                'so_cho'        => 20, 'so_cho_con' => 10,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MN002',
                'ten_tour'      => 'Miền Tây sông nước: Cần Thơ - Sóc Trăng - Bạc Liêu',
                'mo_ta'         => 'Tham quan chợ nổi Cái Răng, nhà công tử Bạc Liêu và chùa Dơi.',
                'id_danh_muc'   => 3,
                'gia_nguoi_lon' => 2200000,
                'gia_tre_em'    => 1100000,
                'ngay_di'       => '2025-03-05', 'ngay_ve' => '2025-03-07',
                'gio_di'        => '05:30', 'gio_ve' => '18:00',
                'dia_diem'      => 'Cần Thơ',
                'tao_boi'       => 1,
                'so_cho'        => 45, 'so_cho_con' => 45,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MN003',
                'ten_tour'      => 'Côn Đảo - Vùng đất tâm linh',
                'mo_ta'         => 'Viếng mộ cô Sáu, tham quan nhà tù Côn Đảo và tắm biển Đầm Trầu.',
                'id_danh_muc'   => 3,
                'gia_nguoi_lon' => 5800000,
                'gia_tre_em'    => 4000000,
                'ngay_di'       => '2025-07-27', 'ngay_ve' => '2025-07-29',
                'gio_di'        => '06:00', 'gio_ve' => '14:00',
                'dia_diem'      => 'Bà Rịa - Vũng Tàu',
                'tao_boi'       => 1,
                'so_cho'        => 25, 'so_cho_con' => 20,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],
            [
                'ma_tour'       => 'MN004',
                'ten_tour'      => 'Vũng Tàu - Cuối tuần thư giãn',
                'mo_ta'         => 'Tour ngắn ngày, check-in tượng chúa Kito, hải đăng và thưởng thức hải sản.',
                'id_danh_muc'   => 3,
                'gia_nguoi_lon' => 1500000,
                'gia_tre_em'    => 800000,
                'ngay_di'       => '2025-08-01', 'ngay_ve' => '2025-08-02',
                'gio_di'        => '06:00', 'gio_ve' => '17:00',
                'dia_diem'      => 'Bà Rịa - Vũng Tàu',
                'tao_boi'       => 1,
                'so_cho'        => 50, 'so_cho_con' => 50,
                'trang_thai'    => 'hoat_dong',
                'created_at'    => $now, 'updated_at' => $now,
            ],
        ];

        TourDuLich::insert($data);
    }
}