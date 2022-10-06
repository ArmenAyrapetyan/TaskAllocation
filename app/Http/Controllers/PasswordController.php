<?php

namespace App\Http\Controllers;

use App\Models\ProjectAccesses;

class PasswordController extends Controller
{
    public function index()
    {
        return view('password.index');
    }

    public function detail($info_id)
    {
        return view('password.detail', compact('info_id'));
    }
}
