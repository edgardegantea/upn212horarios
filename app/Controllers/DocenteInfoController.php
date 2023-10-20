<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocenteInfoModel;
use App\Models\DocenteModel;

class DocenteInfoController extends BaseController
{

    protected $docenteInfoModel;
    protected $docenteModel;

    public function __construct()
    {
     $this->docenteInfoModel = new DocenteInfoModel();
     $this->docenteModel = new DocenteModel();
    }



    public function index()
    {
        $data['docenteInfo'] = $this->docenteInfoModel->findAll();

        return view('docenteinfo/index', $data);
    }


    public function create()
    {
        $data = [
            'docente'   => $this->docenteModel->findAll(),
        ];

        return view('docenteinfo/create', $data);
    }
}
