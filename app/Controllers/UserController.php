<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserController extends BaseController
{
    private $model;
    
    public function __construct()
    {
        $this->model = new UsersModel();
    }

    public function users()
    {
        $users = $this->model->findAll();

        return view("Users/index",[
            'title' => 'Registered Users',
            // 'title' => 'Зарегистрированные пользователи',
            'users' => $users,
        ]);
    }

    public function user($id)
    {
        $user = $this->model->find($id);

        return view("Users/user",[
            'title' => 'User Information: ' . $user->name,
            // 'title' => 'Информация о пользователе: ' . $user->name,
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = $this->model->find($id);

        if ($user) {
            return view('Users/edit', [
                'title' => 'Edit User',
                // 'title' => 'Редактирование пользователя',
                'user' => $user,
            ]);
        } else {
            return redirect()->to('/users')->with('error', 'User not found');
            // return redirect()->to('/users')->with('error', 'Пользователь не найден.');
        }
    }


    public function update($id)
    {
        // Получаем данные из POST-запроса
        $data = $this->request->getPost();
        // Перед обновлением в базе данных, удалите 'email' из массива $data:
        // unset($data['email']); 
        // Валидируем данные
        if ($this->model->validate($data)) {
            // Обновляем данные пользователя
            $this->model->update($id, $data);
    
            // Делаем редирект на страницу /users с сообщением об успешном обновлении
            return redirect()->to('/users')->with('success', 'User data successfully updated.');
            // return redirect()->to('/users')->with('success', 'Данные пользователя успешно обновлены.');
        } else {
            // Если есть ошибки валидации, перенаправляем с ошибками и введенными данными
            return redirect()->to("/users/edit/{$id}")->with('errors', $this->model->errors())->with('data', $data);
        }
    }
    
    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/users')->with('success', 'User successfully deleted.');
            // return redirect()->to('/users')->with('success', 'Пользователь успешно удален.');
        } else {
            return redirect()->to('/users')->with('error', 'Error deleting user.');
            // return redirect()->to('/users')->with('error', 'Ошибка при удалении пользователя.');
        }
    }
}