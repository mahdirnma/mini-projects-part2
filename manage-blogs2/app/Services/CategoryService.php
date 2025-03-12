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

}
