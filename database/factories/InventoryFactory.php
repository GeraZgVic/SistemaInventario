<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Inventory::class;

    public function definition(): array
    {
        return [
            'branch_id' => $this->faker->numberBetween(1, 2),
            // 'quantity' => $this->faker->numberBetween(1, 100),
            'brand' => $this->faker->word,
            'model' => $this->faker->word,
            'serial_number' => $this->faker->uuid,
            'status' => $this->faker->randomElement(['Funcionando', 'Sin Funcionar', 'En Bodega']),
            'description' => $this->faker->paragraph,
            'wholesaler' => $this->faker->randomElement(['WESTCON MEXICO SA DE CV', 'SYSCOM Villahermosa']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
