<h1 class="text-center">Telefonos de <?php echo $dataSucursal[0]['nombre']; ?></h1>
<a href="sucursal.php?action=newtelefono&id=<?php echo $dataSucursal[0]['id_sucursal']; ?>" class="btn btn-success">Agregar</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">Telefono</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $priv):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $priv["telefono"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="sucursal.php?action=edittelefono&id=<?php echo $dataSucursal[0]["id_sucursal"] ?>&id_telefono=<?php echo $priv['id_sucurtel'] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="sucursal.php?action=deletetelefono&id=<?php echo $dataSucursal[0]["id_sucursal"] ?>&id_telefono=<?php echo $priv['id_sucurtel'] ?>"
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