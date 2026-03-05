<?php

namespace Student\Educations\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStepsRequest extends FormRequest
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
            'city_id' => 'required',
            'university_name' => 'required|max:150',
            'course_name' => 'required|regex:/^[A-Za-z\s]+$/|max:100',
            'field_of_study_id' => 'required|max:100',
            'start_year' => 'required',
            'end_year' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'city_id' => 'The city field is required.',
            'field_of_study' => 'The field of study is required.',
            'field_of_study_id'=>'The field of study field is required.',
            'course_name.regex' => 'The course name must only contain letters.',
        ];
    }
}
