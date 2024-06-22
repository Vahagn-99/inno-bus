<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $role = $request->getRole();
        /** @var User $user */
        $user = User::query()->create($data);
        $user->syncRoles($role);

        return $this->response([
            'name' => $user->name,
            'token' => $user->createToken(config('app.name'))->plainTextToken,
            'role' => $role->name
        ], 'User register successfully.');
    }
}
