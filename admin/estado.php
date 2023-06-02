<?php
require_once("controllers/estado.php");
require_once("controllers/pais.php");
include_once("views/header.php");
$estado -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $dataPais = $pais->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $estado->new($data);
            if ($cantidad) {
                $estado->flash('success', 'Registro dado de alta con éxito');
                $data = $estado->get(null);
                include('views/estado/index.php');
            } else {
                $estado->flash('danger', 'Algo fallo');
                include('views/estado/form.php');
            }
        } else {
            include('views/estado/form.php');
        }
        break;;
    case 'edit':
        $dataPais = $pais->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_estado'];
            $cantidad = $estado->edit($id, $data);
            if ($cantidad) {
                $estado->flash('success', 'Registro actualizado con éxito');
                $data = $estado->get(null);
                include('views/estado/index.php');
            } else {
                $estado->flash('danger', 'Algo fallo');
                $data = $estado->get(null);
                include('views/estado/index.php');
            }
        } else {
            $data = $estado->get($id);
            include('views/estado/form.php');
        }
        break;
    case 'delete':
        $cantidad = $estado->delete($id);
        if ($cantidad) {
            $estado->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $estado->get(null);
            include('views/estado/index.php');
        } else {
            $estado->flash('danger', 'Algo fallo');
            $data = $estado->get(null);
            include('views/estado/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $estado->get(null);
        include("views/estado/index.php");
}
include("views/footer.php");
?>