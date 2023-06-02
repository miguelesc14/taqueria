<?php
require_once ("controllers/bitacora.php");
$bitacora -> validateRol('cliente');
include_once("views/header.php");

include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : null;
$data = $bitacora->getbyuser($id);
switch ($action) {
    case 'pdf':
    default:
    include("views/bitacora/indexclient.php");
        ?>

        <?php
}
include("views/footer.php");
?>