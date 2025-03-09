<?php

// cara menjalankan database seeder
// php artisan db:seed --class=MahasiswaTableSeeder

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbmahasiswa')->insert([
            [
                'nrp' => '2372051',
                'nama' => 'syehan',
                'email' => 'syehan@gmail.com',
                'alamat' => 'Jl. Mukodar No.43',
                'password' => Hash::make('12345'),
                'tbProdi_idProdi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
