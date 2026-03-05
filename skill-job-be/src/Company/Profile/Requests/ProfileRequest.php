<?php

namespace Company\Profile\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => 'required|max:255|regex:/^\S+$/',
            'last_name' => 'required|max:255|regex:/^\S+$/',
        ];
    }
    public function messages(): array
    {
        return [
            'first_name.regex' => 'The :attribute must contain only one word without spaces.',
            'last_name.regex' => 'The :attribute must contain only one word without spaces.',
        ];
    }
}
