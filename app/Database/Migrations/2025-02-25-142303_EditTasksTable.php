<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EditTasksTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tasks',[
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tasks', 'updated_at');
    }
}
