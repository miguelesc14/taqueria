<?php
require_once(__DIR__."/controllers/puesto.php");
require_once(__DIR__."/controllers/privilegio.php");
include_once(__DIR__."/views/header.php");
$puesto -> validateRol('administracion');
include_once(__DIR__."/views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_privilegio = (isset($_GET['id_privilegio'])) ? $_GET['id_privilegio'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $puesto->new($data);
            if ($cantidad) {
                $puesto->flash('success', 'Registro dado de alta con éxito');
                $data = $puesto->get(null);
                include(__DIR__.'/views/puesto/index.php');
            } else {
                $puesto->flash('danger', 'Algo fallo');
                include(__DIR__.'/views/puesto/form.php');
            }
        } else {
            include(__DIR__.'/views/puesto/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_puesto'];
            $cantidad = $puesto->edit($id, $data);
            if ($cantidad) {
                $puesto->flash('success', 'Registro actualizado con éxito');
                $data = $puesto->get(null);
                include(__DIR__.'/views/puesto/index.php');
            } else {
                $puesto->flash('danger', 'Algo fallo');
                $data = $puesto->get(null);
                include(__DIR__.'/views/puesto/index.php');
            }
        } else {
            $data = $puesto->get($id);
            include(__DIR__.'/views/puesto/form.php');
        }
        break;
    case 'delete':
        $cantidad = $puesto->delete($id);
        if ($cantidad) {
            $puesto->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $puesto->get(null);
            include(__DIR__.'/views/puesto/index.php');
        } else {
            $puesto->flash('danger', 'Algo fallo');
            $data = $puesto->get(null);
            include(__DIR__.'/views/puesto/index.php');
        }
        break;
    case 'privilegios':
        //$proyecto -> validatePrivilegio('Proyecto Leer');
        $dataPuesto = $puesto->get($id);
        $data = $puesto->getPrivilegio($id);
        include(__DIR__.'/views/puesto/privilegio.php');
        break;
    case 'deleteprivilegio':
        //$proyecto -> validatePrivilegio('Proyecto Borrar');
        $cantidad = $puesto->deletePrivilegio($id, $id_privilegio);
        if ($cantidad) {
            $puesto->flash('success', 'Privilegio con el eliminado con éxito');
            $dataPuesto = $puesto->get($id);
            $data = $puesto->getPrivilegio($id);
            include(__DIR__.'/views/puesto/privilegio.php');
        } else {
            $puesto->flash('danger', 'Algo fallo');
            $dataPuesto = $puesto->get($id);
            $data = $puesto->getPrivilegio($id);
            include(__DIR__.'/views/puesto/privilegio.php');
        }
        break;
    case 'newprivilegio':
        //$proyecto -> validatePrivilegio('Proyecto Crear');
        $data = $puesto->getPuestoPrivilegio();
        $dataPuesto = $puesto->get($id);
        $dataPrivilegio = $privilegio->get();
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $id_puesto2 = $_POST['data']['id_puesto'];
            $id_privilegio2 = $_POST['data']['id_privilegio'];
            $validar = $puesto->validarPuestoPrivilegio($id_puesto2, $id_privilegio2);
            
            if(!(isset($validar[0]))){
                $cantidad = $puesto->newPrivilegio($id, $data2);
                if ($cantidad) {
                    $puesto->flash('success', 'Registro dado de alta con éxito');

                } else {
                    $puesto->flash('danger', 'Algo fallo');
                }
            }else{
                $puesto->flash('danger', 'El privilegio ya está asignado a este puesto');
            }
            $data = $puesto->getPrivilegio($id);
            include(__DIR__.'/views/puesto/privilegio.php');
        } else {
            include(__DIR__.'/views/puesto/privilegio_form.php');
        }
        //$data_tarea = $proyecto->getTask($id);

        break;

    case 'editprivilegio':
        //$proyecto -> validatePrivilegio('Proyecto Actualizar');
        $data = $puesto->getPuestoPrivilegio($id, $id_privilegio);
        $dataPuesto = $puesto->get($id);
        $dataPrivilegio = $privilegio->get();
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $id_prov = $_POST['data']['id_puestoPriv'];
            $id_puesto3 = $_POST['data']['id_puesto'];
            $id_privilegio3 = $_POST['data']['id_privilegio'];
            $validar = $puesto->validarPuestoPrivilegio($id_puesto3, $id_privilegio3);
            
            if(!(isset($validar[0]))){
                $cantidad = $puesto->editPrivilegio($id_prov, $data2);
                if ($cantidad) {
                    $puesto->flash('success', 'Registro modificado con éxito');
                } else {
                    $puesto->flash('danger', 'Algo fallo');
                } 
            }else{
                $puesto->flash('danger', 'El privilegio ya está asignado a este puesto');
            }
            $data = $puesto->getPrivilegio($id);
            
            include(__DIR__.'/views/puesto/privilegio.php');

        } else {
            include(__DIR__.'/views/puesto/privilegio_form.php');
        }
        break;
    
    case 'getAll':
    default:
        $data = $puesto->get(null);
        include(__DIR__."/views/puesto/index.php");
}
include(__DIR__."/views/footer.php");
?>