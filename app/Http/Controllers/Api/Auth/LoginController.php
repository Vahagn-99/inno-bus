<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function login(LoginRequest $request): JsonResponse
    {
        $request->auth();

        /** @var User $user */
        $user = Auth::user();

        return $this->response([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'token' => $user->createToken(config('app.name'))->plainTextToken,
            'role' => $user->getRoleNames()->first()
        ],
            'User login successfully.'
        );
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        Auth::logout();
        return $this->response([], 'User logged out successfully.');
    }
}
