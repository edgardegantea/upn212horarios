<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExpedienteModel;

class ExpedienteController extends BaseController
{

    protected $expedienteModel;

    public function __construct()
    {
        $this->expedienteModel = new ExpedienteModel();
    }


    public function index()
    {
        $data['expedientes'] = $this->expedienteModel->getExpedientes();

        return view('expedientes/index', $data);
    }
}
