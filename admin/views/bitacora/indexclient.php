

<h1 class="titulo">Mi historial</h1>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
        <th scope="col">Fecha pedido</th>
            <th scope="col">Hora pedido</th>
            <th scope="col">Hora de entrega</th>
            <th scope="col">Pedido</th>
            <th scope="col">Costo total</th>
            <th scope="col">Comentario</th>
            <th scope="col">Cliente</th>
            <th scope="col">Dirección</th>
            <th scope="col">Sucursal</th>
            <th scope="col">  </th>
        </tr>
    </thead>
    <tbody>
        
        <?php $nReg = 0;$cont=0;
                
        foreach ($data as $key => $pedido):
            $nReg++; ?>
            <tr>
            <th scope="row">
                    <?php echo $pedido["fecha_pedido"] ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["hora_pedido"] ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["hora_entrega"] ?>
                </th>
                <th scope="row">
                    <?php echo $pedido["pedido"] ?>
                </th>
                <th scope="row">
                    <?php echo (float)$pedido["costo_total"]; ?>
                    
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
                    <?php echo $pedido["sucursal"] ?>
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