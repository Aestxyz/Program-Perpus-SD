<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'book_id' => 'required|array',
            'book_id.*' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'nullable|date',
            'return_date' => 'nullable|date|after:borrow_date',
            'status' => 'required|in:Berjalan,Terlambat',
        ];
    }
}
