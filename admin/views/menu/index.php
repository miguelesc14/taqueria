<h1 class="text-center">Platillos</h1>
<a href="menu.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Platillo</th>
            <th scope="col">Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $platillo):
            $nReg++; ?>
            <tr>
            <th scope="row">
                    <img src = "<?php echo '../'.$platillo["imagen"] ?> "height="128px", width="128px" class="redonded-circle">
                    
                </th>
                <th scope="row">
                    <?php echo $platillo["nombre"] ?>
                </th>
                <th scope="row">
                    <?php echo $platillo["precio"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="menu.php?action=edit&id=<?php echo $platillo["id_platillo"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="menu.php?action=delete&id=<?php echo $platillo["id_platillo"] ?>"
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