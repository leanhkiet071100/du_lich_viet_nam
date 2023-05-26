<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('nguoi_dungs')->insert([
            [

                'ten' => 'admin',
                'email' => 'admin@gmail.com',
                'mat_khau' => Hash::make('123456'),
                'hinh_dai_dien' => null,
                'cap_id' => 1,
                'mo_ta' => null,
                'trang_thai'=>1,
            ],
            [

                'ten' => 'CodeLean',
                'email' => 'CodeLean@gmail.com',
                'mat_khau' => Hash::make('123456'),
                'hinh_dai_dien' => null,
                'cap_id' => 2,
                'mo_ta' => null,
                'trang_thai'=>1,
            ],

            [

                'ten' => 'Shane Lynch',
                'email' => 'ShaneLynch@gmail.com',
                'mat_khau' => Hash::make('123456'),
                'hinh_dai_dien' => 'hinh_test/test.jpg',
                'cap_id' => 2,
                'mo_ta' => 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo',
                'trang_thai'=>0,
            ],
            [

                'ten' => 'Brandon Kelley',
                'email' => 'BrandonKelley@gmail.com',
                'mat_khau' => Hash::make('123456'),
                'hinh_dai_dien' => 'hinh_test/test.jpg',
                'cap_id' => 2,
                'mo_ta' => null,
                'trang_thai'=>0,
            ],
            [

                'ten' => 'Roy Banks',
                'email' => 'RoyBanks@gmail.com',
                'mat_khau' => Hash::make('123456'),
                'hinh_dai_dien' => 'hinh_test/test.jpg',
                'cap_id' => 1,
                'mo_ta' => null,
                'trang_thai'=>2,
            ],
        ]);
    }
}
