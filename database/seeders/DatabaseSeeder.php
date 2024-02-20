<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        User::factory(5)->create();
        $this->call(CategorySeeder::class);
        Product::factory(5)->create();
        ProductImage::factory(10)->create();
        Cart::factory(5)->create();
        TransactionHeader::factory(5)->create();
        TransactionDetail::factory(5)->create();
    }
}
