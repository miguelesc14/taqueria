<h1 class="text-center">Mi perfil</h1>


<br>

<section>
    <div class="row">
    <div class="col-1">
        &nbsp;
    </div>
        <div class="col">
        <h2>Datos guardados:</h2>
        <table class="table table-responsive table-bordered">
            <tr>
                <th><h3>Nombre: </h3></th>
                <th>&nbsp; <?php echo $data[0]['cliente']; ?></th>
            </tr>
            <tr>
                <th><h3>Correo: </h3></th>
                <th>&nbsp; <?php echo $data[0]['correo']; ?></th>
            </tr>
            <tr>
                <th><h3>Fecha de nacimiento: </h3></th>
                <th>&nbsp; <?php echo $data[0]['fecha_nacimiento']; ?></th>
            </tr>
            <tr>
                <th><h3>Genero: </h3></th>
                <th>&nbsp; <?php echo $data[0]['genero']; ?></th>
            </tr>
            <tr>
                <th><h3>Fecha de registro: </h3></th>
                <th>&nbsp; <?php echo $data[0]['fecha_registro']; ?></th>
            </tr>
        </table>
        </div>
        <div class="col">
            <h2>Imagen de perfil:</h2>
        <img src = "<?php echo $data[0]["imagen_perfil"] ?>" height="128px", width="128px" class="redonded-circle" alt = "<?php echo $data[0]["imagen_perfil"] ?>">
        </div>
    </div>
    <div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col-1">
    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="clientebyuser.php?action=uc&id=<?php echo $_SESSION['id_usuario'];?>"
                            type="button" class="btn btn-dark">Mis ubicaciones</a>
    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="clientebyuser.php?action=edit&id=<?php echo $_SESSION['id_usuario'];?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="clientebyuser.php?action=deletebyuser&id=<?php echo $_SESSION['id_usuario'];?>&id_cliente=<?php echo $data[0]["id_cliente"]; ?>"
                            type="button" class="btn btn-danger">Eliminar cuenta</a>
                    </div>
    </div>
</div> 
    <div class="col">
        &nbsp;
    </div>
</section>
<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>