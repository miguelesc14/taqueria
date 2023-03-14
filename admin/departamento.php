<?php
require_once("controllers/departamento.php");
include_once('views/header.php');
include_once('views/menu.php');
include_once('views/footer.php');

$accion = (isset($_GET['action'])) ? isset($_GET['action']) : 'getAll';

$id = (isset($_GET['id'])) ? isset($_GET['id']) : null;

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
        $data = $web->getOne($id);
        $cantidad = $web->edit($id, $data);
        break;
    case 'delete':
        $cantidad = $web->delete($id);
        break;
    case 'getAll':
    default:
        $data = $web->getAll();
        include("views/departamento/index.php");
}

?>