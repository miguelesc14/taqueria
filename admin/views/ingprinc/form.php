<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> ingredientes principales</h1>
<form method="POST" action="ingprinc.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="ingprinc">Ingrediente principal:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="nombre" name="data[nombre]"
            value="<?php echo isset($data[0]['nombre']) ? $data[0]['nombre'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_ingprinc]"
                value="<?php echo isset($data[0]['id_ingprinc']) ? $data[0]['id_ingprinc'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>