<?php
require_once("sistema.php");
class Ciudad extends Sistema
{
    public function flash($color, $msg)
    {
        include('views/flash.php');
    }
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select e.*, p.estado 
            from ciudad e
            inner join estado p on e.id_estado = p.id_estado";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll();
        } else {
            $sql = "select e.*, p.estado 
            from ciudad e
            inner join estado p on e.id_estado = p.id_estado where id_ciudad=:id";
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
        $sql = "INSERT INTO ciudad (ciudad, id_estado) 
        VALUES (:ciudad, :id_estado)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":ciudad", $data['ciudad'], PDO::PARAM_STR);
        $st->bindParam(":id_estado", $data['id_estado'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE ciudad 
        SET ciudad = :ciudad,
        id_estado = :id_estado
         where id_ciudad= :id_ciudad";
        $st = $this->db->prepare($sql);
        $st->bindParam(":ciudad", $data['ciudad'], PDO::PARAM_STR);
        $st->bindParam(":id_ciudad", $id, PDO::PARAM_INT);
        $st->bindParam(":id_estado", $data['id_estado'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    public function delete($id)
    {
        $this->db();
        $sql = "DELETE FROM ciudad WHERE id_ciudad=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
$ciudad  = new Ciudad;
?>