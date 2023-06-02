<h1 class="titulo"> Registros </h1>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/taqueria/ws/pdf.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS => array('data[pdf]' => 'dddddww'),
  CURLOPT_HTTPHEADER => array(
    'Cookie: PHPSESSID=k9q0bv89ovdib1dioi9c3309p7'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
$data = json_decode($response);


foreach($data as $key => $dpdf):?>
<div class="row">
  <div class="col-1">
    &nbsp;
  </div>
  <div class="col">
    <a href="../<?php print_r($dpdf->pdf); ?> " ><?php print_r(basename($dpdf->pdf)); ?> </a>
    <br>
  </div>
</div>


<?php
endforeach;
?>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>