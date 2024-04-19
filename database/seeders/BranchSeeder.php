<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => 'Villahermosa, Tabasco',
            'address' => 'Gaviotas Sur, Calle músicos #714'
        ]);

        Branch::create([
            'name' => 'Ciudad de México, CDMX',
            'address' => 'Unión 161, Escandón II Secc, Miguel Hidalgo, 11800'
        ]);
    }
}
