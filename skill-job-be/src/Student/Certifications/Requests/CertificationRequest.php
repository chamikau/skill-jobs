<?php

namespace Student\Certifications\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificationRequest extends FormRequest
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
            'title' => 'required|max:225',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'links' => 'nullable|url',
        ];
    }

    public function messages(): array
    {
        return [
            'links' => 'The certification link field is required.'
        ];
    }
}
