<?php
require_once("controllers/cliente.php");
require_once("controllers/usuario.php");
require_once("controllers/genero.php");
include_once("views/header.php");
$cliente -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $dataUsuario = $usuario->getUsuario(null);
        $dataGenero = $genero->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $cliente->new($data);
            if ($cantidad) {
                $cliente->flash('success', 'Registro dado de alta con éxito');
                $data = $cliente->get(null);
                include('views/cliente/index.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                include('views/cliente/form.php');
            }
        } else {
            include('views/cliente/form.php');
        }
        break;;
    case 'edit':
        $dataUsuario = $usuario->getUsuario(null);
        $dataGenero = $genero->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_cliente'];
            $cantidad = $cliente->edit($id, $data);
            if ($cantidad) {
                $cliente->flash('success', 'Registro actualizado con éxito');
                $data = $cliente->get(null);
                include('views/cliente/index.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                $data = $cliente->get(null);
                include('views/cliente/index.php');
            }
        } else {
            $data = $cliente->get($id);
            include('views/cliente/form.php');
        }
        break;

        case 'editbyclient':
            $dataUsuario = $usuario->getUsuario(null);
            $dataGenero = $genero->get(null);
            if (isset($_POST['enviar'])) {
                $data = $_POST['data'];
                $id = $_POST['data']['id_cliente'];
                $cantidad = $cliente->edit($id, $data);
                if ($cantidad) {
                    $cliente->flash('success', 'Registro actualizado con éxito');
                    $data = $cliente->get(null);
                    include('views/cliente/index.php');
                } else {
                    $cliente->flash('danger', 'Algo fallo');
                    $data = $cliente->get(null);
                    include('views/cliente/index.php');
                }
            } else {
                $data = $cliente->get($id);
                include('views/cliente/form.php');
            }
            break;
    case 'delete':
        $cantidad = $cliente->delete($id);
        if ($cantidad) {
            $cliente->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $cliente->get(null);
            include('views/cliente/index.php');
        } else {
            $cliente->flash('danger', 'Algo fallo');
            $data = $cliente->get(null);
            include('views/cliente/index.php');
        }
        break;
    case 'getone':
        $data = $cliente->get($id);
        include("views/cliente/index.php");
    case 'getAll':
    default:
        $data = $cliente->get(null);
        include("views/cliente/index.php");
}
include("views/footer.php");
?>