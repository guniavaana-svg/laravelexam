<?php

namespace App\Http\Requests\Dashboard\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // შენ შეგიძლია საჭიროების მიხედვით შეცვალო ავტორიზაცია
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'pass' => 'required|string|min:6',
            'images.*' => 'nullable|image|max:2048', // თითოეული ფაილი მაქსიმუმ 2MB
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a name',
            'name.max' => 'Name may not be greater than 255 characters',
            'lastname.required' => 'Please enter a lastname',
            'lastname.max' => 'Lastname may not be greater than 255 characters',
            'email.email' => 'Please enter a valid email address',
            'email.max' => 'Email may not be greater than 255 characters',
            'pass.required' => 'Please enter a password',
            'pass.min' => 'Password must be at least 6 characters',
            'images.*.image' => 'Each file must be an image',
            'images.*.max' => 'Each image may not be greater than 2MB',
        ];
    }
}