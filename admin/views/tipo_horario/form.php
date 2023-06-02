<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> tipo de horario</h1>
<form method="POST" action="tipo_horario.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="tipo_horario">Tipo de horario:</label>
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
            <label for="dias">Dias:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="dias" name="data[dias]"
            value="<?php echo isset($data[0]['dias']) ? $data[0]['dias'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="dias">Horas:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="hora" name="data[hora]"
            value="<?php echo isset($data[0]['hora']) ? $data[0]['hora'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_tipohorario]"
                value="<?php echo isset($data[0]['id_tipohorario']) ? $data[0]['id_tipohorario'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>