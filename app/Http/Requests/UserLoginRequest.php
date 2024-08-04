<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ];
    }

    public function messages() {
     return [
            'email.required' => 'email không đc để trống',
            'email.email' => 'email không đúng định dạng',
            'email.exists' => 'email chưa đc đăng ký',
            'password.required' => 'password không đc để trống',
            'password.min' => 'password quá ngắn'
     ];
    }
}
