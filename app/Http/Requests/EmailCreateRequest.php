<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailCreateRequest extends FormRequest
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
            'message' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'メッセージは必須です。',
            'message.string' => 'メッセージは文字形式で入力してください。',
            'message.max' => 'メッセージは最大500文字以内で入力してください。',
        ];
    }
}
