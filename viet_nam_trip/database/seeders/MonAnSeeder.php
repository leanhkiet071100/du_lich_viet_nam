<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class MonAnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mon_ans')->insert([
            [
                'quan_an_id' => 1,
                'ten_mon' => 'Quán ốc',
                'hinh_mon_an'=>'hinh_test/mon_an/quan_oc_1.jpg',
                'gia_ban'=> 30000,
                'trang_thai'=>1,
            ],
            [
                'quan_an_id' => 1,
                'ten_mon' => 'Quán ốc',
                'hinh_mon_an'=>'hinh_test/mon_an/quan_oc_2.jpg',
                'gia_ban'=> 30000,
                'trang_thai'=>1,
            ],
            [
                'quan_an_id' => 1,
                'ten_mon' => 'Quán ốc',
                'hinh_mon_an'=>'hinh_test/mon_an/quan_oc_3.jpg',
                'gia_ban'=> 30000,
                'trang_thai'=>1,
            ],
            [
                'quan_an_id' => 2,
                'ten_mon' => 'Thịt 3 chỉ nướng',
                'hinh_mon_an'=>'hinh_test/mon_an/do_nuong_1.jpg',
                'gia_ban'=> 80000,
                'trang_thai'=>1,
            ],
            [
                'quan_an_id' => 2,
                'ten_mon' => 'Mầm sữa nướng',
                'hinh_mon_an'=>'hinh_test/mon_an/do_nuong_2.jpg',
                'gia_ban'=> 80000,
                'trang_thai'=>1,
            ],
            [
                'quan_an_id' => 3,
                'ten_mon' => 'Lẩu gà',
                'hinh_mon_an'=>'hinh_test/mon_an/do_nuong_2.jpg',
                'gia_ban'=> 150000,
                'trang_thai'=>1,
            ],
            [
                'quan_an_id' => 3,
                'ten_mon' => 'Lẩu gà lá é',
                'hinh_mon_an'=>'hinh_test/mon_an/do_nuong_2.jpg',
                'gia_ban'=> 200000,
                'trang_thai'=>1,
            ],



        ]);
    }
}
