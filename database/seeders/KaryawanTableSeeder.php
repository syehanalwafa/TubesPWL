<?php

// cara menjalankan database seeder
// php artisan db:seed --class=KaryawanTableSeeder

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbkaryawan')->insert([
            [
                // 'nik' => '8100081',
                // 'nama' => 'Ujang',
                // 'alamat' => 'Jl. Surya Sumantri No.1',
                // 'email' => 'Ujang@gmail.com',
                // 'password' => Hash::make('12345'),
                // 'created_at' => now(),
                // 'updated_at' => now(),
                // 'idrole' => 1,

                'nik' => '8100082',
                'nama' => 'john',
                'alamat' => 'Jl. Pajajaran No.1',
                'email' => 'john@gmail.com',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
                'idrole' => 2,
            ],
        ]);
    }
}