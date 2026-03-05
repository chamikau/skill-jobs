<?php

namespace Student\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegisterRequest extends FormRequest
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
            'first_name' => 'required|max:50|regex:/^\S+$/',
            'last_name' => 'required|max:50|regex:/^\S+$/',
            'phone_number_1' => 'required|regex:/^\+?[0-9\-]+$/|min:10|max:15',
            'email' => 'required|unique:students,email|email:rfc,dns',
            'password' => [ 'required', 'min:8','regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/','confirmed'],
            'password_confirmation'=>['required'],'confirmed'
        ];
    }

    public function messages(): array
    {
        $message = [
            'first_name.regex' => 'The :attribute must contain only one word without spaces.',
            'last_name.regex' => 'The :attribute must contain only one word without spaces.',
            'phone_number_1.required' => 'The phone number field is required.',
            'phone_number_1.min' => 'The phone number must be at least 10 characters.',
            'phone_number_1.max' => 'The phone number must not be greater than 15 characters.',
            'phone_number_1.regex' => 'The phone number must contain only numbers.',
        ];
        return $message;
    }
}
