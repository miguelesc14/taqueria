<h1 class="text-center">Inventario</h1>
<a href="inventario.php?action=excel" class="btn btn-success">Generar Excel</a>
<?php $nSuc = 0;
        foreach ($dataS as $key => $sucursal):
          //print_r($dataS);
          $nSuc++; ?>
            

<h2 class="text-center"> <?php echo $sucursal["nombre"] ?> </h2>

<table class="table table-responsive table-bordered">
<h3>Ingredientes principales</h3>
<a href="inventario.php?action=newIP&id_sucursal=<?php echo $sucursal['id_sucursal']?>" class="btn btn-success">Nuevo</a>
    <thead>
        <tr>
            <th scope="col">Ingrediente</th>
            <th scope="col">Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($dataIP as $key => $ingredienteIP):
            $nReg++; ?>
            <?php if($ingredienteIP['id_sucursal']==$sucursal["id_sucursal"]){?>
            <tr>
                <th scope="row">
                    
                <?php echo $ingredienteIP["ingrediente"];?>
                    
                </th>
                <th scope="row">
                    <?php echo $ingredienteIP["cantidad"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="inventario.php?action=editIP&id=<?php echo $ingredienteIP["id_ipsucursal"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                            <a href="inventario.php?action=deleteIP&id=<?php echo $ingredienteIP["id_ipsucursal"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </th>
            </tr>
            <?php } ?>
        <?php endforeach; ?>
        <tr>
            <th>
                
            </th>
        </tr>
    </tbody>


    
<table class="table table-responsive table-bordered">
<h3>Ingredientes secundarios</h1>
<a href="inventario.php?action=newIS&id_sucursal=<?php echo $sucursal['id_sucursal']?>" class="btn btn-success">Nuevo</a>
    <thead>
        <tr>
            <th scope="col">Ingrediente</th>
            <th scope="col">Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($dataIS as $key => $ingredienteIS):
            $nReg++; ?>
            <?php if($ingredienteIS['id_sucursal']==$sucursal["id_sucursal"]){?>
            <tr>
                <th scope="row">
                    <?php echo $ingredienteIS["ingrediente"] ?>
                </th>
                <th scope="row">
                    <?php echo $ingredienteIS["cantidad"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="inventario.php?action=editIS&id=<?php echo $ingredienteIS["id_issucursal"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                            <a href="inventario.php?action=deleteIS&id=<?php echo $ingredienteIS["id_issucursal"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </th>
            </tr>
            <?php } ?>
        <?php endforeach; ?>
    </tbody>



</table>

<?php endforeach; ?>

<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>