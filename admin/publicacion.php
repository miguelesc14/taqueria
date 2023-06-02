<?php
require_once('controllers/publicacion.php');
include_once('views/header.php');
$publicacion -> validateRol('administracion');
include_once('views/menu2.php');
require_once("../vendor/autoload.php");
use Spipu\Html2Pdf\Html2Pdf;
$html2pdf = new Html2Pdf();
$action = (isset($_GET["action"]))?$_GET["action"]:null;
$id = (isset($_GET["id"]))?$_GET["id"]:null;
switch($action){
    case 'new':
        if(isset($_POST['enviar'])){
            $data = $_POST['data'];
            $cantidad=$publicacion->new($data);
            if($cantidad){
                $publicacion->flash('success','Se añadio el registro');
                $data=$publicacion->get(null);
                include('views/publicacion/index.php');
            }else{
                $publicacion->flash('danger','No se añadio el registro');
                include('views/publicacion/form.php');
            }
        }else{
            include('views/publicacion/form.php');
        }
    break;
    case 'edit':
        if(isset($_POST['enviar'])){
            $data=$_POST['data'];
            $id = $_POST['data']['id_publicacion'];
            $cantidad=$publicacion->edit($data,$id);
            if($cantidad){
                $publicacion->flash('success','Se actualizo el registro');
                $data=$publicacion->get(null);
                include('views/publicacion/index.php');
            }else{
                $publicacion->flash('danger','No se actualizo el registro');
                $data=$publicacion->get(null);
                include('views/publicacion/index.php');
            }
        }else{
            $data= $publicacion->get($id);
            include('views/publicacion/form.php');
        }
    break;
    case 'delete':
        $cantidad=$publicacion->delete($id);
        if($cantidad){
            $publicacion->flash('success','Se borró el registro');
            $data=$publicacion->get(null);
            include('views/publicacion/index.php');
        }else{
            $publicacion->flash('danger','No se borro el registro');
            $data=$publicacion->get(null);
            include('views/publicacion/index.php');
        }
    break;
    case 'pdf':
    $data= $publicacion->get($id);
    $html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
$html2pdf->output();
include('views/publicacion/index.php');
    break;
    default:
    $data=$publicacion->get(null);
    include('views/publicacion/index.php');
    //header('Location: publicacion.php');
    break;
    }
    include_once('views/footer.php');
?>