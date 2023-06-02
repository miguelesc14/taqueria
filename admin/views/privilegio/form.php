<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> privilegio</h1>

<form method="POST" action="privilegio.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormContprivilegioInput1" class="form-label">Nombre privilegio</label>
        <input type="text" name="data[privilegio]" class="form-control" placeholder="privilegio"
            value="<?php echo isset($data[0]['privilegio']) ? $data[0]['privilegio'] : ''; ?>" />
    </div>
    <div class="mb-3">
    <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_privilegio]"
                value="<?php echo isset($data[0]['id_privilegio']) ? $data[0]['id_privilegio'] : ''; ?>" class="" />

        <? endif; ?>

        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>