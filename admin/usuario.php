<?php
require_once(__DIR__."/controllers/usuario.php");
require_once(__DIR__."/controllers/puesto.php");
include_once(__DIR__."/views/header.php");
$usuario -> validateRol('administracion');
include_once(__DIR__."/views/menu2.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_puesto = (isset($_GET['id_puesto'])) ? $_GET['id_puesto'] : null;

switch ($action) {
    case 'new':
        $usuario -> validatePrivilegio('Admin usuarios');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $usuario->new($data);
            if ($cantidad) {
                $ide = $usuario->getId($data['correo']);
                $cantidad2 = $usuario->newPuestoDef($ide);
                if($cantidad2){
                    $usuario->flash('success', 'Registro dado de alta con éxito');
                    $data = $usuario->getUsuario(null);
                    include(__DIR__.'/views/usuario/index.php');
                }else{
                    $usuario->flash('danger', 'Algo fallo en la asignación de rol de usuario');
                    include(__DIR__.'/views/usuario/form.php');
                }
            } else {
                $usuario->flash('danger', 'Algo fallo en crear usuario');
                include(__DIR__.'/views/usuario/form.php');
            }
        } else {
            
            include(__DIR__.'/views/usuario/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_usuario'];
            $cantidad = $usuario->edit($id, $data);
            if ($cantidad) {
                $usuario->flash('success', 'Registro actualizado con éxito');
                $data = $usuario->getUsuario(null);
                include(__DIR__.'/views/usuario/index.php');
            } else {
                $usuario->flash('danger', 'Algo fallo');
                $data = $usuario->getUsuario(null);
                include(__DIR__.'/views/usuario/index.php');
            }
        } else {
            $dataUsuario = $usuario->getUsuario($id);
            
            include(__DIR__.'/views/usuario/form.php');
        }
        break;
    case 'delete':
        if(!$usuario -> validatePrivilegio('Borrar usuario')){
            $cantidad = $usuario->delete($id);
        if ($cantidad) {
            $usuario->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $usuario->getUsuario(null);
            include(__DIR__.'/views/usuario/index.php');
        } else {
            $usuario->flash('danger', 'Algo fallo');
            $data = $usuario->getUsuario(null);
            include(__DIR__.'/views/usuario/index.php');
        }
        }
        
        break;
    case 'puestos':
        //$proyecto -> validatePrivilegio('Proyecto Leer');
        $dataUsuario = $usuario->getUsuario($id);
        
        $data = $usuario->getPuesto($id);
        include(__DIR__.'/views/usuario/puesto.php');
        break;
    case 'deletepuesto':
        //$proyecto -> validatePrivilegio('Proyecto Borrar');
        $cantidad = $usuario->deletePuesto($id, $id_puesto);
        if ($cantidad) {
            $usuario->flash('success', 'Puesto con el eliminado con éxito. Nota: Los cambios no serán visibles hasta que el usuario vuelva a iniciar sesión.');
            $dataUsuario = $usuario->getUsuario($id);
            $data = $usuario->getPuesto($id);
            include(__DIR__.'/views/usuario/puesto.php');
        } else {
            $usuario->flash('danger', 'Algo fallo');
            $dataUsuario = $usuario->getUsuario($id);
            $data = $usuario->getPuesto($id);
            include(__DIR__.'/views/usuario/puesto.php');
        }
        break;
    case 'newpuesto':
        //$proyecto -> validatePrivilegio('Proyecto Crear');
        $data = $usuario->getUsuarioPuesto();
        $dataUsuario = $usuario->getUsuario($id);
        
        $dataPuesto = $puesto->get();
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $id_usuario2 = $_POST['data']['id_usuario'];
            $id_puesto2 = $_POST['data']['id_puesto'];
            $validar = $usuario->validarUsuarioPuesto($id_usuario2, $id_puesto2);
            
            if(!(isset($validar[0]))){
                $cantidad = $usuario->newPuesto($id, $data2);
                if ($cantidad) {
                    $usuario->flash('success', 'Registro dado de alta con éxito. Nota: Los cambios no serán visibles hasta que el usuario vuelva a iniciar sesión.');

                } else {
                    $usuario->flash('danger', 'Algo fallo');
                }
            }else{
                $usuario->flash('danger', 'El puesto ya está asignado a este usuario');
            }
            $data = $usuario->getPuesto($id);
            
            include(__DIR__.'/views/usuario/puesto.php');
        } else {
            $data = $usuario->getPuesto($id);
           
            include(__DIR__.'/views/usuario/puesto_form.php');
        }
        //$data_tarea = $proyecto->getTask($id);

        break;

    case 'editpuesto':
        //$proyecto -> validatePrivilegio('Proyecto Actualizar');
        $data = $usuario->getUsuarioPuesto($id, $id_puesto);
        $dataUsuario = $usuario->getUsuario($id);
        
        $dataPuesto = $puesto->get();
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $id = $_POST['data']['id_usuPuesto'];
            $id_usuario3 = $_POST['data']['id_usuario'];
            $id_puesto3 = $_POST['data']['id_puesto'];
            $validar = $usuario->validarUsuarioPuesto($id_usuario3, $id_puesto3);
            
            if(!(isset($validar[0]))){
                $cantidad = $usuario->editPuesto($id, $data2);
                
                if ($cantidad) {
                    $usuario->flash('success', 'Registro modificado con éxito. Nota: Los cambios no serán visibles hasta que el usuario vuelva a iniciar sesión.');
                } else {
                    $usuario->flash('danger', 'Algo fallo');
                } 
            }else{
                $usuario->flash('danger', 'El puesto ya está asignado a este usuario');
            }
            $data = $usuario->getPuesto($id_usuario3);
            include(__DIR__.'/views/usuario/puesto.php');

        } else {
            include(__DIR__.'/views/usuario/puesto_form.php');
        }
        break;
    case 'getTree':
        $data = $usuario->getUsuario(null);
        $dataUR = $usuario->get(null);
        $dataPuesto = $puesto->get();
        include(__DIR__."/views/usuario/index_tree.php");
        break;

    case 'getAll':
    default:
        $data = $usuario->getUsuario(null);
        include(__DIR__."/views/usuario/index.php");

}
include(__DIR__."/views/footer.php");
?>