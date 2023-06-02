<h1 class="text-center">Plantilla del cliente</h1>
<a href="cliente.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Nombre</th>
            <th scope="col">Nacimiento</th>
            <th scope="col">Genero</th>
            <th scope="col">Registro</th>
            <th scope="col">Usuario</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $cliente):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <img src = "<?php echo $cliente["imagen_perfil"] ?>" height="128px", width="128px" class="redonded-circle" alt = "<?php echo $cliente["imagen_perfil"] ?>">    
                </th>
                <th scope="row">
                    <?php echo $cliente["cliente"] ?>
                </th>
                <th scope="row">
                    <?php echo $cliente["fecha_nacimiento"] ?>
                </th>
                <th scope="row">
                    <?php echo $cliente["genero"] ?>
                </th>
                <th scope="row">
                    <?php echo $cliente["fecha_registro"] ?>
                </th>
                <th scope="row">
                    <?php echo $cliente["correo"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="cliente.php?action=edit&id=<?php echo $cliente["id_cliente"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="cliente.php?action=delete&id=<?php echo $cliente["id_cliente"] ?>"
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