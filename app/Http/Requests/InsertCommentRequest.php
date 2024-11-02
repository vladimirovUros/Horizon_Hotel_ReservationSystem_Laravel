<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertCommentRequest extends FormRequest
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
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    public function messages()
    {
        return [
            "comment.required" => "Comment is required",
            "comment.string" => "Comment must be a string",
            "comment.max" => "Comment must be less than 255 characters",
            "rating.required" => "Rating is required",
            "rating.min" => "You have to rate a room",
        ];
    }
}
