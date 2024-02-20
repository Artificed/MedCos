<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\TransactionHeader;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionDetail>
 */
class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'transaction_id' => TransactionHeader::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'quantity' => rand(1, 3)
        ];
    }
}
