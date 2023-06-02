<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> sucursal</h1>
<form method="POST" action="sucursal.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre sucursal</label>
        <input type="text" name="data[nombre]" class="form-control"
            value="<?php echo isset($data[0]['sucurs']) ? $data[0]['sucurs'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Dirección</label>
        <input type="text" name="data[direccion]" class="form-control"
            value="<?php echo isset($data[0]['direccion']) ? $data[0]['direccion'] : ''; ?>" />
    </div>
    <div class="row">
        <div class="col-2">
            <label for="estado">Ciudad:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_ciudad]" required="required">
                <?php
                $selected = " ";
                foreach ($dataCiudad as $key => $tipo):
                    if ($tipo['id_ciudad'] == $data[0]['id_ciudad']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_ciudad']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['ciudad'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Link del mapa</label>
        <input type="text" name="data[mapa]" class="form-control"
            value="<?php echo isset($data[0]['mapa']) ? $data[0]['mapa'] : ''; ?>" />
    </div>
    <div class="row">
        <div class="col-2">
            <label for="estado">Tipo de horario:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_tipohorario]" required="required">
                <?php
                $selected = " ";
                foreach ($dataTipoH as $key => $tipo):
                    if ($tipo['id_tipohorario'] == $data[0]['id_tipohorario']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_tipohorario']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['nombre'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_sucursal]"
                value="<?php echo isset($data[0]['id_sucursal']) ? $data[0]['id_sucursal'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="sucursal.php">Regresar</a>
</div>