

<h1 class="titulo">Productos</h1>
<a href="kart.php?action=newpl&id=<?php echo $_GET['id'] ?>" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Precio unitario</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Comentario</th>
            <th scope="col">  </th>
        </tr>
    </thead>
    <tbody>
        
        <?php $nReg = 0;$cant=0;$pre=0;$costo=0;
                
        foreach ($dataP as $key => $pedido):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $pedido["nombre"] ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["precio"] ?>
                    <?php $pre = $pedido["precio"]+$pre;?>
                </th>

                <th scope="row">
                    <?php echo $pedido["cantidad"] ?>
                    <?php $cant++;?>

                </th>
                <th scope="row">
                    <?php echo $pedido["comentario"] ?>
                </th>
                <th>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a href="kart.php?action=editpl&id=<?php echo $pedido["id_temp"] ?>&id_platillo=<?php echo $pedido["id_temppl"] ?>"
                            type="button" class="btn btn-primary">Editar</a> 
                <a href="kart.php?action=deletepl&id=<?php echo $pedido["id_temp"] ?>&id_platillo=<?php echo $pedido["id_temppl"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a> 
                    </div>
                </th>
            </tr>
            <?php $costo= $costo+($pedido["cantidad"]*$pedido["precio"]);?>
        <?php endforeach; ?>
        <tr>
            <th>
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
        <tr>
            <th>
                <b>Costo total:<?php echo $costo?></b>
                .
            </th>
        </tr>
        
    </tbody>
</table>
<div class="col">
            <a class="btn btn-lg btn-primary" href="kart.php">Regresar</a>
</div>