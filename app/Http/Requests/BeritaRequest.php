<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class BeritaRequest extends RequestAbstract
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:30|max:100|unique:beritas',
            'sort_title' => 'required|min:20|max:50|unique:beritas',
            'author' => 'required',
            'wartawan' => 'required',
            'description' => 'required',
            'sort_description' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png',
            'thumbnail' => 'required|mimes:jpeg,bmp,png',
        ];
    }


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Title is Required',
            'title.min' => 'Minimum length of Title 30',
            'title.max' => 'Maximum length of Title 10',
            'title.unique' => 'Title is Unique',
            'sort_title.required' => 'Sort Title is Required',
            'sort_title.min' => 'Minimum length of Sort Title 30',
            'sort_title.max' => 'Maximum length of Sort Title 10',
            'sort_title.unique' => 'Sort Title is Unique',
            'author.required' => 'Author is Required',
            'wartawan.required' => 'Wartawan is Required',
            'description.required' => 'Description is Required',
            'sort_description.required' => 'Sort Description is Required',
            'image.required' => 'Image is Required',
            'image.mimes' => 'Image format only jpeg,bmp,jpg',
            'thumbnail.required' => 'Thumbnail is Required',
            'thumbnail.mimes' => 'Thumbnail format only jpeg,bmp,jpg',
            
        ];
    }
}
