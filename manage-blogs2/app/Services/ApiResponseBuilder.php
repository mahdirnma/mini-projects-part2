<?php

namespace App\Services;

class ApiResponseBuilder
{
    private ApiResponseService $apiResponseService;
    public function __construct()
    {
        $this->apiResponseService = new ApiResponseService();
    }

    public function message(string $message)
    {
        $this->apiResponseService->setMessage($message);
        return $this;
    }
    public function data(mixed $data){
        $this->apiResponseService->setData($data);
        return $this;
    }

    public function get()
    {
        return $this->apiResponseService;
    }

    public function response()
    {
        return $this->apiResponseService->response();
    }
}
