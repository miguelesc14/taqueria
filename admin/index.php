<?php 
include('controllers/sistema.php');
//$sistema -> validateRol('usuario');
include_once("views/header.php");
if(isset($_SESSION['id_usuario'])){
   if($_SESSION==null){
      include_once("views/menu.php");
   }else{
      include_once("views/menu2.php");
   }
}else{
   include_once("views/menu.php");
}



?>

<header id="home" class="header">
    <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">Taqueria Gillos</h1>
            <h2 class="display-4 mb-5">¡Con el gran sabor mexicano!</h2>
            <?php if(isset($_SESSION['id_usuario'])):?>
               <?php if (in_array('cliente', $_SESSION['roles'])):?> 
               <a class="btn btn-lg btn-primary" href="kart.php">Pedir ahora</a>
               <?php endif; ?>
               <?php if (in_array('administracion', $_SESSION['roles'])):?> 
               <a class="btn btn-lg btn-primary" href="indexadmin.php">Ir al dashboard</a>
               <?php endif; ?>
            <?php else: ?>
               <a class="btn btn-lg btn-primary" href="login.php">Pedir ahora</a>
            <?php endif; ?>
        </div>
      </header>






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