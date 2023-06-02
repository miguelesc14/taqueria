<h1 class="text-center">Ciudades</h1>
<a href="ciudad.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Ciudad</th>
            <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $ciudad):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $ciudad["ciudad"] ?>
                </th>
                <th scope="row">
                    <?php echo $ciudad["estado"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="ciudad.php?action=edit&id=<?php echo $ciudad["id_ciudad"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="ciudad.php?action=delete&id=<?php echo $ciudad["id_ciudad"] ?>"
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