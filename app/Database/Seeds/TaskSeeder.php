<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['title' => 'Task 1', 'description' => 'Description for Task 1', 'created_at' => '2023-05-18 10:00:00'],
            ['title' => 'Task 2', 'description' => 'Description for Task 2', 'created_at' => '2023-05-19 14:30:00'],
            ['title' => 'Task 3', 'description' => 'Description for Task 3', 'created_at' => '2023-05-20 09:15:00'],
            ['title' => 'Task 4', 'description' => 'Description for Task 4', 'created_at' => '2023-05-21 16:45:00'],
            ['title' => 'Task 5', 'description' => 'Description for Task 5', 'created_at' => '2023-05-22 11:30:00'],
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}

// Набрать в терменале команду-  php spark db:seed TaskSeeder
// docker exec -it ci4_web php spark db:seed TaskSeeder