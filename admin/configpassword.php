<?php
require_once("controllers/configpassword.php");
include_once("views/header.php");
$configpassword -> validateRol('usuario');
include_once("views/menu2.php");


        


        if (isset($_POST['enviar'])) {
            $contra = $configpassword -> getContrasena($_SESSION['correo']);
            
            $data = $_POST;
            $cantidad = $configpassword->editContrasena($data, $contra,$_SESSION['correo']);
        
        if ($cantidad) {
            $configpassword->flash('success', 'Contraseña actualizada');
            header('Location: login.php');
        } else {
            $configpassword->flash('danger', 'Algo fallo');
            header('Location: login.php');
        }
        } else {
            include('views/configpassword/form.php');
        }
        
include("views/footer.php");
?>