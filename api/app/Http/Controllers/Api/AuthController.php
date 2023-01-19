<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Services\AuthService;
use App\Contracts\AuthContract;
use App\Http\Response\ApiResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;

final class AuthController extends Controller
{
    public function __construct(private readonly AuthContract $authService) {}

    public function login(LoginRequest $request): ApiResponse
    {
        $user = $this->authService->login($request->getDTO());

        return new ApiResponse(new UserResource($user));
    }

    public function register(RegisterRequest $request): ApiResponse
    {
        $user = $this->authService->register($request->getDTO());

        return new ApiResponse(new UserResource($user));
    }
}
