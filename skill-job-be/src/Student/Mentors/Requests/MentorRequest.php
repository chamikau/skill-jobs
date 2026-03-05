<?php

namespace Student\Mentors\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorRequest extends FormRequest
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
            'name' => 'required|max:225',
            'position' => 'required|max:225',
            'phone_number_1' => 'required|regex:/^\+?[0-9\-]+$/|min:10|max:15',
            'about_mentor' => 'required|max:650',
        ];
    }

    public function messages(): array
    {
        return [
            'phone_number_1.required' => 'The phone number field is required.',
            'phone_number_1.min' => 'The phone number must be at least 10 characters.',
            'phone_number_1.max' => 'The phone number must not be greater than 15 characters.',
            'phone_number_1.regex' => 'The phone number must contain only numbers.',
        ];
    }
}
