<?php
require_once(__DIR__."/controllers/sucursal.php");
require_once(__DIR__."/controllers/tipo_horario.php");
require_once(__DIR__."/controllers/ciudad.php");
require_once(__DIR__."/controllers/red_social.php");
require_once(__DIR__."/controllers/sistema.php");
include_once(__DIR__."/views/header.php");
$sucursal -> validateRol('administracion');
include_once(__DIR__."/views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_correo = (isset($_GET['id_correo'])) ? $_GET['id_correo'] : null;
$id_telefono = (isset($_GET['id_telefono'])) ? $_GET['id_telefono'] : null;
$id_red = (isset($_GET['id_red'])) ? $_GET['id_red'] : null;
switch ($action) {
    case 'new':
        $dataTipoH = $tipo_horario -> get();
        $dataCiudad = $ciudad -> get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $sucursal->new($data);
            if ($cantidad) {
                $sucursal->flash('success', 'Registro dado de alta con éxito');
                $data = $sucursal->get(null);
                include(__DIR__.'/views/sucursal/index.php');
            } else {
                $sucursal->flash('danger', 'Algo fallo');
                include(__DIR__.'/views/sucursal/form.php');
            }
        } else {
            include(__DIR__.'/views/sucursal/form.php');
        }
        break;
    case 'edit':
        $dataTipoH = $tipo_horario -> get();
        $dataCiudad = $ciudad -> get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_sucursal'];
            $cantidad = $sucursal->edit($id, $data);
            if ($cantidad) {
                $sucursal->flash('success', 'Registro actualizado con éxito');
                $data = $sucursal->get(null);
                include(__DIR__.'/views/sucursal/index.php');
            } else {
                $sucursal->flash('danger', 'Algo fallo');
                $data = $sucursal->get(null);
                include(__DIR__.'/views/sucursal/index.php');
            }
        } else {
            $data = $sucursal->get($id);
            include(__DIR__.'/views/sucursal/form.php');
        }
        break;
    case 'delete':
        $cantidad = $sucursal->delete($id);
        if ($cantidad) {
            $sucursal->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $sucursal->get(null);
            include(__DIR__.'/views/sucursal/index.php');
        } else {
            $sucursal->flash('danger', 'Algo fallo');
            $data = $sucursal->get(null);
            include(__DIR__.'/views/sucursal/index.php');
        }
        break;
    case 'correos':
        //$proyecto -> validatePrivilegio('Proyecto Leer');
        $dataSucursal = $sucursal->get($id);
        $data = $sucursal->getCorreo($id);
        include(__DIR__.'/views/sucursal/correo.php');
        break;
    case 'deletecorreo':
        //$proyecto -> validatePrivilegio('Proyecto Borrar');
        $cantidad = $sucursal->deleteCorreo($id_correo);
        if ($cantidad) {
            $sucursal->flash('success', 'Correo con el eliminado con éxito');
            $dataSucursal = $sucursal->get($id);
            $data = $sucursal->getCorreo($id);
            include(__DIR__.'/views/sucursal/correo.php');
        } else {
            $sucursal->flash('danger', 'Algo fallo');
            $dataSucursal = $sucursal->get($id);
            $data = $sucursal->getCorreo($id);
            include(__DIR__.'/views/sucursal/correo.php');
        }
        break;
    case 'newcorreo':
        //$proyecto -> validatePrivilegio('Proyecto Crear');
        $data = $sucursal->getCorreo();
        $dataSucursal = $sucursal->get($id);
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $id_sucursal2 = $_POST['data']['id_sucursal'];

            $sistema->db();
            $sql = "INSERT INTO correo_sucursal (id_sucursal, correo) 
            VALUES (:id_sucursal, :correo)";
            $st = $sistema->db->prepare($sql);
            
            $st->bindParam(":id_sucursal", $data2['id_sucursal'], PDO::PARAM_INT);
            $st->bindParam(":correo", $data2['correo'], PDO::PARAM_STR);
            $st->execute();


                $cantidad = $st->rowCount();
                if ($cantidad) {
                    $sucursal->flash('success', 'Registro dado de alta con éxito');

                } else {
                    $sucursal->flash('danger', 'Algo fallo');
                }

            $data = $sucursal->getCorreo($id);
            include(__DIR__.'/views/sucursal/correo.php');
        } else {
            include(__DIR__.'/views/sucursal/correo_form.php');
        }
        //$data_tarea = $proyecto->getTask($id);

        break;
        break;
    case 'editcorreo':
        //$proyecto -> validatePrivilegio('Proyecto Actualizar');
        $data = $sucursal->getCorreoSu($id_correo);
        $dataSucursal = $sucursal->get($id);
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $id_sucursal2 = $_POST['data']['id_sucursal_old'];
            $id_correo2=$_POST['data']['id_correo_old'];
                $cantidad = $sucursal->editCorreo($id_correo2, $data2);
                if ($cantidad) {
                    $sucursal->flash('success', 'Registro modificado con éxito');
                } else {
                    $sucursal->flash('danger', 'Algo fallo');
                } 
            $data = $sucursal->getCorreo($id);
            
            include(__DIR__.'/views/sucursal/correo.php');

        } else {
            include(__DIR__.'/views/sucursal/correo_form.php');
        }
        break;
            case 'telefonos':
                //$proyecto -> validatePrivilegio('Proyecto Leer');
                $dataSucursal = $sucursal->get($id);
                $data = $sucursal->getTelefono($id);
                include(__DIR__.'/views/sucursal/telefono.php');
                break;
            case 'deletetelefono':
                //$proyecto -> validatePrivilegio('Proyecto Borrar');
                $cantidad = $sucursal->deleteTelefono($id_telefono);
                if ($cantidad) {
                    $sucursal->flash('success', 'Telefono con el eliminado con éxito');
                    $dataSucursal = $sucursal->get($id);
                    $data = $sucursal->getTelefono($id);
                    include(__DIR__.'/views/sucursal/telefono.php');
                } else {
                    $sucursal->flash('danger', 'Algo fallo');
                    $dataSucursal = $sucursal->get($id);
                    $data = $sucursal->getTelefono($id);
                    include(__DIR__.'/views/sucursal/telefono.php');
                }
                break;
            case 'newtelefono':
                //$proyecto -> validatePrivilegio('Proyecto Crear');
                //$data = $sucursal->getTelefono();
                $dataSucursal = $sucursal->get($id);
                if (isset($_POST['enviar'])) {
                    $data2 = $_POST['data'];
                    $id_sucursal2 = $_POST['data']['id_sucursal'];
        
                    $sistema->db();
                    $sql = "INSERT INTO telefono_sucursal (id_sucursal, telefono) 
                    VALUES (:id_sucursal, :telefono)";
                    $st = $sistema->db->prepare($sql);
                    
                    $st->bindParam(":id_sucursal", $data2['id_sucursal'], PDO::PARAM_INT);
                    $st->bindParam(":telefono", $data2['telefono'], PDO::PARAM_STR);
                    $st->execute();
        
        
                        $cantidad = $st->rowCount();
                        if ($cantidad) {
                            $sucursal->flash('success', 'Registro dado de alta con éxito');
        
                        } else {
                            $sucursal->flash('danger', 'Algo fallo');
                        }
        
                    $data = $sucursal->getTelefono($id);
                    include(__DIR__.'/views/sucursal/telefono.php');
                } else {
                    include(__DIR__.'/views/sucursal/telefono_form.php');
                }
                //$data_tarea = $proyecto->getTask($id);
        
                break;
        
            case 'edittelefono':
                //$proyecto -> validatePrivilegio('Proyecto Actualizar');
                $data = $sucursal->getTelefonoSu($id_telefono);
                $dataSucursal = $sucursal->get($id);
                if (isset($_POST['enviar'])) {
                    $data2 = $_POST['data'];
                    $id_sucursal2 = $_POST['data']['id_sucursal_old'];
                    $id_telefono2=$_POST['data']['id_telefono_old'];
                        $cantidad = $sucursal->editTelefono($id_telefono2, $data2);
                        if ($cantidad) {
                            $sucursal->flash('success', 'Registro modificado con éxito');
                        } else {
                            $sucursal->flash('danger', 'Algo fallo');
                        } 
                    $data = $sucursal->getTelefono($id);
                    
                    include(__DIR__.'/views/sucursal/telefono.php');
        
                } else {
                    include(__DIR__.'/views/sucursal/telefono_form.php');
                }
                break;

                case 'redes':
                    //$proyecto -> validatePrivilegio('Proyecto Leer');
                    $dataSucursal = $sucursal->get($id);
                    $data = $sucursal->getRed($id);
                    include(__DIR__.'/views/sucursal/red.php');
                    break;
                case 'deletered':
                    //$proyecto -> validatePrivilegio('Proyecto Borrar');
                    $cantidad = $sucursal->deleteRed($id_red);
                    if ($cantidad) {
                        $sucursal->flash('success', 'Red con el eliminado con éxito');
                        $dataSucursal = $sucursal->get($id);
                        $data = $sucursal->getRed($id);
                        include(__DIR__.'/views/sucursal/red.php');
                    } else {
                        $sucursal->flash('danger', 'Algo fallo');
                        $dataSucursal = $sucursal->get($id);
                        $data = $sucursal->getRed($id);
                        include(__DIR__.'/views/sucursal/red.php');
                    }
                    break;
                case 'newred':
                    //$proyecto -> validatePrivilegio('Proyecto Crear');
                    //$data = $sucursal->getRed();
                    $dataRed = $red_social->get();
                    $dataSucursal = $sucursal->get($id);
                    if (isset($_POST['enviar'])) {
                        $data2 = $_POST['data'];
                        $id_sucursal2 = $_POST['data']['id_sucursal'];
            
                        $sistema->db();
                        $sql = "INSERT INTO red_sucursal (id_sucursal, id_red, enlace) 
                        VALUES (:id_sucursal, :id_red, :enlace)";
                        $st = $sistema->db->prepare($sql);
                        
                        $st->bindParam(":id_sucursal", $data2['id_sucursal'], PDO::PARAM_INT);
                        $st->bindParam(":id_red", $data2['id_red'], PDO::PARAM_INT);
                        $st->bindParam(":enlace", $data2['enlace'], PDO::PARAM_STR);
                        $st->execute();
            
            
                            $cantidad = $st->rowCount();
                            if ($cantidad) {
                                $sucursal->flash('success', 'Registro dado de alta con éxito');
            
                            } else {
                                $sucursal->flash('danger', 'Algo fallo');
                            }
            
                        $data = $sucursal->getRed($id);
                        include(__DIR__.'/views/sucursal/red.php');
                    } else {
                        include(__DIR__.'/views/sucursal/red_form.php');
                    }
                    //$data_tarea = $proyecto->getTask($id);
            
                    break;
            
                case 'editred':
                    //$proyecto -> validatePrivilegio('Proyecto Actualizar');
                    $data = $sucursal->getRedSu($id_red);
                    $dataRed = $red_social->get();
                    $dataSucursal = $sucursal->get($id);
                    if (isset($_POST['enviar'])) {
                        $data2 = $_POST['data'];
                        $id_sucursal2 = $_POST['data']['id_sucursal_old'];
                        $id_red2=$_POST['data']['id_red_old'];
                            $cantidad = $sucursal->editRed($id_red2, $data2);
                            if ($cantidad) {
                                $sucursal->flash('success', 'Registro modificado con éxito');
                            } else {
                                $sucursal->flash('danger', 'Algo fallo');
                            } 
                        $data = $sucursal->getRed($id);
                        
                        include(__DIR__.'/views/sucursal/red.php');
            
                    } else {
                        include(__DIR__.'/views/sucursal/red_form.php');
                    }
                    break;
    case 'getAll':
    default:
        $data = $sucursal->get(null);
        include(__DIR__."/views/sucursal/index.php");
}
include(__DIR__."/views/footer.php");
?>