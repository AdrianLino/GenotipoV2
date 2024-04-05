<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'meta_title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'meta_description' => [
                'type' => 'TEXT',
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'schedule_date' => [
                'type' => 'DATETIME',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('articulos');
    }

    public function down()
    {
        
    }
}
