<?php
require_once(__DIR__."/controllers/sucursal.php");
require_once(__DIR__."/controllers/tipo_horario.php");
require_once(__DIR__."/controllers/ciudad.php");
require_once(__DIR__."/controllers/red_social.php");
require_once(__DIR__."/controllers/sistema.php");
include_once(__DIR__."/views/header.php");
if(isset($_SESSION['id_usuario'])){
    include_once(__DIR__."/views/menu2.php");
}else{
    include_once(__DIR__."/views/menu.php");
}

?>

<h1 style="text-align:center;"> Nuestras sucursales </h1>
<section class="mov">
<?php
    $data = $sucursal->get();
    
    
    
    foreach($data as $key => $sucur):
        $dataCorreo = $sucursal->getCorreo($sucur['id_sucursal']);
        $dataTelefono = $sucursal->getTelefono($sucur['id_sucursal']);
        $dataRed = $sucursal->getRed($sucur['id_sucursal']);
?>

<div  class="container-fluid bg-dark text-light border-top wow fadeIn">
        <div class="row">
            <div class="col-md-6 px-0">
                <div id="map" style="width: 100%; height: 100%; min-height: 400px"></div>
            </div>
            <div class="col-md-6 px-5 has-height-lg middle-items">
                <h3><?php echo $sucur['sucurs']; ?></h3>
                <p><a href="mapa.php?id=<?php echo $sucur['id_sucursal']; ?>"><?php echo 'Dirección: '.$sucur['direccion'].','.$sucur['ciudad'].', '.$sucur['estado'].','.$sucur['pais']; ?></a></p>
                <div class="text-muted">
                    <p><span class="ti-location-pin pr-3"></span> <?php echo 'Horario: '.$sucur['tipo'].' ('.$sucur['dias'].' de '.$sucur['hora'].')'; ?></p>
                    <p><span class="ti-support pr-3"></span> <?php
                        foreach($dataTelefono as $key => $telefono): 
                        ?>
                            <?php echo $telefono['telefono']; ?>
                        <?php
                            endforeach;
                        ?></p>
                    <p><span class="ti-email pr-3"></span><?php
                        foreach($dataCorreo as $key => $correo): 
                        ?>
                            <?php echo $correo['correo']; ?>
                        <?php
                            endforeach;
                        ?></p>
                    <p><span class="ti-email pr-3"></span>
                    <?php
                        foreach($dataRed as $key => $red): 
                        ?>
                            <a href="<?php echo $red['enlace']; ?>" class="card-text"><?php echo $red['red_social']; ?></a>
                        <?php
                            endforeach;
                        ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    endforeach;
?>

<?php
include(__DIR__."/views/footer.php");
?>