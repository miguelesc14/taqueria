<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__."/../admin/controllers/sistema.php");
require_once(__DIR__."/../admin/controllers/pedido.php");

$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : null;
switch($action){
    case 'DELETE':
        $data['mensaje'] = 'No existe el departamento.';
        if(!(is_null($id))){
            $contador=$departamento->delete($id);
            if($contador==1){
                $data['mensaje']='Se eliminó el departamento.';
            }
        }
    break;

    case 'POST':
        $data=array();
        $data = $_POST['data'];
        if(is_null($id)){
            $cantidad = $departamento->new($data);
            if($cantidad!=0){
                $data['mensaje'] = 'Se insertó el departamento.';
            }else{
                $data['mensaje'] = 'Ocurrió un error.';
            }
        }else{
            $cantidad = $departamento->edit($id, $data);
            if($cantidad!=0){
                $data['mensaje'] = 'Se modifico el departamento.';
            }else{
                $data['mensaje'] = 'Ocurrió un error.';
            }
        }
    break;

    case 'GET':
    default:
    if(is_null($id)){
    $data = $pedido->get(null);
        
    $dataP = $pedido->getPlatillos(null);
    $dataE = $pedido->getPersonal(null);
}else{
    $data = $pedido->get($id);
        
    $dataP = $pedido->getPlatillos($id);
    $dataE = $pedido->getPersonal($id);
    break;
}
}

$data = json_encode($data);
echo $data;

?>

