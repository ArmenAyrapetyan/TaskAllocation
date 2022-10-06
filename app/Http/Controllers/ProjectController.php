<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function detail($id)
    {
        return view('project.detail', [
           'id' => $id
        ]);
    }
}
