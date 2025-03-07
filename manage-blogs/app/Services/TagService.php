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
    public function addTag($tag){
        return app(TryService::class)(function () use ($tag){
            return Tag::create($tag);
        });
    }
    public function showTag(Tag $tag){
        return app(TryService::class)(function () use ($tag){
            return $tag;
        });
    }
    public function updateTag($data,Tag $tag){
        return app(TryService::class)(function () use ($data,$tag){
            $tag->update($data);
            return $tag;
        });
    }
    public function deleteTag(Tag $tag){
        return app(TryService::class)(function () use ($tag){
            $tag->update(['is_active'=>0]);
            return $tag;
        });
    }

}
