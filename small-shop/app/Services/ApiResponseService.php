<?php

namespace App\Services;

class ApiResponseService
{
    public int $status=200;
    public ?string $message=null;
    public mixed $data=null;
    public function setMessage(string $message): void
    {
        $this->message=$message;
    }
    public function setData(mixed $data): void{
        $this->data=$data;
    }
    public function setStatus(int $status): void
    {
        $this->status=$status;
    }

    public function response()
    {
        $body=[];
        $this->message!=null && $body['message']=$this->message;
        $this->data!=null && $body['data']=$this->data;
        return response()->json($body,$this->status)    ;
    }
}
