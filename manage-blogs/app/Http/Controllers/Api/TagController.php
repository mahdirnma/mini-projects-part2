<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use App\Services\ApiResponseBuilder;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(public TagService $tagService)
    {
    }

    public function index()
    {
        $result=$this->tagService->getTags();
        return (new ApiResponseBuilder())->data($result->data)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $result=$this->tagService->addTag($request->all());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('tag added successfully'):
            (new ApiResponseBuilder())->message('tag added unsuccessfully');
        return $apiResponse->data($result->data)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $result=$this->tagService->showTag($tag);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('tag showed successfully'):
            (new ApiResponseBuilder())->message('tag showed unsuccessfully');
        return $apiResponse->data($result->data)->response();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
