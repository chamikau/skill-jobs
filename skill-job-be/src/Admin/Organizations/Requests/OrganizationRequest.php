<?php

namespace Admin\Organizations\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
            'industry_type_id' => 'required|exists:industry_types,id',
            'city_id' => 'required|exists:cities,id',
            'name' => 'required|max:255',
            'about_the_company' => 'required|max:650',
            'social_links' => 'max:650'
        ];
    }

    public function messages(): array
    {
        return [
            'city_id' => 'The city field is required.',
            'industry_type_id' => 'The industry type field is required.'
        ];
    }
}
