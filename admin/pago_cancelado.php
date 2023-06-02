<?php
include_once("views/header.php");
session_start();

if(isset($_SESSION['id_usuario'])){
    include('views/menu2.php');
}else{
    include('views/menu.php');
}
require_once("controllers/menu.php");
$baseUrl = 'http://localhost/taqueria/admin';
?>

<h2>Pedido cancelado</h2>
<p>El pedido fue cancelado, vuelve a la página de compra dando clic <a href="<?= $baseUrl ?>/formulario.php">aquí</a></p>

<?php include_once("views/footer.php"); ?>