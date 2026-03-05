<?php

namespace Admin\Events\Requests;

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
            'event_organizer' => 'required|max:255',
            'event_type_id' => 'required|max:255',
            'date' => 'required|date|after_or_equal:today',
            'location' => 'required|max:255',
            'description' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'date.after_or_equal' => 'The :attribute must be the current date or a future date.',
            'event_type_id' => 'The event type field is required.'
        ];
    }
}
