<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'required|numeric|digits_between:8,30',
            'author' => 'required|max:255',
            'year_published' => 'required|date_format:Y',
            'publisher' => 'required|max:255',
            'synopsis' => 'required',
            'book_count' => 'required|integer|min:1',
            'type' => 'required|in:Umum,Paket'
        ];
    }
}
