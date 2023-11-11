<?php

namespace App\Controllers;

use App\Models\ProgramacionModel;
use App\Models\AsignaturaModel;
use App\Models\CarreraModel;
use App\Models\UsuarioModel;
use App\Models\CarrerasAsignaturasModel;
use App\Models\DocentesCarrerasModel;

class ProgramacionController extends BaseController
{

    protected $usuarioModel;
    protected $carreraModel;
    protected $asignaturaModel;
    protected $programacionModel;
    protected $docentesCarrerasModel;
    protected $carrerasAsignaturasModel;


    public function __construct()
    {
        $this->programacionModel = new ProgramacionModel();
        $this->usuarioModel = new UsuarioModel();
        $this->carreraModel = new CarreraModel();
        $this->asignaturaModel = new AsignaturaModel();
        $this->docentesCarrerasModel = new DocentesCarrerasModel();
        $this->carrerasAsignaturasModel = new CarrerasAsignaturasModel();
    }



    public function index()
    {
        $model = new ProgramacionModel();
        $data['programacion'] = $model->findAll();
        return view('admin/programacion/index', $data);
    }



    public function create_original()
    {
        $data['carreras'] = $this->carreraModel->findAll();
        $data['asignaciones'] = $this->programacionModel->findAll();

        return view('admin/programacion/create', $data);
    }


    public function create_last2()
    {
        $data['carreras'] = $this->carrerasAsignaturasModel->select('carreras.id, carreras.nombre as nombre')->join('carreras', 'asignaturas_carreras.carrera = carreras.id')->findAll();
        // $data['asignaturas'] = $this->carrerasAsignaturasModel->select('asignaturas.id', 'asignaturas.nombre')->join('asignaturas', 'asignaturas_carreras.asignatura = asignaturas.id')->join('carreras', 'asignaturas_carreras.carrera = carreras.id')->findAll();
        $data['asignaciones'] = $this->programacionModel->findAll();

        /*
        if ($this->request->getMethod() === 'post') {
            $selectedCarrera = $this->request->getPost('carrera');

            if ($selectedCarrera) {
                $data['selectedCarrera'] = $selectedCarrera;

                // Obtener asignaturas de la carrera seleccionada
                $data['asignaturasCarrera'] = $this->carrerasAsignaturasModel->select('asignaturas.id, asignaturas.nombre')->join('asignaturas', 'asignaturas_carreras.asignatura = asignaturas.id')->join('carreras', 'asignaturas_carreras.carrera = carreras.id')->where('carreras.id', $selectedCarrera)->findAll();
            }
        }
        */

        return view('admin/programacion/create', $data);
    }







    public function create_table()
    {

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



    public function getAsignaturas($carreraId)
    {
        // $asignaturas = $this->carrerasAsignaturasModel->select('asignaturas.nombre')->join('asignaturas', 'asignaturas.id = asignaturas_carreras.asignatura')->join('carreras', 'asignaturas_carreras.carrera = carreras.id')->where('asignaturas_carreras.carrera', $carreraId)->getResultArray();

        $asignaturas = $this->carrerasAsignaturasModel->where('carrera', $carreraId)->find();


        return $this->response->setJSON($asignaturas);
    }





    public function getAsignaturasPorCarrera($carrera_id)
    {
        $asignaturas = $this->carrerasAsignaturasModel->select('asignaturas.id, asignaturas.nombre')->join('asignaturas', 'asignaturas.id = asignaturas_carreras.asignatura')->join('carreras', 'asignaturas_carreras.carrera = carreras.id')->where('asignaturas_carreras.carrera', $carrera_id)->findAll();

        return json_encode($asignaturas);
    }



    public function obtenerAsignaturas($carreraId)
    {
        $asignaturaModel = new AsignaturaModel();

        // Obtener las asignaturas de la carrera especificada
        $asignaturas = $asignaturaModel
            ->join('carreras_asignaturas', 'asignaturas.id = carreras_asignaturas.asignatura_id')
            ->where('carreras_asignaturas.carrera_id', $carreraId)
            ->findAll();

        // Devolver las asignaturas como respuesta JSON
        return $this->response->setJSON($asignaturas);
    }


    public function create()
    {
        $data['carreras'] = $this->carreraModel->findAll();
        $data['asignaturas'] = $this->asignaturaModel->findAll();
        $data['docentes']   = $this->usuarioModel->where('rol', 'docente')->findAll();

        return view('admin/programacion/create', $data);
    }


    public function asignaturasPorCarrera()
    {
        $carreraId = $this->request->getPost('carrera_id');

        // $carrerasAsignaturasModel = new CarrerasAsignaturasModel();
        $asignaturasIds = $this->carrerasAsignaturasModel
            ->select('asignaturas.id, asignaturas.nombre carreras.id, asignaturas_carreras.carrera')
            ->join('asignaturas', 'asignaturas.id = asignaturas_carreras.asignatura')
            ->join('carreras', 'asignaturas_carreras.carrera = carreras.id')
            ->where('asignaturas_carreras.carrera', $carreraId)
            ->findAll();



        $asignaturas = $this->carrerasAsignaturasModel
            ->select('asignaturas.nombre')
            ->whereIn('asignaturas_carreras.asignatura', $asignaturasIds)
            ->findAll();

        return $this->response->setJSON($asignaturas);
    }



    public function getAsignaturasByCarrera($carreraId)
    {
        $asignaturasCarrerasModel = new CarrerasAsignaturasModel();
        $asignaturas = $asignaturasCarrerasModel->select('asignaturas_carreras.id, asignaturas.clave as clave_asignatura, asignaturas.nombre as nombre_asignatura, asignaturas_carreras.comentario')
            ->join('asignaturas', 'asignaturas_carreras.asignatura = asignaturas.id')
            ->where('carrera', $carreraId)
            ->findAll();

        return json_encode($asignaturas);
    }




    public function getDocentesByCarrera($carreraId)
    {
        $docentesCarreraModel = new DocentesCarrerasModel();
        $docentes = $docentesCarreraModel->select('docentes_carreras.id, usuarios.nombre as nombre, usuarios.apaterno as apaterno, usuarios.amaterno as amaterno')
            ->join('usuarios', 'docentes_carreras.docente = usuarios.id')
            ->where('docentes_carreras.carrera', $carreraId)
            ->orderBy('nombre', 'asc')
            ->findAll();

        return json_encode($docentes);
    }

}
