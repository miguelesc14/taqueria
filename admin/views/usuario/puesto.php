<h1 class="text-center">Puestos de <?php echo $dataUsuario[0]['correo']; ?></h1>
<a href="usuario.php?action=newpuesto&id=<?php echo $dataUsuario[0]['id_usuario']; ?>" class="btn btn-success">Agregar</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">puesto</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $priv):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $priv["id_puesto"] ?>
                </th>
                <th scope="row">
                    <?php echo $priv["puesto"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="usuario.php?action=editpuesto&id=<?php echo $dataUsuario[0]["id_usuario"] ?>&id_puesto=<?php echo $priv["id_puesto"]; ?>""
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="usuario.php?action=deletepuesto&id=<?php echo $dataUsuario[0]["id_usuario"] ?>&id_puesto=<?php echo $priv["id_puesto"]; ?>"
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
            <a class="btn btn-lg btn-primary" href="usuario.php">Regresar</a>
</div>