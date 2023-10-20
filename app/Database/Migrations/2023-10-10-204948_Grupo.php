<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Grupo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'clave'         => ['type' => 'varchar', 'constraint' => 10, 'unique' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 30, 'unique' => true],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);
        
        $this->forge->addKey('id');
        $this->forge->createTable('grupos', true);
        
    }

    public function down()
    {
        $this->forge->dropTable('grupos', true);
    }
}