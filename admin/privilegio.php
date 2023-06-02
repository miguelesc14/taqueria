<?php
require_once(__DIR__."/controllers/privilegio.php");
include_once(__DIR__."/views/header.php");
$privilegio -> validateRol('administracion');
include_once(__DIR__."/views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $privilegio->new($data);
            if ($cantidad) {
                $privilegio->flash('success', 'Registro dado de alta con éxito');
                $data = $privilegio->get(null);
                include(__DIR__.'/views/privilegio/index.php');
            } else {
                $privilegio->flash('danger', 'Algo fallo');
                include(__DIR__.'/views/privilegio/form.php');
            }
        } else {
            include(__DIR__.'/views/privilegio/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_privilegio'];
            $cantidad = $privilegio->edit($id, $data);
            if ($cantidad) {
                $privilegio->flash('success', 'Registro actualizado con éxito');
                $data = $privilegio->get(null);
                include(__DIR__.'/views/privilegio/index.php');
            } else {
                $privilegio->flash('danger', 'Algo fallo');
                $data = $privilegio->get(null);
                include(__DIR__.'/views/privilegio/index.php');
            }
        } else {
            $data = $privilegio->get($id);
            include(__DIR__.'/views/privilegio/form.php');
        }
        break;
    case 'delete':
        $cantidad = $privilegio->delete($id);
        if ($cantidad) {
            $privilegio->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $privilegio->get(null);
            include(__DIR__.'/views/privilegio/index.php');
        } else {
            $privilegio->flash('danger', 'Algo fallo');
            $data = $privilegio->get(null);
            include(__DIR__.'/views/privilegio/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $privilegio->get(null);
        include(__DIR__."/views/privilegio/index.php");
}
include(__DIR__."/views/footer.php");
?>