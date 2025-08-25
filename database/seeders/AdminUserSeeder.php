<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'kakoi@ch.xyz.com'],
            [
                'name' => 'Admin Kakoi',
                'password' => Hash::make('Kakoi16.'), // ✅ Enkripsi password
                'role' => 'admin',
            ]
        );
    }
}
