<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\GrupoModel;

class GrupoController extends ResourceController
{

    protected $grupoModel;
    

    public function __construct()
    {
        $this->grupoModel = new GrupoModel();
    }

    

    public function index()
    {
        $grupos = $this->grupoModel->findAll();

        $data = [
            'grupos' => $grupos
        ];

        return view('admin/grupos/index', $data);
    }


    

    public function show($id = null)
    {
        
    }


    

    public function new()
    {
        $data = [
            'clave'         => $this->request->getVar('clave'),
            'nombre'        => $this->request->getVar('nombre'),
            'descripcion'   => $this->request->getVar('descripcion'),
        ];

        $rules = [
            'clave'     => 'required|is_unique[grupos.clave]',
            'nombre'    => 'required|is_unique[grupos.nombre]',
        ];

        if ($this->validate($rules)) {
            $this->grupoModel->insert($data);
            return redirect()->to(site_url('/admin/grupos'));
            session()->setFlashdata("success", "Grupo registrado con éxito");
        } else {
            return view('admin/grupos/create', $data);
        }
    }


    

    public function create()
    {
        //
    }


    

    public function edit($id = null)
    {
        //
    }


    

    public function update($id = null)
    {
        //
    }


    

    public function delete($id = null)
    {
        //
    }

}
