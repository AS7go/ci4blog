<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;


class UsersModel extends Model
{
    protected $table = 'user';
    
    protected $useTimestamps = true;

    protected $allowedFields = ['name', 'email', 'password', 'status'];
    
    protected $returnType = User::class;

    protected $beforeInsert = ['hashPassword'];

    // protected $useEntity = true;

    protected $validationRules = [
        'name' => 'required|min_length[2]|max_length[255]',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[2]',
        'password_confirmation' => 'required|matches[password]',
    ];
    
    // protected $validationMessages = [
    //     'name' => [
    //         'required' => 'Введите имя',
    //         'min_length' => 'Имя должно быть больше 2-х символов',
    //         'max_length' => 'Имя должно быть меньше 255 символов',
    //     ],
    //     'email' => [
    //         'required' => 'Введите email',
    //         'valid_email' => 'Введите корректный email',
    //         'is_unique' => 'Пользователь с таким email уже есть',
    //     ],
    //     'password' => [
    //         'required' => 'Введите пароль',
    //         'min_length' => 'Пароль должен быть больше 2-х символов',
            
    //     ],
    //     'password_confirmation' => [
    //         'required' => 'Повторите пароль',
    //         'matches' => 'Пароли не совпадают',
    //     ],
    // ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Please enter your name',
            'min_length' => 'Name must be longer than 2 characters',
            'max_length' => 'Name must be less than 255 characters',
        ],
        'email' => [
            'required' => 'Please enter your email',
            'valid_email' => 'Please enter a valid email',
            'is_unique' => 'A user with this email already exists',
        ],
        'password' => [
            'required' => 'Please enter your password',
            'min_length' => 'Password must be longer than 2 characters',
        ],
        'password_confirmation' => [
            'required' => 'Please repeat your password',
            'matches' => 'Passwords do not match',
        ],
    ];

    protected function hashPassword($data)
    {
        if (isset($data['data']['password']))
        {
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
        }
        return $data;
    }

}
