<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:20']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ユーザー名は必須です。',
            'name.string' => 'ユーザー名は文字形式で入力してください。',
            'name.max' => 'ユーザー名は20文字以下で入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'メールアドレスはメール形式で入力してください。',
            'email.max' => 'メールアドレスは20文字以下で入力してください。',
            'email.unique' => 'メールアドレスは既に登録されています',
            'password.required' => 'パスワードは必須です。',
            'password.string' => 'パスワードは文字形式で入力してください。',
            'password.min' => 'パスワードは8字以上で入力してください。',
            'password.max' => 'パスワードは20文字以下で入力してください。',
        ];
    }
}
