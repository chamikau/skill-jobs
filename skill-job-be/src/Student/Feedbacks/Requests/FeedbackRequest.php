<?php

namespace Student\Feedbacks\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'number_of_rating' => 'required|max:255',
            'message' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'course_type_id' => 'The course type field is required.'
        ];
    }
}
