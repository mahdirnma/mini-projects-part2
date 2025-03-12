<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'technology',
            'description' => 'lorem ipsum',
            'user_id' => 1,
            'category_id' => 1,
        ]);
        Article::create([
            'title' => 'Engine',
            'description' => 'lorem ipsum2',
            'user_id' => 2,
            'category_id' => 2,
        ]);
    }
}
