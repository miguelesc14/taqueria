<h1><?php echo ($action == 'edit')?'Modificar':'Nueva' ;?> ubicación </h1>
<form method="POST" action="clientebyuser.php?action=<?php echo $action; ?>&id=<?php echo $_SESSION['id_usuario'];?>">
    <div class="mb-3">

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

        <label for="exampleFormControlInput1" class="form-label">Dirección: </label>
        <input type="text" name="data[direccion]"
                value="<?php echo isset($data[0]['direccion']) ? $data[0]['direccion'] : ''; ?>" class="" />
        <input type="hidden" name="data[id_cliente]"
                value="<?php echo isset($dataCliente[0]['id_cliente']) ? $dataCliente[0]['id_cliente'] : ''; ?>" class="" />
    </div>
    <div class="mb-3">
    
        <?
        if ($action == 'edituc'):  ?>
            <input type="hidden" name="data[id_ubiclient]"
                value="<?php echo isset($data[0]['id_ubiclient']) ? $data[0]['id_ubiclient'] : ''; ?>" class="" />
        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>