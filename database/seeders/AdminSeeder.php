<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Soden',
            'email' => 'soden@admin.com',
            'password' => bcrypt('Soden123'),
            'nik' => '12365',
            'jenis_kelamin' => 'laki-laki',
            'status' => 'admin'
        ]);
    }
}
