<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Livewire\Request;

class VerificationController extends Controller
{
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with([
            'message' => 'Ссылка повторно отправлена вам на почту'
        ]);
    }

    public function show()
    {
        auth()->user()->sendEmailVerificationNotification();
        return view('auth.verify');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('main');
    }
}
