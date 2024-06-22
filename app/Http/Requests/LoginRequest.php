<?php

namespace App\Http\Requests;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * @throws AuthenticationException
     */
    public function auth(): void
    {
        if (!Auth::attempt(['email' => $this->validated('email'), 'password' => $this->validated('password')])) {
            throw new AuthenticationException("The given data was invalid.");
        }
    }
}
