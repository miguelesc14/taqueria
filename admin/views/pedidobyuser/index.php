
<h1 class="titulo">Pedidos actuales</h1>

<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">Hora pedido</th>
            <th scope="col">Pedido</th>
            <th scope="col">Comentario</th>
            <th scope="col">Dirección</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Estatus</th>
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
                            if($platillo['id_pedido']==$pedido['id_pedido']){
                                echo $platillo['cantidad'].' '.$platillo['nombre'].' ('.$platillo['comentario'].')';;
                                echo "<br>";
                            }else{
                                //echo "Error: sin platillos";
                                //break;
                            }
                        endforeach;
                        echo "Costo total: ".$pedido['costo_total'];
                    ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["comentario_general"] ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["direccion"] ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["nombre"] ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["estatus"] ?>
                </th>
                <th>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a href="pedidobyuser.php?action=delete&id=<?php echo $pedido["id_pedido"] ?>"
                            type="button" class="btn btn-danger">Cancelar</a> 
                    </div>
                </th>
            </tr>
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