<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
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
        $result=$this->articleService->showArticle($article);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('article showed successfully')->data(new ArticleResource($result->data)):
            (new ApiResponseBuilder())->message('article showed unsuccessfully')->data($result->data);
        return $apiResponse->response();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $result=$this->articleService->updateArticle($request->all(),$article);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('article updated successfully')->data(new ArticleResource($result->data)):
            (new ApiResponseBuilder())->message('article updated unsuccessfully')->data($result->data);
        return $apiResponse->response();

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
