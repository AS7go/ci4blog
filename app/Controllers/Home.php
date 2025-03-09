<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('Home/index', [
            'title' => 'Home Page'
            // 'title' => 'Главная страница'
        ]);
    }

    public function list()
    {
        return view('Home/list', [
            'title' => 'Task List'
            // 'title' => 'Список задач'
        ]);
    }

}
