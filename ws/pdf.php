<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__."/../admin/controllers/sistema2.php");
require_once(__DIR__."/../admin/controllers/pdf.php");

$action = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : null;
switch($action){
    case 'DELETE':
        $data['mensaje'] = 'No existe el registro';
        if(!(is_null($id))){
            $contador=$pdf->delete($id);
            if($contador==1){
                $data['mensaje']='Se eliminó el registro.';
            }
        }
    break;

    case 'POST':
        $data=array();
        $data = $_POST['data'];
        if(is_null($id)){
            $cantidad = $pdf->new($data);
            if($cantidad!=0){
                $data['mensaje'] = 'Se insertó el registro.';
            }else{
                $data['mensaje'] = 'Ocurrió un error.';
            }
        }else{
            $cantidad = $pdf->edit($id, $data);
            if($cantidad!=0){
                $data['mensaje'] = 'Se modifico el registro.';
            }else{
                $data['mensaje'] = 'Ocurrió un error.';
            }
        }
    break;

    case 'GET':
    default:
    if(is_null($id)){
    $data = $pdf->get(null);
}else{
    $data = $pdf->get($id);
    break;
}
}

$data = json_encode($data);
echo $data;

?>