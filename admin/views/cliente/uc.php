<h1 class="text-center">Mis ubicaciones</h1>
<a href="clientebyuser.php?action=newuc&id=<?php echo $_SESSION['id_usuario'];?>" class="btn btn-success">Agregar ubicación</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Dirección</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $priv):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $priv["ciudad"] ?>
                </th>
                <th scope="row">
                    <?php echo $priv["direccion"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="clientebyuser.php?action=edituc&id=<?php echo $_SESSION['id_usuario'];?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="clientebyuser.php?action=deleteuc&id=<?php echo $_SESSION['id_usuario'];?>"
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
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>