<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Services\ApiResponseBuilder;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(public ArticleService $articleService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->articleService->getArticles();
        return (new ApiResponseBuilder())->data(ArticleResource::collection($result->data))->response();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $result=$this->articleService->addArticle($request->all());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('article added successfully')->data(new ArticleResource($result->data)):
            (new ApiResponseBuilder())->message('article added unsuccessfully')->data($result->data);
        return $apiResponse->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
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
        //
    }
}
