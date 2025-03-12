<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\ApiResponseBuilder;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(public CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->categoryService->getCategory();
        return (new ApiResponseBuilder())->data(CategoryResource::collection($result->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $result=$this->categoryService->addCategory($request->all());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('tag added successfully')->data(new CategoryResource($result->data)):
            (new ApiResponseBuilder())->message('tag added unsuccessfully')->data($result->data);
        return $apiResponse->response();

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
