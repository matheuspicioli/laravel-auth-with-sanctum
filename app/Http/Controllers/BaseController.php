<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    protected BaseService $service;

    public function show(int $id): JsonResponse
    {
        $model = $this->service->findOrFail($id);
        return response()->json($model, Response::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        $model = $this->service->store($request->all());
        return response()->json($model, Response::HTTP_CREATED);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $model = $this->service->update($id, $request->all());
        return response()->json($model, Response::HTTP_OK);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
