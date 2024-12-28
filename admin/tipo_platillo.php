<?php
require_once("controllers/tipo_platillo.php");
include_once("views/header.php");
$tipo_platillo -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $tipo_platillo->new($data);
            if ($cantidad) {
                $tipo_platillo->flash('success', 'Registro dado de alta con éxito');
                $data = $tipo_platillo->get(null);
                include('views/tipo_platillo/index.php');
            } else {
                $tipo_platillo->flash('danger', 'Algo fallo');
                include('views/tipo_platillo/form.php');
            }
        } else {
            include('views/tipo_platillo/form.php');
        }
        break;;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_tipoplatillo'];
            $cantidad = $tipo_platillo->edit($id, $data);
            if ($cantidad) {
                $tipo_platillo->flash('success', 'Registro actualizado con éxito');
                $data = $tipo_platillo->get(null);
                include('views/tipo_platillo/index.php');
            } else {
                $tipo_platillo->flash('danger', 'Algo fallo');
                $data = $tipo_platillo->get(null);
                include('views/tipo_platillo/index.php');
            }
        } else {
            $data = $tipo_platillo->get($id);
            include('views/tipo_platillo/form.php');
        }
        break;
    case 'delete':
        $cantidad = $tipo_platillo->delete($id);
        if ($cantidad) {
            $tipo_platillo->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $tipo_platillo->get(null);
            include('views/tipo_platillo/index.php');
        } else {
            $tipo_platillo->flash('danger', 'Algo fallo');
            $data = $tipo_platillo->get(null);
            include('views/tipo_platillo/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $tipo_platillo->get(null);
        include("views/tipo_platillo/index.php");
}
include("views/footer.php");
?>