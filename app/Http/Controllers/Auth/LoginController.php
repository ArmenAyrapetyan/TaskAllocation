<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
                'Ошибка входа'
            ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with([
            'success' => 'выход выполнен успешно'
        ]);
    }
}
