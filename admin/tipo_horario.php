<?php
require_once("controllers/tipo_horario.php");
include_once("views/header.php");
$tipo_horario -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $tipo_horario->new($data);
            if ($cantidad) {
                $tipo_horario->flash('success', 'Registro dado de alta con éxito');
                $data = $tipo_horario->get(null);
                include('views/tipo_horario/index.php');
            } else {
                $tipo_horario->flash('danger', 'Algo fallo');
                include('views/tipo_horario/form.php');
            }
        } else {
            include('views/tipo_horario/form.php');
        }
        break;;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_tipohorario'];
            $cantidad = $tipo_horario->edit($id, $data);
            if ($cantidad) {
                $tipo_horario->flash('success', 'Registro actualizado con éxito');
                $data = $tipo_horario->get(null);
                include('views/tipo_horario/index.php');
            } else {
                $tipo_horario->flash('danger', 'Algo fallo');
                $data = $tipo_horario->get(null);
                include('views/tipo_horario/index.php');
            }
        } else {
            $data = $tipo_horario->get($id);
            include('views/tipo_horario/form.php');
        }
        break;
    case 'delete':
        $cantidad = $tipo_horario->delete($id);
        if ($cantidad) {
            $tipo_horario->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $tipo_horario->get(null);
            include('views/tipo_horario/index.php');
        } else {
            $tipo_horario->flash('danger', 'Algo fallo');
            $data = $tipo_horario->get(null);
            include('views/tipo_horario/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $tipo_horario->get(null);
        include("views/tipo_horario/index.php");
}
include("views/footer.php");
?>