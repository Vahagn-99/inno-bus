<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
        ];
    }

    public function getRole(): Role
    {
        return Role::findByName(Arr::last($this->segments()));
    }
}
