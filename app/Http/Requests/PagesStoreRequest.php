<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages',
            'content' => 'required|string',
            'avatar' => 'nullable|image',
        ];
    }
    public function messages(){
        return [
            'title.required' => 'title is required',
            'title.string' => 'title must be string',
            'title.max' => 'title must be max 255 characters',
            'slug.required' => 'slug is required',
            'slug.string' => 'slug must be string',
            'slug.max' => 'slug must be max 255 characters',
            'slug.unique' => 'slug must be unique',
            'content.required' => 'content is required',
            'content.string' => 'content must be string',
            'avatar.image' => 'image must be image',
            'is_active.required' => 'is_active is required',
            'is_active.boolean' => 'is_active must be boolean',
        ];
    }
}
