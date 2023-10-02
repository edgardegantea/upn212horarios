<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AreaController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $areas = $db->query('select * from areas')->getResultArray();

        dd($areas);
    }
}
