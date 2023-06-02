<h1 class="text-center">Tipos de horarios</h1>
<a href="tipo_horario.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Nombre</th>
            <th scope="col">Dias</th>
            <th scope="col">Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $tipo_horario):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $tipo_horario["nombre"] ?>
                </th>
                <th scope="row">
                    <?php echo $tipo_horario["dias"] ?>
                </th>
                <th scope="row">
                    <?php echo $tipo_horario["hora"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="tipo_horario.php?action=edit&id=<?php echo $tipo_horario["id_tipohorario"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="tipo_horario.php?action=delete&id=<?php echo $tipo_horario["id_tipohorario"] ?>"
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