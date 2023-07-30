<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i',
            'number' => 'required|integer|min:1',      
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '予約日は必須です。',
            'date.date' => '予約日は日付形式で入力してください。',
            'date.after' => '予約日は明日以降を入力してください。本日の予約は電話にてお問い合わせ下さい。',
            'time.required' => '時間は必須です。',
            'time.date_format' => '時間は時間形式で入力してください。',
            'number.required' => '人数は必須です。',
            'number.integer' => '人数は数字で入力してください。',
            'number.min' => '人数は1名以上で入力してください。',
        ];
    }
}
