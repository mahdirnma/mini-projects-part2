<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getArticles()
    {
        return app(TryService::class)(function () {
            return Article::where('is_active', 1)->get();
        });
    }
    public function addArticle($article){
        return app(TryService::class)(function () use ($article){
            $x=$article['tag_ids'];
            dd($x[0]);
            $status=Article::create([
                'title' => $article['title'],
                'description' => $article['description'],
                'user_id' => $article['user_id'],
                'category_id' => $article['category_id'],
            ]);
/*            foreach ($article['tag_ids'] as $tag){
                $status->tags()->attach($tag);
            }
            return $status;*/
            for ($i = 0; $i < $article['tag_ids']; $i++) {
                $status->tags()->attach($article['tag_ids'][$i]);
            }
            return $status;
        });
    }

    public function showArticle(Article $article)
    {
        return app(TryService::class)(function () use ($article){
            return $article;
        });
    }
    public function updateArticle(Article $article){

    }
    public function deleteArticle(Article $article){
        return app(TryService::class)(function () use ($article){
            $article->update(['is_active'=>0]);
            return $article;
        });
    }
}
