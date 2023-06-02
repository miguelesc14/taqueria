
    <?php
    require_once 'vendor/autoload.php';
    
    use Ellumilel\ExcelWriter;
$header = [
    'Elemento' => 'string',
    'Cantidad' => 'string'
];

$wExcel = new Ellumilel\ExcelWriter();

foreach ($dataS as $key => $sucursal):

    $wExcel->writeSheetHeader($sucursal['nombre'], $header);
    $wExcel->setAuthor('Taqueria');
    for ($i = 0; $i < sizeof($dataIP); $i++) {
        if($dataIP[$i]['id_sucursal']==$sucursal["id_sucursal"]){
            $wExcel->writeSheetRow($sucursal['nombre'], [
                $dataIP[$i]['ingrediente'],
                $dataIP[$i]['cantidad']
            ]);
        }
    }


    for ($i = 0; $i < sizeof($dataIS); $i++) {
        if($dataIS[$i]['id_sucursal']==$sucursal["id_sucursal"]){
            $wExcel->writeSheetRow($sucursal['nombre'], [
                $dataIS[$i]['ingrediente'],
                $dataIS[$i]['cantidad']
            ]);
        }
    }


endforeach;

$fecha_actual = date("Y-m-d H:i:s");
$wExcel->writeToFile("../inventario/inventario_".$fecha_actual.".xlsx");
    ?>