<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> ciudad</h1>
<form method="POST" action="ciudad.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="ciudad">Ciudad:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="ciudad" name="data[ciudad]"
            value="<?php echo isset($data[0]['ciudad']) ? $data[0]['ciudad'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="ciudad">País:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_estado]" required="required">
                <?php
                $selected = " ";
                foreach ($dataEstado as $key => $tipo):
                    if ($tipo['id_estado'] == $data[0]['id_estado']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_estado']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['estado'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_ciudad]"
                value="<?php echo isset($data[0]['id_ciudad']) ? $data[0]['id_ciudad'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>