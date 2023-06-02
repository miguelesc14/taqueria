<?php
require_once("controllers/ingsec.php");
include_once("views/header.php");
$ingrediente_secundario -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $ingrediente_secundario->new($data);
            if ($cantidad) {
                $ingrediente_secundario->flash('success', 'Registro dado de alta con éxito');
                $data = $ingrediente_secundario->get(null);
                include('views/ingsec/index.php');
            } else {
                $ingrediente_secundario->flash('danger', 'Algo fallo');
                include('views/ingsec/form.php');
            }
        } else {
            include('views/ingsec/form.php');
        }
        break;;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_ingsec'];
            $cantidad = $ingrediente_secundario->edit($id, $data);
            if ($cantidad) {
                $ingrediente_secundario->flash('success', 'Registro actualizado con éxito');
                $data = $ingrediente_secundario->get(null);
                include('views/ingsec/index.php');
            } else {
                $ingrediente_secundario->flash('danger', 'Algo fallo');
                $data = $ingrediente_secundario->get(null);
                include('views/ingsec/index.php');
            }
        } else {
            $data = $ingrediente_secundario->get($id);
            include('views/ingsec/form.php');
        }
        break;
    case 'delete':
        $cantidad = $ingrediente_secundario->delete($id);
        if ($cantidad) {
            $ingrediente_secundario->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $ingrediente_secundario->get(null);
            include('views/ingsec/index.php');
        } else {
            $ingrediente_secundario->flash('danger', 'Algo fallo');
            $data = $ingrediente_secundario->get(null);
            include('views/ingsec/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $ingrediente_secundario->get(null);
        include("views/ingsec/index.php");
}
include("views/footer.php");
?>