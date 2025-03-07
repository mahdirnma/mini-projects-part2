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
            'title' => 'blog1',
            'description' => 'lorem ipsum',
            'category_id' => 1,
            'user_id' => 1,
        ]);
        Article::create([
            'title' => 'blog2',
            'description' => 'lorem ipsum2',
            'category_id' => 2,
            'user_id' => 2,
        ]);
    }
}
