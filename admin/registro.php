<?php
require_once("controllers/registro.php");
require_once("controllers/usuario.php");
require_once("controllers/genero.php");
include_once("views/header.php");

if(isset($_SESSION['id_usuario'])){

    $sistema ->logout();
    include('views/login/index.php');
}else{
    include_once("views/menu.php");
    $dataUsuario = $usuario->getUsuario(null);
        $dataGenero = $genero->get(null);
            if (isset($_POST['enviar'])) {
                $data = $_POST['data'];
                
                $cantidad = $registro->newUser($data);
                if ($cantidad) {
                    $ide = $registro->getId($data['correo']);
                    
                    $cantidad3 = $registro->newClient($ide, $data);
                    if($cantidad3){
                        $cantidad2 = $registro->newPuestoDef($ide);
                        if($cantidad2){
                            $usuario->flash('success', 'Registro dado de alta con éxito. Favor de iniciar sesión');
                            $data = $usuario->getUsuario(null);
                            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
                        }else{
                            $usuario->flash('danger', 'Algo fallo en la asignación de rol de usuario');
                            include(__DIR__.'/views/registro/form.php');
                        }
                    }else{
                        $usuario->flash('danger', 'Algo fallo en crear cliente');
                            include(__DIR__.'/views/registro/form.php');
                    }
                    
                } else {
                    $usuario->flash('danger', 'Algo fallo en crear usuario');
                    include(__DIR__.'/views/registro/form.php');
                }
            } else {
                 include('views/registro/form.php');
            }
 
    include("views/footer.php");

}?>