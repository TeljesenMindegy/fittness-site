<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post.title' => 'required|max:190',
            'post.description' => 'required|max:190',
            'post.content' => 'required', //TODO: should have a max char length
        ];
    }
}
