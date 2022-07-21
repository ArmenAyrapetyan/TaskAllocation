<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public $pages = [
        'notification' => ['view' => 'notify.index', 'title' => 'Уведомления'],
        'chart' => ['view' => 'cart.index', 'title' => 'График'],
        'projects' => ['view' => 'project.index', 'title' => 'Проекты'],
        'tasks' => ['view' => 'task.index', 'title' => 'Задачи'],
        'report' => ['view' => 'report.index', 'title' => 'Отчеты'],
        'passwords' => ['view' => 'password.index', 'title' => 'Пароли'],
        'contacts' => ['view' => 'contacts.index', 'title' => 'Контакты'],
        'staff' => ['view' => 'staff.index', 'title' => 'Сотрудники'],
    ];

    public function index()
    {
        $curPage = 'notify.index';
        if (session()->has('curPage'))
            $curPage = session()->get('curPage');

        $pages = $this->pages;
        return view('main', compact('curPage', 'pages'));
    }
}
