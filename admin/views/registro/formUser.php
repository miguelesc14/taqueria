<h1>Nuevo usuario</h1>
<form method="POST" action="registro.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <?php

        ?>
        <label for="exampleFormControlInput1" class="form-label">Correo usuario</label>
        <input type="text" name="data[correo]" class="form-control" placeholder="correo"
            value="<?php echo isset($dataUsuario[0]['correo']) ? $dataUsuario[0]['correo'] : ''; ?>" required/>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
        <input type="password" name="data[contrasena]" class="form-control" placeholder="contraseña"
            value="" required/>
    </div>
    <?php
    if($action=='edit'): ?>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nueva contraseña (dejar en blanco si no se desea cambiar).</label>
            <input type="password" name="data[new_contrasena]" class="form-control" placeholder="nueva contraseña"
                value=""/>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_usuario]"
                value="<?php echo isset($dataUsuario[0]['id_usuario']) ? $dataUsuario[0]['id_usuario'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>