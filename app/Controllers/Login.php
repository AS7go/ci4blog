<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Login extends BaseController
{
    private $model;
    
    public function __construct()
    {
        $this->model = new UsersModel();
    }

    public function loginForm()
    {
        return view("Login/login_form",[
            'title' => 'Login Page',
            // 'title' => 'Страница авторизации',
        ]);
    }

    public function store()
    {
        $email = $this -> request -> getPost('email');
        $user = $this -> model->where('email', $email)->first();

        if($user === null){
            return redirect() -> back()
                              -> withInput()
                              -> with('errors', ['User not found']);
                            //   -> with('errors', ['Пользователь не найден']);
        }else{
            $password = $this -> request -> getPost('password');
            if (password_verify($password, $user->password_hash)){
                $session = session();
                $session -> regenerate();
                $session -> set('user_id', $user->id);
                $session -> set('user_name', $user->name);
                $session -> set('user_email', $user->email);
                return redirect() -> to('/')->with('success', 'You have successfully logged in');
                // return redirect() -> to('/')->with('success', 'Вы успешно авторизовались');
            }else{
                return redirect() -> back()
                -> withInput()
                -> with('errors', ['Incorrect password!']);
                // -> with('errors', ['Пароль не верный!']);
            }
        }
        
    }

    public function logout()
    {
        $session = session();
        $session->setFlashdata('success', 'You have successfully logged out');
        // $session->setFlashdata('success', 'Вы успешно вышли из аккаунта');
        $session->remove(['user_id', 'user_name', 'user_email']); // Очищаем только данные пользователя
        $session->regenerate(true); // Обновляем ID сессии для защиты от атак
        // $session->destroy();
        return redirect()->to('/');
    }

//    ----- 
    // public function logout()
    // {
    //     $session = session();

    //     // Получаем все ключи сессии
    //     $allKeys = array_keys($session->get());

    //     // Фильтруем ключ 'flashdata'
    //     $keysToRemove = array_filter($allKeys, function ($key) {
    //         return $key !== 'flashdata';
    //     });

    //     // Удаляем оставшиеся ключи
    //     $session->remove($keysToRemove);

    //     $session->setFlashdata('success', 'Вы успешно вышли с аккаунта');
    //     return redirect()->to('/');
    // }
    
}