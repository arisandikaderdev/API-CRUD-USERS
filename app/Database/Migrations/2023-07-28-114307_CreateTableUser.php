<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_user' => [
                    'type' => 'INT',
                    'constraint' => '200',
                    'unsigned' => true,
                    'null' => false,
                    "auto_increment" => true
                ],
                'username' => [
                    'type' => "VARCHAR",
                    'constraint' => '200',
                ],

                'password' => [
                    'type' => "text",
                ],

                'email' => [
                    'type' => "VARCHAR",
                    'constraint' => '200'
                ],

                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true
                ],
                'deleted_at' => [
                    'type' => 'DATETIME',
                    'null' => true
                ]
            ]
        );

        $this->forge->addPrimaryKey('id_user');

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
