<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Services\ApiResponseBuilder;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public TagService $tagService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->tagService->getTags();
        return (new ApiResponseBuilder())->data(TagResource::collection($result->data))->response();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $result=$this->tagService->addTag($request->all());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('tag added successfully')->data(new TagResource($result->data)):
            (new ApiResponseBuilder())->message('tag added unsuccessfully')->data($result->data);
        return $apiResponse->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $result=$this->tagService->showTag($tag);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('tag showed successfully')->data(new TagResource($result->data)):
            (new ApiResponseBuilder())->message('tag showed unsuccessfully')->data($result->data);
        return $apiResponse->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $result=$this->tagService->updateTag($request->all(),$tag);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('tag updated successfully')->data(new TagResource($result->data)):
            (new ApiResponseBuilder())->message('tag updated unsuccessfully')->data($result->data);
        return $apiResponse->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $result=$this->tagService->deleteTag($tag);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('tag deleted successfully'):
            (new ApiResponseBuilder())->message('tag deleted unsuccessfully');
        return $apiResponse->response();
    }
}
