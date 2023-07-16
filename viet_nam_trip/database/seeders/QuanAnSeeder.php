<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class QuanAnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quan_ans')->insert([
            [
                'dia_diem_id' => 1,
                'ten_quan_an' => 'Quán ốc',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 11 đường N11',
                'so_dien_thoai'=>'0365688058',
                'hinh_quan_an'=>'hinh_test/quan_an_1.jpg',
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 2,
                'ten_quan_an' => 'Đồ nướng',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 12 đường N12',
                'so_dien_thoai'=>'0365688058',
                'hinh_quan_an'=>'hinh_test/quan_an_2.jpg',
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 3,
                'ten_quan_an' => 'Lẩu',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 13 đường N13',
                'so_dien_thoai'=>'0365688058',
                'hinh_quan_an'=>'hinh_test/quan_an_3.jpg',
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 4,
                'ten_quan_an' => 'Xiên que cô Ba',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 14 đường N14',
                'so_dien_thoai'=>'0365688058',
                'hinh_quan_an'=>'hinh_test/quan_an_4.jpg',
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 4,
                'ten_quan_an' => 'Tré chộn',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 14 đường N14',
                'so_dien_thoai'=>'0365688058',
                'hinh_quan_an'=>'hinh_test/quan_an_5.jpg',
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 4,
                'ten_quan_an' => 'Chả lụi nướng',
                'tinh'=>'Đồng Nai',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'dia_chi'=>'số 14 đường N14',
                'so_dien_thoai'=>'0365688058',
                'hinh_quan_an'=>'hinh_test/quan_an_4.jpg',
                'trang_thai'=>1,
            ],
        ]);
    }
}
