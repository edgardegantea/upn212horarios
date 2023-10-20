<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocenteModel;

class DocenteController extends BaseController
{

    public function logind()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|min_length[5]|max_length[50]',
                'password' => 'required|min_length[8]|max_length[255]|validateDocente[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateDocente' => "Nombre de usuario o contraseña incorrecta",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('/docentes/login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new DocenteModel();

                $docente = $model->where('username', $this->request->getVar('username'))->first();

                $this->setDocenteSession($docente);

                if($docente['rol'] == "docente") {
                    return redirect()->to(base_url('docente'));
                }
            }
        }
        return view('docentes/login');
    }



    private function setDocenteSession($docente)
    {
        $data = [
            'id'            => $docente['id'],
            'rol'           => $docente['rol'],
            'username'      => $docente['username'],
            'isLoggedIn'    => true
        ];

        session()->set($data);
        return true;
    }

    public function logoutd()
    {
        session()->destroy();
        return redirect()->to('login');
    }



}


