<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BranchSeeder::class);

        // Insertar datos en la tabla 'brands'
        DB::table('brands')->insert([
            ['name' => 'Aruba', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fortinet', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'H3C', 'created_at' => now(), 'updated_at' => now()],
        ]);


        $this->call(InventarioFake::class);
    }
}
