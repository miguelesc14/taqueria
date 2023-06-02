<?php
require_once("sistema.php");
class Pais extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from pais";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from pais where id_pais=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }


        return $data;
    }


    public function new ($data)
    {
        $this->db();
        $sql = "INSERT INTO pais (pais) 
        VALUES (:pais)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":pais", $data['pais'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE pais 
        SET pais = :pais
         where id_pais= :id_pais";
        $st = $this->db->prepare($sql);
        $st->bindParam(":pais", $data['pais'], PDO::PARAM_STR);
        $st->bindParam(":id_pais", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM pais WHERE id_pais=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$pais  = new Pais;
?>