<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordRequest extends FormRequest
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
            // 'word' => ['required', 'max:50'],
            // 'choice.*' => ['required', 'max:50'],
            // 'correct' => [],

            // 'text' => ['required','max:50'],
            // '0' => ['required','max:50'],
            // '1' => ['required','max:50'],
            // '2' => ['required','max:50'],
        ];
    }

    public function messages()
    {
        return [
            'text.max' => 'Word is too long! Please remove some letters.',
            '0.max' => 'Choice1 is too long! Please remove some letters.',
            '1' => 'Choice2 is wrong. Please modify choice2',
            '2' => 'Choice3 is wrong. Please modify choice3',
        ];
    }
}
