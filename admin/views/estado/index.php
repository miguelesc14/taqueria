<h1 class="text-center">Estados</h1>
<a href="estado.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Estado</th>
            <th scope="col">Pais</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $estado):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $estado["estado"] ?>
                </th>
                <th scope="row">
                    <?php echo $estado["pais"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="estado.php?action=edit&id=<?php echo $estado["id_estado"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="estado.php?action=delete&id=<?php echo $estado["id_estado"] ?>"
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