<?php

namespace controladores;

require_once './db/consultas/autenticacion/credenciales.php';

use db\consultas\autenticacion\Credenciales;

class AutenticacionControlador
{

    public function login($request)
    {
        $credenciales = new Credenciales(); 

        $credenciales->setEmail($request['username']);
        $credenciales->setPassword($request['password']);

        if(!$credenciales->login()) {

            http_response_code(401);

            return json_encode([
                'status' => 'error',
                'message' => 'Usuario no encontrado o contraseña incorrecta'
            ]);
        }

        http_response_code(200);

        return json_encode([
            'status' => 'success',
            'message' => 'Usuario autenticado'
        ]);
    }
}
