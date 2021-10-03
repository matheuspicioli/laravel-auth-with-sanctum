<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use App\Services\PostService;

class PostController extends BaseController
{
    protected BaseService $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}
