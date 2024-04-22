<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;
use Database\Factories\InventoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventarioFake extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::factory()->count(20)->create();
    }
}
