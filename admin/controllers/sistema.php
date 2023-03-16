<?php
require_once('config.php');
class Sistema
{
    var $db = null;
    public function db()
    {
        $dsn = DBDRIVER . ':host=' . DBHOST . ';dbname=' . DBNAME . ';port' . DBPORT;
        $this->db = new PDO($dsn, DBUSER, DBPASS);
    }

    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function uploadfile($tipo,$ruta)
    {
        $name = false;
        print_r($_FILES);
        die();
        if (move_uploaded_file($origen, $destino)) {

        }
        return $name;
    }

}
?>