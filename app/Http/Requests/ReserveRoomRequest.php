<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRoomRequest extends FormRequest
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
            "fullName" => "required|regex:/^[A-Z][a-z]{2,}(\s[A-Z][a-z]{2,})+$/",
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'checkInDate' => 'required|date|after_or_equal:today',
            'checkOutDate' => 'required|date|after:checkInDate',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
        ];
    }
    public function messages(): array
    {
        return [
          "fullName.regex" => "Full name is not in valid format. It must contain first and last name. Example: Novak Djokovic",
            "phone.regex" => "Phone is not in valid format. Example: 123-456-7890",
            "phone.min" => "Phone must be at least 9 characters long",
            "checkInDate.required" => "Check in date is required",
            "checkInDate.after_or_equal" => "Check in date can't be in the past",
            "checkOutDate.required" => "Check out date is required",
            "checkOutDate.after" => "Check out date must be after check in date",
            "adults.required" => "Number of adults is required",
            "adults.min" => "Number of adults must be at least 1",
            "children.required" => "Number of children is required",
        ];
    }
}
