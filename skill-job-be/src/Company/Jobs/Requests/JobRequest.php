<?php

namespace Company\Jobs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'organization_id' => 'required|exists:organizations,id',
            'city_id' => 'required|exists:cities,id',
            'title' => 'required|max:225',
            'location_type' => 'required|max:225',
            'number_of_openings' => 'required|not_in:0|integer| min:0',
            'probation_duration' => 'required|not_in:0|integer| min:0',
            'work_hours' => 'required|not_in:0|integer| min:0',
            'work_hour_rate' => 'nullable|not_in:0|integer| min:0',
            'description' => 'nullable',
            'state'=>'max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'city_id' => 'The city field is required.',
            'work_hour_rate' => 'The salary field is required.'
        ];
    }
}
