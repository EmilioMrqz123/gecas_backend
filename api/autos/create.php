<?php
// api/autos/create.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Auto.php';

$database = new Database();
$db = $database->getConnection();
$auto = new Auto($db);

// Obtener los datos enviados (RAW JSON)
$data = json_decode(file_get_contents("php://input"));

// Validar que los datos no estén vacíos
if(
    !empty($data->marca) &&
    !empty($data->modelo) &&
    !empty($data->precio)
) {
    // Asignar valores al objeto
    $auto->marca = $data->marca;
    $auto->modelo = $data->modelo;
    $auto->precio = $data->precio;
    $auto->anio = $data->anio ?? 2024; // Valor por defecto si no viene
    $auto->foto_url = $data->foto_url ?? "";
    $auto->stock = $data->stock ?? 1;

    // Intentar crear
    if($auto->crear()) {
        http_response_code(201); // 201 Created
        echo json_encode(array("mensaje" => "Auto creado exitosamente."));
    } else {
        http_response_code(503); // 503 Service Unavailable
        echo json_encode(array("mensaje" => "No se pudo crear el auto."));
    }
} else {
    http_response_code(400); // 400 Bad Request
    echo json_encode(array("mensaje" => "Datos incompletos. Faltan campos obligatorios."));
}
?>