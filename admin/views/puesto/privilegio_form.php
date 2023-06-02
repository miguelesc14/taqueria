<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> privilegio </h1>
<form method="POST" action="puesto.php?action=<?php echo $action; ?>&id=<?php echo $dataPuesto[0]['id_puesto']; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Puesto: </label>
        <input type="text"
                value="<?php echo isset($dataPuesto[0]['puesto']) ? $dataPuesto[0]['puesto'] : ''; ?>" class="" disabled />
        <input type="hidden" name="data[id_puesto]"
                value="<?php echo isset($dataPuesto[0]['id_puesto']) ? $dataPuesto[0]['id_puesto'] : ''; ?>" class="" />
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Privilegio: </label>
            <select name="data[id_privilegio]" required="required">
                <?php
                $selected = " ";
                foreach ($dataPrivilegio as $key => $privilegio):
                    if ($privilegio['id_privilegio'] == $data[0]['id_privilegio']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $privilegio['id_privilegio']; ?>" <?php echo $selected; ?>>
                        <?php echo $privilegio['privilegio'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>


    </div>
    <div class="mb-3">
    
        <?
        if ($action == 'editprivilegio'):  ?>
            <input type="hidden" name="data[id_puesto_old]"
                value="<?php echo isset($data[0]['id_puesto']) ? $data[0]['id_puesto'] : ''; ?>" class="" />
                <input type="hidden" name="data[id_privilegio_old]"
                value="<?php echo isset($data[0]['id_privilegio']) ? $data[0]['id_privilegio'] : ''; ?>" class="" />
                <input type="hidden" name="data[id_puestoPriv]"
                value="<?php echo isset($data[0]['id_puestoPriv']) ? $data[0]['id_puestoPriv'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="puesto.php">Regresar</a>
</div>