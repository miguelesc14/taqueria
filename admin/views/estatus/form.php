<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> estatus</h1>
<form method="POST" action="estatus.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="estatus">Estatus:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="estatus" name="data[estatus]"
            value="<?php echo isset($data[0]['estatus']) ? $data[0]['estatus'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_estatus]"
                value="<?php echo isset($data[0]['id_estatus']) ? $data[0]['id_estatus'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>