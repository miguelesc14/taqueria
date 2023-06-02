<h1 class="text-center">Puestos</h1>
<a href="puesto.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">puesto</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $puesto):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $puesto["id_puesto"] ?>
                </th>
                <th scope="row">
                    <?php echo $puesto["puesto"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="puesto.php?action=privilegios&id=<?php echo $puesto["id_puesto"] ?>"
                            type="button" class="btn btn-dark">Privilegios</a>
                        <a href="puesto.php?action=edit&id=<?php echo $puesto["id_puesto"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="puesto.php?action=delete&id=<?php echo $puesto["id_puesto"] ?>"
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