<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class UserRequest extends FormRequest
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
            'name'    => 'required|max:25',
            'email'   => 'required|unique:users,email,' . Auth::id(),
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'ニックネームは必須です。',
            'name.max'               => 'ニックネームは25文字以内で記入してください。',
            'email.required'         => 'メールアドレスは必須です。',
            'email.unique'           => 'このメールアドレスはすでに使用されています'
    ];
}
}

