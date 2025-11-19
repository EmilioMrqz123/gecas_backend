<?php
// api/autos/read.php
// Encabezados obligatorios para API REST
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Database.php';
include_once '../../models/Auto.php';

// 1. Instanciar base de datos
$database = new Database();
$db = $database->getConnection();

// 2. Instanciar objeto Auto
$auto = new Auto($db);

// 3. Consulta
$cursor = $auto->leer();
$num_autos = $database->conn->autos->countDocuments(); // Contar documentos

if($num_autos > 0) {
    $autos_arr = array();
    
    // Recorrer el cursor de Mongo
    foreach($cursor as $document) {
        $auto_item = array(
            "id_auto" => (string)$document['_id'], // Convertir ObjectId a String
            "marca" => $document['marca'],
            "modelo" => $document['modelo'],
            "precio" => $document['precio'],
            "foto_url" => isset($document['foto_url']) ? $document['foto_url'] : "", // Evitar error si no hay foto
            "stock" => $document['stock']
        );
        array_push($autos_arr, $auto_item);
    }

    // Responder código 200 OK y el JSON
    http_response_code(200);
    echo json_encode($autos_arr);
} else {
    // No hay autos
    http_response_code(404);
    echo json_encode(array("mensaje" => "No se encontraron autos en el inventario."));
}
?>