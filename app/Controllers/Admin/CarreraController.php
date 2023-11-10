<?php

namespace App\Controllers\Admin;

use App\Models\AsignaturaModel;
use App\Models\CarrerasAsignaturasModel;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CarreraModel;
use App\Models\UsuarioModel;
use App\Models\DocentesCarrerasModel;

class CarreraController extends ResourceController
{
    private $carreraModel;
    private $usuarioModel;
    private $docentesCarrerasModel;
    private $asignaturaModel;
    private $carrerasAsignaturasModel;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->carreraModel = new CarreraModel();
        $this->usuarioModel = new UsuarioModel();
        $this->docentesCarrerasModel = new DocentesCarrerasModel();
        $this->asignaturaModel = new AsignaturaModel();
        $this->carrerasAsignaturasModel = new CarrerasAsignaturasModel();
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




    public function verDocentes($carrera)
    {
        // Obtener docentes adscritos a la carrera con ID $carreraId
        // $docentesCarrera = new DocentesCarrerasModel();

        $db = \Config\Database::connect();

        $docentesxc = $db->query('select concat(d.nombre, " ", d.apaterno, " ", d.amaterno) as docente, c.nombre as carrera, dc.id as id from usuarios as d join docentes_carreras as dc on dc.docente = d.id join carreras as c on dc.carrera = c.id where carrera =' . $carrera)->getResultArray();
        // $data['docentes'] = $this->docenteModel->where('carrera_id', $carreraId)->findAll();

        $data = [
            'docentesxc' => $docentesxc
        ];

        // Puedes cargar una vista específica para mostrar los docentes adscritos
        return view('admin/carreras/docentes_adscritos', $data);
    }


    public function asignarDocentes($carrera)
    {
        $docentes = $this->usuarioModel->where('rol', 'docente')->orderBy('nombre', 'asc')->findAll();
        $carreras = $this->carreraModel->find($carrera);

        $data = [
            'docentes' => $docentes,
            'carrera' => $carreras
        ];

        return view('admin/carreras/asignar_docentes', $data);
    }


    public function guardarAsignacion()
    {

        $carreraId = $this->request->getPost('carrera_id');
        $docentesSeleccionados = $this->request->getPost('docentes');

        // Validar datos
        if (empty($docentesSeleccionados)) {
            // Manejar el caso en el que no se hayan seleccionado docentes
            return redirect()->to('carrera/asignar_docentes/' . $carreraId)->with('error', 'Debes seleccionar al menos un docente.');
        }

        // Eliminar asignaciones anteriores para esta carrera
        // $this->docentesCarrerasModel->where('carrera', $carreraId)->delete();

        // Guardar las nuevas asignaciones en la base de datos
        foreach ($docentesSeleccionados as $docenteId) {
            $data = [
                'carrera' => $carreraId,
                'docente' => $docenteId,
            ];

            $this->docentesCarrerasModel->insert($data);
        }

        // Redirigir a la página de detalles de la carrera o a donde desees
        return redirect()->to('admin/carreras/vdxc/' . $carreraId)->with('success', 'Asignación de docentes guardada correctamente.');
    }






    public function verAsignaturas($carrera)
    {
        $db = \Config\Database::connect();

        $docentesxc = $db->query('select a.clave, a.nombre as asignatura, c.id as id, c.nombre as nombreCarrera from asignaturas as a join asignaturas_carreras as ac on ac.asignatura = a.id join carreras as c on ac.carrera = c.id where c.id =' . $carrera)->getResultArray();

        $data = [
            'asignaturasxc' => $docentesxc
        ];

        // Puedes cargar una vista específica para mostrar los docentes adscritos
        return view('admin/carreras/asignaturas', $data);
    }

    public function asignarAsignaturas($carrera)
    {
        $asignaturas = $this->asignaturaModel->orderBy('nombre', 'asc')->findAll();
        $carreras = $this->carreraModel->find($carrera);

        $data = [
            'asignaturas' => $asignaturas,
            'carrera' => $carreras
        ];

        return view('admin/carreras/asignar_asignaturas', $data);
    }

    public function guardarAsignacionAsignaturas()
    {

        $carreraId = $this->request->getPost('carrera_id');
        $asignaturasSeleccionadas = $this->request->getPost('asignaturas');

        // Validar datos
        if (empty($asignaturasSeleccionadas)) {
            // Manejar el caso en el que no se hayan seleccionado docentes
            return redirect()->to('admin/carreras/asignarAsignaturas/' . $carreraId)->with('error', 'Debes seleccionar al menos una asignatura.');
        }

        // Eliminar asignaciones anteriores para esta carrera
        // $this->docentesCarrerasModel->where('carrera', $carreraId)->delete();

        // Guardar las nuevas asignaciones en la base de datos
        foreach ($asignaturasSeleccionadas as $asignaturaId) {
            $data = [
                'carrera' => $carreraId,
                'asignatura' => $asignaturaId,
            ];

            $this->carrerasAsignaturasModel->insert($data);
        }

        // Redirigir a la página de detalles de la carrera o a donde desees
        return redirect()->to('admin/carreras/vaxc/' . $carreraId)->with('success', 'Asignaturas agregadas correctamente.');
    }

}
