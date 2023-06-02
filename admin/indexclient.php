
<?php
require_once("controllers/sistema.php");
include("views/header.php");
$sistema -> validateRol('cliente');
include('views/menu2.php');


$sesion = $_SESSION;
?>
<section class="banner_main">
<div class="container-fluid">
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="..." alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="..." alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="..." alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div>
</section>


<?php



if(isset($sesion)){
    if(!$sesion['nombreemp']==null){
        switch($sesion['genero'][0]){
            case 'Femenino':
                echo "<H1 class='titulo'> Bienvenida ".$sesion['nombreemp'][0]."</H1>";
                break;
            case 'Masculino':
                echo "<H1 class='titulo'> Bienvenido ".$sesion['nombreemp'][0]."</H1>";
                break;    
            default:
                echo "<H1 class='titulo'> Bienvenidx ".$sesion['nombreemp'][0]."</H1>";
                break;
        }
    }else{
        echo "Error: algo falta de configurar";
        die();
    }
}
?>

<br>




<div id="services" class="service">
<div class="container-fluid">
   <div class="row">
      <div class="col-2">
         &nbsp;
      </div>
      <div class="col">
            <a class="read_more" href="menuclient.php">Nuestro menú</a>
      </div>
      <?php

?>
      <div class="col">
            <a class="read_more" href="facturas.php?id=<?php echo $_SESSION['id_usuario'] ?>">Facturas</a>
      </div>
      <div class="col">
            <a class="read_more" href="historia.php">Conócenos</a>
      </div>
      <div class="col-1">
         &nbsp;
      </div>
   </div>
</div>
</div>
<div class="solutions">
<div class="container">
   <div class="row d_flex">
      <div class="col-md-5">
         <div class="solutions_img">
            <figure><img src="../images/solusan.png" alt="#"/></figure>
         </div>
      </div>
      <div class="col-md-7">
         <div class="titlepage">
            <div class="row">
               <div class="col-2">
                  &nbsp;
               </div>
               <div class="col">
                  <h2>¡Ven y disfruta<br>de nuestros platillos!</h2>
               </div>   
            </div>
            <div class="row">
               <div class="col-2">
                  &nbsp;
               </div>
               <div class="col-4">
                  <a class="read_more" href="menuclient.php">Menú</a>
               </div>
               <div class="col-4">
                  <a class="read_more" href="sucursales.php">Sucursales</a>
               </div>
               
            </div>
         </div>
      </div>
      
   </div>
</div>
</div>


<div class="solutions">
<div class="container">
   <div class="row d_flex">
      <div class="col-md-7">
         <div class="titlepage">
         <h2>¡Tenemos novedades<br>para ti!</h2>
            <div class="row">
               <div class="col-4">
                  <a class="read_more" href="novedad.php">Novedades</a>
               </div>
               <div class="col-4">
                  <a class="read_more" href="registro.php">Ordenar ahora</a>
               </div>
               <div class="col-1">
                  &nbsp;
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-5">
         <div class="solutions_img">
            <figure><img src="../images/solusan.png" alt="#"/></figure>
         </div>
      </div>
   </div>
</div>
</div>

<?php

include("views/footer.php");

?>