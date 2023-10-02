<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CarreraController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $carreras = $db->query('select * from carreras')->getResultArray();

        dd($carreras);
    }
}
