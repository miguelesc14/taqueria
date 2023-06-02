<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> empleado</h1>
<?php if(isset($usr)): ?>
    <form method="POST" enctype="multipart/form-data" action="personal.php?action=<?php echo $action; ?>&id_usuario=<?php echo $usr ?>" >
<?php else: ?>
    <form method="POST" enctype="multipart/form-data" action="personal.php?action=<?php echo $action; ?>" >
<?php endif; ?>
<div class="mb-3" id="nombre">
        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
        <input type="text" name="data[nombre]" class="form-control" placeholder="primer nombre"
            value="<?php echo isset($data[0]['nombre']) ? $data[0]['nombre'] : ''; ?>"  required/>
    </div>
    <div class="mb-3" id="segundo_nombre">
        <label for="exampleFormControlInput1" class="form-label">Segundo nombre</label>
        <input type="text" name="data[segundo_nombre]" class="form-control" placeholder="segundo nombre"
            value="<?php echo isset($data[0]['segundo_nombre']) ? $data[0]['segundo_nombre'] : ''; ?>" />
    </div>
    <div class="mb-3" id="apellido">
        <label for="exampleFormControlInput1" class="form-label">Primer apellido</label>
        <input type="text" name="data[primer_apellido]" class="form-control" placeholder="primer apellido"
            value="<?php echo isset($data[0]['primer_apellido']) ? $data[0]['primer_apellido'] : ''; ?>" />
    </div>
    <div class="mb-3" id="segundo_apellido">
        <label for="exampleFormControlInput1" class="form-label">Segundo apellido</label>
        <input type="text" name="data[segundo_apellido]" class="form-control" placeholder="segundo apellido"
            value="<?php echo isset($data[0]['segundo_apellido']) ? $data[0]['segundo_apellido'] : ''; ?>" />
    </div>
    <div class="row">
    <label for="exampleFormControlInput1" class="form-label">Genero</label>
        <div class="col-2">
            <select name="data[id_genero]" required="required">
                <?php
                $selected = " ";
                foreach ($dataGenero as $key => $depto):
                    if ($depto['id_genero'] == $data[0]['id_genero']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $depto['id_genero']; ?>" <?php echo $selected; ?>>
                        <?php echo $depto['genero'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="mb-3" id="curp">
<label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
        <input type="date" id="curp_input" name="data[fecha_nacimiento]" class="form-control" placeholder="Fecha de nacimiento"
            value="<?php echo isset($data[0]['fecha_nacimiento']) ? $data[0]['fecha_nacimiento'] : ''; ?>" required/>
    </div>
    <div class="mb-3" id="curp">
<label for="exampleFormControlInput1" class="form-label">Fecha de contratacion</label>
        <input type="date" id="curp_input" name="data[fecha_contratacion]" class="form-control" placeholder="Fecha de nacimiento"
            value="<?php echo isset($data[0]['fecha_contratacion']) ? $data[0]['fecha_contratacion'] : ''; ?>" required/>
    </div>
    <div class="mb-3" id="rfc">
        <label for="exampleFormControlInput1" class="form-label">RFC</label>
        <input type="text" name="data[RFC]" class="form-control" placeholder="RFC"
            value="<?php echo isset($data[0]['RFC']) ? $data[0]['RFC'] : ''; ?>" required />
    </div>
    <div class="mb-3" id="curp">
<label for="exampleFormControlInput1" class="form-label">CURP</label>
        <input type="text" id="curp_input" name="data[CURP]" class="form-control" placeholder="CURP"
            value="<?php echo isset($data[0]['CURP']) ? $data[0]['CURP'] : ''; ?>" required/>
    </div>

    <div class="row">
    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
        <?php  if(isset($usr)):?>
            <div class="col-2">
            <input type="text" required disabled value="<?php $usr; ?>" placeholder="<?php echo $_SESSION['correo']; ?>" />
            <input type="hidden" name="data[id_usuario]" value="<?php echo $usr; ?>"/>
        </div>
        <?php else: ?>    
        <div class="col-2">
            <select name="data[id_usuario]" required="required">
                <?php
                $selected = " ";
                foreach ($dataUsuario as $key => $depto):
                    if ($depto['id_usuario'] == $data[0]['id_usuario']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $depto['id_usuario']; ?>" <?php echo $selected; ?>>
                        <?php echo $depto['correo'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
    </div>
    <div class="row">
    <label for="exampleFormControlInput1" class="form-label">Sucursal</label>
        <div class="col-2">
            <select name="data[id_sucursal]" required="required">
                <?php
                $selected = " ";
                foreach ($dataSucursal as $key => $depto):
                    if ($depto['id_sucursal'] == $data[0]['id_sucursal']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $depto['id_sucursal']; ?>" <?php echo $selected; ?>>
                        <?php echo $depto['sucurs'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
    <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
        <div class="col-2">
            <select name="data[id_ciudad]" required="required">
                <?php
                $selected = " ";
                foreach ($dataCiudad as $key => $tipo):
                    if ($tipo['id_ciudad'] == $data[0]['id_ciudad']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_ciudad']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['ciudad'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>


    <div class="row">
            <div class="col-lg-6" align="center">
                <label>Capturar foto de perfil</label>
                <div id="my_camera" class="pre_capture_frame"></div>
                <input type="hidden" name="data[foto]" class="form-control" id="data[foto]">
                <br>
                <input type="button" class="btn btn-info btn-round btn-file" value="Take Snapshot" onClick="take_snapshot()">
            </div>
            <div class="col-lg-6" align="center">
                <label><?php echo ($action == 'edit') ? 'Foto Actual ' : 'Foto Capturada ' ?></label>
                <div id="results">
                    <img id="captured_image" width="350px" height="287px" class="after_capture_frame" src="<?php echo isset($data[0]['foto']) ? $data[0]['foto'] : '../images/perfil.png' ?>" />
                </div>
            </div>
        </div><!--  end row -->





    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_personal]"
                value="<?php echo isset($data[0]['id_personal']) ? $data[0]['id_personal'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
<script language="JavaScript" src="../js/camara.js"></script>
<script language="JavaScript" src="../js/curp_rfc.js"></script>

<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>