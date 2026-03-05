<?php

namespace Admin\Mentors\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkExperienceRequest extends FormRequest
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
            'work_experience_job_role_id' => 'required|max:225',
            'name' => 'required|max:225',
            'start_date' => 'required|max:225',
            'end_date' => 'required|max:225',
            'description' => 'required|max:225',
        ];
    }

    public function messages(): array
    {
        return [
            'work_experience_job_role_id' => 'The work experience job role type field is required.'
        ];
    }
}
