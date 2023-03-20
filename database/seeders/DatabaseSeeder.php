<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \DB;
use \Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('2'),
            'role' => 'admin'
            
        ]);
        DB::table('users')->insert([
            'username' => 'tes',
            'password' => Hash::make('1'),
            'role' => 'masyarakat'
        ]);

        DB::table('masyarakats')->insert([
            'nik' => '1',
            'nama' => 'udin',
            'username' => 'tes',
            'password' => Hash::make('1'),
            'telpon' => '555'
        ]); 
        DB::table('petugas')->insert([
            'nama_petugas' => 'admin1',
            'username' => 'admin',
            'password' => Hash::make('2'),
            'telpon' => '555',
            'level' => 'admin',
        ]);
    }
}
