<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@mbg.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'position' => 'Administrator',
            'photo_url' => null,
        ]);

        // Petugas Gizi
        User::create([
            'name' => 'Ahli Gizi',
            'email' => 'gizi@bg.com',
            'password' => Hash::make('password'),
            'role' => 'petugas_gizi',
            'position' => 'Staff Ahli Gizi',
            'photo_url' => null,
        ]);

        // Petugas Pengaduan
        User::create([
            'name' => 'CS Pengaduan',
            'email' => 'aduan@bg.com',
            'password' => Hash::make('password'),
            'role' => 'petugas_pengaduan',
            'position' => 'Customer Service',
            'photo_url' => null,
        ]);
    }
}
