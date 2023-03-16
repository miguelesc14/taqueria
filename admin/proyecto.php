<?php
require_once("controllers/proyecto.php");
require_once("controllers/departamento.php");
include_once('views/header.php');
include_once('views/menu.php');
include_once('views/footer.php');

$accion = (isset($_GET['action'])) ?$_GET['action'] : 'get';

$id = (isset($_GET['id'])) ?$_GET['id'] : null;

switch ($accion) {

    case 'new':
      
        $datadepartamentos=$departamento->get();
        if (isset($_POST['enviar'])) {
            $proyecto->uploadfile('x','y');
            die();
            $data = $_POST['data'];
            $cantidad = $proyecto->new($data);
            if($cantidad){
                $proyecto->flash('success',"Registro dado de alta con éxito");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            }
            else{
                $proyecto->flash('danger',"Algo fallo");
                include('views/proyecto/form.php');
            }
           
        }
        else{
            include('views/proyecto/form.php');
        }

        break;
    case 'edit':
        $datadepartamentos=$departamento->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_proyecto'];
            $cantidad = $proyecto->edit($id,$data);
            if($cantidad){
                $proyecto->flash('success',"Registro actualizado con éxito");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            }
            else{
                $proyecto->flash('danger',"Algo fallo");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            }
           
        }
        else{
            $data = $proyecto->get($id);
            include('views/proyecto/form.php');
        }
        break;
    case 'delete':
        $cantidad = $proyecto->delete($id);
        
            if($cantidad){
                $proyecto->flash('success',"Registro eliminado con éxito");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            }
            else{
                $proyecto->flash('danger',"Algo fallo");
                include('views/proyecto/form.php');
            }
           
        
        break;
    case 'getAll':
    default:
        $data = $proyecto->get($id);
        include("views/proyecto/index.php");
}

?>