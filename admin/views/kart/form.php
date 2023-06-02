<div class="row">
<div class="col-1">
    &nbsp;
</div>

<div class="col">
<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Pedido</h1>
<form method="POST" action="kart.php?action=<?php echo $action; ?>">


<div class="row">
        <div class="col-2">
            <input type="hidden" class="" id="nombre" name="data[hora_pedido]"
            value="<?php echo isset($data[0]['hora_pedido']) ? $data[0]['hora_pedido'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div> 

<div class="row">
        <div class="col-2">
            <label for="ingsec">Comentario general:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input type="text" class="" id="nombre" name="data[comentario_general]"
            value="<?php echo isset($data[0]['comentario_general']) ? $data[0]['comentario_general'] : ''; ?>" 
            minlength="1"  maxlength="1000" placeholder="Tocar la puerta al llegar, no incluir salsa, etc.">
        </div>
    </div>    
    <div class="row">
        <div class="col-2">
            <input type="hidden" class="" id="nombre" name="data[id_cliente]"
            value="<?php echo isset($dataC[0]['id_cliente']) ? $dataC[0]['id_cliente'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div> 
    <div class="row">
        <div class="col-2">
            <label for="ciudad">Ubicación de entrega:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_ubicacion]" required="required">
                <?php
                $selected = " ";
               
                foreach ($dataUC as $key => $tipo):
                    if ($tipo['id_ubiclient'] == $data[0]['id_ubiclient']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_ubiclient']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['direccion'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="ciudad">Sucursal:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_sucursal]" required="required">
                <?php
                $selected = " ";
                foreach ($dataS as $key => $tipo):
                    if ($tipo['id_sucursal'] == $data[0]['id_sucursal']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_sucursal']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['sucurs'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_temp]"
                value="<?php echo isset($data[0]['id_temp']) ? $data[0]['id_temp'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
</div>
</div>
<div class="col">
            <a class="btn btn-lg btn-primary" href="kart.php">Regresar</a>
</div>