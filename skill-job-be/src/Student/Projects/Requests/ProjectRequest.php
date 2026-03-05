<?php

namespace Student\Projects\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
//            'student_id' => 'required',
            'project_title' => 'required|max:225',
            'project_description' => 'required',
            'project_links' => 'nullable|max:650|url',
            'skills_used' => 'nullable',
        ];
    }

}
