<h1>Nuevo cliente</h1>
<form method="POST" action="registro.php" enctype="multipart/form-data">
<div class="mb-3">
        <?php

        ?>
        <label for="exampleFormControlInput1" class="form-label">Correo usuario</label>
        <input type="text" name="data[correo]" class="form-control" placeholder="correo"
            value="<?php //echo isset($dataUsuario[0]['correo']) ? $dataUsuario[0]['correo'] : ''; ?>" required/>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
        <input type="password" name="data[contrasena]" class="form-control" placeholder="contraseña"
            value="" required/>
    </div>

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
    <div class="mb-3" id="curp">
<label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
        <input type="date" id="curp_input" name="data[fecha_nacimiento]" class="form-control" placeholder="Fecha de nacimiento"
            value="<?php echo isset($data[0]['fecha_nacimiento']) ? $data[0]['fecha_nacimiento'] : ''; ?>" required/>
    </div>
    <div class="row">
            <label for="data[id_genero]">Genero:</label>
        <div class="col-2">
            
            <select name="data[id_genero]" required="required">
                <?php
                $selected = " ";
                foreach ($dataGenero as $key => $tipo):
                    if ($tipo['id_genero'] == $data[0]['id_genero']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_genero']; ?>" <?php echo $selected; ?>>
                    <?php //$fin = $_POST['id_ingsec'];
                     ?>
                        <?php echo $tipo['genero'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    
    


    <div>
        <label>Foto:</label>
    </div>
    <div>
    <div class="col-12">
            <input type="file" name="fotografia" class="form-control"
                value='<?php echo isset($data[0]['imagen_perfil']) ? $data[0]['imagen_perfil'] : ''; ?>' />
        </div>
    </div>
    
    <div class="mb-3" id="curp">
<?php $fecha_actual = date("Y-m-d H:i:s"); ?>
        <input type="hidden" id="curp_input" name="data[fecha_registro]" class="form-control" placeholder="Fecha de nacimiento"
            value="<?php echo $fecha_actual; ?>" />

    <div class="mb-3">

        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>