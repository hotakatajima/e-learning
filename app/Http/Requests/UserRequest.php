<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'avatar' => ['image','mimes:jpeg,jpg,png','max:1024']
        ];
    }

    public function messages(){
        return [
            'name.string'  => '適切な文字を打ち込んでください',
            'name.max'  => '最大255文字です',
            'email.string'  => '適切な文字を打ち込んでください',
            'email.max'  => '最大255文字です',
            'password.min'  => '最低6文字です。',
        ];
    }
}
