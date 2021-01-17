<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'book_title' => 'required|string',
            'book_authors' => 'required|string',
            'book_publishers' => 'required|string',
            'book_isbn' => 'required|digits:13',
            'book_starting_price' => 'required|max:500|different:book_student_price|numeric',
            'book_student_price' => 'required|max:500|different:book_starting_price|numeric',
            'book_img' => 'file|mimes:jpg,jpeg,png,gif,svg,webp|image',
            'book_stock' => 'required|max:1000|numeric',
            'book_edit_detail' => 'required|string',
        ];
    }
}
