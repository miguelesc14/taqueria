<h1><?php echo ($action == 'edit')?'Modificar datos':'Nueva cuenta' ;?></h1>
<form method="POST" enctype="multipart/form-data" action="clientebyuser.php?action=<?php echo $action; ?>&id=<?php echo $_SESSION['id_usuario'];?>">
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
                <th>&nbsp; <input type="text" name="data[nombre]" class="form-control" placeholder="primer nombre"
            value="<?php echo isset($data[0]['nombre']) ? $data[0]['nombre'] : ''; ?>" ></th>
            </tr>
            <tr>
                <th><h3>Segundo nombre: </h3></th>
                <th>&nbsp; <input type="text" name="data[segundo_nombre]" class="form-control" placeholder="segundo nombre"
            value="<?php echo isset($data[0]['segundo_nombre']) ? $data[0]['segundo_nombre'] : ''; ?>" ></th>
            </tr>
            <tr>
                <th><h3>Primer apellido: </h3></th>
                <th>&nbsp; <input type="text" name="data[primer_apellido]" class="form-control" placeholder="primer apellido"
            value="<?php echo isset($data[0]['primer_apellido']) ? $data[0]['primer_apellido'] : ''; ?>" ></th>
            </tr>
            <tr>
                <th><h3>Segundo apellido: </h3></th>
                <th>&nbsp; <input type="text" name="data[segundo_apellido]" class="form-control" placeholder="segundo apellido"
            value="<?php echo isset($data[0]['segundo_apellido']) ? $data[0]['segundo_apellido'] : ''; ?>" ></th>
            </tr>
            <tr>
                <th><h3>Fecha de nacimiento: </h3></th>
                <th>&nbsp; <input type="date" id="curp_input" name="data[fecha_nacimiento]" class="form-control" placeholder="Fecha de nacimiento"
            value="<?php echo isset($data[0]['fecha_nacimiento']) ? $data[0]['fecha_nacimiento'] : ''; ?>" required/></th>
            </tr>
            <tr>
                <th><h3>Genero: </h3></th>
                <th>&nbsp; <select name="data[id_genero]" required="required">
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
            </select></th>
            </tr>
        </table>
        </div>
        <div class="col">
            <div class="row">
            <h2>Imagen de perfil:</h2>
        
        <?php if ($action == 'edit'): ?>

        <a href="<?php echo $data[0]['imagen_perfil']?>" target="_blank">
        <img src = "<?php echo $data[0]["imagen_perfil"] ?>" height="128px", width="128px" class="redonded-circle" alt = "<?php echo $data[0]["imagen_perfil"] ?>">
        </a>
        </div>
        <div class="row">
        <div>

<label>Foto:</label>

    <?php endif;?>
        <input type="file" name="fotografia" class="form-control"
            value='<?php echo isset($data[0]['imagen_perfil']) ? $data[0]['imagen_perfil'] : ''; ?>' />
    </div>
        </div>
    </div>
    
    </div>
                    
    </div>
    </div>
    <div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col-1">
    <input type="submit" name="enviar" value="Guardar" class="read_more" />
    </div>
</div> 
    <div class="col">
        &nbsp;
    </div>
</section>
<div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_cliente]"
                value="<?php echo isset($data[0]['id_cliente']) ? $data[0]['id_cliente'] : ''; ?>" class="" />
                <input type="hidden" name="data[id_usuario]"
                value="<?php echo isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : ''; ?>" class="" />

        <? endif; ?>
        

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>