<?php

namespace App\Services;

class ApiResponseBuilder
{
    private ApiResponseService $responseService;
    public function __construct()
    {
        $this->responseService = new ApiResponseService();
    }

    public function message(string $message)
    {
        $this->responseService->setMessage($message);
        return $this;
    }
    public function data(mixed $data,int $statusCode=200){
        $this->responseService->setData($data);
        $statusCode!=200??$this->responseService->setStatusCode($statusCode);
        return $this;
    }
/*    public function statusCode(int $statusCode){
        $this->responseService->setStatusCode($statusCode);
        return $this;
    }*/
    public function get()
    {
        return $this->responseService;
    }

    public function response()
    {
        return $this->responseService->response();
    }
}
