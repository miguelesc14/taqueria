<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> red </h1>
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
            <label for="data[id_red]">Red:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_red]" required="required">
                <?php
                $selected = " ";
                foreach ($dataRed as $key => $tipo):
                    if ($tipo['id_red'] == $data[0]['id_red']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_red']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['red_social'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="dias">Enlace:</label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="red" name="data[enlace]"
            value="<?php echo isset($data[0]['enlace']) ? $data[0]['enlace'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
    
        <?
        if ($action == 'editred'):  ?>
            <input type="hidden" name="data[id_sucursal_old]"
                value="<?php echo isset($data[0]['id_sucursal']) ? $data[0]['id_sucursal'] : ''; ?>" class="" />
                <input type="hidden" name="data[id_red_old]"
                value="<?php echo isset($data[0]['id_sucurred']) ? $data[0]['id_sucurred'] : ''; ?>" class="" />    
        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="sucursal.php">Regresar</a>
</div>