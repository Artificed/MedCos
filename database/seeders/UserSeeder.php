<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => Str::uuid()->toString(),
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'Admin',
            'image' => 'default_pfp.png',
        ]);
    }
}
