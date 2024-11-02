<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRoomRequest extends FormRequest
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
            "name" => "required|regex:/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/",
            "size" => "required|numeric",
            "description" => "required",
            "main_image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "type" => "required|numeric",
            "price" => "required|numeric",
            "room_images" => "nullable",
            "room_images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "beds" => "required",
            "beds.*" => "numeric",
            "services" => "required",
            "services.*" => "numeric",
            "quantity_1" => "required|numeric",
            "quantity_2" => "required|numeric",
            "quantity_3" => "required|numeric",
            "quantity_4" => "required|numeric",
            "quantity_5" => "required|numeric",
        ];
    }
    public function messages()
    {
        return[
            "name.regex" => "Name is not in valid format. It must contain first and last name. Example: Novak Djokovic",
            "main_image.image" => "Main image is not in valid format. It must be an image.",
            "main_image.mimes" => "Main image is not in valid format. It must be of type: jpeg, png, jpg, gif, svg.",
            "main_image.max" => "Main image is too large. It must be less than 2048KB.",
            "room_images.*.image" => "Room images are not in valid format. They must be images.",
            "room_images.*.mimes" => "Room images are not in valid format. They must be of type: jpeg, png, jpg, gif, svg.",
            "room_images.*.max" => "Room images are too large. They must be less than 2048KB.",
            "beds.*.numeric" => "Beds are not in valid format. They must be numbers.",
            "services.*.numeric" => "Services are not in valid format. They must be numbers.",
            "quantity_1.numeric" => "Quantity is not in valid format. It must be a number.",
            "quantity_2.numeric" => "Quantity is not in valid format. It must be a number.",
            "quantity_3.numeric" => "Quantity is not in valid format. It must be a number.",
            "quantity_4.numeric" => "Quantity is not in valid format. It must be a number.",
            "quantity_5.numeric" => "Quantity is not in valid format. It must be a number.",
        ];
    }
}
