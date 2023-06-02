<?php
require_once("controllers/personal.php");
require_once("controllers/usuario.php");
require_once("controllers/genero.php");
require_once("controllers/sucursal.php");
require_once("controllers/ciudad.php");
include_once("views/header.php");
$personal -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_usuario = (isset($_GET['id_usuario'])) ? $_GET['id_usuario'] : null;
switch ($action) {
    case 'new':
        $dataUsuario = $usuario->getUsuario(null);
        $dataGenero = $genero->get(null);
        $dataSucursal = $sucursal->get(null);
        $dataCiudad = $ciudad->get(null);
        $usr = $id_usuario;
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $personal->new($data);
            if ($cantidad) {
                $personal->flash('success', 'Registro dado de alta con éxito');
                if($id_usuario=null){
                $data = $personal->get(null);
                include('views/personal/index.php');
                }else{
                    $data = $personal->getbyAdmin($usr);
                include('views/personal/index.php');
                }
            } else {
                $personal->flash('danger', 'Algo fallo');
                include('views/personal/form.php');
            }
        } else {
            include('views/personal/form.php');
        }
        break;;
    case 'edit':
        $dataUsuario = $usuario->getUsuario(null);
        $dataGenero = $genero->get(null);
        $dataSucursal = $sucursal->get(null);
        $dataCiudad = $ciudad->get(null);
        $usr = $id_usuario;
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_personal'];
            $cantidad = $personal->edit($id, $data);
            if ($cantidad) {
                $personal->flash('success', 'Registro actualizado con éxito');
                if((in_array('administracion', $_SESSION['roles']))){
                    $data = $personal->get(null);
                include('views/personal/index.php');
                }else{
                    $data = $personal->getbyAdmin($usr);

                include('views/personal/index.php');
                }
            } else {
                if($id_usuario=null){
                $personal->flash('danger', 'Algo fallo');
                $data = $personal->get(null);
                include('views/personal/index.php');
            }else{
                $personal->flash('danger', 'Algo fallo');
                $data = $personal->getbyAdmin($usr);
                include('views/personal/index.php');
            }
            }
        } else {
            $data = $personal->get($id);
            include('views/personal/form.php');
        }
        break;
    case 'delete':
        $cantidad = $personal->delete($id);
        if ($cantidad) {
            $personal->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            if($id_usuario=null){
            $data = $personal->get(null);
            include('views/personal/index.php');
            }else{
                $data = $personal->getbyAdmin($usr);

            include('views/personal/index.php');
            }
        } else {
            $personal->flash('danger', 'Algo fallo');
            if($id_usuario=null){
            $data = $personal->get(null);
            include('views/personal/index.php');
            }else{
                $data = $personal->getbyAdmin($usr);

            include('views/personal/index.php');
            }
        }
        break;
    case 'getOne':
        $usr = $id_usuario;
        $data = $personal->getbyAdmin($id_usuario);
        include(__DIR__."/views/personal/index.php");
        break;
    case 'getAll':
    default:
        $data = $personal->get(null);
        include("views/personal/index.php");
}
include("views/footer.php");
?>