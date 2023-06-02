<?php
require_once("sistema.php");
class Red_social extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from red_social";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select * from red_social where id_red=:id";
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
        $sql = "INSERT INTO red_social (red_social) 
        VALUES (:red_social)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":red_social", $data['red_social'], PDO::PARAM_STR);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE red_social 
        SET red_social = :red_social
         where id_red= :id_red";
        $st = $this->db->prepare($sql);
        $st->bindParam(":red_social", $data['red_social'], PDO::PARAM_STR);
        $st->bindParam(":id_red", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM red_social WHERE id_red=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$red_social  = new Red_social;
?>