<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Red socials</h1>
<form method="POST" action="red_social.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="red_social">Red social:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="red_social" name="data[red_social]"
            value="<?php echo isset($data[0]['red_social']) ? $data[0]['red_social'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_red]"
                value="<?php echo isset($data[0]['id_red']) ? $data[0]['id_red'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>