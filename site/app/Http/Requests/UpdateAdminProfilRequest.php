<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminProfilRequest extends FormRequest
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
            'name' => 'required|string|max:150|alpha',
            'firstName' => 'required|string|max:150|alpha',
            'email' => 'required|email:rfc',
            'role' => '',
            'file' => 'file|mimes:jpg,jpeg,png,gif,svg,webp|image',
        ];
    }
}
