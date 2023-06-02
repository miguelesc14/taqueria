<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> puesto </h1>
<form method="POST" action="usuario.php?action=<?php echo $action; ?>&id=<?php echo $dataUsuario[0]['id_usuario']; ?>">
    <div class="mb-3">
        
        <label for="exampleFormControlInput1" class="form-label">Usuario: </label>
        <input type="text"
                value="<?php echo isset($dataUsuario[0]['correo']) ? $dataUsuario[0]['correo'] : ''; ?>" class="" disabled />
        <input type="hidden" name="data[id_usuario]"
                value="<?php echo isset($dataUsuario[0]['id_usuario']) ? $dataUsuario[0]['id_usuario'] : ''; ?>" class="" />
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Puesto: </label>
            <select name="data[id_puesto]" required="required">
                <?php
                $selected = " ";
                foreach ($dataPuesto as $key => $puesto):
                    if ($puesto['id_puesto'] == $data[0]['id_puesto']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $puesto['id_puesto']; ?>" <?php echo $selected; ?>>
                        <?php echo $puesto['puesto'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>


    </div>
    <div class="mb-3">
    
        <?
        
        if ($action == 'editpuesto'):  ?>
            <input type="hidden" name="data[id_usuario_old]"
                value="<?php echo isset($data[0]['id_usuario']) ? $data[0]['id_usuario'] : ''; ?>" class="" />
                <input type="hidden" name="data[id_puesto_old]"
                value="<?php echo isset($data[0]['id_puesto']) ? $data[0]['id_puesto'] : ''; ?>" class="" />
                <input type="hidden" name="data[id_usuPuesto]"
                value="<?php echo isset($data[0]['id_usuPuesto']) ? $data[0]['id_usuPuesto'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="usuario.php">Regresar</a>
</div>