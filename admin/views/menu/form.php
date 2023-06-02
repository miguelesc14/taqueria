<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Platillos</h1>
<form method="POST" action="menu.php?action=<?php echo $action; ?>">
<div class="row">
        <div class="col-2">
            <label for="data[id_tipoplatillo]">Tipo de platillo:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_tipoplatillo]" required="required">
                <?php
                $selected = " ";
                foreach ($dataTipo as $key => $tipo):
                    if ($tipo['id_tipoplatillo'] == $data[0]['id_tipoplatillo']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_tipoplatillo']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['nombre'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
    <div class="col-2">
            <label for="data[id_ingsec]">Ingrediente secundario:</label>
        </div>
        <div class="col-2">
            
            <select name="data[id_ingsec]" required="required">
                <?php
                $selected = " ";
                foreach ($dataIngSec as $key => $tipo):
                    if ($tipo['id_ingsec'] == $data[0]['id_ingsec']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_ingsec']; ?>" <?php echo $selected; ?>>
                    <?php //$fin = $_POST['id_ingsec'];
                     ?>
                        <?php echo $tipo['nombre'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="precio">Precio:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="precio" name="data[precio]"
            value="<?php echo isset($data[0]['precio']) ? $data[0]['precio'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_platillo]"
                value="<?php echo isset($data[0]['id_platillo']) ? $data[0]['id_platillo'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>

<div class="col">
            <a class="btn btn-lg btn-primary" href="menu.php">Regresar</a>
</div>