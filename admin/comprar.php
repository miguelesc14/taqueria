<?php
error_reporting(E_ERROR | E_PARSE);
include_once("views/header.php");
require_once(__DIR__."/controllers/kart.php");
$kart -> validateRol('cliente');
require_once(__DIR__."/controllers/menu.php");
session_start();

if(isset($_SESSION['id_usuario'])){
    include('views/menu2.php');
}else{
    include('views/menu.php');
}
require_once("controllers/menu.php");
$baseUrl = 'http://localhost/taqueria/admin';

$action = (isset($_GET['action'])) ? $_GET['action'] : 'efective';
$id = isset($_GET['pl']) ? $_GET['pl'] : '';
$id_pedido = (isset($_GET['id'])) ? $_GET['id'] : null;

$cant = 1;
$data = $kart->get($id_pedido);
$dataP = $kart->getPlatillos(null);
$costo = $kart->getCosto($id_pedido);


?>

<div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col">
        <div class="row">
            <h1><small>Confirmar compra</small></h1>
        </div>
        <div class="row">
            <b>Hora de compra: </b><?php echo $data[0]['hora_pedido']; ?>
        </div>
        <div class="row">
            <b>Orden: </b>
            <?php
                        foreach ($dataP as $key => $platillo):
                            if($platillo['id_temp']==$data[0]['id_temp']){
                                echo $platillo['cantidad'].' '.$platillo['nombre'].' ('.$platillo['comentario'].')';
                                echo "<br>";
                            }else{
                                //echo "Error: sin platillos";
                                //break;
                            }
                        endforeach;
                       
                    ?>
        </div>
        <div class="row">
            <b>Comentario: </b><?php echo $data[0]['comentario_general']; ?>
        </div>
        <div class="row">
            <b>Dirección de entrega: </b><?php echo $data[0]['direccion']; ?>
        </div>
        <div class="row">
            <b>Sucursal: </b><?php echo $data[0]['sucur']; ?>
        </div>
        <div class="row">
            <b>Precio total: </b><?php echo $costo[0]['costo'];?>
        </div>
    </div>
    </div>




<?php if($action=='paypal'): ?>
    <div class="row">
    <div class="col-1">
        &nbsp;
    </div><div class="col-1">
<!-- Para cambiar al entorno de producción usar: https://www.paypal.com/cgi-bin/webscr -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">

    <!-- Valores requeridos -->
    <input type="hidden" name="business" value="vendedor@business.example.com">
    <input type="hidden" name="cmd" value="_xclick">

    <input type="hidden" name="item_name" id="" value="<?php echo $data[0]['id_temp']; ?>" required="">
    <!-- <input type="text" name="item_name" id="" value="Lampara de escritorio" required=""><br>-->
    <input type="hidden" name="amount" id="" value="<?php echo $costo[0]['costo']; ?>"  required="">

    <input type="hidden" name="currency_code" value="MXN">

    <label for="quantity" class="form-label">quantity</label>

    <input type="hidden" name="quantity" id="" value="<?php echo $cant; ?>" required="">

    <!-- Valores opcionales -->
    <!-- En el siguiente enlace puedes encontrar una lista completa de Variables HTML para pagos estándar de PayPal. -->
    <!-- https://developer.paypal.com/docs/paypal-payments-standard/integration-guide/Appx-websitestandard-htmlvariables/ -->

    <input type="hidden" name="item_number" value="1">
    <!-- <input type="hidden" name="invoice" value="0012"> -->

    <input type="hidden" name="lc" value="es_ES">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="image_url" value="https://picsum.photos/150/150">
    <input type="hidden" name="return" value="<?= $baseUrl ?>/receptor.php">
    <input type="hidden" name="cancel_return" value="<?= $baseUrl ?>/pago_cancelado.php">

    <hr>

    <button class="read_more"type="submit">Pagar con Paypal!</button>
    </div>
</div>
</form>
<?php else: ?>
    <div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <a class="read_more" href="kart.php?action=trans&id=<?php echo $id_pedido; ?>">Confirmar compra</a>
</div>
    <?php endif;?>

<?php include_once("views/footer.php"); ?>
