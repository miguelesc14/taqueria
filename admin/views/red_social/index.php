<h1 class="text-center">Redes sociales</h1>
<a href="red_social.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Red social</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $red_social):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $red_social["red_social"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="red_social.php?action=edit&id=<?php echo $red_social["id_red"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="red_social.php?action=delete&id=<?php echo $red_social["id_red"] ?>"
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