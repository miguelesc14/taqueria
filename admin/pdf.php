<?php
    require_once("../vendor/autoload.php");
    require_once('controllers/publicacion.php');
    $publicacion -> validateRol('administracion');
    $id = (isset($_GET["id"]))?$_GET["id"]:null;
    $data=$publicacion->get($id);
    use Spipu\Html2Pdf\Html2Pdf;
    $html2pdf = new Html2Pdf();
$html2pdf->writeHTML($data[0]['contenido']);
$html2pdf->output();
?>
<meta http-equiv="refresh" content="0; url=publicacion.php">