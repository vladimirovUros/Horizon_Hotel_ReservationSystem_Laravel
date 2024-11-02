<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "full_name" => "required|regex:/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/",
            "email" => "required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",
            "message" => "required|min:5|max:200"
        ];
    }

    public function messages(): array
    {
        return [
            "full_name.regex" => "Full name is not in valid format. It must contain first and last name. Example: Novak Djokovic",
            "email.regex" => "Email is not in valid format. Example: Example: novak@gmail.com",
        ];
    }
}
