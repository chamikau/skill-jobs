<?php

namespace Student\Hobbies\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterHobbyUpdateStepsRequest extends FormRequest
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
            'student_goal' => 'nullable',
            'hobby_ids' => 'required|array|min:1',
            'hobby_ids.*' => [
                Rule::exists('hobbies', 'id'),
            ],
//            'industry_type_ids' => 'required|array|min:1',
//            'industry_type_ids.*' => [
//                Rule::exists('industry_types', 'id'),
//            ],
            'skill_ids' => 'required|array|min:1',
            'skill_ids.*' => [
                Rule::exists('skills', 'id'),
            ],
//            'job_type_ids' => 'required|array|min:1|exists:job_types,id',
//            'job_type_ids.*' => [
//                Rule::exists('job_types', 'id'),
//            ],
        ];
    }

    public function messages(): array
    {
        return [
            'hobby_ids' => 'The hobby field is required.',
//            'industry_type_ids' => 'The industry type field is required.',
            'skill_ids' => 'The skill field is required.',
//            'job_type_ids' => 'The job type field is required.'
        ];
    }
}
