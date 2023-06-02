<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__."/../admin/controllers/sistema.php");
require_once(__DIR__."/../admin/controllers/bitacora.php");

$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : null;
switch($action){
    case 'GET':
    default:
    if(is_null($id))
        $data = $bitacora->get();
    else
        $data = $bitacora->get($id);
    break;
}

$json = json_encode($data);
if ($json === false) {
    $error = json_last_error_msg();
    $response = array('mensaje' => 'Error al convertir a JSON: ' . $error);
    $json = json_encode($response);
}
echo $json;
//echo $data;

?>
