<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> correo </h1>
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
            <label for="dias">Correo:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="correo" name="data[correo]"
            value="<?php if($action=='editcorreo'){
             echo isset($data[0]['correo']) ? $data[0]['correo'] : '';    
            }?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
    
        <?
        if ($action == 'editcorreo'):  ?>
            <input type="hidden" name="data[id_sucursal_old]"
                value="<?php echo isset($data[0]['id_sucursal']) ? $data[0]['id_sucursal'] : ''; ?>" class="" />
                <input type="hidden" name="data[id_correo_old]"
                value="<?php echo isset($data[0]['id_sucurcorreo']) ? $data[0]['id_sucurcorreo'] : ''; ?>" class="" />    
        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="sucursal.php">Regresar</a>
</div>