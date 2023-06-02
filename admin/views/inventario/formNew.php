<h1>Actualizar inventario </h1>
<form method="POST" action="inventario.php?action=<?php echo $action; ?>">
<div class="row">

<?php if($action=='newIP'): ?>
    


        <div class="col-2">
            <h3>Sucursal: <?php echo $dataS[0]['nombre'] ?></h3>
            <input type="hidden" name="data[id_sucursal]" value="<?php echo $dataS[0]['id_sucursal'] ?>" />
        </div>
    </div>
<div class="row">
        <div class="col-2">
            <h3>Ingrediente principal: <?php //echo $dataIP[$id-1]['ingrediente'] ?></h3>
        </div>
        </div>
        <div class="row">
        <div class="col-2">
            
            <select name="data[id_ingprinc]" required="required">
            <?php foreach($dataIP as $key => $dataIP): ?>
                    <option value="<?php echo $dataIP['id_ingprinc']; ?>">
                    <?php //$fin = $_POST['id_ingsec'];
                     ?>
                        <?php echo $dataIP['nombre'] ?></option>
                    <?php //$selected = " "; 
                endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">
            <label for="precio">Cantidad:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="precio" name="data[cantidad]"
            value="<?php echo isset($dataIP[$id-1]['cantidad']) ? $dataIP[$id-1]['cantidad'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">

        <?php else:?>
            <?php if($action=='newIS'): ?>
                <div class="col-2">
            <h3>Sucursal: <?php echo $dataS[0]['nombre'] ?></h3>
            <input type="hidden" name="data[id_sucursal]" value="<?php echo $dataS[0]['id_sucursal'] ?>" />
        </div>
    </div>
<div class="row">
        <div class="col-2">
            <h3>Ingrediente secundario: <?php //echo $dataIP[$id-1]['ingrediente'] ?></h3>
        </div>
        </div>
        <div class="row">
        <div class="col-2">
            
            <select name="data[id_ingsec]" required="required">
            <?php foreach($dataIS as $key => $dataIP): ?>
                    <option value="<?php echo $dataIP['id_ingsec']; ?>">
                    <?php //$fin = $_POST['id_ingsec'];
                     ?>
                        <?php echo $dataIP['nombre'] ?></option>
                    <?php //$selected = " "; 
                endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">
            <label for="precio">Cantidad:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="precio" name="data[cantidad]"
            value="<?php echo isset($dataIP[$id-1]['cantidad']) ? $dataIP[$id-1]['cantidad'] : ''; ?>" minlength="1"  maxlength="100">
        </div>
    </div>
    <div class="mb-3">

+
        <?php endif; ?>
        <?php endif; ?>
        <div class="mb-3">
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="inventario.php">Regresar</a>
</div>