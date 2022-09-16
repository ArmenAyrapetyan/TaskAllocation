<?php

namespace App\Http\Controllers;

class CounterpartyController extends Controller
{
    public function index()
    {
        return view('counterparty.index');
    }

    public function detail($id)
    {
        return view('counterparty.detail', [
            'id' => $id
        ]);
    }
}
