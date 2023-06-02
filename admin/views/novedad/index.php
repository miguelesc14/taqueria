<h1 class="text-center" >Noticias recientes</h1>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Contenido</th>
            <th scope="col">Tipo</th>
        </tr>
    </thead>
    </tbody>
        <tr>
        <?php
        foreach($data as $key => $publicacion):?>
        <td scope="row"><?php echo $publicacion['titulo'];?></td>
        <td scope="row"><?php echo $publicacion['contenido'];?></td>
        <td scope="row"><?php echo $publicacion['fecha_publicacion'];?></td>    
        
        <td>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="novedad.php?action=more&id=<?php echo $publicacion['id_publicacion'] ?>" 
            type="button" class="btn btn-primary">Ver más</a>
            </div>
        </td></a></td>
            
        </tr>
        <?php endforeach; ?>
        <tr>
            <th>
                Se encontraron
                <?php sizeof($data); ?> registros.
            </th>
        </tr>
    </tbody>
</table>

<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>