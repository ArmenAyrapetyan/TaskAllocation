<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ConfirmPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showConfirmForm()
    {

    }

    public function confirm()
    {

    }
}
