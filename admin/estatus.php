<?php
require_once("controllers/estatus.php");
include_once("views/header.php");
$estatus -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $estatus->new($data);
            if ($cantidad) {
                $estatus->flash('success', 'Registro dado de alta con éxito');
                $data = $estatus->get(null);
                include('views/estatus/index.php');
            } else {
                $estatus->flash('danger', 'Algo fallo');
                include('views/estatus/form.php');
            }
        } else {
            include('views/estatus/form.php');
        }
        break;;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_estatus'];
            $cantidad = $estatus->edit($id, $data);
            if ($cantidad) {
                $estatus->flash('success', 'Registro actualizado con éxito');
                $data = $estatus->get(null);
                include('views/estatus/index.php');
            } else {
                $estatus->flash('danger', 'Algo fallo');
                $data = $estatus->get(null);
                include('views/estatus/index.php');
            }
        } else {
            $data = $estatus->get($id);
            include('views/estatus/form.php');
        }
        break;
    case 'delete':
        $usuario -> validatePrivilegio('Borrar elemdeath');
        $cantidad = $estatus->delete($id);
        if ($cantidad) {
            $estatus->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $estatus->get(null);
            include('views/estatus/index.php');
        } else {
            $estatus->flash('danger', 'Algo fallo');
            $data = $estatus->get(null);
            include('views/estatus/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $estatus->get(null);
        include("views/estatus/index.php");
}
include("views/footer.php");
?>