<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Codeigniter\Database\RawSql;

class DocenteInfo extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'codigo'            => ['type' => 'varchar', 'constraint' => 10, 'unique' => true],
            'nombre'            => ['type' => 'varchar', 'constraint' => 50],
            'aPaterno'          => ['type' => 'varchar', 'constraint' => 50],
            'aMaterno'          => ['type' => 'varchar', 'constraint' => 50],
            'foto'              => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'genero'            => ['type' => 'char', 'constraint' => 1],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id', 'docentes', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->createTable('docenteinfo', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('docenteinfo', true);
    }
}
