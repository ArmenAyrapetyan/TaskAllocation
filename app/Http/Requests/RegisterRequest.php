<?php

namespace App\Http\Requests;

use App\Models\RegisterToken;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;

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
     *
     */
    public function __construct(ValidationFactory $factory)
    {
        $factory->extend(
            'token_active',
            function ($attribute, $value, $parameters){
                $token = RegisterToken::where('token', $value)->first();
                if (!$token)
                    return false;
                return $token->isActive === 1;
            },
            'This token does not exist or has expired'
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'third_name' => 'required',
            'register_token' => 'required|token_active',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'images[].*' => 'nullable|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Вы не ввели имя',
            'last_name.required' => 'Вы не ввели фамилию',
            'third_name.required' => 'Вы не ввели отчество',
            'register_token.required' => 'Для регистрации необходим токен',
            'register_token.token_active' => 'Токена не существует или срок его действия истек',
            'phone.required' => 'Введите ваш номер телефона',
            'phone.unique' => 'Такой телефон уже зарегестрирован',
            'email.required' => 'Вы не ввели почту',
            'email.email' => 'Введите почту в формате example@example.ex',
            'email.unique' => 'Данная почта уже зарегистрированна',
            'password.required' => 'Придумайте пароль',
            'password.min' => 'Пароль должен содержать не меньше 8 символов',
            'password.confirmed' => 'Пароли не совпадают',
            'images[].mimes' => 'Разрешеные расшерения:jpg,jpeg,png,bmp,tiff',
        ];
    }
}
