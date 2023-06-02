<h1 class="text-center">Redes de <?php echo $dataSucursal[0]['nombre']; ?></h1>
<a href="sucursal.php?action=newred&id=<?php echo $dataSucursal[0]['id_sucursal']; ?>" class="btn btn-success">Agregar</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">Red</th>
            <th scope="col">Enlace</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $priv):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $priv["red_social"] ?>
                </th>
                <th scope="row">
                    <?php echo $priv["enlace"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="sucursal.php?action=editred&id=<?php echo $dataSucursal[0]["id_sucursal"] ?>&id_red=<?php echo $priv['id_sucurred'] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="sucursal.php?action=deletered&id=<?php echo $dataSucursal[0]["id_sucursal"] ?>&id_red=<?php echo $priv['id_sucurred'] ?>"
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
            <a class="btn btn-lg btn-primary" href="sucursal.php">Regresar</a>
</div>