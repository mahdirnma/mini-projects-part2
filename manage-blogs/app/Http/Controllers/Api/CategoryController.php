<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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
        $result=$this->categoryService->getCategories();
        return (new ApiResponseBuilder())->data($result->data)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $result=$this->categoryService->addCategory($request->all());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('category added successfully'):
            (new ApiResponseBuilder())->message('category added unsuccessfully');
        return $apiResponse->data($result->data)->response();

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $result=$this->categoryService->showCategory($category);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('category showed successfully'):
            (new ApiResponseBuilder())->message('category showed unsuccessfully');
        return $apiResponse->data($result->data)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $result=$this->categoryService->updateCategory($request->all(), $category);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('category updated successfully'):
            (new ApiResponseBuilder())->message('category updated unsuccessfully');
        return $apiResponse->data($result->data)->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $result=$this->categoryService->deleteCategory($category);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('category deleted successfully'):
            (new ApiResponseBuilder())->message('category deleted unsuccessfully');
        return $apiResponse->response();

    }
}
