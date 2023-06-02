<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> telefono </h1>
<form method="POST" action="sucursal.php?action=<?php echo $action; ?>&id=<?php echo $dataSucursal[0]['id_sucursal']; ?>">
    <div class="mb-3">
        
        <label for="exampleFormControlInput1" class="form-label">Sucursal: </label>
        <input type="text"
                value="<?php echo isset($dataSucursal[0]['sucurs']) ? $dataSucursal[0]['sucurs'] : ''; ?>" class="" disabled />
        <input type="hidden" name="data[id_sucursal]"
                value="<?php echo isset($dataSucursal[0]['id_sucursal']) ? $dataSucursal[0]['id_sucursal'] : ''; ?>" class="" />
    </div>
    <div class="row">
        <div class="col-2">
            <label for="dias">Telefono:</label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="telefono" name="data[telefono]"
            value="<?php echo isset($data[0]['telefono']) ? $data[0]['telefono'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
    
        <?
        if ($action == 'edittelefono'):  ?>
            <input type="hidden" name="data[id_sucursal_old]"
                value="<?php echo isset($data[0]['id_sucursal']) ? $data[0]['id_sucursal'] : ''; ?>" class="" />
                <input type="hidden" name="data[id_telefono_old]"
                value="<?php echo isset($data[0]['id_sucurtel']) ? $data[0]['id_sucurtel'] : ''; ?>" class="" />    
        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="sucursal.php">Regresar</a>
</div>