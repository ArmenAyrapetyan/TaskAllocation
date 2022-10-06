<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\RegisterToken;
use App\Models\User;
use App\Services\FileStorage;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function register(RegisterRequest $request)
    {
        $token = RegisterToken::where('token', bcrypt($request->register_token))->first();

        $newUser = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'third_name' => $request->third_name,
            'rate_per_hour' => $token->rate_per_hour,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        if ($request->hasFile('images')){
            $files = $request->file('images');
            FileStorage::saveFiles($files, $newUser->id, User::class);
        }

        $token->isActive = false;
        $token->save();

        if (!$newUser)
            return back()->withErrors(['auth' => 'Не удалось зарегистрироваться, попробуйте позже']);

        auth()->login($newUser);
        return redirect()->route('main');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
