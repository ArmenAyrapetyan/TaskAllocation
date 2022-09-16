<?php

namespace App\Http\Controllers;

use App\Models\AccessUser;
use App\Models\TimeSpend;
use Illuminate\Http\Request;

class TimeDetailController extends Controller
{
    public function userTimeDetail($id)
    {
        $spended_times = TimeSpend::whereIn('access_user_id', AccessUser::where('user_id', $id)->pluck('id'))->get();
        return view('task.time-detail', compact('spended_times'));
    }
}
