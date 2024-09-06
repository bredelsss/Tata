<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class create_user extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'               =>[
                'type'              =>'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'email'               =>[
                'type'              =>'VARCHAR',
                'constraint'        => 50,
            ],
            'password'               =>[
                'type'              =>'VARCHAR',
                'constraint'        => 50,
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('user2');
    }

    public function down()
    {
        $this->forge->dropTable('user2');
    }
}
