<h1 class="text-center" ><?php echo $data[0]['titulo'];?></h1>

<section>
    <div class="row">
        <div class="col-1">
            &nbsp;
        </div>
        <div class="col">
        <?php echo 'Publicada: '.$data[0]['fecha_publicacion'];?>
        </div>
    </div>
    <div class="row">
        <div class="col-1">
            &nbsp;
        </div>
        <div class="col">
        <?php echo $data[0]['contenido'];?>
        </div>
    </div>
    <div class="row">
        <div class="col-1">
            &nbsp;
        </div>
        <div class="col">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="novedad.php" class="read_more"><---</a>
            </div>
        </div>
    </div>
</section>
<div class="col">
            <a class="btn btn-lg btn-primary" href="index.php">Regresar</a>
</div>