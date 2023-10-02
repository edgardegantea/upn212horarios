<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DocenteInfoController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $docenteInfo = $db->query('select * from docenteinfo')->getResultArray();

        dd($docenteInfo);
    }
}
