<?php

namespace App\Controllers;

use App\Models\ProgramacionModel;
use App\Models\AsignaturaModel;
use App\Models\CarreraModel;
use App\Models\UsuarioModel;

class ProgramacionController extends BaseController
{

    protected $usuarioModel;
    protected $carreraModel;
    protected $asignaturaModel;
    protected $programacionModel;


    public function __construct()
    {
        $this->programacionModel = new ProgramacionModel();
        $this->usuarioModel = new UsuarioModel();
        $this->carreraModel = new CarreraModel();
        $this->asignaturaModel = new AsignaturaModel();
    }



    public function index()
    {
        $model = new ProgramacionModel();
        $data['programacion'] = $model->findAll();
        return view('admin/programacion/index', $data);
    }



    public function create()
    {

        $data['asignaturas'] = $this->asignaturaModel->findAll();
        $data['docentes'] = $this->usuarioModel->where('rol', 'docente')->orderBy('nombre', 'asc')->findAll();
        $data['carreras'] = $this->carreraModel->findAll();
        $data['asignaciones'] = $this->programacionModel->findAll();

        return view('admin/programacion/create', $data);
    }



    public function create_table()
    {

        $data['asignaturas'] = $this->asignaturaModel->findAll();
        $data['docentes'] = $this->usuarioModel->where('rol', 'docente')->findAll();
        $data['carreras'] = $this->carreraModel->findAll();
        $data['asignaciones'] = $this->programacionModel->findAll();

        return view('admin/programacion/create_table', $data);
    }



    public function store()
    {
        $model = new ProgramacionModel();
        $data = [
            'materia_id' => $this->request->getPost('materia_id'),
            'docente_id' => $this->request->getPost('docente_id'),
            'carrera_id' => $this->request->getPost('carrera_id'),
            'hora_inicio' => $this->request->getPost('hora_inicio'),
            'hora_fin' => $this->request->getPost('hora_fin'),
            'dia_semana' => $this->request->getPost('dia_semana'),
            
        ];
        $model->insert($data);
        return redirect()->to('/admin/programacion');
    }




    public function createxdocente()
    {

        $data['asignaturas'] = $this->asignaturaModel->findAll();
        $data['docentes'] = $this->usuarioModel->where('rol', 'docente')->findAll();
        $data['carreras'] = $this->carreraModel->findAll();
        $data['asignaciones'] = $this->programacionModel->findAll();

        return view('admin/programacion/create', $data);
    }




    public function storexdocente()
    {
        $model = new ProgramacionModel();
        $data = [
            'materia_id' => $this->request->getPost('materia_id'),
            'docente_id' => $this->request->getPost('docente_id'),
            'carrera_id' => $this->request->getPost('carrera_id'),
            'hora_inicio' => $this->request->getPost('hora_inicio'),
            'hora_fin' => $this->request->getPost('hora_fin'),
            'dia_semana' => $this->request->getPost('dia_semana'),
            
        ];
        $model->insert($data);
        return redirect()->to('/admin/programacion');
    }




    public function edit($id)
    {
        $model = new ProgramacionModel();
        $data['programacion'] = $model->find($id);
        return view('programacion/edit', $data);
    }




    public function update($id)
    {
        $model = new ProgramacionModel();
        $data = [
            'materia_id'    => $this->request->getPost('materia_id'),
            'docente_id'    => $this->request->getPost('docente_id'),
            'carrera_id'    => $this->request->getPost('carrera_id'),
            'hora_inicio'   => $this->request->getPost('hora_inicio'),
            'hora_fin'      => $this->request->getPost('hora_fin'),
            'día_semana'    => $this->request->getPost('día_semana'),
        ];
        $model->update($id, $data);
        return redirect()->to('/programacion');
    }



    public function delete($id)
    {
        $model = new ProgramacionModel();
        $model->delete($id);
        return redirect()->to('/programacion');
    }

}
