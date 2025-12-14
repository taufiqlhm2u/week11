<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required|extensions:jpg,png,jpeg,webp|max:2048',
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required' => 'Name is required',
            'description.required' => 'Description is required',
            'photo.required' => 'Photo is required',
            'photo.extensions' => 'Format allow (jpg, png, jpeg, webp)',
        ];
    }
}
