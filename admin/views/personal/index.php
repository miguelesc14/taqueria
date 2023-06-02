<h1 class="text-center">Plantilla del personal</h1>
<?php if(isset($usr)):?>

<?php else: ?>
    <a href="personal.php?action=new" class="btn btn-success">Nuevo</a>
<?php endif; ?>    
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">    </th>
            <th scope="col">Nombre</th>
            <th scope="col">Nacimiento</th>
            <th scope="col">Genero</th>
            <th scope="col">Contratacion</th>
            <th scope="col">RFC</th>
            <th scope="col">CURP</th>
            <th scope="col">Usuario</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Origen</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $personal):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <img src = "<?php echo $personal["imagen_perfil"] ?>" height="128px", width="128px" class="redonded-circle" alt = "<?php echo $personal["imagen_perfil"] ?>">    
                </th>
                <th scope="row">
                    <?php echo $personal["personal"] ?>
                </th>
                <th scope="row">
                    <?php echo $personal["fecha_nacimiento"] ?>
                </th>
                <th scope="row">
                    <?php echo $personal["genero"] ?>
                </th>
                <th scope="row">
                    <?php echo $personal["fecha_contratacion"] ?>
                </th>
                <th scope="row">
                    <?php echo $personal["RFC"] ?>
                </th>
                <th scope="row">
                    <?php echo $personal["CURP"] ?>
                </th>
                <th scope="row">
                    <?php echo $personal["correo"] ?>
                </th>
                <th scope="row">
                    <?php echo $personal["sucursal"] ?>
                </th>
                <th scope="row">
                    <?php echo $personal["ciudad"].', '.$personal["estado"].', '.$personal['pais'] ?>
                </th>
                <th>
                    <?php if(isset($usr)): ?>
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="personal.php?action=edit&id=<?php echo $personal["id_personal"] ?>&id_usuario=<?php echo $usr ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                    </div>
                    <?php else: ?>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="personal.php?action=edit&id=<?php echo $personal["id_personal"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="personal.php?action=delete&id=<?php echo $personal["id_personal"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                    <?php endif; ?>
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