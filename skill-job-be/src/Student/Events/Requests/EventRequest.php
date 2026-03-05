<?php

namespace Student\Events\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required|max:255',
            'event_type_id' => 'required|max:255',
            'date' => 'nullable|max:255',
            'location' => 'nullable|max:255',
            'description' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'event_type_id' => 'The event type field is required.'
        ];
    }
}
