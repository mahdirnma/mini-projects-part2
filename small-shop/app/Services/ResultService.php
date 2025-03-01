<?php

namespace App\Services;

class ResultService
{
    public function __construct(public bool $success, public mixed $data=null)
    {

    }
}
