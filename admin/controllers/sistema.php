<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once(__DIR__.'/../config.php');
class Sistema
{

    var $db = null;

    public function db()
    {
        $dsn = DBDRIVER . ':host=' . DBHOST . ';dbname=' . DBNAME . ';port=' . DBPORT;
        $this->db = new PDO($dsn, DBUSER, DBPASS);
    }

    public function flash($color, $msg)
    {
        include('views/flash.php');
    }

    public function uploadfile($tipo, $ruta, $archivo)
    {
        $name = false;
        $uploads['archivo'] = array("application/gzip", "application/zip", "application/x-zip-compressed");
        $uploads['fotografia'] = array("image/jpeg", "image/jpg", "image/gif", "image/png");
        
        

        if ($_FILES[$tipo]['error'] == 4) {
            return $name;

        }
        if ($_FILES[$tipo]['error'] == 0) {
            if (in_array($_FILES[$tipo]['type'], $uploads['fotografia'])) {
                //if ($_FILES[$tipo]['size'] <= 2 * 1048 * 1048) {
                    $origen = $_FILES[$tipo]['tmp_name'];
                    $ext = explode(".", $_FILES[$tipo]['name']);
                    $ext = $ext[sizeof($ext) - 1];
                    $destino = $ruta . $archivo . "." . $ext;
                   
                    if (move_uploaded_file($origen, $destino)) {
                        $name = $destino;
                    }
                //}
            }
        }
        return $name;
    }
    public function login($correo, $contrasena)
    {
        if (!is_null($contrasena)) {
            if (strlen($contrasena) > 0) {
                if ($this->validateEmail($correo)) {
                    $contrasena = md5($contrasena);
                    $this->db();
                    $sql = 'select id_usuario, correo from usuario where correo=:correo and contrasena=:contrasena';
                    $st = $this->db->prepare($sql);
                    $st->bindParam(":correo", $correo, PDO::PARAM_STR);
                    $st->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
                    $st->execute();
                    $data = $st->fetchAll(PDO::FETCH_ASSOC);
                    if (isset($data[0])) {
                        $data = $data[0];
                        $_SESSION = $data;
                        $_SESSION['roles'] = $this->getRoles($correo);
                        $_SESSION['privilegios'] = $this->getPrivilegios($correo);
                        $_SESSION['photo'] = $this -> getPhoto($correo);
                        $_SESSION['nombreemp'] = $this -> getNombreEmp($correo);
                        $_SESSION['nombrecli'] = $this -> getNombreCli($correo);
                        $_SESSION['genero'] = $this->getGenero($correo);
                        $_SESSION['validado'] = true;
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION["logeado"]);
        session_destroy();
    }
    public function getRoles($correo)
    {
        $roles = array();
        if ($this->validateEmail($correo)) {
            $this->db();
            $sql = 'select p.puesto 
            from usuario u 
            join usuario_puesto up on u.id_usuario=up.id_usuario 
            join puesto p on up.id_puesto = p.id_puesto 
            where u.correo = :correo';
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $rol) {
                array_push($roles, $rol['puesto']);
            }
        }
        return $roles;
    }

    public function getPhoto($correo)
    {
        $photo = array();
        if ($this->validateEmail($correo)) {
            $this->db();

            if (!in_array('cliente', $_SESSION['roles'])) {
                $sql = 'select e.imagen_perfil
                from usuario u join personal e on u.id_usuario = e.id_usuario 
                where u.correo = :correo';
                
            }else{
                $sql = 'select e.imagen_perfil
                from usuario u join cliente e on u.id_usuario = e.id_usuario 
                where u.correo = :correo';
            }    

            
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $photo) {
                array_push($photo, $photo['imagen_perfil']);
            }
        }
        return $photo;
    }

    public function getNombreEmp($correo)
    {
        $nombres = array();
        if ($this->validateEmail($correo)) {
            $this->db();

            if (!in_array('cliente', $_SESSION['roles'])) {
                $sql = 'select concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
                ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as 
                nombre from usuario u join personal e on u.id_usuario = e.id_usuario 
                where u.correo = :correo';
            }else{
                $sql = 'select concat(e.nombre, " ",ifnull(e.segundo_nombre,""), " ", 
                ifnull(e.primer_apellido,""), " ", ifnull(e.segundo_apellido,"")) as 
                nombre from usuario u join cliente e on u.id_usuario = e.id_usuario 
                where u.correo = :correo';
            }    

            
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $nombre) {
                array_push($nombres, $nombre['nombre']);
            }
        }
        return $nombres;
    }

    public function getNombreCli($correo)
    {
        $nombres = array();
        if ($this->validateEmail($correo)) {
            $this->db();
            if (!in_array('cliente', $_SESSION['roles'])) {
                $sql = 'select concat(e.nombre,  " ", 
                ifnull(e.primer_apellido,"")) as 
                nombre from usuario u join personal e on u.id_usuario = e.id_usuario 
                where u.correo = :correo';
            }else{
                $sql = 'select concat(e.nombre, " ", 
                ifnull(e.primer_apellido,"")) as 
                nombre from usuario u join cliente e on u.id_usuario = e.id_usuario 
                where u.correo = :correo';
            }    

            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $nombre) {
                array_push($nombres, $nombre['nombre']);
            }
        }
        return $nombres;
    }

    public function getGenero($correo)
    {
        $generos = array();
        if ($this->validateEmail($correo)) {
            $this->db();
            
                if (in_array('cliente', $_SESSION['roles'])) {
                    header("Location: index.php");
                    $sql = 'select g.genero
                from usuario u 
                join cliente c on c.id_usuario = u.id_usuario
                join genero g on g.id_genero = c.id_genero
                where u.correo = :correo';
                }else {
                    $sql = 'select g.genero
                from usuario u 
                join personal e on u.id_usuario = e.id_usuario
                join genero g on g.id_genero = e.id_genero
                where u.correo = :correo';
                }
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $genero) {
                array_push($generos, $genero['genero']);
            }
        }
        return $generos;
    }



    public function getPrivilegios($correo)
    {
        $privilegios = array();
        if ($this->validateEmail($correo)) {
            $this->db();
            $sql = 'select p.privilegio from usuario u join usuario_puesto ur on u.id_usuario=ur.id_usuario join puesto r on ur.id_puesto = r.id_puesto join puesto_privilegio rp on r.id_puesto = rp.id_puesto join privilegio p on rp.id_privilegio= p.id_privilegio where u.correo = :correo';
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $privilegio) {
                array_push($privilegios, $privilegio['privilegio']);
            }
        }
        return $privilegios;
    }
    public function validateEmail($correo)
    {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    public function validateRol($rol)
    {

        if (isset($_SESSION['validado'])) {
            if ($_SESSION['validado']) {
                if (isset($_SESSION['roles'])) {
                    if (!in_array($rol, $_SESSION['roles'])) {
                        $this->killApp('No tienes el rol adecuado');
                    }
                } else {
                    $this->killApp('No tienes roles asignados');
                }
            } else {
                $this->killApp('No estas validado');
            }
        } else {
            $this->killApp('No te has logueado');
        }
    }
    public function validatePrivilegio($privilegio)
    {
        if (isset($_SESSION['validado'])) {
            if ($_SESSION['validado']) {
                if (isset($_SESSION['privilegios'])) {
                    if (!in_array($privilegio, $_SESSION['privilegios'])) {
                        $this->killApp('No tienes el privilegio adecuado');
                    }
                } else {
                    $this->killApp('No tienes privilegios asignados');
                }
            } else {
                $this->killApp('No estas validado');
            }
        } else {
            $this->killApp('No te has logueado');
        }
    }
    public function killApp($mensaje)
    {
        ob_end_clean();
        include('views/header_error.php');
        $this->flash('danger', $mensaje);
        include('views/footer_error.php');
        die();
    }
    public function forgot($destinatario,$token)
    {
        if ($this->validateEmail($destinatario)) {
            //$token=$this ->generarToken($destinatario);
            require '../vendor/autoload.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host = 'smtp.gmail.com';
            
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = '20030077@itcelaya.edu.mx';
            $mail->Password = 'qzozbvvykemazkdc';
            $mail->setFrom('20030077@itcelaya.edu.mx', 'Miguel Salomón Escamilla Elias');
            
            $mail->addAddress($destinatario, 'Sistema Constructora');
            $mail->Subject = 'Recuperacion de contraseña';

            $mensaje = "
                Estimadx usuario <br>
                <a href='http://localhost/taqueria/admin/login.php?action=recovery&token=$token&correo=$destinatario'> Presione aquí para recuperar la contraseña.</a> <br>
                Atentamente constructora.
            ";
            $mail->msgHTML($mensaje);
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message sent!';
            }
        }
    }
    public function generarToken($correo){
        $fecha_actual = date('Y-m-d');
        $hora_actual = date('H:i:s');
        $token = $fecha_actual."superwarioman".$hora_actual;
        $n=rand(1,1000000);
        $x = md5(md5($token));
        $y = md5($x . $n);
        $token = md5($y);
        $token= md5($token . 'livmorgan');
        $token = md5('eleanaiouyea'). md5($token . $correo);
        return $token;
    }
    public function loginSend($correo){
        $rc = 0;
        if($this -> validateEmail($correo)){
            $this->db();
            $sql = 'select u.correo from usuario u where u.correo = :correo';
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            //print_r($data);
            if(isset($data[0])){
                //$this->db();
                $token = $this -> generarToken($correo);
                $sql2 = 'update usuario set token =:token where correo =:correo';
            $st2 = $this->db->prepare($sql2);
            $st2->bindParam(":token", $token, PDO::PARAM_STR);
            $st2->bindParam(":correo", $correo, PDO::PARAM_STR);
            
            $st2->execute();
            $rc = $st2->rowCount();
            
            $this -> forgot($correo, $token);
            }
        }
        return $rc;
    }
    public function validateToken($correo, $token){
        if(strlen($token)==64){
            if($this->validateEmail($correo)){
                $this->db();
                $sql = "SELECT correo FROM usuario where correo=:correo and token=:token";
                $st = $this->db->prepare($sql);
                $st->bindParam(':correo', $correo, PDO::PARAM_STR);
                $st->bindParam(':token', $token, PDO::PARAM_STR);
                $st->execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
                //print_r($data);
                if(isset($data[0])){
                    return true;
                }
            }
        }
        return false;
    }
    public function resetPassword($correo,$token,$contrasena){
        $cantidad=0;
        if(strlen($token)==64 and strlen($contrasena)>0){
            if($this->validateEmail($correo)){
                $contrasena=md5($contrasena);
                $this->db();
                $sql = "UPDATE usuario set contrasena=:contrasena,token=null 
                        where correo=:correo and token=:token";
                $st = $this->db->prepare($sql);
                $st->bindParam(':correo', $correo, PDO::PARAM_STR);
                $st->bindParam(':token', $token, PDO::PARAM_STR);
                $st->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $st->execute();
                $cantidad = $st->rowCount();
            }
        }
        return $cantidad;
    }
}
$sistema = new Sistema;
?>