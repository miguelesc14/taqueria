<?php
require_once("controllers/departamento.php");
include_once('views/header.php');
include_once('views/menu.php');
include_once('views/footer.php');

$accion = (isset($_GET['action'])) ?$_GET['action'] : 'get';

$id = (isset($_GET['id'])) ?$_GET['id'] : null;

switch ($accion) {

    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $web->new($data);
            include('views/departamento/index.php');
        }
        else{
            include('views/departamento/form.php');
        }

        break;
    case 'edit':
        $data = $web->get($id);
        $cantidad = $web->edit($id, $data);
        break;
    case 'delete':
        $cantidad = $web->delete($id);
        break;
    case 'getAll':
    default:
        $data = $web->get($id);
        include("views/departamento/index.php");
}

?>