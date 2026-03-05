<?php

namespace Admin\Mentors\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'session_type_id' => 'required|max:225',
            'fees' => 'required',
            'available_time' => 'required',
            'description' => 'required|max:650',
        ];
    }

    public function messages(): array
    {
        return [
            'session_type_id' => 'The session type field is required.'
        ];
    }
}
