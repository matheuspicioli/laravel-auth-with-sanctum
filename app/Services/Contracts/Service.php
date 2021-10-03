<?php

namespace App\Services\Contracts;

use App\Models\BaseModel;

interface Service
{
    public function find(int $id): ?BaseModel;

    public function findOrFail(int $id): BaseModel;

    public function store(array $data): BaseModel;

    public function update(int $id, array $data): BaseModel;

    public function destroy(int $id): bool;
}
