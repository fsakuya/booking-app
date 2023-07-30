<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
          'number' => 'required|integer|between:1,5',
          'text' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'number.required' => '評価は必須です。',
            'number.integer' => '評価は数字で入力してください。',
            'number.between' => '評価は1~5段階で入力してください。',
            'text.required' => 'コメントは必須です。',
            'text.string' => 'コメントは文字形式で入力してください。',
            'text.max' => 'コメントは255文字以内で入力してください。',
        ];
    }
}
