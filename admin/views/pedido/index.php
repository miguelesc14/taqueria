

<h1 class="titulo">Pedidos</h1>

<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">Hora pedido</th>
            <th scope="col">Pedido</th>
            <th scope="col">Comentario</th>
            <th scope="col">Cliente</th>
            <th scope="col">Dirección</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Estatus</th>
            <th scope="col">  </th>
        </tr>
    </thead>
    <tbody>
        
        <?php
         $nReg = 0;$cont=0;
                
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
                                echo $platillo['cantidad'].' '.$platillo['nombre'].' ('.$platillo['comentario'].')';
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
                    <?php echo $pedido["cliente"] ?>
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
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                   <?php 
                                   $most = true;
                                    if ($pedido["id_estatus"]==4){
                                        $most = false;
                                    }
                                   
                                   ?>
                                   <a href="pedido.php?action=edit&id=<?php echo $pedido["id_pedido"] ?>&id_estatus=<?php echo ($pedido["id_estatus"]+1) ?>"
                                type="button" class="read_more" <?php if($most==false) echo ' style="display: none"' ?>>↑</a>
                                </div>
                                <div class="col">
                                <?php 
                                   $most = true;
                                    if ($pedido["id_estatus"]==1){
                                        $most = false;
                                    }
                                   
                                   ?>
                                <a href="pedido.php?action=edit&id=<?php echo $pedido["id_pedido"] ?>&id_estatus=<?php echo ($pedido["id_estatus"]-1) ?>"
                                type="button" class="read_more" <?php if($most==false) echo ' style="display: none"' ?>>↓</a>
                                </div>
                            </div>
                            <div class="row">
                            <?php 
                                   $mosto = false;
                                    if ($pedido["id_estatus"]==4){
                                        $mosto = true;
                                    }
                                   
                                   ?>
                                <a href="pedido.php?action=trans&id=<?php echo $pedido["id_pedido"] ?>"
                                type="button" class="read_more" <?php if($mosto==false) echo ' style="display: none"' ?>>Enviar a bitácora</a>
                            </div>
                        </div>
                        <div class="col">
                            <a href="pedido.php?action=delete&id=<?php echo $pedido["id_pedido"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a> 
                        </div>
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
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>