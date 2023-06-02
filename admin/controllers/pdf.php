<?php
require_once("sistema2.php");
class Pdf extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from pdf";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from pdf where id_pdf=:id";
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
        $sql = "INSERT INTO pdf (pdf) 
        VALUES (:pdf)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":pdf", $data['pdf'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE pdf 
        SET pdf = :pdf
         where id_pdf= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":pdf", $data['pdf'], PDO::PARAM_STR);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM pdf WHERE id_pdf=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$pdf  = new Pdf;
?>