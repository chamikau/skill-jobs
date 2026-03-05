<?php

namespace Student\WorkExperiences\Requests;

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
            'work_experience_job_role_id' => 'required',
            'name' => 'required|max:225',
            'company_name' => 'required|max:225',
            'duration' => 'required',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'work_experience_job_role_id' => 'The job role type field is required.'
        ];
    }

}
