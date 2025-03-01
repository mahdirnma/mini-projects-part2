<?php

namespace App\Services;

class ApiResponseBuilder
{
    private ApiResponseService $service;
    public function __construct()
    {
        $this->service = new ApiResponseService();
    }

    public function message(string $message)
    {
        $this->service->setMessage($message);
        return $this;
    }
    public function data(array $data)
    {
        $this->service->setData($data);
        return $this;
    }

    public function get()
    {
        return $this->service;
    }

}
