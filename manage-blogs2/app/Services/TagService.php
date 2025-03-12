<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function getTag()
    {
        return app(TryService::class)(function (){
            return Tag::where('is_active', 1)->get();
        });
    }

}
