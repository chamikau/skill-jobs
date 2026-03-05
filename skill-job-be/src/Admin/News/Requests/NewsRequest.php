<?php

namespace Admin\News\Requests;

use App\Rules\StorageFile;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'headline' => 'required|max:255',
            'category_id' => 'required|max:255',
            'content' => 'nullable',
            'image' => 'nullable|array',
            'image.*' => [new StorageFile(20*1024*1024, ['image/jpg', 'image/png', 'image/jpeg', 'application/pdf'])],
        ];
    }

}
