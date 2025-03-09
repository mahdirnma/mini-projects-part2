<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Services\ApiResponseBuilder;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public ArticleService $articleService)
    {
    }

    public function index()
    {
        $result=$this->articleService->getArticles();
        return (new ApiResponseBuilder())->data($result->data)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $result=$this->articleService->addArticle($request->all());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('article added successfully'):
            (new ApiResponseBuilder())->message('article added unsuccessfully');
        return $apiResponse->data($result->data)->response();

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $result=$this->articleService->showArticle($article);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('article showed successfully'):
            (new ApiResponseBuilder())->message('article showed unsuccessfully');
        return $apiResponse->data($result->data)->response();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $result=$this->articleService->deleteArticle($article);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('article deleted successfully'):
            (new ApiResponseBuilder())->message('article deleted unsuccessfully');
        return $apiResponse->response();

    }
}
