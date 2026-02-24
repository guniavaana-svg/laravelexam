<?php

namespace App\Http\Requests\Dashboard\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    //
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
            'id'=>'required|exists:posts,id',
//            'category_id'=>'required|exists:categories,id',
            'category_id'=>'required|array|min:1',
            'category_id.*'=>'integer|exists:categories,id',
            'title'=>'required|min:3|max:225|unique:posts,title,'.$this->route('id'),
            'description'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'id.exists'=>'id not exists',
            'title.required'=>'title is required',
            'title.min'=>'min 3 character',
            'title.max'=>'max 255 character',
            'title.unique'=>'title is already exists',
            'description.required'=>'description is required',
        ];
    }
    public function prepareForValidation(): void
    {
        $this->merge(
            [
                'id'=>(int)$this->route('id'),
            ]
        );
    }

}
