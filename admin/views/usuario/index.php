<h1 class="text-center">Usuarios</h1>
<a href="usuario.php?action=new" class="btn btn-success">Nuevo</a>
<a href="usuario.php?action=getTree" class="btn btn-success">Ver en vista de arbol</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">usuario</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nReg = 0;
        foreach ($data as $key => $usuario):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $usuario["id_usuario"] ?>
                </th>
                <th scope="row">
                    <?php echo $usuario["correo"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="usuario.php?action=puestos&id=<?php echo $usuario["id_usuario"] ?>"
                            type="button" class="btn btn-dark">Puestos</a>
                        <a href="usuario.php?action=edit&id=<?php echo $usuario["id_usuario"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="usuario.php?action=delete&id=<?php echo $usuario["id_usuario"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </th>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
    </tbody>
</table>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>