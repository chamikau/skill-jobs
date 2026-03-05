<?php

namespace Admin\Courses\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
            'name' => 'required|max:255',
            'course_type_id' => 'required|max:255',
            'instructor_name' => 'required|max:255',
            'instructor_description' => 'required|max:255',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'course_type_id' => 'The course type field is required.'
        ];
    }
}
