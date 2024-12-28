

<h1 class="titulo">Carrito de compras</h1>
<a href="kart.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">Hora pedido</th>
            <th scope="col">Pedido</th>
            <th scope="col">Comentario</th>
            <th scope="col">Dirección</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Costo</th>
            <th scope="col">  </th>
        </tr>
    </thead>
    <tbody>
        
        <?php $nReg = 0;$cont=0;
                
        foreach ($data as $key => $pedido):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $pedido["hora_pedido"] ?>
                </th>
                <th scope="row">
                    <?php
                        foreach ($dataP as $key => $platillo):
                            if($platillo['id_temp']==$pedido['id_temp']){
                                echo $platillo['cantidad'].' '.$platillo['nombre'];
                                echo "<br>";
                            }else{
                                //echo "Error: sin platillos";
                                //break;
                            }
                        endforeach;
                       
                    ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["comentario_general"] ?>
                </th>

                <th scope="row">
                    <?php echo $pedido["direccion"] ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["sucur"] ?>
                </th>
                <th scope="row">
                    <?php foreach($dataCosto as $key => $costo):
                        if($costo['id_temp']==$pedido['id_temp']){
                            echo $costo['costo'];
                        }
                    endforeach;?>
                </th>
                <th>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a href="kart.php?action=platillos&id=<?php echo $pedido["id_temp"] ?>"
                            type="button" class="btn btn-dark">Productos</a> 
                <a href="kart.php?action=edit&id=<?php echo $pedido["id_temp"] ?>"
                            type="button" class="btn btn-primary">Editar</a> 
                <a href="kart.php?action=delete&id=<?php echo $pedido["id_temp"] ?>"
                            type="button" class="btn btn-danger">Cancelar</a> 
                    </div>
                </th>
            </tr>
            <th>
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="comprar.php?action=efective&id=<?php echo $pedido["id_temp"] ?>"
                            type="button" class="btn btn-lg btn-primary">Pagar con efectivo</a>
            </div> 
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="comprar.php?action=paypal&id=<?php echo $pedido["id_temp"] ?>"
                            type="button" class="btn btn-lg btn-primary">Pagar con Paypal</a>
            </div> 
            </th>
        <?php endforeach; ?>
        <tr>
            
            <th>
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
    </tbody>
</table>
<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>