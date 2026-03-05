<?php

namespace Admin\Courses\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'course_id' => 'required|max:255',
            'content_name' => 'required|max:255',
            'number_of_lectures' => 'required|max:255|integer| min:0',
            'lecture_hours' => 'required|max:255|integer| min:0',
            'content_description' => 'required|max:255',
        ];
    }

}
