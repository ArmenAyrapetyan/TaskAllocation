<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password'])))
            return redirect()->route('main');
        else
            return redirect()->route('login')->withErrors([
                'error' => 'Ошибка авторизации, логин или пароль введены неверно',
            ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with([
            'success' => 'Выход выполнен успешно'
        ]);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
