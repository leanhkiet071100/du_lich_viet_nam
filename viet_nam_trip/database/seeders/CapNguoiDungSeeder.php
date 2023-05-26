<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class CapNguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("cap_nguoi_dungs")->insert([
            [
                'ten' => 'admin',
                'chuc_danh' => 'admin',
                'is_admin' => 1,
            ],
            [
                'ten' => 'người cho thuê trọ',
                'chuc_danh' => 'cho thuê trọ',
                'is_admin' => 0,
            ],
            [
                'ten' => 'người bán quán',
                'chuc_danh' => 'bán quán',
                'is_admin' => 0,
            ],
        ]);
    }
}
