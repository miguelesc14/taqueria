<?php
require_once("controllers/red_social.php");
include_once("views/header.php");
$red_social -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $red_social->new($data);
            if ($cantidad) {
                $red_social->flash('success', 'Registro dado de alta con éxito');
                $data = $red_social->get(null);
                include('views/red_social/index.php');
            } else {
                $red_social->flash('danger', 'Algo fallo');
                include('views/red_social/form.php');
            }
        } else {
            include('views/red_social/form.php');
        }
        break;;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_red'];
            $cantidad = $red_social->edit($id, $data);
            if ($cantidad) {
                $red_social->flash('success', 'Registro actualizado con éxito');
                $data = $red_social->get(null);
                include('views/red_social/index.php');
            } else {
                $red_social->flash('danger', 'Algo fallo');
                $data = $red_social->get(null);
                include('views/red_social/index.php');
            }
        } else {
            $data = $red_social->get($id);
            include('views/red_social/form.php');
        }
        break;
    case 'delete':
        $cantidad = $red_social->delete($id);
        if ($cantidad) {
            $red_social->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $red_social->get(null);
            include('views/red_social/index.php');
        } else {
            $red_social->flash('danger', 'Algo fallo');
            $data = $red_social->get(null);
            include('views/red_social/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $red_social->get(null);
        include("views/red_social/index.php");
}
include("views/footer.php");
?>