<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> estado</h1>
<form method="POST" action="estado.php?action=<?php echo $action; ?>">
    <div class="row">
        <div class="col-2">
            <label for="estado">Estado:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="estado" name="data[estado]"
            value="<?php echo isset($data[0]['estado']) ? $data[0]['estado'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="estado">País:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_pais]" required="required">
                <?php
                $selected = " ";
                foreach ($dataPais as $key => $tipo):
                    if ($tipo['id_pais'] == $data[0]['id_pais']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_pais']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['pais'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_estado]"
                value="<?php echo isset($data[0]['id_estado']) ? $data[0]['id_estado'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>