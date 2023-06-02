<?php
require_once("controllers/ingprinc.php");
include_once("views/header.php");
$ingrediente_principal -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $ingrediente_principal->new($data);
            if ($cantidad) {
                $ingrediente_principal->flash('success', 'Registro dado de alta con éxito');
                $data = $ingrediente_principal->get(null);
                include('views/ingprinc/index.php');
            } else {
                $ingrediente_principal->flash('danger', 'Algo fallo');
                include('views/ingprinc/form.php');
            }
        } else {
            include('views/ingprinc/form.php');
        }
        break;;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_ingprinc'];
            $cantidad = $ingrediente_principal->edit($id, $data);
            if ($cantidad) {
                $ingrediente_principal->flash('success', 'Registro actualizado con éxito');
                $data = $ingrediente_principal->get(null);
                include('views/ingprinc/index.php');
            } else {
                $ingrediente_principal->flash('danger', 'Algo fallo');
                $data = $ingrediente_principal->get(null);
                include('views/ingprinc/index.php');
            }
        } else {
            $data = $ingrediente_principal->get($id);
            include('views/ingprinc/form.php');
        }
        break;
    case 'delete':
        $cantidad = $ingrediente_principal->delete($id);
        if ($cantidad) {
            $ingrediente_principal->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $ingrediente_principal->get(null);
            include('views/ingprinc/index.php');
        } else {
            $ingrediente_principal->flash('danger', 'Algo fallo');
            $data = $ingrediente_principal->get(null);
            include('views/ingprinc/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $ingrediente_principal->get(null);
        include("views/ingprinc/index.php");
}
include("views/footer.php");
?>