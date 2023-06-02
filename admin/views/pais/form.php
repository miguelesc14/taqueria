<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> país</h1>
<form method="POST" action="pais.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="pais">Pais:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="pais" name="data[pais]"
            value="<?php echo isset($data[0]['pais']) ? $data[0]['pais'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_pais]"
                value="<?php echo isset($data[0]['id_pais']) ? $data[0]['id_pais'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>