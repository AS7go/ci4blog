<?php

namespace App\Controllers;

class Lis extends BaseController
{
    public function list(): string
    {
        return view('Home/list');
    }
}
