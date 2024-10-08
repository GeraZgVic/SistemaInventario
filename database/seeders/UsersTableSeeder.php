<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Victor',
            'email' => 'correo@correo.com',
            'password' => Hash::make('password123')
        ])->assignRole('superadmin');
    }
}
