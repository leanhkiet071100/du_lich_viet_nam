<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('bai_viets')->insert([
            [
                'nguoi_dung_id' => 1,
                'tieu_de' => 'The Personality Trait That Makes People Happier',
                'hinh_anh_bai_viet' => 'hinh_test/blog.jpg',
                'loai_bai_viet' =>'tin-tuc',
                'noi_dung' => '',
                'hien' => 1,
                'noi_bat' => 1,
            ],
            [
                'nguoi_dung_id' => 3,
                'tieu_de' => 'This was one of our first days in Hawaii last week.',
                'hinh_anh_bai_viet' => 'hinh_test/blog.jpg',
                'loai_bai_viet' =>'tin-tuc',
                'noi_dung' => '',
                'hien' => 1,
                'noi_bat' => 1,
            ],
            [
                'nguoi_dung_id' => 3,
                'tieu_de' => 'Last week I had my first work trip of the year to Sonoma Valley',
                'hinh_anh_bai_viet' => 'hinh_test/blog.jpg',
                'loai_bai_viet' =>'tin-tuc',
                'noi_dung' => '',
                'hien' => 1,
                'noi_bat' => 0,
            ],
            [
                'nguoi_dung_id' => 3,
                'tieu_de' => 'Happppppy New Year! I know I am a little late on this post',
                'hinh_anh_bai_viet' => 'hinh_test/blog.jpg',
                'loai_bai_viet' =>'bai-viet',
                'noi_dung' => '',
                'hien' => 1,
                'noi_bat' => 0,
            ],
            [
                'nguoi_dung_id' => 3,
                'tieu_de' => 'Absolue collection. The Lancome team has been one…',
                'hinh_anh_bai_viet' => 'hinh_test/blog.jpg',
                'loai_bai_viet' =>'bai-viet',
                'noi_dung' => '',
                'hien' => 0,
                'noi_bat' => 0,
            ],
        ]);
    }
}
