<?php
require_once("controllers/proyecto.php");
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
            if($cantidad){
                $web->flash('success',"Registro dado de alta con éxito");
                $data = $web->get();
                include('views/proyecto/index.php');
            }
            else{
                $web->flash('danger',"Algo fallo");
                include('views/proyecto/form.php');
            }
           
        }
        else{
            include('views/proyecto/form.php');
        }

        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_proyecto'];
            $cantidad = $web->edit($id,$data);
            if($cantidad){
                $web->flash('success',"Registro actualizado con éxito");
                $data = $web->get();
                include('views/proyecto/index.php');
            }
            else{
                $web->flash('danger',"Algo fallo");
                $data = $web->get();
                include('views/proyecto/index.php');
            }
           
        }
        else{
            $data = $web->get($id);
            include('views/proyecto/form.php');
        }
        break;
    case 'delete':
        $cantidad = $web->delete($id);
        
            if($cantidad){
                $web->flash('success',"Registro eliminado con éxito");
                $data = $web->get();
                include('views/proyecto/index.php');
            }
            else{
                $web->flash('danger',"Algo fallo");
                include('views/proyecto/form.php');
            }
           
        
        break;
    case 'getAll':
    default:
        $data = $web->get($id);
        include("views/proyecto/index.php");
}

?>