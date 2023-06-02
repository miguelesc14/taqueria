<?php
require_once("controllers/menu.php");
include_once("views/header.php");
$menu -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $dataTipo = $menu->getTipo(null);
        $dataIngSec = $menu->getIngSec(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $menu->new($data, $dataTipo, $dataIngSec);
            if ($cantidad) {
                $menu->flash('success', 'Registro dado de alta con éxito');
                $data = $menu->get(null);
                header('Location: menu.php');
            } else {
                $menu->flash('danger', 'Algo fallo');
                include('views/menu/form.php');
            }
        } else {
            include('views/menu/form.php');
        }
        break;;
    case 'edit':
        $dataTipo = $menu->getTipo(null);
        $dataIngSec = $menu->getIngSec(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_platillo'];
            $cantidad = $menu->edit($id, $data, $dataTipo, $dataIngSec);
            if ($cantidad) {
                $menu->flash('success', 'Registro actualizado con éxito');
                $data = $menu->get(null);
                header('Location: menu.php');
            } else {
                $menu->flash('danger', 'Algo fallo');
                $data = $menu->get(null);
                header('Location: menu.php');
            }
        } else {
            $data = $menu->get($id);
            include('views/menu/form.php');
        }
        break;
    case 'delete':
        $cantidad = $menu->delete($id);
        if ($cantidad) {
            $menu->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $menu->get(null);
            header('Location: menu.php');
        } else {
            $menu->flash('danger', 'Algo fallo');
            $data = $menu->get(null);
            header('Location: menu.php');
        }
        break;
    case 'getAll':
    default:
        $data = $menu->get(null);
        include("views/menu/index.php");
}
include("views/footer.php");
?>