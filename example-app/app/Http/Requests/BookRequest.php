<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'author' => 'required|string',
            'year' => 'required|integer',
            'countPages' => 'required|integer',
        ];
    }
}
