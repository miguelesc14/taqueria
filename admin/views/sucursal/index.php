<h1 class="text-center">Sucursales</h1>
<a href="sucursal.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">Sucursal</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Horario</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $sucursal):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $sucursal["sucurs"] ?>
                </th>
                <th scope="row">
                    <?php echo $sucursal["direccion"].', '.$sucursal['ciudad'].', '.$sucursal['estado'].', '.$sucursal['pais'] ?>
                </th>
                <th scope="row">
                    <?php echo $sucursal["ciudad"].', '.$sucursal["estado"].','.$sucursal["pais"] ?>
                </th>
                <th scope="row">
                    <?php echo $sucursal["tipo"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="sucursal.php?action=correos&id=<?php echo $sucursal["id_sucursal"] ?>"
                            type="button" class="btn btn-dark">Correos</a>
                        <a href="sucursal.php?action=telefonos&id=<?php echo $sucursal["id_sucursal"] ?>"
                            type="button" class="btn btn-dark">Telefonos</a>
                        <a href="sucursal.php?action=redes&id=<?php echo $sucursal["id_sucursal"] ?>"
                            type="button" class="btn btn-dark">Redes</a>            
                        <a href="sucursal.php?action=edit&id=<?php echo $sucursal["id_sucursal"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="sucursal.php?action=delete&id=<?php echo $sucursal["id_sucursal"] ?>"
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