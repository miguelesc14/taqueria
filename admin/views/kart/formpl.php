<div class="row">
<div class="col-1">
    &nbsp;
</div>

<div class="col">
<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Pedido</h1>
<form method="POST" action="kart.php?action=<?php echo $action; ?>&id=<?php echo $_GET['id'] ?>">


<div class="row">
        <div class="col-2">
            <label for="ciudad">Platillo:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_platillo]" required="required">
                <?php
                $selected = " ";
                foreach ($dataPL as $key => $tipo):
                    if ($tipo['id_platillo'] == $data[0]['id_platillo']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tipo['id_platillo']; ?>" <?php echo $selected; ?>>
                        <?php echo $tipo['nombre'] ?></option>
                    <label value="<?php echo $tipo['precio'] ?>">
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

<div class="row">
        <div class="col-2">
            <label for="ingsec">Comentario:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input type="text" class="" id="nombre" name="data[comentario]"
            value="<?php echo isset($data[0]['comentario']) ? $data[0]['comentario'] : ''; ?>" 
            minlength="1"  maxlength="1000" placeholder="Sin verdura, sin piña, etc.">
        </div>
    </div>    
    <div class="row">
        <div class="col-2">
            <label for="ingsec">Cantidad:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required type="text" class="" id="nombre" name="data[cantidad]"
            value="<?php echo isset($data[0]['cantidad']) ? $data[0]['cantidad'] : ''; ?>" 
            minlength="1"  maxlength="100">
        </div>
    </div> 
    
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_temppl]"
                value="<?php echo isset($data[0]['id_temppl']) ? $data[0]['id_temppl'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
</div>
</div>
<div class="col">
            <a class="btn btn-lg btn-primary" href="kart.php">Regresar</a>
</div>