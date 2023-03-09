<?php
require_once("Sistema.php");
class Departamento extends Sistema
{
    public function getAll()
    {
        $this->db();
        $sql="SELECT * from departamento";
        $st = $this->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll();
        return $data;
    }  

}
$web = new Departamento;
?>