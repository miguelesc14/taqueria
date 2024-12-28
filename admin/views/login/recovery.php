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
                <div class="card bg-transparent border my-3 my-md-0">
                    <div style="margin: 5%;">
                    <form method="POST" action="login.php?action=reset">
          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" name="contrasena" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Nueva Contraseña</label>
          </div>
          <input type="hidden" name="correo" value="<?php echo $data['correo']; ?>" />
          <input type="hidden" name="token" value="<?php echo $data['token']; ?>" />
          <!-- Submit button -->
          <input type="submit" name="enviar" value="Restablecer Contraseña" class="btn btn-primary btn-lg btn-block">
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