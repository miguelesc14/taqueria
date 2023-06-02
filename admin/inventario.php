<?php
require_once("controllers/inventario.php");
require_once("controllers/ingsec.php");
require_once("controllers/ingprinc.php");
require_once("controllers/sucursal.php");
include_once("views/header.php");
$inventario -> validateRol('administracion');
include_once("views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_sucursal = (isset($_GET['id_sucursal'])) ? $_GET['id_sucursal'] : null;
switch ($action) {
    case 'newIP':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
           
            $cantidad = $inventario->newIP($data);
            if ($cantidad) {
                $inventario->flash('success', 'Registro actualizado con éxito');
                $dataIP = $inventario->getIP(null);
                $dataIS = $inventario->getIS(null);
                
        $dataS = $inventario->getSucursal(null);
                include('views/inventario/index.php');
            } else {
                $departamento->flash('danger', 'Algo fallo');
                include('views/departamento/form.php');
            }
        } else {
            $dataIP = $ingrediente_principal->get(null);
            $dataS = $inventario->getSucursal($id_sucursal);
            include('views/inventario/formNew.php');
        }
        break;
        case 'newIS':
            if (isset($_POST['enviar'])) {
                $data = $_POST['data'];
               
                $cantidad = $inventario->newIS($data);
                if ($cantidad) {
                    $inventario->flash('success', 'Registro actualizado con éxito');
                    $dataIP = $inventario->getIP(null);
                    $dataIS = $inventario->getIS(null);
                    
            $dataS = $inventario->getSucursal(null);
                    include('views/inventario/index.php');
                } else {
                    $departamento->flash('danger', 'Algo fallo');
                    include('views/departamento/form.php');
                }
            } else {
                $dataIS = $ingrediente_secundario->get(null);
                $dataS = $inventario->getSucursal($id_sucursal);
                include('views/inventario/formNew.php');
            }
            break;
    case 'editIP':
        $dataIP = $inventario->getIP(null);
        
        if (isset($_POST['enviar'])) {
            $dataIP = $_POST['data'];
            $id = $_POST['data']['id_ipsucursal'];
            $cantidad = $inventario->editIP($id, $dataIP);
            if ($cantidad) {
                $inventario->flash('success', 'Registro actualizado con éxito');
                $dataIP = $inventario->getIP(null);
                $dataIS = $inventario->getIS(null);
                
        $dataS = $inventario->getSucursal(null);
        include('views/inventario/index.php');
            } else {
                $inventario->flash('danger', 'Algo fallo');
                $dataIP = $inventario->getIP(null);
        $dataIS = $inventario->getIS(null);
        
        $dataS = $inventario->getSucursal(null);
        include('views/inventario/index.php');
            }
        } else {
            $dataIP = $inventario->getIP($id);
        $dataIS = $inventario->getIS($id);
        $dataComp = $inventario->getComp($id);
        $dataS = $inventario->getSucursal(null);
            include('views/inventario/form.php');
        }
        break;
        case 'editIS':
            $dataIS = $inventario->getIS(null);
        
            if (isset($_POST['enviar'])) {
                $dataIS = $_POST['data'];
                $id = $_POST['data']['id_issucursal'];

                $cantidad = $inventario->editIS($id, $dataIS);
                if ($cantidad) {

                    
                    $dataIP = $inventario->getIP(null);
                    $dataIS = $inventario->getIS(null);
                    
            $dataS = $inventario->getSucursal(null);
                    include('views/inventario/index.php');
                    $inventario->flash('success', 'Registro actualizado con éxito');
                } else {
                    $inventario->flash('danger', 'Algo fallo');
                    $dataIP = $inventario->getIP(null);
            $dataIS = $inventario->getIS(null);
            
            $dataS = $inventario->getSucursal(null);
                    include('views/inventario/index.php');
                }
            } else {
                $dataIP = $inventario->getIP($id);
            $dataIS = $inventario->getIS($id);
            $dataS = $inventario->getSucursal(null);
                include('views/inventario/form.php');
            }
            break;
                case 'deleteIP':
                    $cantidad = $inventario->deleteIP($id);
                    if ($cantidad) {
    
                        
                        $dataIP = $inventario->getIP(null);
                        $dataIS = $inventario->getIS(null);
                        
                $dataS = $inventario->getSucursal(null);
                        include('views/inventario/index.php');
                        $inventario->flash('success', 'Registro actualizado con éxito');
                    } else {
                        $inventario->flash('danger', 'Algo fallo');
                        $dataIP = $inventario->getIP(null);
                $dataIS = $inventario->getIS(null);
                
                $dataS = $inventario->getSucursal(null);
                        include('views/inventario/index.php');
                    }
                break;
                case 'deleteIS':
                    $cantidad = $inventario->deleteIS($id);
                    if ($cantidad) {
                        $dataIP = $inventario->getIP(null);
                        $dataIS = $inventario->getIS(null);
                        
                $dataS = $inventario->getSucursal(null);
                        include('views/inventario/index.php');
                        $inventario->flash('success', 'Registro actualizado con éxito');
                    } else {
                        $inventario->flash('danger', 'Algo fallo');
                        $dataIP = $inventario->getIP(null);
                $dataIS = $inventario->getIS(null);
                
                $dataS = $inventario->getSucursal(null);
                        include('views/inventario/index.php');
                    }
                break;
                case 'excel':
        $dataIP = $inventario->getIP(null);
        $dataIS = $inventario->getIS(null);
        
        $dataS = $inventario->getSucursal(null);
        include("views/inventario/excel.php");
        include("views/inventario/index.php");
                break;
    case 'getAll':
    default:
        $dataIP = $inventario->getIP(null);
        $dataIS = $inventario->getIS(null);
        
        $dataS = $inventario->getSucursal(null);
        include("views/inventario/index.php");
}
include("views/footer.php");
?>