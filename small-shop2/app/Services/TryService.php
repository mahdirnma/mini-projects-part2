<?php

namespace App\Services;

use App\Models\User;

class TryService
{
    public function __invoke(\Closure $action) :ResultService
    {
        try {
            $actionResult=$action();
        }
        catch (\Exception $exception) {
            return new ResultService(false,$exception->getMessage());
        }
        return new ResultService(true,$actionResult);
    }
}
