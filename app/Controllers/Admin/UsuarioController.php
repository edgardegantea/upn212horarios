<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;

class UsuarioController extends ResourceController
{
    private $usuario;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->usuario = new UsuarioModel();
    }

    

    public function index()
    {
        $usuarios = $this->usuario->orderBy('id', 'desc')->findAll(50);

        $data = [
            'usuarios'  => $usuarios
        ];
        // return view('admin/usuarios/index', $data);
        return view('admin/usuarios/index', $data);
    }


    

    public function show($id = null)
    {
        //
    }





    public function new()
    {
        return view('admin/usuarios/create');
    }




    public function create()
    {
        $usuario = new UsuarioModel();

        $data = [
            'rol'               => $this->request->getVar('rol'),
            'nombre'            => $this->request->getVar('nombre'),
            'apaterno'          => $this->request->getVar('apaterno'),
            'amaterno'          => $this->request->getVar('amaterno'),
            'username'          => $this->request->getVar('username'),
            'email'             => $this->request->getVar('email'),
            'password'          => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'sexo'              => $this->request->getVar('sexo'),
            'fechaNacimiento'   => $this->request->getVar('fechaNacimiento')
        ];

        $rules = [
            'username'     => 'required|is_unique[usuarios.username]'
        ];

        if ($this->validate($rules)) {
            $usuario->insert($data);
            return redirect()->to(site_url('/admin/usuarios'));
            session()->setFlashdata("success", "Usuario registrado con éxito");
        } else {
            $data['usernameDuplicado'] = lang('El nombre de usuario ya se encuentra registrado.');
            $data['emailDuplicado'] = lang('El e-mail ya se encuentra registrado.');
            return view('admin/usuarios/create', $data);
        }

    }




    public function edit($id = null)
    {
        $usuario = new UsuarioModel();
        $data['usuario'] = $usuario->find($id);

        return view('admin/usuarios/edit', $data);
    }



    public function update($id = null)
    {
        $usuario = new UsuarioModel();
        $data = [
            'rol' => $this->request->getVar('rol'),
            'nombre' => $this->request->getVar('nombre'),
            'apaterno' => $this->request->getVar('apaterno'),
            'amaterno' => $this->request->getVar('amaterno'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'sexo' => $this->request->getVar('sexo'),
            'fechaNacimiento' => $this->request->getVar('fechaNacimiento'),
            'status' => $this->request->getVar('status')
        ];

        $usuario->update($id, $data);

        return redirect()->to('/admin/usuarios');
    }



    public function delete($id = null)
    {
        $usuario = new UsuarioModel();
        $usuario->delete($id);

        return redirect()->to('/admin/usuarios');
    }



    public function usuariosDocentes()
    {
        $usuariosDocentes = $this->usuario->where('rol', 'docente')->orderBy('id', 'asc')->findAll();

        $data = [
            'usuariosDocentes'  => $usuariosDocentes
        ];

        return view('admin/docentes/index', $data);
    }

}