<h1>
    <?php echo ($accion == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Proyecto
</h1>
<form method="POST" action="proyecto.php?action=<?php echo $accion; ?>">
    <div class="mb-3">
        <label  class="form-label">Nombre del Proyecto</label>
        <input type="text" name="data[proyecto]" class="form-control"  placeholder="proyecto" 
        value="<?php echo isset($data[0]['proyecto'])?$data[0]['proyecto']:''; ?>" required minlength="3" maxlength="200" />
    </div>
    <div class="mb-3">
        <label  class="form-label">Descripción</label>
        <input type="text" name="data[descripcion]" class="form-control"  placeholder="descripcion" 
        value="<?php echo isset($data[0]['descripcion'])?$data[0]['descripcion']:''; ?>" required minlength="3" maxlength="200" />
    </div>
    <div class="mb-3">
        <?php 
        if($accion=='edit'): ?>
        <input type="hidden" name="data[id_proyecto]" value="<?php echo isset($data[0]['proyecto'])?$data[0]['id_proyecto']:'';?>">

        <?php endif;?>

    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
    </div>
</form>