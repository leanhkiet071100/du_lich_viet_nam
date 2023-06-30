<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LoaiGoiDuLichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loai_goi_du_liches')->insert([
            [
                'ten' => 'Tour miền Bắc',
                'hinh_loai_goi_du_lich' =>'hinh_test/dia_danh_1.jpeg',
                'trang_thai' => 1,
            ],
            [
                'ten' => 'Tour miền Nam',
                'hinh_loai_goi_du_lich' =>'hinh_test/dia_danh_2.jpg',
                'trang_thai' => 1,
            ],
            [
                'ten' => 'Tour miền Trung',
                'hinh_loai_goi_du_lich' =>'hinh_test/dia_danh_3.jpg',
                'trang_thai' => 1,
            ],
        ]);
    }
}
