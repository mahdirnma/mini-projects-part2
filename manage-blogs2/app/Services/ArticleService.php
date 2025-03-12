<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getArticles()
    {
        return app(TryService::class)(function (){
            return Article::where('is_active', 1)->get();
        });
    }

}
