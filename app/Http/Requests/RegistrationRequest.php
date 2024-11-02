<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            "fullname" => "required|regex:/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/",
            "username" => "required|regex:/^[a-zA-Z0-9]{3,100}$/|unique:users,username",
            "email" => "required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|unique:users,email",
            "password" => "required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
            "passwordRepeat" => "required|same:password",
        ];
    }
    public function messages(): array
    {
        return [
            "fullname.regex" => "Full name is not in valid format. It must contain first and last name. Example: Novak Djokovic",
            "username.regex" => "Username is not in valid format. It must contain only letters and numbers. Example: novak123",
            "username.unique" => "Username is already taken.",
            "email.regex" => "Email is not in valid format. Example: novak@gmail.com",
            "email.unique" => "Email is already taken.",
            "password.regex" => "Password is not in valid format. It must contain at least one letter, one number and be at least 8 characters long.",
            "passwordRepeat.same" => "Passwords do not match.",
        ];
    }
}
