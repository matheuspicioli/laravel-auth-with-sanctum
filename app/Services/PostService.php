<?php

namespace App\Services;

use App\Models\BaseModel;
use App\Models\Post;

class PostService extends BaseService
{
    protected BaseModel $model;

    public function __construct()
    {
        $this->model = (new Post);
    }
}
