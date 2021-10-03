<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $resource = RegisterResource::make($this->service->register($request->validated()));
        return response()->json($resource, Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request)
    {
        $resource = LoginResource::make($this->service->login($request->validated()));
        return response()->json($resource, Response::HTTP_OK);
    }
}
