<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopCreateRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            'genre' => 'required',
            'area' => 'required',
            'information' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店名は必須です。',
            'name.string' => '店名は文字形式で入力して下さい。',
            'name.max' => '店名は20文字以内で入力してください。',
            'genre.required' => 'ジャンルは必須です。',
            'area.required' => 'エリアは必須です。',
            'information.required' => '店舗詳細は必須です。',
            'information.string' => '店舗情報は文字形式絵入力してください。',
            'information.max' => '店舗情報は最大1000文字で入力してください。',
            'image.required' => '画像は必須です。',
            'image.image' => '画像は画像形式を登録してください。',
            'image.max' => '画像は最大2MBで登録してください。',
        ];
    }
}
