<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryData = [
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Alat Kecantikan'
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Produk'
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Spare Parts'
            ]
        ];

        foreach($categoryData as $categoryData) {
            Category::create($categoryData);
        }
    }
}