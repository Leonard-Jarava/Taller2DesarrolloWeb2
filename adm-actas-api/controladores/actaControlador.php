<?php

namespace controladores;

require_once './db/consultas/actas/acta.php';

use db\consultas\acta\Acta;

class ActaControlador
{

    public function crear($request)
    {
        $acta = new Acta();

        $acta->setNombre($request['nombre']);
        $acta->setFecha($request['fecha']);
        $acta->setHora($request['hora']);
        $acta->setLugar($request['lugar']);
        $acta->setDescripcion($request['descripcion']);

        if (!$acta->insert()) {

            http_response_code(500);

            return json_encode([
                'status' => 'error',
                'message' => 'Error al crear el acta'
            ]);
        }

        http_response_code(200);

        return json_encode([
            'status' => 'success',
            'message' => 'Acta creada'
        ]);
    }

    public function leer()
    {
        $acta = new Acta();

        $actas = $acta->getAll();

        http_response_code(200);

        return json_encode([
            'status' => 'success',
            'actas' => $actas
        ]);
    }

    public function actualizar($request, $id)
    {
        $acta = new Acta();

        $acta->setId($id);
        $acta->setNombre($request['nombre']);
        $acta->setFecha($request['fecha']);
        $acta->setHora($request['hora']);
        $acta->setLugar($request['lugar']);
        $acta->setDescripcion($request['descripcion']);

        if (!$acta->update()) {

            http_response_code(500);

            return json_encode([
                'status' => 'error',
                'message' => 'Error al actualizar el acta'
            ]);
        }

        http_response_code(200);

        return json_encode([
            'status' => 'success',
            'message' => 'Acta actualizada'
        ]);
    }

    public function eliminar($id)
    {
        $acta = new Acta();

        $acta->setId($id);

        if (!$acta->delete()) {

            http_response_code(500);

            return json_encode([
                'status' => 'error',
                'message' => 'Error al eliminar el acta'
            ]);
        }

        http_response_code(200);

        return json_encode([
            'status' => 'success',
            'message' => 'Acta eliminada'
        ]);
    }
}
