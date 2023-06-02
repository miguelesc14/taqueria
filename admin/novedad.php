<?php
require_once('controllers/publicacion.php');
include_once('views/header.php');
if(isset($_SESSION['id_usuario'])){
    if($_SESSION==null){
       include_once("views/menu.php");
    }else{
       include_once("views/menu2.php");
    }
 }else{
    include_once("views/menu.php");
 }



 $action = (isset($_GET["action"]))?$_GET["action"]:null;
 $id = (isset($_GET["id"]))?$_GET["id"]:null;
 
 switch($action){
    case 'more':
    $data=$publicacion->get($id);
    include('views/novedad/more.php');
    //header('Location: publicacion.php');
    break;

    default:
    $data=$publicacion->get(null);
    include('views/novedad/index.php');
    //header('Location: publicacion.php');
    break;

}

    include_once('views/footer.php');
?>