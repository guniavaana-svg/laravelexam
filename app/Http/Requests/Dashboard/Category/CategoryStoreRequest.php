<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'name'=>'required|unique:categories,name',
            'is_active'=>'nullable|boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'required',
            'name.unique'=>'already exists',
            'is_active'=>'category status mast be boolean',
        ];
    }
    public function prepareForValidation(): void
    {
        $this->merge([
            'is_active'=>$this->boolean('is_active')
        ]);
    }
}
