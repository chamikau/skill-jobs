<?php

namespace Admin\Mentors\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'mentor_id' => 'required|max:225',
            'city_id' => 'required|max:225',
            'field_of_study_id' => 'required',
            'university_name' => 'required|max:225',
            'course_name' => 'required|max:225',
            'start_year' => 'required|max:225',
            'end_year' => 'required|max:225',
        ];
    }

    public function messages(): array
    {
        return [
            'field_of_study_id' => 'The field of study  type field is required.'
        ];
    }
}
