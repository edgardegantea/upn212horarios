<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CarreraModel;

class CarreraController extends BaseController
{

    protected $carreraModel;

    public function __construct()
    {
        $this->carreraModel = new CarreraModel();
    }


    public function index()
    {
        // $db = \Config\Database::connect();
        // $carreras = $db->query('select * from carreras')->getResultArray();
        $carreras = $this->carreraModel->findAll();

        $data = [
            'carreras' => $carreras
        ];

        return view('admin/carreras/index', $data);
    }




    public function create()
    {
        helper('form');

        return view('admin/carreras/create');
    }



    public function store()
    {
        $carreraModel = new CarreraModel();


        if ($this->request->getMethod() === 'post' && $this->validate([
            'nombre' => 'required|min_length[5]',
            'descripcion' => 'required|min_length[5]'
        ])) {
            $carreraModel->save([
                'nombre'           => $this->request->getPost('nombre'),
                'descripcion'       => $this->request->getPost('descripcion')
            ]);

            return redirect()->to('/admin/carreras');
        } else {
            return view('admin/carreras/create');
        }

    }


    public function delete($id)
    {
        $this->carreraModel->delete($id);
        return redirect()->to('/admin/carreras');
    }

}
