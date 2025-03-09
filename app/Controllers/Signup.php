<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Signup extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsersModel();
    }

    public function new()
    {
        return view("Signup/new", [
            'title' => 'User Registration Page',
            // 'title' => 'Страница регистрации пользователей',
            'description' => 'Page description'
            // 'description' => 'Описание страницы, по типу description'
        ]);
    }

    public function store()
    {
        $user = $this->request->getPost();
        
        if($this->model->insert($user)){
            return redirect()->to("/signup/success");
        }else{
            echo "signed error!";
            return redirect()->back()
                            ->with('errors', $this->model->errors())
                            ->with('warning', 'Invalid date')
                            ->withInput();
        }
    }

    public function success()
    {
        return view("Signup/success", [
            'title' => 'You have successfully registered as a user',
            // 'title' => 'Вы успешно зарегистрировались, как пользователь',
            'description' => 'New account successfully registered'
            // 'description' => 'Новый аккаунт успешно зарегистрирован.'
        ]);
    }

}
