<?php
require_once("controllers/cliente.php");
require_once("controllers/usuario.php");
require_once("controllers/genero.php");
require_once("controllers/ciudad.php");
include_once("views/header.php");
$cliente -> validateRol('cliente');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_cliente = (isset($_GET['id_cliente'])) ? $_GET['id_cliente'] : null;
switch ($action) {
    case 'new':
        $dataUsuario = $usuario->getUsuario(null);
        $dataGenero = $genero->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $cliente->new($data);
            if ($cantidad) {
                $cliente->flash('success', 'Registro dado de alta con éxito');
                $data = $cliente->get($id);
                include('views/cliente/indexclient.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                include('views/cliente/formclient.php');
            }
        } else {
            include('views/cliente/formclient.php');
        }
        break;;
    case 'edit':
        $dataUsuario = $usuario->getUsuario(null);
        $dataGenero = $genero->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $idc = $_POST['data']['id_cliente'];
            $cantidad = $cliente->edit($idc, $data);
            if ($cantidad) {
                $cliente->flash('success', 'Registro actualizado con éxito. Sus cambios podrían reflejarse hasta el siguiente inicio de sesión.');
                $data = $cliente->getbyclient($id);
                include('views/cliente/indexclient.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                $data = $cliente->getbyclient($id);
                include('views/cliente/indexclient.php');
            }
        } else {
            $data = $cliente->getbyclient($id);
            include('views/cliente/formclient.php');
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
                    $data = $cliente->getbyclient($id);
                    include('views/cliente/indexclient.php');
                } else {
                    $cliente->flash('danger', 'Algo fallo');
                    $data = $cliente->getbyclient($id);
                    include('views/cliente/indexclient.php');
                }
            } else {
                $data = $cliente->getbyclient($id);
                include('views/cliente/formclient.php');
            }
            break;
    case 'delete':
        $cantidad = $cliente->delete($id);
        if ($cantidad) {
            $cliente->flash('success', 'Tu cuenta ha sido eliminada');
            $data = $cliente->get($id);
            include('index.php');
        } else {
            $cliente->flash('danger', 'Algo fallo');
            $data = $cliente->get($id);
            include('views/cliente/indexclient.php');
        }
        break;
        case 'deletebyuser':
            $sistema -> logout();
            $cantidad = $cliente->deletebyuser($id_cliente,$id);
            if ($cantidad) {
                $cliente->flash('success', 'Tu cuenta ha sido eliminada');
                echo "<meta http-equiv='refresh' content='0; url=login.php'>";
            } else {
                $cliente->flash('danger', 'Algo fallo');
                $data = $cliente->getbyclient($id);
                include('views/cliente/indexclient.php');
            }
            break;
    case 'uc':
        $data = $cliente->getUC($id);
        include("views/cliente/uc.php");
        break;
    case 'newuc':
        $dataCiudad = $ciudad->get();
        $dataCliente = $cliente->getbyclient($id);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $cliente->newUC($data);
            if ($cantidad) {
                $cliente->flash('success', 'Registro dado de alta con éxito');
                $data = $cliente->getUC($id);
                include('views/cliente/uc.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                include('views/cliente/formuc.php');
            }
        } else {
            include('views/cliente/formuc.php');
        }
        break;;
    
    
    case 'edituc':
        $dataCiudad = $ciudad->get();
        $dataCliente = $cliente->getbyclient($id);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id2 = $_POST['data']['id_ubiclient'];
            $cantidad = $cliente->editUC($id2, $data);
            if ($cantidad) {
                $cliente->flash('success', 'Registro actualizado con éxito');
                $data = $cliente->getUC($id);
                include('views/cliente/uc.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                $data = $cliente->getUC($id);
                include('views/cliente/uc.php');
            }
        } else {
            $data = $cliente->getUC($id);
            include('views/cliente/formuc.php');
        }
        break;
        case 'deleteuc':
            $cantidad = $cliente->deleteUC($id);
            if ($cantidad) {
                $cliente->flash('success', 'Tu cuenta ha sido eliminada');
                $data = $cliente->getUC($id);
                include('views/cliente/uc.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                $data = $cliente->getUC($id);
                include('views/cliente/uc.php');
            }
            break;
    case 'getone':
    default:
        $data = $cliente->getbyclient($id);
        include("views/cliente/indexclient.php");
}
include("views/footer.php");
?>