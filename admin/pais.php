<?php
require_once("controllers/pais.php");
include_once("views/header.php");
$pais -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $pais->new($data);
            if ($cantidad) {
                $pais->flash('success', 'Registro dado de alta con éxito');
                $data = $pais->get(null);
                include('views/pais/index.php');
            } else {
                $pais->flash('danger', 'Algo fallo');
                include('views/pais/form.php');
            }
        } else {
            include('views/pais/form.php');
        }
        break;;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_pais'];
            $cantidad = $pais->edit($id, $data);
            if ($cantidad) {
                $pais->flash('success', 'Registro actualizado con éxito');
                $data = $pais->get(null);
                include('views/pais/index.php');
            } else {
                $pais->flash('danger', 'Algo fallo');
                $data = $pais->get(null);
                include('views/pais/index.php');
            }
        } else {
            $data = $pais->get($id);
            include('views/pais/form.php');
        }
        break;
    case 'delete':
        $cantidad = $pais->delete($id);
        if ($cantidad) {
            $pais->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $pais->get(null);
            include('views/pais/index.php');
        } else {
            $pais->flash('danger', 'Algo fallo');
            $data = $pais->get(null);
            include('views/pais/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $pais->get(null);
        include("views/pais/index.php");
}
include("views/footer.php");
?>