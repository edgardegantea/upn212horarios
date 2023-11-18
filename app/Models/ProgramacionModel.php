<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramacionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'programacion';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['materia_id', 'docente_id', 'carrera_id', 'hora_inicio1', 'hora_fin1', 'dia_semana1', 'hora_inicio2', 'hora_fin2', 'dia_semana2', 'grupo'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getAssignmentsForWeek()
{
    // Calcula la fecha de inicio y fin de la semana actual
    $currentDate = date('Y-m-d');
    $startDate = date('Y-m-d', strtotime('last Monday', strtotime($currentDate)));
    $endDate = date('Y-m-d', strtotime('next Sunday', strtotime($currentDate)));

    // Consulta la base de datos para obtener las asignaciones de la semana
    $assignments = $this->programacionModel
        ->where('dia_semana >=', 1) // Ajusta los valores según tus necesidades
        ->where('dia_semana <=', 6) // para representar los días de la semana
        ->where('hora_inicio >=', '08:00:00') // Hora de inicio de 8 am
        ->where('hora_fin <=', '20:00:00') // Hora de fin de 8 pm
        ->where('fecha >=', $startDate)
        ->where('fecha <=', $endDate)
        ->findAll();

    return $assignments;
}

    

}
