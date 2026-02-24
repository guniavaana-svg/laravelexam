<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $id
 */
class CategoryUpdateRequest extends FormRequest
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

            'name'=>'required|unique:categories,name,'.$this->id,
            'is_active'=>'nullable'
        ];
    }
    public function prepareForValidation():void
    {
        $this->merge([
            'id'=>(int) $this->route('id'),
            'is_active'=>$this->boolean('is_active')
        ]);
    }
}

