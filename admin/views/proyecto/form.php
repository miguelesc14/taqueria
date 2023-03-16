<h1>
    <?php echo ($accion == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Proyecto
</h1>
<form method="POST" action="proyecto.php?action=<?php echo $accion; ?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label  class="form-label">Nombre del Proyecto</label>
        <input type="text" name="data[proyecto]" class="form-control"  placeholder="proyecto" 
        value="<?php echo isset($data[0]['proyecto'])?$data[0]['proyecto']: ''; ?>" required minlength="3" maxlength="200" />
    </div>
    <div class="mb-3">
        <label  class="form-label">Descripción</label>
        <input type="text" name="data[descripcion]" class="form-control"  placeholder="descripcion" 
        value="<?php echo isset($data[0]['descripcion'])?$data[0]['descripcion']: ''; ?>" required minlength="3" maxlength="200" />
    </div>
    <div class="mb-3">
        <label  class="form-label">Fecha Inicial</label>
        <input type="date" name="data[fecha_inicial]" class="form-control"  placeholder="descripcion" 
        value="<?php echo isset($data[0]['fecha_inicial'])?$data[0]['fecha_inicial']: ''; ?>" required />
    </div>
    <div class="mb-3">
        <label  class="form-label">Fecha Final</label>
        <input type="date" name="data[fecha_final]" class="form-control"  placeholder="descripcion" 
        value="<?php echo isset($data[0]['fecha_final'])?$data[0]['fecha_final']: ''; ?>" />
    </div>
    <div class="mb-3">
        <label  class="form-label">Departamento</label>
        <select name="data[id_departamento]" class="form-control" required>

            <?php 
            foreach($datadepartamentos as $key => $depto): 
            $selected=" ";
                if($depto['id_departamento']==$data[0]['id_departamento']):
                $selected="selected";
            endif;
            ?>
            <option value="<?php echo $depto['id_departamento']; ?>" <?php echo $selected; ?>><?php echo $depto ['departamento']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label  class="form-label">Archivo Adjunto</label>
        <input type="file" name="archivo" class="form-control"/>
    </div>
    <div class="mb-3">
        <?php 
        if($accion=='edit'): ?>
        <input type="hidden" name="data[id_proyecto]" 
        value="<?php echo isset($data[0]['id_proyecto'])?$data[0]['id_proyecto']:'';?>">

        <?php endif;?>

    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
    </div>
</form>