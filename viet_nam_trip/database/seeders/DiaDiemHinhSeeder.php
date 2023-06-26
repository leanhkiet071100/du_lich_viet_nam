<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DiaDiemHinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('dia_diems')->insert([
            [
                'dia_diem_id' => 1,
                'ten' => 'hinh_test/dia_danh_2.jpg',
                'hien' => null,
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 1,
                'ten' => 'hinh_test/dia_danh_3.jpg',
                'hien' => null,
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 1,
                'ten' => 'hinh_test/dia_danh_4.jpg',
                'hien' => null,
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 2,
                'ten' => 'hinh_test/dia_danh_2.jpg',
                'hien' => null,
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 2,
                'ten' => 'hinh_test/dia_danh_3.jpg',
                'hien' => null,
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 3,
                'ten' => 'hinh_test/dia_danh_4.jpg',
                'hien' => null,
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 3,
                'ten' => 'hinh_test/dia_danh_2.jpg',
                'hien' => null,
                'trang_thai'=>1,
            ],
            [
                'dia_diem_id' => 4,
                'ten' => 'hinh_test/dia_danh_4.jpg',
                'hien' => null,
                'trang_thai'=>1,
            ],

        ]);
    }
}
