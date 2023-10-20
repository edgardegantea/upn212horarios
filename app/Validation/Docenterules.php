<?php

namespace App\Validation;
use App\Models\DocenteModel;

class Docenterules
{
    public function validateDocente(string $str, string $fields, array $data) {
        $model = new DocenteModel();
        
        $docente = $model->where('username', $data['username'])->first();
        
        if (!$docente) {
            return false;
        }

        return password_verify($data['password'], $docente['password']);
    }
}
