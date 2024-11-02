<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminInsertUserRequest extends FormRequest
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
            "full_name" => "required|regex:/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/",
            "username" => "required|regex:/^[a-zA-Z0-9]{3,100}$/|unique:users,username",
            "email" => "required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|unique:users,email",
            "password" => "required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
            "role_id" => "required|exists:roles,id",
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'required',
            'acc_locked' => 'required',
        ];
    }
    public function messages()
    {
        return [
            "full_name.required" => "Full name is required",
            "full_name.regex" => "Full name must start with capital letter and contain at least two words",
            "username.required" => "Username is required",
            "username.regex" => "Username must contain at least 3 characters",
            "username.unique" => "Username is already taken",
            "email.required" => "Email is required",
            "email.regex" => "Email is not in valid format",
            "email.unique" => "Email is already taken",
            "password.required" => "Password is required",
            "password.regex" => "Password must contain at least 8 characters, one letter and one number",
            "role_id.required" => "Role is required",
            "role_id.exists" => "Role does not exist",
            "profile_image.required" => "Profile image is required",
            "active.required" => "Active is required",
            "acc_locked.required" => "Account locked is required",
        ];
    }
}
