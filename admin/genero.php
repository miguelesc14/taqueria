<?php
require_once("controllers/genero.php");
include_once("views/header.php");
$genero -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $genero->new($data);
            if ($cantidad) {
                $genero->flash('success', 'Registro dado de alta con éxito');
                $data = $genero->get(null);
                include('views/genero/index.php');
            } else {
                $genero->flash('danger', 'Algo fallo');
                include('views/genero/form.php');
            }
        } else {
            include('views/genero/form.php');
        }
        break;;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_genero'];
            $cantidad = $genero->edit($id, $data);
            if ($cantidad) {
                $genero->flash('success', 'Registro actualizado con éxito');
                $data = $genero->get(null);
                include('views/genero/index.php');
            } else {
                $genero->flash('danger', 'Algo fallo');
                $data = $genero->get(null);
                include('views/genero/index.php');
            }
        } else {
            $data = $genero->get($id);
            include('views/genero/form.php');
        }
        break;
    case 'delete':
        $cantidad = $genero->delete($id);
        if ($cantidad) {
            $genero->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $genero->get(null);
            include('views/genero/index.php');
        } else {
            $genero->flash('danger', 'Algo fallo');
            $data = $genero->get(null);
            include('views/genero/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $genero->get(null);
        include("views/genero/index.php");
}
include("views/footer.php");
?>