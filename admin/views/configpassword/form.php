<?php


?>
<div id="services" class="service">
<div class="container-fluid">
    <div class="row">
        &nbsp;
    </div>
   <div class="row">
        <div class='col-1'>
                    &nbsp;
                </div>
                <div class="col">
                <div class="card">
                    <div class="card-body py-5 px-md-5">
                    <form method="POST" action="configpassword.php">
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <input type="password" id="form3Example3" name="contrasena_actual" class="form-control" required/>
                        <label class="form-label" for="form3Example3">Contraseña actual</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <input type="password" id="form3Example4" name="nueva_contrasena" class="form-control" required/>
                        <label class="form-label" for="form3Example4">Nueva contraseña</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <input type="password" id="form3Example4" name="repetir_contrasena" class="form-control" required/>
                        <label class="form-label" for="form3Example4">Repetir contraseña</label>
                        </div>

                        <!-- Submit button -->
                        <input type="submit" name="enviar" value="Ingresar" class="read_more">
                    </form>
                    </div>
                </div>
                </div>
                <div class='col-1'>
                    &nbsp;
                </div>
        </div>
    <div class="row">
        &nbsp;
    </div>
    </div>
</div>

<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>

<?php


?>