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
    public function addTag($tag)
    {
        return app(TryService::class)(function () use ($tag){
            return Tag::create($tag);
        });
    }
    public function showTag(Tag $tag)
    {
        return app(TryService::class)(function () use ($tag){
            return $tag;
        });
    }
    public function updateTag($request,Tag $tag){
        return app(TryService::class)(function () use ($request,$tag){
            $tag->update($request);
            return $tag;
        });
    }

}
