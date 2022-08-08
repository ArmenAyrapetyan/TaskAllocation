<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    public function detail($id)
    {
        return view('staff.detail', [
            'id' => $id
        ]);
    }

    public function profile()
    {
        return view('staff.profile', [
            'id' => auth()->user()->id,
        ]);
    }
}
