<h1 class="text-center">Usuarios</h1>
<a href="usuario.php?action=new" class="btn btn-success">Nuevo</a>
<a href="usuario.php" class="btn btn-success">Ver en vista de Administrador</a>
<br><br>
        <?php
        $nReg = 0;
        foreach ($dataPuesto as $key => $puesto):
            $nReg++; ?>
            <h3><?php echo $puesto['puesto'] ?></h3> 
            <br>
            <?php foreach($data as $key => $usuario): ?>
                <?php foreach($dataUR as $key => $ur): ?>
                    <?php if(($usuario['id_usuario']==$ur['id_usuario'])&&($puesto['id_puesto']==$ur['id_puesto'])):?>
                        <p><?php echo $usuario['correo']; ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>