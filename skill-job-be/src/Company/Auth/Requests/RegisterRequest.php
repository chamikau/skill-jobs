<?php

namespace Company\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'email' => 'required|unique:admins,email|email:rfc,dns',
            'password' => [ 'required', 'min:8','regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/','confirmed'],
            'password_confirmation'=>['required'],'confirmed',
            'company'=> 'required_if:has_company,true',
            'company.name'=> 'required_if:has_company,true|max:255',
            'company.industry_type_id' => 'required_if:has_company,true|exists:industry_types,id',
            'company.city_id' => 'required_if:has_company,true|exists:cities,id',
            'company.about_the_company' => 'required_if:has_company,true|max:650',
            'company.social_links' => 'max:650',
        ];
    }

    public function messages(): array
    {
        $message = [
            'company.name.required_if' => 'The company name field is required.',
            'company.industry_type_id.required_if' => 'The industry type field is required.',
            'company.city_id.required_if' => 'The city field is required.',
            'company.about_the_company.required_if' => 'The description field is required.',
            'first_name.regex' => 'The :attribute must contain only one word without spaces.',
            'last_name.regex' => 'The :attribute must contain only one word without spaces.',
        ];
        return $message;
    }
}
