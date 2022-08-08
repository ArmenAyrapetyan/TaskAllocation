<?php

namespace App\Http\Controllers;

use App\Models\Counterparty;
use Illuminate\Http\Request;

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
