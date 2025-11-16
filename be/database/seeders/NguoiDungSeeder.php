<?php

namespace Database\Seeders;

use App\Models\NguoiDung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NguoiDung::insert([
            [
                'ten_dang_nhap' => 'admin',
                'mat_khau_hash' => Hash::make('123456'),
                'email' => 'admin@test.com',
                'so_dien_thoai' => '0123456789',
                'ho_va_ten' => 'Admin Test',
                'id_chuc_vu' => 1,
                'trang_thai' => 'active',
                'remember_token' => null,
            ],
            [
                'ten_dang_nhap' => 'user1',
                'mat_khau_hash' => Hash::make('123456'),
                'email' => 'user1@test.com',
                'so_dien_thoai' => '0987654321',
                'ho_va_ten' => 'User Một',
                'id_chuc_vu' => 3,
                'trang_thai' => 'active',
                'remember_token' => null,
            ],
        ]);
    }
}
