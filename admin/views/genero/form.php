<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> generos</h1>
<form method="POST" action="genero.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="genero">Genero:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="genero" name="data[genero]"
            value="<?php echo isset($data[0]['genero']) ? $data[0]['genero'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_genero]"
                value="<?php echo isset($data[0]['id_genero']) ? $data[0]['id_genero'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>