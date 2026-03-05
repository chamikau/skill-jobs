<?php

namespace Student\Profile\Requests;

use App\Rules\StorageFile;
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
            'phone_number_1' => 'required|regex:/^\+?[0-9\-]+$/|min:10|max:15',
            'profile_image'=>'nullable|array',
            'profile_image.*' => [new StorageFile(20*1024*1024, ['image/jpg', 'image/png', 'image/jpeg', 'application/pdf'])],
            'linkedin_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'github_link' => 'nullable|url',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.regex' => 'The :attribute must contain only one word without spaces.',
            'last_name.regex' => 'The :attribute must contain only one word without spaces.',
            'phone_number_1.required' => 'The phone number field is required.',
            'phone_number_1.min' => 'The phone number must be at least 10 characters.',
            'phone_number_1.max' => 'The phone number must not be greater than 15 characters.',
            'phone_number_1.regex' => 'The phone number must contain only numbers.',
        ];
    }
}
