<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('123'),
            'age' => '19',
        ]);
        User::create([
            'name' => 'reza',
            'email' => 'reza@gmail.com',
            'password' => Hash::make('123'),
            'age' => '23',
        ]);
        User::create([
            'name' => 'mahdi',
            'email' => 'mahdi@gmail.com',
            'password' => Hash::make('123'),
            'age' => '33',
        ]);
        User::create([
            'name' => 'sara',
            'email' => 'sara@gmail.com',
            'password' => Hash::make('123'),
            'age' => '26',
            'is_active' => false,
        ]);
        User::create([
            'name' => 'zahra',
            'email' => 'zahra@gmail.com',
            'password' => Hash::make('123'),
            'age' => '18',
            'is_active' => false,
        ]);
    }
}
