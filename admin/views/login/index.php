<?php
include('views/header.php');
include('views/menu.php');


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
                <div class="col">
                <div class="card bg-transparent border my-3 my-md-0">
                    <div style="margin: 5%;">
                    <form method="POST" action="login.php?action=login">
                        <div class="form-outline mb-4">
                        <input type="email" id="form3Example3" name="correo" class="form-control" required/>
                        <label class="form-label" for="form3Example3">Correo electrónico</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <input type="password" id="form3Example4" name="contrasena" class="form-control" required/>
                        <label class="form-label" for="form3Example4">Contraseña</label>
                        </div>

                        <div class="form-check d-flex justify-content-center mb-4">
                        <label class="form-check-label" for="form2Example33">
                            ¿No tienes cuenta? <a href='registro.php' class='linke'>Registrate</a>
                        </label>
                        </div>

                        <div class="form-check d-flex justify-content-center mb-4">
                        <label class="form-check-label" for="form2Example33">
                        <a href="login.php?action=forgot" class='linke'>¿Olvidaste tu contraseña?</a>
                        </label>
                        </div>


                        <!-- Submit button -->
                        <input type="submit" name="enviar" value="Ingresar" class="btn btn-lg btn-primary">
                    </form>
                        </div>
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