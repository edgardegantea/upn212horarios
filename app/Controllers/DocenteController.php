<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DocenteController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $docentes = $db->query('select * from docentes')->getResultArray();

        dd($docentes);
    }
}
