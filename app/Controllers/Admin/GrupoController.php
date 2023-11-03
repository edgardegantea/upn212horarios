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
        return view('admin/grupos/create');
    }


    

    public function create()
    {
        $data = [
            'clave'         => $this->request->getVar('clave'),
            'nombre'        => $this->request->getVar('nombre')
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


    

    public function edit($id = null)
    {
        $data = [
            'grupo' => $this->grupoModel->find($id)
        ];

        return view('admin/grupos/edit', $data);
    }


    

    public function update($id = null)
    {
        $data = [
            'id'            => $this->request->getVar('id'),
            'clave'         => $this->request->getVar('clave'),
            'nombre'        => $this->request->getVar('nombre')
        ];

        $this->grupoModel->update($id, $data);

        return redirect()->to('/admin/grupos');
    }


    

    public function delete($id = null)
    {
        //
    }

}
