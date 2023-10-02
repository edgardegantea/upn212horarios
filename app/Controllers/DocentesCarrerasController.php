<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DocentesCarrerasController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        // $dc = $db->query('select * from docentes_carreras')->getResultArray();
        $dc = $db->query('select di.codigo, concat(di.nombre, " ", di.aPaterno, " ", di.aMaterno) as "docente", c.nombre as "carrera" from carreras as c join docentes_carreras as dc on dc.carrera = c.id join docentes as d on dc.docente = d.id join docenteinfo as di on di.id = d.id')->getResultArray();

        dd($dc);
    }
}
