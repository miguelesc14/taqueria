<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__."/../admin/controllers/sistema.php");
require_once(__DIR__."/../admin/controllers/bitacora.php");

$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : null;
switch($action){
    case 'DELETE':
        $data['mensaje'] = 'No existe el registro';
        if(!(is_null($id))){
            $contador=$bitacora->delete($id);
            if($contador==1){
                $data['mensaje']='Se eliminó el registro.';
            }
        }
    break;

    case 'GET':
    default:
    if(is_null($id))
        $data = $bitacora->get();
    else
        $data = $bitacora->get($id);
    break;

    case 'POST':
        $data=array();
        $data = $_POST['data'];
        if(is_null($id)){
            $cantidad = $bitacora->new($data);
            if($cantidad!=0){
                $data['mensaje'] = 'Se insertó el registro.';
            }else{
                $data['mensaje'] = 'Ocurrió un error.';
            }
        }else{
            $cantidad = $bitacora->edit($id, $data);
            if($cantidad!=0){
                $data['mensaje'] = 'Se modifico el registro.';
            }else{
                $data['mensaje'] = 'Ocurrió un error.';
            }
        }
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
