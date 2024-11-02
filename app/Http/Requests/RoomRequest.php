<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            "name" => "required|string|max:100|min:3|unique:rooms,name|regex:/^[a-zA-Z0-9\s]+$/",
            "size" => "required|numeric|min:1|max:1000|regex:/^[0-9]+[0-9]*$/",
            "description" => "required|string|max:1000|min:3|regex:/^[a-zA-Z0-9\s]+$/",
            "image" => "required|string|max:255|min:3|regex:/^[a-zA-Z0-9\s]+$/",
            "type_id" => "required|numeric|min:1|regex:/^[0-9]+[0-9]*$/|exists:types,id",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Name is required",
            "name.string" => "Name must be a string",
            "name.max" => "Name must be less than 100 characters",
            "name.min" => "Name must be more than 3 characters",
            "name.unique" => "Name must be unique",
            "name.regex" => "Name must contain only letters and numbers",
            "size.required" => "Size is required",
            "size.numeric" => "Size must be a number",
            "size.min" => "Size must be more than 1",
            "size.max" => "Size must be less than 1000",
            "size.regex" => "Size must contain only numbers",
            "description.required" => "Description is required",
            "description.string" => "Description must be a string",
            "description.max" => "Description must be less than 1000 characters",
            "description.min" => "Description must be more than 3 characters",
            "description.regex" => "Description must contain only letters and numbers",
            "image.required" => "Main image path is required",
            "image.string" => "Main image path must be a string",
            "image.max" => "Main image path must be less than 255 characters",
            "image.min" => "Main image path must be more than 3 characters",
            "image.regex" => "Main image path must contain only letters and numbers",
            "type_id.required" => "Type id is required",
            "type_id.numeric" => "Type id must be a number",
            "type_id.min" => "Type id must be more than 1",
            "type_id.regex" => "Type id must contain only numbers",
            "type_id.exists" => "Type id must exist in the database",
        ];
    }
}
