
<?php
require_once("controllers/sistema.php");
require_once("controllers/bitacora.php");
include("views/header.php");
$sistema -> validateRol('administracion');
include('views/menu2.php');

$reporte=$bitacora->chartPedido();
$sesion = $_SESSION;

?>


<?php

if(isset($sesion)){
    if(isset($sesion['genero'][0])){
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
      echo "<H2 class='titulo'> Cuenta sin configurar, favor de crear cuenta de empleado para este usuario.</H2>";
    }
}
?>



<section class="mov">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = google.visualization.arrayToDataTable([
          ['Element', 'Cantidad', {role: 'style'}],
        <?php foreach($reporte as $key => $value):?>
         ['<?php echo $value['dia']; ?>', <?php echo $value['cantidad']; ?>, 'orange'],          // English color name
         <?php endforeach;?>
      ]);

        // Set chart options
        var options = {'title':'Pedidos mensuales',
                       'width':400,
                       'height':200};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
</section>


<br>

<div id="services" class="service">
<div class="container-fluid">
   <div class="row">
      <div class="col-2">
         &nbsp;
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="pedido.php">Pedidos</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="bitacora.php">Bitacora</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="menu.php">Platillos</a>
      </div>
   </div>
   <div class="row">
      &nbsp;
   </div>
   <div class="row">
      <div class="col-2">
         &nbsp;
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="inventario.php">Inventario</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="ingprinc.php">Ing. principal</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="ingsec.php">Ing. secundario</a>
      </div>
   </div>
   <div class="row">
      &nbsp;
   </div>
   <div class="row">
      <div class="col-2">
         &nbsp;
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="sucursal.php">Sucursal</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="tipo_horario.php">Tipo horario</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="tipo_platillo.php">Tipo platillo</a>
      </div>
   </div>
   <div class="row">
      &nbsp;
   </div>
   <div class="row">
      <div class="col-2">
         &nbsp;
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="cliente.php">Cliente</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="personal.php">Personal</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="publicacion.php">Publicacion</a>
      </div>
   </div>
   <div class="row">
      &nbsp;
   </div>
   <div class="row">
      <div class="col-2">
         &nbsp;
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="genero.php">Genero</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="red_social.php">Red social</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="estatus.php">Estatus</a>
      </div>
   </div>
   <div class="row">
      &nbsp;
   </div>
   <div class="row">
      <div class="col-2">
         &nbsp;
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="pais.php">País</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="estado.php">Estado</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="ciudad.php">Ciudad</a>
      </div>

   </div>
   <div class="row">
      &nbsp;
   </div>
   <div class="row">
      <div class="col-2">
         &nbsp;
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="usuario.php">Usuario</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="puesto.php">Puesto</a>
      </div>
      <div class="col">
            <a class="btn btn-lg btn-primary" href="privilegio.php">Privilegio</a>
      </div>
   </div>
</div>
</div>


<?php

include("views/footer.php");

?>