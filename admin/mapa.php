<?php
require_once(__DIR__."/controllers/sucursal.php");
require_once(__DIR__."/controllers/tipo_horario.php");
require_once(__DIR__."/controllers/ciudad.php");
require_once(__DIR__."/controllers/red_social.php");
require_once(__DIR__."/controllers/sistema.php");
include_once(__DIR__."/views/header.php");
if(isset($_SESSION['id_usuario'])){
    include_once(__DIR__."/views/menu2.php");
}else{
    include_once(__DIR__."/views/menu.php");
}
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$data = $sucursal->get($id);

?>

<h1 style="text-align:center;"> Nuestras sucursales </h1>
<div style="text-align: center;">
<iframe src="<?php echo $data[0]['mapa']; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php
include(__DIR__."/views/footer.php");
?>