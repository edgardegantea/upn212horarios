<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpedienteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'expedientes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['bio', 'licenciatura', 'licenciatura_cedula', 'fecha_titulacion_lic', 'maestria', 'maestria_cedula', 'fecha_titulacion_mae', 'doctorado', 'doctorado_cedula', 'fecha_titulacion_doc', 'curso1', 'fecha_curso1', 'curso2', 'fecha_curso2', 'curso3', 'fecha_curso3', 'curso4', 'fecha_curso4', 'certificacion1', 'fecha_certificacion1', 'certificacion2', 'fecha_certificacion2', 'certificacion3', 'fecha_certificacion3', 'certificacion4', 'fecha_certificacion4', 'experiencia_adicional'];

    // Dates
    protected $useTimestamps = true;
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



    public function getExpedientes()
    {
        return $this->findAll();
    }


}
