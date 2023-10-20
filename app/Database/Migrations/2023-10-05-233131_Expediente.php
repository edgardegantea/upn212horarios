<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Expediente extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'docente'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'bio'                   => ['type' => 'text', 'null' => true],
            'licenciatura'          => ['type' => 'varchar', 'constraint' => 150],
            'licenciatura_cedula'   => ['type' => 'varchar', 'constraint' => 150],
            'fecha_titulacion_lic'  => ['type' => 'date', 'null' => true],
            'maestria'              => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'maestria_cedula'       => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_titulacion_mae'  => ['type' => 'date', 'null' => true],
            'doctorado'             => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'doctorado_cedula'      => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_titulacion_doc'  => ['type' => 'date', 'null' => true],
            'curso1'                => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_curso1'          => ['type' => 'date', 'null' => true],
            'curso2'                => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_curso2'          => ['type' => 'date', 'null' => true],
            'curso3'                => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_curso3'          => ['type' => 'date', 'null' => true],
            'curso4'                => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_curso4'          => ['type' => 'date', 'null' => true],
            'certificacion1'        => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_certificacion1'  => ['type' => 'date', 'null' => true],
            'certificacion2'        => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_certificacion2'  => ['type' => 'date', 'null' => true],
            'certificacion3'        => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_certificacion3'  => ['type' => 'date', 'null' => true],
            'certificacion4'        => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
            'fecha_certificacion4'  => ['type' => 'date', 'null' => true],
            'experiencia_adicional' => ['type' => 'text', 'null' => true],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('docente', true);
        $this->forge->addForeignKey('docente', 'docentes', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->createTable('expedientes', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('expedientes', true);
    }
}
