<?php
require_once(__DIR__."/controllers/bitacora.php");
include_once(__DIR__."/views/header.php");
$bitacora -> validateRol('administracion');
include_once(__DIR__."/views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'delete':
        $cantidad = $bitacora->delete($id);
        
        if ($cantidad) {
            $bitacora->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $bitacora->get(null);
            include("views/bitacora/index.php");
        } else {
            $bitacora->flash('danger', 'Algo fallo');
            $data = $bitacora->get(null);
            include("views/bitacora/index.php");
        }
        break;
        case 'pdf':
        include('views/bitacora/pdf.php');
        break;
    case 'getAll':
    default:
        $data = $bitacora->get(null);
        include("views/bitacora/index.php");
}
include("views/footer.php");
?>