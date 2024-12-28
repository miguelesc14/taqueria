<?php
require_once("controllers/pedido.php");
include_once("views/header.php");
$pedido -> validateRol('administracion');
include_once("views/menu2.php");
$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_estatus = (isset($_GET['id_estatus'])) ? $_GET['id_estatus'] : null;
switch ($action) {
    case 'edit':
        $cantidad = $pedido->edit($id, $id_estatus);
        if ($cantidad) {
            $data = $pedido->get(null);
        $dataP = $pedido->getPlatillos(null);

        include('views/pedido/index.php');
        } else {
            $data = $pedido->get(null);
        $dataP = $pedido->getPlatillos(null);
        include('views/pedido/index.php');
        }
        break;
    case 'delete':

        $cantidad = $pedido->delete($id);
        
        if ($cantidad) {
            $pedido->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $pedido->get(null);
            include('views/pedido/index.php');
        } else {
            $pedido->flash('danger', 'Algo fallo');
            $data = $pedido->get(null);
            include('views/pedido/index.php');
        }
        break;
        case 'trans':
            $dataS = $pedido->get($id);
            $dataPE = $pedido->getPlatillos($id);
            $cantidadX = $pedido -> transfer($dataS, $dataPE);

            
            if ($cantidadX) {
                $cantidadY = $pedido->delete($id);
                if ($cantidadY){
                    $pedido->flash('success', 'Registro con el id= ' . $id . ' transferido con éxito');
                $data = $pedido->get(null);
                $dataP = $pedido->getPlatillos($id);
                include('views/pedido/index.php');
                }
            } else {
                $pedido->flash('danger', 'Algo fallo');
                $data = $pedido->get(null);
                $dataP = $pedido->getPlatillos($id);
                include('views/pedido/index.php');
            }
            break;
    case 'getAll':
    default:
        $data = $pedido->get(null);
        
        $dataP = $pedido->getPlatillos(null);
        include("views/pedido/index.php");
}
include("views/footer.php");
?>