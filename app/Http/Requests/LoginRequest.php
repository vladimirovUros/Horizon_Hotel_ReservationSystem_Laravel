<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",
            "password" => "required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
        ];
    }
    public function messages(): array
    {
        return [
            "email.regex" => "Email is not in valid format",
            "password.regex" => "Password is not in valid format. It must contain at least one letter, one number and be at least 8 characters long.",
        ];
    }
}
