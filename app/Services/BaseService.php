<?php

namespace App\Services;

use App\Models\BaseModel;
use App\Services\Contracts\Service;

class BaseService implements Service
{
    protected BaseModel $model;

    // BaseService uses the Eloquent like a repository
    public function find($id): ?BaseModel
    {
        return $this->model->find($id);
    }

    public function findOrFail($id): BaseModel
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $data): BaseModel
    {
        $model = $this->model->fill($data);
        $model->save();
        return $model;
    }

    public function update(int $id, array $data): BaseModel
    {
        $model = $this->findOrFail($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function destroy(int $id): bool
    {
        $model = $this->findOrFail($id);
        return $model->delete();
    }
}
