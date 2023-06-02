<?php
require_once(__DIR__."/controllers/kart.php");
$kart -> validateRol('cliente');
require_once(__DIR__."/controllers/menu.php");
require_once(__DIR__."/controllers/sucursal.php");
include_once(__DIR__."/views/header.php");
include_once(__DIR__."/views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_platillo = (isset($_GET['id_platillo'])) ? $_GET['id_platillo'] : null;
switch ($action) {
    case 'new':
        //$data = $kart->get(null);
        $dataUC = $kart->getUC($_SESSION['id_usuario']);
        $dataP = $kart->getPlatillos(null);
        $dataS = $sucursal->get(null);
        $dataC = $kart->getIdc($_SESSION['id_usuario']);
        
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $hora_actual = date('H:i:s');
            $cantidad = $kart->new($data,$hora_actual);
            if ($cantidad) {
                $ide= $kart->getId($hora_actual);
                
                $cantidad2 = $kart->newUC($ide,$data);
                if($cantidad2){
                    $kart->flash('success', 'Registro dado de alta con éxito');
                    $data = $kart->get(null);
                    $dataCosto = $kart->getCosto(null);
                    include('views/kart/index.php');
                }else{
                    $kart->flash('danger', 'Algo fallo en asignar dirección');
                include('views/kart/form.php');
                }
            } else {
                $kart->flash('danger', 'Algo fallo en crear pedido');
                include('views/kart/form.php');
            }
        } else {
            include('views/kart/form.php');
        }
        break;;
    case 'edit':
        $data = $kart->get(null);
        $dataUC = $kart->getUC($_SESSION['id_usuario']);
        $dataP = $kart->getPlatillos(null);
        $dataS = $sucursal->get(null);
        $dataC = $kart->getIdc($_SESSION['id_usuario']);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_temp'];
            
            $cantidad = $kart->edit($id, $data);
            if ($cantidad) {
                $kart->flash('success', 'Registro actualizado con éxito');
                $data = $kart->get(null);
                $dataCosto = $kart->getCosto(null);
                include('views/kart/index.php');
            } else {
                $kart->flash('danger', 'Algo fallo');
                $data = $kart->get(null);
                $dataCosto = $kart->getCosto(null);
                include('views/kart/index.php');
            }
        } else {
            $data = $kart->get($id);
            include('views/kart/form.php');
        }
        break;
    case 'delete':
        $cantidad = $kart->delete($id);
        if ($cantidad) {
            $kart->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $kart->get(null); $dataCosto = $kart->getCosto(null);
            $dataP = $kart->getPlatillos(null);
            include('views/kart/index.php');
        } else {
            $kart->flash('danger', 'Algo fallo');
            $data = $kart->get(null); $dataCosto = $kart->getCosto(null);
            $dataP = $kart->getPlatillos(null);
            include('views/kart/index.php');
        }
        break;
    case 'platillos':
    $dataP = $kart->getPlatillos(null);
        $data = $kart->get(null);
        include("views/kart/indexpl.php");
        break;
    case 'newpl':
        $dataPL = $menu->get(null);
        //$data = $kart->getPlatillo(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $kart->newPlatillo($id,$data);
            if ($cantidad) {
                $kart->flash('success', 'Registro dado de alta con éxito');
                $dataP = $kart->getPlatillos(null);
        $data = $kart->get(null);
                include("views/kart/indexpl.php");
            } else {
                $genero->flash('danger', 'Algo fallo');
                include('views/kart/formpl.php');
            }
        } else {
            include('views/kart/formpl.php');
        }
        break;;
        case 'editpl':
            $dataPL = $menu->get(null);
            $data = $kart->getPlatillo(null);
            if (isset($_POST['enviar'])) {
                $data = $_POST['data'];
                $id_pl = $_POST['data']['id_temppl'];
                $cantidad = $kart->editPlatillo($id,$id_pl,$data);
                if ($cantidad) {
                    $kart->flash('success', 'Registro dado de alta con éxito');
                    $dataP = $kart->getPlatillos(null);
                    $data = $kart->get(null);
                    include("views/kart/indexpl.php");
                } else {
                    $genero->flash('danger', 'Algo fallo');
                    $dataP = $kart->getPlatillos(null);
                    $data = $kart->get(null);
                    include("views/kart/indexpl.php");
                }
            } else {
                include('views/kart/formpl.php');
            }
            break;;
            case 'deletepl':
                $cantidad = $kart->deletePlatillo($id_platillo);
                if ($cantidad) {
                    $kart->flash('success', 'Registro dado de alta con éxito');
                    $dataP = $kart->getPlatillos(null);
            $data = $kart->get(null);
                    include("views/kart/indexpl.php");
                } else {
                    $genero->flash('danger', 'Algo fallo');
                    include('views/kart/formpl.php');
                }
                break;
            case 'trans':
                $data = $kart->get($id);
                $dataCosto = $kart->getCosto($id);
                $dataP = $kart->getPlatillos($id);
                /*print_r($data);
                echo "<br><br>";
                print_r($dataCosto);
                echo "<br><br>";
                print_r($dataP);
                echo "<br><br>";
                die();*/

                $cont=0;
                        
                $cantidad = $kart->trans($data, $dataCosto);
                if ($cantidad) {
                    $idp = $kart->getIdp($data);
                    
                    $cantidad2 = $kart->transUC($idp,$data);
                    if($cantidad2){
                        foreach($dataP as $key => $d){
 
                            $cantidad3 = $kart->transPL($idp, $d);
                            
                        }
                        if($cantidad3){
                            $cantidad4 = $kart->delete($id);
                            if($cantidad4){
                                        /*$kart->flash('success', 'Registro dado de alta con éxito');
                            $dataP = $kart->getPlatillos(null);
                            $data = $kart->get(null);
                            include("views/kart/indexpl.php");*/
                            ?><meta http-equiv="refresh" content="0; url=pedidobyuser.php"><?php
                            }else{
                                $kart->flash('danger', 'Algo fallo en borrar carrito.');
                        $dataCosto = $kart->getCosto(null);
                        $dataP = $kart->getPlatillos(null);
                            $data = $kart->get(null);
                            include("views/kart/index.php");
                            }
                        }else{
                            $kart->flash('danger', 'Algo fallo en asignar productos.');
                        $dataCosto = $kart->getCosto(null);
                        $dataP = $kart->getPlatillos(null);
                            $data = $kart->get(null);
                            include("views/kart/index.php");
                        }
                    }else {
                        $kart->flash('danger', 'Algo fallo en asignar dirección.');
                        $dataCosto = $kart->getCosto(null);
                        $dataP = $kart->getPlatillos(null);
                            $data = $kart->get(null);
                            include("views/kart/index.php");
                    }
                } else {
                    $kart->flash('danger', 'Algo fallo');
                    $dataCosto = $kart->getCosto(null);
                    $dataP = $kart->getPlatillos(null);
                        $data = $kart->get(null);
                        include("views/kart/index.php");
                }
            break;
    case 'getAll':
    default:
    
    $dataCosto = $kart->getCosto(null);
    $dataP = $kart->getPlatillos(null);
        $data = $kart->get(null);
        include("views/kart/index.php");
}
include("views/footer.php");
?>