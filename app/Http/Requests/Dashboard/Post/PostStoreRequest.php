<?php

namespace App\Http\Requests\Dashboard\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            // Needed when BelongsToMany
            // 'category_id'=>'required|array|min:1',
            // 'category_id.*'=>'integer|exists:categories,id',
            'category_id'=>'required|integer|exists:categories,id',
            'title'=>'required|min:3|max:225|unique:posts,title',
            'description'=>'required',
            'images'=>'required|array|min:1|max:5',
            'images.*'=>'image|mimes:jpeg,png,gif,webp|max:2048'
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'Categories is required',
            'category_id.integer' => 'Categories must be an imteger',
            'category_id.exists' => 'Category does not exist',
            'title.required'=>'title is required',
            'title.min'=>'min 3 character',
            'title.max'=>'max 255 character',
            'title.unique'=>'title is already exists',
            'description.required'=>'description is required',
            'images.*.image' => 'images mus bed file type bla bla bla',
            'images.required'=>'required'
        ];
    }
}
