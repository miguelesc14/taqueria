<h1 class="text-center">Generos</h1>
<a href="genero.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Genero</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $genero):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $genero["genero"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="genero.php?action=edit&id=<?php echo $genero["id_genero"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="genero.php?action=delete&id=<?php echo $genero["id_genero"] ?>"
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