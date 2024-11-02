<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminInsertRoomRequest extends FormRequest
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
            "name" => "required|string|max:255|min:3|unique:rooms|regex:/^[a-zA-Z\s]+$/",
            "size" => "required|numeric",
            "description" => "required|string|max:255|min:3",
            "type" => "required|numeric",
            "main_image" => "required",
            "price" => "required",
            "room_images" => "required",
            "beds" => "required",
            "services" => "required",
            "quantity_1" => "required",
            "quantity_2" => "required",
            "quantity_3" => "required",
            "quantity_4" => "required",
            "quantity_5" => "required",
        ];
    }
}
