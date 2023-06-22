<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class NoiLuuTruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('noi_luu_trus')->insert([
            [
                'dia_diem_id' => 1,
                'ten_noi_luu_tru' => 'Nơi lưu trú 1',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 11 đường N11',
                'so_dien_thoai'=>'0365688058',
                'hinh_noi_luu_tru'=>'hinh_test/quan_an_1.jpg',
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 1,
                'ten_noi_luu_tru' => 'Nơi lưu trú 2',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 12 đường N12',
                'so_dien_thoai'=>'0365688058',
                'hinh_noi_luu_tru'=>'hinh_test/quan_an_2.jpg',
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 2,
                'ten_noi_luu_tru' => 'Nơi lưu trú 3',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 13 đường N13',
                'so_dien_thoai'=>'0365688058',
                'hinh_noi_luu_tru'=>'hinh_test/quan_an_3.jpg',
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 4,
                'ten_noi_luu_tru' => 'Nơi lưu trú 4',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 14 đường N14',
                'so_dien_thoai'=>'0365688058',
                'hinh_noi_luu_tru'=>'hinh_test/quan_an_4.jpg',
                'trang_thai'=>1,
            ],
        ]);
    }
}
