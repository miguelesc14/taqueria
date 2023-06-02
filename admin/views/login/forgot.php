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
                <div class="card">
                    <div class="card-body py-5 px-md-5">
                    <form method="POST" action="login.php?action=send">
                    <div class="form-outline mb-4">
            <input type="email" id="form1Example13" name="correo" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example13">Dirección de Email a recuperar</label>
          </div>
          <!-- Submit button -->
          <input type="submit" name="enviar" value="Recuperar" class="read_more">
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



<?php


?>
<div class="col">
            <a class="btn btn-lg btn-primary" href="login.php">Regresar</a>
</div>