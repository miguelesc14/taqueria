<h1 class="text-center">Privilegios de <?php echo $dataPuesto[0]['puesto']; ?></h1>
<a href="puesto.php?action=newprivilegio&id=<?php echo $data[0]['id_puesto']; ?>" class="btn btn-success">Agregar</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">privilegio</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $priv):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $priv["id_privilegio"] ?>
                </th>
                <th scope="row">
                    <?php echo $priv["privilegio"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="puesto.php?action=editprivilegio&id=<?php echo $dataPuesto[0]["id_puesto"] ?>&id_privilegio=<?php echo $priv["id_privilegio"]; ?>""
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="puesto.php?action=deleteprivilegio&id=<?php echo $dataPuesto[0]["id_puesto"] ?>&id_privilegio=<?php echo $priv["id_privilegio"]; ?>"
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
            <a class="btn btn-lg btn-primary" href="puesto.php">Regresar</a>
</div>