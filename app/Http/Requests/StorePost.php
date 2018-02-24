<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'required|max:128',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post title is required',
            'title.max' => 'The maximum title length is 128 characters',
            'body.required' => 'Post body is required',
        ];
    }
}
