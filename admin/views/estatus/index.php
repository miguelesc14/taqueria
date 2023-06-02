<h1 class="text-center">Estatus</h1>
<a href="estatus.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Estatus</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $estatus):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $estatus["estatus"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="estatus.php?action=edit&id=<?php echo $estatus["id_estatus"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="estatus.php?action=delete&id=<?php echo $estatus["id_estatus"] ?>"
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