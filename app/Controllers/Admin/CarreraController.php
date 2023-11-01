<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CarreraModel;

class CarreraController extends ResourceController
{
    private $carreraModel;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->carreraModel = new CarreraModel();
    }

    

    public function index()
    {
        $carreras = $this->carreraModel->orderBy('nombre', 'asc')->findAll();
        $carreraModel = new CarreraModel();

        $data = [
            'carreras'  => $carreras,
            'carreras'  => $carreraModel->orderBy('nombre', 'asc')->findAll()
        ];

        return view('admin/carreras/index', $data);
    }


    

    public function show($id = null)
    {
        //
    }





    public function new()
    { 
        return view('admin/carreras/create');
    }




    public function create()
    {

        $data = [
            'nombre'        => $this->request->getVar('nombre'),
            'descripcion'   => $this->request->getVar('descripcion'),
        ];

        $rules = [
            'nombre'    => 'required|is_unique[carreras.nombre]',
        ];

        if ($this->validate($rules)) {
            $this->carreraModel->insert($data);
            return redirect()->to(site_url('/admin/carreras'));
            session()->setFlashdata("success", "Carrera registrada con éxito");
        } else {
            return view('admin/carreras/create', $data);
        }

    }




    public function edit($id = null)
    {
        // $carreraModel = new UsuarioModel();
        $data['carrera'] = $this->carreraModel->find($id);

        return view('admin/carreras/edit', $data);
    }



    public function update($id = null)
    {
        $data = [
            'id'            => $this->request->getVar('id'),
            'nombre'        => $this->request->getVar('nombre'),
            'descripcion'   => $this->request->getVar('descripcion')
        ];

        $this->carreraModel->update($id, $data);

        return redirect()->to('/admin/carreras');
    }



    public function delete($id = null)
    {
        $this->carreraModel->delete($id);

        return redirect()->to('/admin/carreras');
    }



}
