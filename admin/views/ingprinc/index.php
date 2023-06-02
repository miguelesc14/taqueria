<h1 class="text-center">Ingredientes principales</h1>
<a href="ingprinc.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Ingrediente principal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $ingprinc):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $ingprinc["nombre"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="ingprinc.php?action=edit&id=<?php echo $ingprinc["id_ingprinc"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="ingprinc.php?action=delete&id=<?php echo $ingprinc["id_ingprinc"] ?>"
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