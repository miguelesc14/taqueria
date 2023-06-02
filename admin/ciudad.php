<?php
require_once("controllers/ciudad.php");
require_once("controllers/estado.php");
include_once("views/header.php");
$ciudad -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $dataEstado = $estado->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $ciudad->new($data);
            if ($cantidad) {
                $ciudad->flash('success', 'Registro dado de alta con éxito');
                $data = $ciudad->get(null);
                include('views/ciudad/index.php');
            } else {
                $ciudad->flash('danger', 'Algo fallo');
                include('views/ciudad/form.php');
            }
        } else {
            include('views/ciudad/form.php');
        }
        break;;
    case 'edit':
        $dataEstado = $estado->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_ciudad'];
            $cantidad = $ciudad->edit($id, $data);
            if ($cantidad) {
                $ciudad->flash('success', 'Registro actualizado con éxito');
                $data = $ciudad->get(null);
                include('views/ciudad/index.php');
            } else {
                $ciudad->flash('danger', 'Algo fallo');
                $data = $ciudad->get(null);
                include('views/ciudad/index.php');
            }
        } else {
            $data = $ciudad->get($id);
            include('views/ciudad/form.php');
        }
        break;
    case 'delete':
        $cantidad = $ciudad->delete($id);
        if ($cantidad) {
            $ciudad->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $ciudad->get(null);
            include('views/ciudad/index.php');
        } else {
            $ciudad->flash('danger', 'Algo fallo');
            $data = $ciudad->get(null);
            include('views/ciudad/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $ciudad->get(null);
        include("views/ciudad/index.php");
}
include("views/footer.php");
?>