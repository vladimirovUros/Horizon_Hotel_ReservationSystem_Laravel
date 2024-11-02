<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            "username_user" => "required|regex:/^[a-zA-Z0-9]{3,100}$/",
            "email_user" => "required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",
            "username_fullname" => "required|regex:/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/",
            "username_password" => "nullable|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
        ];
    }
    public function messages()
    {
        return[
            "username_fullname.regex" => "Full name is not in valid format. It must contain first and last name. Example: Novak Djokovic",
            "username_user.regex" => "Username is not in valid format. It must contain only letters and numbers. Example: novak123",
            "email_user.regex" => "Email is not in valid format. Example: novak@gmail.com",
            "username_password.regex" => "Password is not in valid format. It must contain at least one letter, one number and be at least 8 characters long.",
        ];
    }
}
