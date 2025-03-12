<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getCategory()
    {
        return app(TryService::class)(function (){
            return Category::where('is_active', 1)->get();
        });
    }
    public function addCategory($category)
    {
        return app(TryService::class)(function () use ($category){
            return Category::create($category);
        });
    }
    public function showCategory(Category $category)
    {
        return app(TryService::class)(function () use ($category){
            return $category;
        });
    }
    public function updateCategory($request,Category $category){
        return app(TryService::class)(function () use ($request,$category){
            $category->update($request);
            return $category;
        });
    }
    public function deleteCategory(Category $category){
        return app(TryService::class)(function () use ($category){
            return $category->update(['is_active' => 0]);
        });
    }
}
