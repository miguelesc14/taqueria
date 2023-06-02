<?php
require_once('controllers/pedido.php');
include_once('views/header.php');
$pedido -> validateRol('cliente');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;


switch ($action) {
    case 'delete':
        /*$cantidadUP = $pedido->deleteUP($id);
        $cantidadPeP = $pedido->deletePeP($id);
        $cantidadPlP = $pedido->deletePlP($id);*/
        $cantidad = $pedido->delete($id);
        
        if ($cantidad) {
            $pedido->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $pedido->getbyuser($_SESSION['id_usuario']);
            $dataP = $pedido->getPlatillos(null);
            include('views/pedidobyuser/index.php');
        } else {
            $pedido->flash('danger', 'Algo fallo');
            $data = $pedido->getbyuser($_SESSION['id_usuario']);
            $dataP = $pedido->getPlatillos(null);
            include('views/pedidobyuser/index.php');
        }
        break;
    case 'getAll':
    default:
    $data = $pedido->getbyuser($_SESSION['id_usuario']);
        
        $dataP = $pedido->getPlatillos(null);
        include("views/pedidobyuser/index.php");
}
include("views/footer.php");




?>
