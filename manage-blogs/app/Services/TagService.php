<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function getTags()
    {
        return app(TryService::class)(function () {
            return Tag::where('is_active', 1)->get();
        });
    }
}
