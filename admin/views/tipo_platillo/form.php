<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> tipo de horario</h1>
<form method="POST" action="tipo_platillo.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="tipo_platillo">Tipo de platillo:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="nombre" name="data[nombre]"
            value="<?php echo isset($data[0]['nombre']) ? $data[0]['nombre'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="dias">Descripcion:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input type="text" class="" id="dias" name="data[descripcion]"
            value="<?php echo isset($data[0]['descripcion']) ? $data[0]['descripcion'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_tipoplatillo]"
                value="<?php echo isset($data[0]['id_tipoplatillo']) ? $data[0]['id_tipoplatillo'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>