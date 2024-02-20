<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Str::uuid()->toString(),
            'category_id' => Category::all()->random()->id,
            'name' => $this->faker->name(),
            'price' => rand(10000, 200000),
            'description' => $this->faker->paragraph(),
            'stock' => rand(10, 20),
        ];
    }
}
