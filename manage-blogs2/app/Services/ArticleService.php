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
    public function addArticle($article)
    {
        return app(TryService::class)(function () use ($article){
            $status=Article::create([
                'title'=>$article['title'],
                'description'=>$article['description'],
                'category_id'=>$article['category_id'],
                'user_id'=>$article['user_id'],
            ]);
            $status->tags()->attach(json_decode($article['tag_ids']));
            return $status;
        });
    }
    public function showArticle(Article $article)
    {
        return app(TryService::class)(function () use ($article){
            return $article;
        });
    }
    public function updateArticle($request,Article $article){
        return app(TryService::class)(function () use ($request,$article){
            $article->update([
                'title'=>$request['title'],
                'description'=>$request['description'],
                'category_id'=>$request['category_id'],
                'user_id'=>$request['user_id'],
            ]);
            $article->tags()->sync(json_decode($request['tag_ids']));
            return $article;
        });
    }
    public function deleteArticle(Article $article){
        return app(TryService::class)(function () use ($article){
            return $article->update(['is_active' => 0]);
        });
    }


}
