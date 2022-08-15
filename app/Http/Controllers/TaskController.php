<?php

namespace App\Http\Controllers;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.index');
    }

    public function detail($id)
    {
        return view('task.detail', [
            'id' => $id
        ]);
    }
}
