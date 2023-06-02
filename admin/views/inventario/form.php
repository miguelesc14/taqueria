<h1>Actualizar inventario </h1>
<form method="POST" action="inventario.php?action=<?php echo $action; ?>">
<div class="row">

<?php if($action=='editIP'): ?>
    

        <div class="col-2">
            <h3>Ingrediente: <?php echo $dataIP[0]['sucursal'] ?></h3>
        </div>
    </div>
<div class="row">
        <div class="col-2">
            <h3>Ingrediente: <?php echo $dataIP[0]['ingrediente'] ?></h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">
            <label for="precio">Cantidad:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="precio" name="data[cantidad]"
            value="<?php echo isset($dataIP[0]['cantidad']) ? $dataIP[0]['cantidad'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">

            <input type="hidden" name="data[id_ipsucursal]"
                value="<?php echo isset($dataIP[0]['id_ipsucursal']) ? $dataIP[0]['id_ipsucursal'] : ''; ?>" class="" />
    </div>

        <?php else:?>
            <?php if($action=='editIS'): ?>


            <div class="col-2">
            <h3>Sucursal: <?php echo $dataIS[0]['sucursal'] ?></h3>
        </div>
    </div>
<div class="row">
        <div class="col-2">
            
            <h3>Ingrediente: <?php echo $dataIS[0]['ingrediente'] ?></h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">
            <label for="precio">Cantidad:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="precio" name="data[cantidad]"
            value="<?php echo isset($dataIS[0]['cantidad']) ? $dataIS[0]['cantidad'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">

            <input type="hidden" name="data[id_issucursal]"
                value="<?php echo isset($dataIS[0]['id_issucursal']) ? $dataIS[0]['id_issucursal'] : ''; ?>" class="" />
    </div>

        <?php endif; ?>
        <?php endif; ?>
        <div class="mb-3">
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>

<div class="col">
            <a class="btn btn-lg btn-primary" href="inventario.php">Regresar</a>
</div>