<?php

include_once("views/header.php");
session_start();

if(isset($_SESSION)){
    include('views/menu2.php');
}else{
    include('views/menu.php');
}
require_once("controllers/menu.php");
$baseUrl = 'http://localhost/taqueria/admin';

?>




<h1><small>Formulario de pago</small></h1>

<!-- Para cambiar al entorno de producción usar: https://www.paypal.com/cgi-bin/webscr -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">

    <!-- Valores requeridos -->
    <input type="hidden" name="business" value="vendedor@business.example.com">
    <input type="hidden" name="cmd" value="_xclick">

    <label for="item_name" class="form-label">Producto</label>
    <select name="item_name" required="required">
                <?php
                $dataPlatillo = $menu->get();
                $selected = " ";
                $sel="";
                foreach ($dataPlatillo as $key => $menu):
                    if ($menu['id_platillo'] == $data[0]['id_platillo']):
                        $selected = "selected";
                        $sel=$menu['id_platillo'];
                    endif;
                    ?>
                    <option value="<?php echo $menu['id_platillo']; ?>" <?php //echo $selected; ?>>
                        <?php echo $menu['nombre'] ?></option>
                    <?php //$selected = " "; 
                endforeach; ?>
            </select>
    <!-- <input type="text" name="item_name" id="" value="Lampara de escritorio" required=""><br>-->
<br>
    <label for="amount" class="form-label">Precio</label>
    <input type="text" name="amount" id="" value="<?php ?>" required=""><br>

    <input type="hidden" name="currency_code" value="MXN">

    <label for="quantity" class="form-label">quantity</label>
    <input type="text" name="quantity" id="" value="2" required=""><br>

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

</form>

<?php include_once("views/footer.php"); ?>