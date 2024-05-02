<?php

$rutas = [
    'actas' => [
        'controlador' => 'actaControlador',
        'metodos' => [
            'POST' => 'crear',
            'GET' => 'leer',
            'PUT' => 'actualizar',
            'DELETE' => 'eliminar'
        ]
    ],
    'usuarios' => [
        'controlador' => 'usuarioControlador',
        'metodos' => [
            'POST' => 'crear',
            'GET' => 'leer',
            'PUT' => 'actualizar',
            'DELETE' => 'eliminar'
        ]
    ],
    'autenticacion' => [
        'controlador' => 'autenticacionControlador',
        'metodos' => [
            'POST' => 'login'
        ]
    ]
];

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

$metodoHttp = $_SERVER['REQUEST_METHOD'];

if($metodoHttp === 'OPTIONS') {
    header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
    exit;
}

$uri = ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$uriParts = explode( '/', $uri);

$nombrecontrolador = $rutas[$uriParts[0]]['controlador'];

$accion = $uriParts[1];

$id = intval($uriParts[2]) ?? null;

$archivoControlador = 'controladores/' . $nombrecontrolador . '.php';

if (!file_exists($archivoControlador)) {

    http_response_code(404);

    echo json_encode([
        'status' => 'error',
        'message' => 'Controlador no encontrado'
    ]);

    exit;
}

require_once $archivoControlador;

$nombreClase = 'controladores\\' . $nombrecontrolador;

$controlador = new $nombreClase();

if(!method_exists($controlador, $uriParts[1])) {

    http_response_code(404);

    echo json_encode([
        'status' => 'error',
        'message' => 'Método no encontrado'
    ]);   

    exit;
}



if($rutas[$uriParts[0]]['metodos'][$metodoHttp] !== $accion) {

    http_response_code(405);
    
    echo json_encode([
        'status' => 'error',
        'message' => 'Método no permitido'
    ]);

    exit;
}

$request = json_decode(file_get_contents('php://input'), true);

if ($metodoHttp == 'DELETE') {
    echo $controlador->$accion($id);
    exit;
}


echo $controlador->$accion($request, $id);

