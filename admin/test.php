<?php
require_once('config.php');
$connectionString= DBDRIVER.':host='.DBHOST.';dbname='.DBNAME.';port'.DBPORT;
$db = new PDO($connectionString, "constructora","1234");
$prep2 = $db -> prepare("SELECT * from departamento");
$prep2 -> execute();
$result= $prep2 -> fetchAll();
print_r($result)
?>